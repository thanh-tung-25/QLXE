<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chỉnh sửa thông tin xe</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            background: linear-gradient(to right, #eef2f3, #8e9eab);
            font-family: 'Segoe UI', sans-serif;
        }
        .card {
            border-radius: 15px;
        }
        .btn-success {
            background-color: #28a745;
        }
        .form-label {
            font-weight: 600;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-header text-white bg-primary text-center rounded-top">
                    <h4>✏️ Cập nhật thông tin xe</h4>
                </div>
                <div class="card-body bg-light">
                    <form action="{{ route('cars.update', $car->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Tên xe</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $car->name }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="brand" class="form-label">Hãng xe</label>
                            <input type="text" class="form-control" id="brand" name="brand" value="{{ $car->brand }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="color" class="form-label">Màu sắc</label>
                            <input type="text" class="form-control" id="color" name="color" value="{{ $car->color }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="year" class="form-label">Năm sản xuất</label>
                            <input type="number" class="form-control" id="year" name="year" value="{{ $car->year }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Giá bán (VNĐ)</label>
                            <input type="number" class="form-control" id="price" name="price" value="{{ $car->price }}" required>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('cars.index') }}" class="btn btn-secondary">⬅️ Trở về</a>
                            <button type="submit" class="btn btn-success">💾 Lưu thay đổi</button>
                        </div>
                        @if ($car->image)
                            <img src="{{ asset('images/' . $car->image) }}" width="150" class="mb-2">
                        @endif

                    </form>
                </div>
                <div class="card-footer text-muted text-end">
                    Hệ thống quản lý xe - Laravel
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
