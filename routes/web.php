<?php

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


/* BACKEND ROUTES */
Route::group(["prefix" => "admin", "middleware" => ["auth", "verified"]], function() {
    Route::get("/", [
        App\Http\Controllers\BackendHomeController::class,
        "index",
    ])->name("backend.index");
});

/* AUTHENTICATION ROUTES FROM LARAVEL/UI (login, register...) */
Auth::routes(["verify" => true]);

// homepage from laravel/ui
Route::get('/home', function() {
    return view('home');
})->name('home');
