<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;

// Trang chủ - Hiển thị danh sách xe
Route::get('/', [CarController::class, 'index'])->name('cars.index');

// Hiển thị form thêm xe mới
Route::get('/cars/create', [CarController::class, 'create'])->name('cars.create');

// Lưu dữ liệu xe mới
Route::post('/cars', [CarController::class, 'store'])->name('cars.store');

// Hiển thị form chỉnh sửa xe
Route::get('/cars/{id}/edit', [CarController::class, 'edit'])->name('cars.edit');

// Cập nhật xe đã chỉnh sửa
Route::put('/cars/{id}', [CarController::class, 'update'])->name('cars.update');

// Xóa xe
Route::delete('/cars/{id}', [CarController::class, 'destroy'])->name('cars.destroy');
