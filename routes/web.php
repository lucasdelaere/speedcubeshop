<?php

use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* FRONTEND ROUTES */
Route::get('/', [\App\Http\Controllers\FrontendHomeController::class, "index"]
)->name('frontend.index');

Route::get("tutorials", function() {
    return view('tutorials');
})->name('tutorials');

Route::get("products/{product:slug}", "\App\Http\Controllers\ProductController@showFrontend"
)->name("products.showFrontend");
/* SHOP & SHOP FILTER ROUTES */
Route::get("shop", [
    \App\Http\Controllers\ShopController::class,
    "index",
])->name("shop");


/*************************************************/
/* BACKEND ROUTES */
Route::group(["prefix" => "backend", "middleware" => ["auth", "verified", "backend"]], function() {
    Route::get("/", [
        App\Http\Controllers\BackendHomeController::class,
        "index",
    ])->name("backend.index");

    Route::resource("users", \App\Http\Controllers\UsersController::class);
    Route::post("users/restore/{user}", [UsersController::class, "restore"])->name("users.restore");

    Route::resource("brands",
    \App\Http\Controllers\BrandController::class);
    Route::post("brands/restore/{brand}", [\App\Http\Controllers\BrandController::class, "restore"])->name("brands.restore");

    Route::resource("products",
    \App\Http\Controllers\ProductController::class);
});

/*************************************************/
/* AUTHENTICATION ROUTES FROM LARAVEL/UI (login, register...) */
Auth::routes(["verify" => true]);

// homepage from laravel/ui
Route::get('/home', function() {
    return view('home');
})->name('home');
