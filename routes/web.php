<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

/*Route::get('/Product', function () {

    return view('Product', ['product' => $input]);
});
Route::get('/welcome', function () {
    return view('welcome');
});*/
Route::get('/products', [ProductController::class, 'index'])->name('products');

Route::get('/products/{id}', [ProductController::class, 'show']);

Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');