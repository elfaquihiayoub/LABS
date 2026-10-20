<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/categories', [CategoryController::class, 'index']);


