<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackendHomeController extends Controller
{
    public function __construct()
    {
        // this will run the 'Authenticate.php' class in Middleware, which will redirect users to the login page
        $this->middleware("auth");
    }

    public function index()
    {
        return view("backend.index");
    }
}
