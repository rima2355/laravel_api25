<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/halo', function () {
    return 'halo, Laravel';
});

Route::get('/products', [ProductController::class, 'index']);
Route::post('/products-store', [ProductController::class, 'store']);
Route::get('/books', [BookController::class, 'index']);
Route::get('/books/{id}', [BookController::class, 'show']);