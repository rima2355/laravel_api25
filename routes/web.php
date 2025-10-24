<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcome', [WelcomeController::class, 'index']);
Route::get('/book', [BookController::class, 'index']);