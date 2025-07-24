@extends('layouts.app')

@section('content')
<h2>Sửa thông tin xe</h2>

@if ($errors->any())
    <div style="color: red">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('cars.update', $car->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Tên xe:</label>
    <input type="text" name="name" value="{{ $car->name }}"><br>

    <label>Hãng xe:</label>
    <input type="text" name="brand" value="{{ $car->brand }}"><br>

    <label>Giá:</label>
    <input type="number" name="price" value="{{ $car->price }}"><br>

    <label>Màu:</label>
    <input type="text" name="color" value="{{ $car->color }}"><br>

    <label>Năm sản xuất:</label>
    <input type="number" name="year" value="{{ $car->year }}"><br>

    <label>Mô tả:</label>
    <textarea name="description">{{ $car->description }}</textarea><br>

    <button type="submit">Cập nhật</button>
</form>
@endsection
