<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CartCounter extends Component
{
    // better than adding a wire:poll on the cart (wire poll would constantly be refreshing it, the listener will only update it when necessary)
    protected $listeners = ['cartUpdated' => 'render'];

    public function render()
    {
        $cartCount = Cart::content()->count();
        return view('livewire.cart-counter', compact('cartCount'));
    }
}
