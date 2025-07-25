<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>🚗 Quản lý danh sách xe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f8f9fa;
        }
        .card-table {
            border-radius: 12px;
            overflow: hidden;
        }
        .table-hover tbody tr:hover {
            background-color: #f1f3f5;
        }
        .btn-sm {
            padding: 4px 10px;
            font-size: 0.85rem;
        }
    </style>
</head>
<body>
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary mb-0">📋 Danh sách xe</h2>
        <a href="{{ route('cars.create') }}" class="btn btn-success shadow-sm">+ Thêm xe mới</a>
    </div>

    {{-- THÔNG BÁO THÀNH CÔNG --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            ✅ {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Đóng"></button>
        </div>
    @endif

    {{-- KIỂM TRA DỮ LIỆU --}}
    @if($cars->isEmpty())
        <div class="alert alert-warning">⚠️ Hiện chưa có xe nào được thêm vào.</div>
    @else

    {{-- FORM TÌM KIẾM (GIẢ LẬP, CẦN BACKEND XỬ LÝ) --}}
    <form class="mb-3">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="🔍 Tìm kiếm tên xe..." disabled>
            <button class="btn btn-outline-secondary" type="button" disabled>Tìm</button>
        </div>
    </form>
    <!-- 🔍 FORM LỌC XE -->
<form method="GET" class="row g-3 mb-4">
    <div class="col-md-2">
        <input type="text" name="name" class="form-control" placeholder="Tên xe" value="{{ request('name') }}">
    </div>
    <div class="col-md-2">
        <input type="text" name="brand" class="form-control" placeholder="Hãng" value="{{ request('brand') }}">
    </div>
    <div class="col-md-2">
        <input type="number" name="year" class="form-control" placeholder="Năm" value="{{ request('year') }}">
    </div>
    <div class="col-md-2">
        <input type="number" name="price_min" class="form-control" placeholder="Giá từ" value="{{ request('price_min') }}">
    </div>
    <div class="col-md-2">
        <input type="number" name="price_max" class="form-control" placeholder="Giá đến" value="{{ request('price_max') }}">
    </div>
    <div class="col-md-2">
        <button type="submit" class="btn btn-secondary w-100">Lọc</button>
    </div>
</form>
<a href="{{ route('cars.index') }}" class="btn btn-outline-dark btn-sm">Xóa lọc</a>

    {{-- BẢNG XE --}}
    <div class="card shadow-sm card-table">
        <table class="table table-bordered table-hover mb-0 bg-white">
            <thead class="table-dark">
                <tr class="text-center">
                    <th>ID</th>
                    <th>Tên xe</th>
                    <th>Hãng</th>
                    <th>Năm</th>
                    <th>Giá (VNĐ)</th>
                    <th>Ảnh</th>
                    <th width="20%">Thao tác</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($cars as $car)
                <tr>
                    <td class="text-center">{{ $car->id }}</td>
                    <td>{{ $car->name }}</td>
                    <td>{{ $car->brand }}</td>
                    <td class="text-center">{{ $car->year }}</td>
                    <td>{{ number_format($car->price, 0, ',', '.') }}</td>
                    <td class="text-center">
                        <a href="{{ route('cars.show', $car->id) }}" class="btn btn-sm btn-outline-primary">Xem</a>
                        <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-sm btn-outline-warning">Sửa</a>
                        <form action="{{ route('cars.destroy', $car->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Bạn có chắc muốn xóa xe này?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger">Xóa</button>
                        </form>
                        @if ($car->image)
                            <img src="{{ asset('images/' . $car->image) }}" width="80">
                        @else
                            (Không có ảnh)
                        @endif
                    </td>
                    <td>
                        @if ($car->image)
                            <img src="{{ asset('images/' . $car->image) }}" width="80">
                        @else
                            (Không có ảnh)
                        @endif
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    {{-- PHÂN TRANG --}}
    <div class="mt-4 d-flex justify-content-center">
        {{ $cars->links() }}
    </div>
    

    @endif
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
