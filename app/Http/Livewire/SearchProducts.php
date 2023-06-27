<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;
use Livewire\WithPagination;

class SearchProducts extends Component
{
    // important for laravel component with pagination!
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public $search;

    public function mount($search)
    {
        $this->search = $search;
    }

    public function addToCart(Product $product)
    {
        Cart::add(
            $product->id,
            $product->name,
            1,
            $product->price,
            $product->weight,
            [] // options (stickers/no stickers and lube added/no lube added)
        );

        $this->emit('cartUpdated');
        session()->flash('itemAdded', ['id' => $product->id]);
    }

    public function render()
    {
        // need to create $products here (not in ProductController, because can't pass paginated object ($products) to laravel controller). So instead we retrieve and paginate products here.
        $products = Product::with(["photo"])
            ->searchProducts($this->search)
            // refers to scopeSearchProducts() from Product class
            ->paginate(2)
            // appends is necessary for pagination. This is so search field gets remembered when changing page.
            // You could also append this in the blade template itself: {{$products->appends(['search' => Request::get('search')])->links()}}
            ->appends([
                "search" => $this->search
            ]);
        return view('livewire.search-products', ['products' => $products]);
    }
}
