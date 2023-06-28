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

Route::get("shop", [
    \App\Http\Controllers\ShopController::class,
    "index",
])->name("shop");
Route::get("products/{product:slug}", "\App\Http\Controllers\ProductController@showFrontend"
)->name("products.showFrontend");

Route::get('cart', [\App\Http\Controllers\CartController::class, 'index'])->name('cart');
Route::post("cart/store/{product:id}", [\App\Http\Controllers\CartController::class, 'store'])->name("cart.store");

Route::get('contact')->name('contact');
Route::get('search', [\App\Http\Controllers\ProductController::class, 'search'])->name('search');

Route::group(['prefix' => 'checkouts'], function() {
    Route::get('information', [\App\Http\Controllers\CheckoutController::class, 'information'])->name('information');
    Route::post('shipping', [\App\Http\Controllers\CheckoutController::class, 'shipping'])->name('shipping');
    Route::get('shipping', [\App\Http\Controllers\CheckoutController::class, 'shippingGet'])->name('shipping.get');
    Route::post('payment', [\App\Http\Controllers\CheckoutController::class, 'payment'])->name('payment');

    Route::post('checkout', [\App\Http\Controllers\CheckoutController::class, 'checkout'])->name('checkout');
    Route::get('success', [\App\Http\Controllers\CheckoutController::class, 'success'])->name('success');
    Route::get('cancel', [\App\Http\Controllers\CheckoutController::class, 'cancel'])->name('cancel');
});
Route::post('/webhook',  [\App\Http\Controllers\CheckoutController::class, 'webhook'])->name('webhook');

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
