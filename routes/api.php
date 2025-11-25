<?php

use App\Http\Controllers\BookController;
// use App\Http\Controllers\ProductController;
use App\Http\Controllers\Api\ProductCategoriesController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ProductVariantController;
use App\Http\Controllers\VendorController;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('v1')->group (function () {
    Route::resource('product-categories',ProductCategoriesController ::class);
    Route::resource('products',ProductController::class);
    Route::resource('product-variant',ProductVariantController::class);

    Route::get('/books', [BookController::class, 'index']);
    Route::get('/books/{id}', [BookController::class, 'show']);
    Route :: resource('vendors',  VendorController::class);

    Route::get('/halo', function () {
        return 'halo, Laravel';
    });
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

