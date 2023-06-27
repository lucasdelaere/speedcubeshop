<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CartProducts extends Component
{
    public $products;
    public array $quantity = [];

    public function removeFromCart($id)
    {
        $rowId = Cart::content()->firstWhere('id', $id)->rowId;
        Cart::remove($rowId);
        $this->emit('cartUpdated');
    }
    public function updatedQuantity($value, $productId)
    {
        if ($value >= 1)
        {
            $rowId = Cart::content()->firstWhere('id', $productId)->rowId;
            Cart::update($rowId, $value);
            //no 'cartUpdated' emit needed as this method doesn't change the cart count
        }
    }
    public function mount()
    {
        // cart facade
        $cartProducts = Cart::content();
        // product model (needed for dependency injection and relations (photo))
        $this->products = Product::whereIn('id', $cartProducts->pluck('id'))->get();
        // add qty field to each product (needed in view)
        $this->products->each(function ($product) use ($cartProducts) {
            $productId = $product->id;
        $this->quantity[$productId] = $cartProducts->firstWhere('id', $productId)->qty;
        });
    }

    public function render()
    {
        // cart facade
        $cartProducts = Cart::content();
        // product model (needed for dependency injection and relations (photo))
        $this->products = Product::whereIn('id', $cartProducts->pluck('id'))->get();
        // add qty field to each product (needed in view)
        return view('livewire.cart-products', ['products' => $this->products]);
    }
}
