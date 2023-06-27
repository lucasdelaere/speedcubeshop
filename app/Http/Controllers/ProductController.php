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

    public function search(Request $request)
    {
        // using GET request for search (not POST), this is possible since a request will always be passed to controller (even in GET). This request can be accessed by:
        // 1. passing search(Request $request) and using $request->search to access search field.
        // 2. search() without parameters and using request('search') to access search field.
        return view('search', [
            'search' => $request->search
        ]);
    }
    public function create()
    {

    }

    public function store()
    {

    }
}
