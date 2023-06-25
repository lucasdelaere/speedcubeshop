<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Type;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        $types = Type::all();

        return view("shop", compact("brands", "types"));
    }

}
