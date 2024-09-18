<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

/*Route::get('/Product', function () {

    return view('Product', ['product' => $input]);
});
Route::get('/welcome', function () {
    return view('welcome');
});*/
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show']);