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
@endsection
