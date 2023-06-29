<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Photo;
use App\Models\Product;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

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
        $brands = Brand::all();
        $types = Type::all();
        return view('backend.products.create', compact('brands', 'types'));
    }

    public function store(Request $request)
    {
        // validation IN the controller (instead of in requests (UserRequest))
        request()->validate([
            "name" => ["required", "max:255"],
            "description" => ["required", "min:5"],
            "price" => ["required", "numeric", "between:1,100"],
            "rating" => ["required", "integer", "between:0,5"],
            "brand_id" => ["required", Rule::exists("brands", "id")],
            "type_id" => ["required", Rule::exists("types", "id")],
            "photo_id" => [
                File::types(["png", "jpg", "webp", "jpeg"])
                    ->min(1)
                    ->max(2 * 1024),
            ],
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->rating = $request->rating;
        $product->brand_id = $request->brand_id;
        $product->type_id = $request->type_id;
        $product->slug = Str::slug($request->name, "-");
        if ($file = $request->file("photo_id")) {
            // before we would make the path as 'img/{photo_name}{current_timestamp}'
            $path = request()
                ->file("photo_id") //look at 'getFileAttribute' function in Photo class, this makes a 'assets/...' filename
                ->store("products"); // store under assets/users
            $photo = Photo::create(["file" => $path]);
            //update photo_id (FK in users table)
            $product->photo_id = $photo->id;
        }

        $product->save();

        return redirect()
            ->route("products.index")
            ->with([
                "alert" => [
                    "model" => "Product",
                    "message" => "Created",
                    "type" => "success",
                ],
            ]);
    }
}
