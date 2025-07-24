<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;

Route::get('/', [CarController::class, 'index']);
Route::resource('cars', CarController::class);
Route::get('/', function () {
    return view('welcome');
});

