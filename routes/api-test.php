<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VendorController;
use Illuminate\Support\Facades\Route;
                                                            

Route::prefix('v1')->group(function () {
    Route::resource('products',ProductController::class);

    Route::get('/books', [BookController::class, 'index']);
    Route::get('/books/{id}', [BookController::class, 'show']);
    Route :: resource('vendors',  VendorController::class);

    Route::get('/halo', function () {
        return 'halo, Laravel';
    });
});