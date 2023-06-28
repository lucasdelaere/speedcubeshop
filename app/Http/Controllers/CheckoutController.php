<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CheckoutController extends Controller
{
    public function information()
    {
        $cartProducts = Cart::content();
        $products = Product::whereIn('id', $cartProducts->pluck('id'))->get();
        // add qty field to each product (needed in view)
        $products->each(function ($product) use ($cartProducts) {
            $product->quantity = $cartProducts->firstWhere('id', $product->id)->qty;
        });
        return view('information', ['products' => $products]);
    }
    public function shipping(Request $request)
    {
        $cartProducts = Cart::content();
        $products = Product::whereIn('id', $cartProducts->pluck('id'))->get();
        // add qty field to each product (needed in view)
        $products->each(function ($product) use ($cartProducts) {
            $product->quantity = $cartProducts->firstWhere('id', $product->id)->qty;
        });
        request()->validate([
            "first_name" => ["required", "max:255", "min:3"],
            "last_name" => ["max:255", "required"],
            "email" => ["required", "email"],
            "country" => "required",
            "address" => "required",
            "postal_code" => "required",
            "city" => "required",
            "phone_number" => "required"
        ]);
        // save stuff needed for orders table in session
        session([
            'email' => $request->email,
            'country' => $request->country,
            'address' => $request->address,
            'postal_code' => $request->postal_code,
            'city' => $request->city,
            'phone_number' => $request->phone_number,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name
        ]);
        return view('shipping', ['products' => $products]);
    }
    public function shippingGet()
    {
        $cartProducts = Cart::content();
        $products = Product::whereIn('id', $cartProducts->pluck('id'))->get();
        // add qty field to each product (needed in view)
        $products->each(function ($product) use ($cartProducts) {
            $product->quantity = $cartProducts->firstWhere('id', $product->id)->qty;
        });
        return view('shipping', ['products' => $products]);
    }
    public function payment(Request $request)
    {
        $shippingMethod = $request->shippingMethod;
        if ($shippingMethod == 'ePacket1') {
            $shippingCost = 8.45;
        } elseif ($shippingMethod == 'ePacket2') {
            $shippingCost = 16.46;
        } elseif ($shippingMethod = 'FedEx1') {
            $shippingCost = 29.26;
        } elseif ($shippingMethod = 'FedEx2') {
            $shippingCost = 40.70;
        }
        session(['shippingMethod' => $shippingMethod,'shippingCost' => $shippingCost]);
        $cartProducts = Cart::content();
        // product model (needed for dependency injection and relations (photo))
        $products = Product::whereIn('id', $cartProducts->pluck('id'))->get();
        // add qty field to each product (needed in view)
        $products->each(function ($product) use ($cartProducts) {
            $product->quantity = $cartProducts->firstWhere('id', $product->id)->qty;
        });
        return view('payment', ['products' => $products]);
    }
    public function checkout(Request $request)
    {
        $paymentMethod = $request->paymentMethod;
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET_KEY'));
        // create (1) taxrate
        $taxRate = $stripe->taxRates->create([
            'display_name' => 'Sales Tax',
            'inclusive' => 'false',
            'percentage' => 21
        ]);
        // create a customer
        $customer = \Stripe\Customer::create([
            'email' => session('email'),
            'name' => session('first_name') . ' ' . session('last_name'),
        ]);
        // cart facade
        $cartProducts = Cart::content();
        $lineItems = [];
        foreach($cartProducts as $product)
        {
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'eur',
                    'product_data' => [
                        'name' => $product->name
                    ],
                    'unit_amount' => $product->price * 100,
                    'tax_behavior' => 'exclusive',
                ],
                'quantity' => $product->qty,
                'tax_rates' => [$taxRate->id],
            ];
        }


        $session = \Stripe\Checkout\Session::create([
            'line_items' => $lineItems,
            'mode' => 'payment',
            'payment_method_types' => [$paymentMethod],
            'shipping_options' => [
                [
                    'shipping_rate_data'  => [
                        'type' => 'fixed_amount',
                        'fixed_amount' => [
                            'amount' => session('shippingCost') * 100,
                            'currency' => 'eur'
                        ],
                        'display_name' => substr(session('shippingMethod'), 0, -1),
                    ]
                ]
            ],
            'customer' => $customer->id,
            // redirect urls from stripe server to our server
            'success_url' => route('success', [], true)."?session_id={CHECKOUT_SESSION_ID}",
            'cancel_url' => route('cancel', [], true),
        ]);

        $order = new Order();
        $order->status = 'unpaid';
        $order->total_price = (float)session('shippingCost') + (float)Cart::total(2, '.', ',');
        $order->session_id = $session->id;
        $order->address = session('address');
        $order->postal_code = session('postal_code');
        $order->city = session('city');
        $order->country = session('country');
        $order->phone_number = session('phone_number');
        if (Auth::user())
        {
            $order->user_id = Auth::id();
        } else {
            $order->user_id = null;
        }
        $order->save();

        return redirect($session->url);
    }
    public function success(Request $request)
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        // sessionId from URL
        $sessionId = $request->get('session_id');

        try {
            $session = \Stripe\Checkout\Session::retrieve($sessionId);
            if (!$session) {
                // if a random session id is entered in URL
                throw new NotFoundHttpException;
            }
            $customer = \Stripe\Customer::retrieve($session->customer);

            $order = Order::where('session_id', $session->id)->first();
//            if (!$order || ($order->status === 'paid')) {
//                throw new NotFoundHttpException();
//            }
            if ($order && $order->status === 'unpaid') {
                $order->status = 'paid';
                $order->save();
            }
            // empty cart after paying
            Cart::destroy();
        } catch(\Exception $e){
            throw new NotFoundHttpException();
        }

        return view('success', compact('customer'));


    }
    public function cancel()
    {
        return view('cancel');
    }

    public function webhook()
    {
        // The library needs to be configured with your account's secret key.
        // Ensure the key is kept out of any version control system you might be using.
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET_KEY'));

        // This is your Stripe CLI webhook secret for testing your endpoint locally.
        $endpoint_secret = env('STRIPE_WEBHOOK_SECRET');

        $payload = @file_get_contents('php://input');
        $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
        $event = null;

        try {
            $event = \Stripe\Webhook::constructEvent(
                $payload, $sig_header, $endpoint_secret
            );
        } catch (\UnexpectedValueException $e) {
            // Invalid payload
            return response('', 400);

        } catch (\Stripe\Exception\SignatureVerificationException $e) {
            // Invalid signature
            return response('', 400);
        }

        // Handle the event
        switch ($event->type) {
            case 'checkout.session.completed':
                // if tab is closed or internet goes out, this webhook will still be triggered. In our case it's via port forwarding from our CLI. In production the event would be sent to the webhook URL. In any case this code will be executed first. This will make sure the order is set as paid in the db.
                $session = $event->data->object;
                $sessionId = $session->id;
                $order = Order::where('session_id', $session->id)->first();
//                if (!$order || ($order->status === 'paid')) {
//                    throw new NotFoundHttpException();
//                }
                if ($order && $order->status === 'unpaid') {
                    // when page is reloaded (order is already paid)
                    $order->status = 'paid';
                    $order->save();
                    // send email to customer to confirm
                }
                // empty cart after paying
                Cart::destroy();
            // ... handle other event types
            default:
                echo 'Received unknown event type ' . $event->type;
        }

        return response('', 200);
    }
}
