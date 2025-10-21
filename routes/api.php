<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/halo', function () {
    return 'halo, Laravel';
});

Route::get('/products', [ProductController::class, 'index']);
Route::post('/products-store', [ProductController::class, 'store']);