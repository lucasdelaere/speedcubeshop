<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

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
            "last_name" => ["max:255"],
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
            'phone_number' => $request->phone_number
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
    public function checkout()
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
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
                    'unit_amount' => $product->price * 100
                ],
                'quantity' => $product->qty
            ];
        }
        $session = \Stripe\Checkout\Session::create([
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('checkout.success', [], true),
            'cancel_url' => route('checkout.cancel', [], true),
        ]);

        $order = new Order();
        $order->status = 'unpaid';
        $order->total_price = Cart::total(2, ',', '. ');
        $order->session_id = $session->id;
        $order->save();

        return redirect($session->url);
    }
    public function success()
    {

    }
    public function cancel()
    {

    }
}
