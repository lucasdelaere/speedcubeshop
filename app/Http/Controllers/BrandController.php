<?php

namespace App\Http\Controllers;

use App\Events\UsersSoftDelete;
use App\Models\Brand;
use App\Models\Photo;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $brands = Brand::withTrashed()->paginate(20);

        return view("backend.brands.index", [
            "brands" => $brands,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function create()
    {
        return view("backend.brands.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $messages = [
            'name.required' => 'Please enter a brand name.',
            'description.min' => 'Brand description must be at least 5 characters.'
        ];
        // validation IN the controller (instead of in requests (UserRequest))
        request()->validate([
            "name" => ["required", "max:255"],
            "description" => ["required", "min:5"]
        ], $messages);

        $brand = new Brand();
        $brand->name = $request->name;
        $brand->description = $request->description;

        $brand->save();

        return redirect()
            ->route("brands.index")
            ->with([
                "alert" => [
                    "model" => "Brand",
                    "message" => "Created",
                    "type" => "success",
                ],
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view("backend.brands.edit", compact("brand"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'name.required' => 'Please enter a brand name.',
            'description.min' => 'Brand description must be at least 5 characters.'
        ];
        // validation IN the controller (instead of in requests (UserRequest))
        request()->validate([
            "name" => ["required", "max:255"],
            "description" => ["required", "min:5"]
        ], $messages);

        $brand = Brand::findOrFail($id);
        $input = $request->all();


        $brand->update($input);
        return redirect("/backend/brands")->with("alert", [
            "model" => "Brand",
            "type" => "warning",
            "message" => "Updated",
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        // User::findOrFail($id)->delete();
        $brand = Brand::findOrFail($id);
        $brand->delete();
        return redirect()
            ->route("brands.index")
            ->with("alert", [
                "model" => "Brand",
                "type" => "danger",
                "message" => "Deleted",
            ]);
    }

    protected function restore($id)
    {
        Brand::onlyTrashed()
            ->where("id", $id)
            ->restore();
        /*$user
            ->posts()
            ->onlyTrashed()
            ->restore();*/
        return redirect("backend/brands")->with("alert", [
            "model" => "Brand",
            "type" => "success",
            "message" => "Restored",
        ]);
    }
}
