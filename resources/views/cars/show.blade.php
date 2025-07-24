@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Chi tiết xe</h1>

    <div class="card mt-3">
        <div class="card-body">
            <h4 class="card-title">{{ $car->name }}</h4>
            <p class="card-text"><strong>Hãng xe:</strong> {{ $car->brand }}</p>
            <p class="card-text"><strong>Giá:</strong> {{ number_format($car->price, 0, ',', '.') }} VNĐ</p>
            <p class="card-text"><strong>Màu sắc:</strong> {{ $car->color }}</p>
            <p class="card-text"><strong>Năm sản xuất:</strong> {{ $car->year }}</p>
            <p class="card-text"><strong>Mô tả:</strong> {{ $car->description }}</p>
        </div>
    </div>

    <a href="{{ route('cars.index') }}" class="btn btn-secondary mt-3">Quay lại danh sách</a>
</div>
@endsection<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chi tiết xe - {{ $car->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f8f9fa;
            font-family: 'Segoe UI', sans-serif;
        }
        .card {
            border: none;
            border-radius: 16px;
        }
        .card h4 {
            font-size: 1.8rem;
            font-weight: bold;
        }
        .list-group-item {
            font-size: 1.1rem;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="text-center mb-4">
        <h2 class="fw-bold text-primary">🚗 Thông tin chi tiết xe</h2>
        <p class="text-muted">Thông tin được cập nhật mới nhất</p>
    </div>

    <div class="card shadow-lg p-4 bg-white">
        <h4 class="text-dark mb-4">{{ $car->name }} <span class="text-muted">({{ $car->brand }})</span></h4>
        <ul class="list-group list-group-flush mb-3">
            <li class="list-group-item"><strong>🎨 Màu sắc:</strong> {{ $car->color }}</li>
            <li class="list-group-item"><strong>📅 Năm sản xuất:</strong> {{ $car->year }}</li>
            <li class="list-group-item"><strong>💰 Giá:</strong> <span class="text-success fw-bold">{{ number_format($car->price, 0, ',', '.') }} VNĐ</span></li>
            <li class="list-group-item"><strong>⏰ Ngày tạo:</strong> {{ $car->created_at->format('d/m/Y H:i') }}</li>
        </ul>
        <div class="text-end">
            <a href="{{ route('cars.index') }}" class="btn btn-outline-primary">
                ⬅️ Quay lại danh sách
            </a>
        </div>
    </div>
</div>
</body>
</html>

