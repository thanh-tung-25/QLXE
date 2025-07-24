<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm xe mới</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #f8f9fa, #e9ecef);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .form-wrapper {
            background: white;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.1);
            padding: 30px;
        }
        .form-label {
            font-weight: 600;
        }
        .btn-primary, .btn-secondary {
            min-width: 130px;
        }
        .btn-primary:hover {
            background-color: #0d6efd;
            opacity: 0.9;
        }
        .page-title {
            font-weight: bold;
            color: #343a40;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4 text-center page-title">🆕 Thêm Xe Mới</h2>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('cars.store') }}" method="POST" class="form-wrapper">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">🚘 Tên xe</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="VD: Vios" required>
                </div>

                <div class="mb-3">
                    <label for="brand" class="form-label">🏢 Hãng xe</label>
                    <input type="text" class="form-control" id="brand" name="brand" placeholder="VD: Toyota" required>
                </div>

                <div class="mb-3">
                    <label for="color" class="form-label">🎨 Màu xe</label>
                    <input type="text" class="form-control" id="color" name="color" placeholder="VD: Đỏ, Trắng" required>
                </div>

                <div class="mb-3">
                    <label for="year" class="form-label">📆 Năm sản xuất</label>
                    <input type="number" class="form-control" id="year" name="year" placeholder="VD: 2022" required>
                </div>

                <div class="mb-4">
                    <label for="price" class="form-label">💰 Giá (VNĐ)</label>
                    <input type="number" class="form-control" id="price" name="price" placeholder="VD: 680000000" required>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('cars.index') }}" class="btn btn-secondary">⬅️ Quay lại</a>
                    <button type="submit" class="btn btn-primary">💾 Lưu xe</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
