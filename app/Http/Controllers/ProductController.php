<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Type;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with([
            "photo",
            "brand",
            "type"
        ])->paginate(20);

        return view("backend.products.index", compact("products"));
    }

    public function showFrontend(Product $product)
    {
        return view('product', ["product" => $product]);
    }

    public function create()
    {

    }

    public function store()
    {

    }
}
