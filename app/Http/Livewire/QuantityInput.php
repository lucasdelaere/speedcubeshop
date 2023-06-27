<?php

namespace App\Http\Livewire;

use Livewire\Component;

class QuantityInput extends Component
{
    public $product;
    public $quantity = 1;

    public function updateQuantity($amount)
    {
        if ($this->quantity + $amount > 0) {
            $this->quantity += $amount;
        }
    }
    public function mount($product)
    {
        $this->product = $product;
    }
    public function render()
    {
        return view('livewire.quantity-input', ['product' => $this->product]);
    }
}
