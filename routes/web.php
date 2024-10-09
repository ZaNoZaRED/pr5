<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistController;
use App\Http\Controllers\ExitController;

/*Route::get('/Product', function () {

    return view('Product', ['product' => $input]);
});
Route::get('/welcome', function () {
    return view('welcome');
});*/
Route::get('/products', [ProductController::class, 'index'])->name('products');

Route::get('/products/{id}', [ProductController::class, 'show']);

Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');

// Вход
Route::get('/login', [LoginController::class, 'create'])
    ->name('login');

Route::post('/login', [LoginController::class, 'store']);

// Регистрация
Route::get('/regist', [RegistController::class, 'create'])
    ->name('register');

Route::post('/regist', [RegistController::class, 'store'])->name('register.store');

// Выход
Route::post('/logout', [ExitController::class, 'destroy'])
    ->name('logout');

    Route::middleware('auth')->group(function () {
        Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    });
    