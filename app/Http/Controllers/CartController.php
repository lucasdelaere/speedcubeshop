<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cartProducts = Cart::content();
        return view('cart', compact('cartProducts'));
    }
    public function store(Request $request, Product $product) {
        // passing $product via dependency injection rather than its 'id' via a 'hidden input field
        $request->validate([
            'quantity' => 'required|numeric|gt:0'
        ]);
        Cart::add(
            $product->id,
            $product->name,
            $request->input('quantity'),
            $product->price,
            $product->weight,
            [] // options (stickers/no stickers and lube added/no lube added)
        );

        return redirect()->back()->with('message', $request->input('quantity') . ' item' . ($request->input('quantity') > 1 ? 's' : '') .' added to cart!');
    }
}
