<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách xe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-primary">🚗 Danh sách xe</h2>
            <a href="{{ route('cars.create') }}" class="btn btn-success">+ Thêm xe mới</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($cars->isEmpty())
            <div class="alert alert-warning">
                Chưa có xe nào trong hệ thống.
            </div>
        @else
        <div class="table-responsive">
            <table class="table table-bordered table-hover bg-white shadow-sm rounded">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Tên xe</th>
                        <th>Hãng</th>
                        <th>Năm</th>
                        <th>Giá (VND)</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cars as $car)
                        <tr>
                            <td>{{ $car->id }}</td>
                            <td>{{ $car->name }}</td>
                            <td>{{ $car->brand }}</td>
                            <td>{{ $car->year }}</td>
                            <td>{{ number_format($car->price, 0, ',', '.') }}</td>
                            <td>
                                <a href="{{ route('cars.show', $car->id) }}" class="btn btn-sm btn-primary">Xem</a>
                                <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-sm btn-warning">Sửa</a>
                                <form action="{{ route('cars.destroy', $car->id) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Bạn có chắc muốn xóa xe này?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
</body>
</html>
