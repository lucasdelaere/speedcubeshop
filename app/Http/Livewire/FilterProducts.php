<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Type;
use Livewire\Component;
use Livewire\WithPagination;

class FilterProducts extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";
    public $brands;
    public $types;

    // filters
    public $selectedBrands = [];
    public $selectedTypes = [];
    public $selectedRating = 0;
    public $minPrice = 0;
    public $maxPrice = 100;

    protected $listeners = ['sliderUpdated' => 'setPrice', 'setRating'];
    // I put names instead of id's in selectedBrands/Types so they would appear as names in the querystring. This complicates the query slightly.
    protected $queryString = ['selectedBrands' => ['except' => '', 'as' => 'brand'], 'selectedTypes' => ['except' => '', 'as' => 'type'], 'selectedRating' => ['except' => 0,'as' => 'rating'], 'minPrice' => ['except' => 0, 'as' => 'min-price'], 'maxPrice' => ['except' => 100, 'as' => 'max-price']];
    // declaring $queryString will put the query parameters in the URL

    public function mount($brands, $types)
    {
        $this->brands = $brands;
        $this->types = $types;
    }

    private function getBrandIds($brandNames)
    {
        $brands = Brand::whereIn('name', $brandNames)->pluck('id');
        return $brands;
    }
    private function getTypeIds($typeNames)
    {
        $types = Type::whereIn('name', $typeNames)->pluck('id');
        return $types;
    }

    // resetPage() resets the paginator to page = 1 upon a specific update
    public function setRating($rating) {
        $this->selectedRating = $rating;
        $this->resetPage();
    }
    public function setPrice($values) {
        $this->minPrice = $values[0];
        $this->maxPrice = $values[1];
        $this->resetPage();
    }
    public function updatedSelectedBrands()
    {
        $this->resetPage();
    }
    public function updatedSelectedTypes()
    {
        $this->resetPage();
    }

    public function render()
    {

        return view('livewire.filter-products', [
            "brands" => $this->brands,
            "types" => $this->types,
            "products" =>
                Product::when($this->selectedBrands, function($query) {
                    $query->whereIn("brand_id", $this->getBrandIds($this->selectedBrands));
                })
                    ->when($this->selectedTypes, function($query) {
                        $query->whereIn("type_id",$this->getTypeIds($this->selectedTypes));
                    })
                    ->whereBetween('price', [$this->minPrice, $this->maxPrice])
                    ->where('rating', '>=', $this->selectedRating)
                    ->with(["photo", "brand", "type"])
                    ->withTrashed()
                    ->paginate(12)
        ]);
    }
}
