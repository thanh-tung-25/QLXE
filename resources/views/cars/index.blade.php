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
