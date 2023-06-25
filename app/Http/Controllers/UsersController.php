<?php

namespace App\Http\Controllers;

use App\Events\UsersSoftDelete;
use App\Models\Photo;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\Rules\Password;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with(["role"])
            ->withTrashed()
            ->orderByDesc("id")
            ->paginate(10); //withTrashed() shows the soft deleted entries. onlyTrashed shows only the soft deleted entries.
        return view("backend.users.index", ["users" => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::pluck("name", "id")->all();
        /*ddd($roles); //(dump and die (and debug)) var_dump van laravel */
        return view("backend.users.create", compact("roles"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            "first_name" => ["required", "max:255", "min:3"],
            "last_name" => ["max:255"],
            "email" => ["required", "email"],
            "role_id" => ["required", Rule::exists("roles", "id")],
            "is_active" => ["required"],
            "photo_id" => [
                File::types(["png", "jpg", "webp", "jpeg"])
                    ->min(1)
                    ->max(2 * 1024),
            ],
            "password" => [Password::min(6)],
        ]);
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->is_active = $request->is_active;
        $user->role_id = $request->role_id;
        $user->password = Hash::make($request->password);
        if ($file = $request->file("photo_id")) {
            // before we would make the path as 'img/{photo_name}{current_timestamp}'
            $path = request()
                ->file("photo_id") //look at 'getFileAttribute' function in Photo class, this makes a 'assets/...' filename
                ->store("users"); // store under assets/users
            $photo = Photo::create(["file" => $path]);
            //update photo_id (FK in users table)
            $user->photo_id = $photo->id;
        }

        $user->save();
        /*wegschrijven van meerdere rollen in tussentabel*/
        return redirect("backend/users")->with([
            "alert" => [
                "model" => "User",
                "type" => "success",
                "message" => "Added",
            ],
        ]); //redirect uses cached page (view would reload it)
        //return redirect()->route('users.index'); //using aliases, so it will not use a cached page
        //return back()->withInput(); //terugkeren naar formulier (met ingevulde input)
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        $roles = Role::pluck("name", "id")->all();
        return view("backend.users.edit", compact("user", "roles"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // validation IN the controller (instead of in requests (UserRequest))
        request()->validate([
            "first_name" => ["required", "max:255", "min:3"],
            "last_name" => ["max:255"],
            "email" => ["required", "email"],
            "role_id" => ["required", Rule::exists("roles", "id")],
            "is_active" => ["required"],
            "photo_id" => [
                File::types(["png", "jpg", "webp", "jpeg"])
                    ->min(1)
                    ->max(2 * 1024),
            ],
            "password" => [Password::min(6)],
        ]);

        $user = User::findOrFail($id);
        if (trim($request->password) == "") {
            $input = $request->except("password");
        } else {
            $input = $request->all();
            $input["password"] = Hash::make($request["password"]);
        }

        //first check if a new photo was provided (otherwise do nothing)
        if ($file = $request->file("photo_id")) {
            $oldPhoto = Photo::find($user->photo_id);
            $path = request()
                ->file("photo_id")
                ->store("users");
            //upload to img folder (no longer needed). We now upload to assets folder, which is symlinked to storage/app/public/users, as done above.
            //            $name = time() . $file->getClientOriginalName();
            //            $file->move("img", $name);

            //if there wasn't an old photo, create new in db
            if ($oldPhoto) {
                unlink(public_path($oldPhoto->file));

                /*here we could delete old photo:
                 $oldPhoto->delete();
                 and create new photo:
                 $photo = Photo::create(["file" => $name]);*/

                $oldPhoto->update(["file" => $path]);

                //keep old photo_id (FK in users table)
                $input["photo_id"] = $oldPhoto->id;
            } else {
                //create photo (new id)
                $photo = Photo::create(["file" => $path]);
                //update photo_id (FK in users table)
                $input["photo_id"] = $photo->id;
            }
        }

        //user saven
        $user->update($input);
        return redirect("/backend/users")->with("alert", [
            "model" => "User",
            "type" => "success",
            "message" => "Updated",
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // User::findOrFail($id)->delete();
        $user = User::findOrFail($id);
        UsersSoftDelete::dispatch($user);
        $user->delete();
        return redirect()
            ->route("users.index")
            ->with("alert", [
                "model" => "User",
                "type" => "danger",
                "message" => "Deleted",
            ]);
    }

    protected function restore($id)
    {
        User::onlyTrashed()
            ->where("id", $id)
            ->restore();
        // or findOrFail
        $user = User::all()
            ->where("id", $id)
            ->first();
        /*$user
            ->posts()
            ->onlyTrashed()
            ->restore();*/
        return redirect("backend/users")->with("alert", [
            "model" => "User",
            "type" => "warning",
            "message" => "Restored",
        ]);
        //return redirect()->route('admin.users');
        //return back()
    }
}
