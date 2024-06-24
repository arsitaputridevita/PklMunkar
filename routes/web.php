<?php

use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// cek template admin

Route::get('tes', function () {
    return view('layouts.front');
});

// Route admin(backend)
Route::group(['prefi' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('admin', function () {
        return view('admin.index');
    });
    // untuk admin Backend lainnya
});

// rote frontend
Route::get('/', [FrontController::class, 'index']);
Route::get('contact', [FrontController::class, 'contact']);
Route::get('shop', [FrontController::class, 'shop']);
Route::get('cart', [FrontController::class, 'cart']);
Route::get('checkout', [FrontController::class, 'checkout']);
Route::get('track', [FrontController::class, 'track']);
Route::get('detail', [FrontController::class, 'detail']);
Route::get('about', [FrontController::class, 'about']);