<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;

Route::get('/', [CarController::class, 'index']);


Route::get('/', function () {
    return view('welcome');
});

