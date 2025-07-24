<!-- resources/views/cars/create.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Thêm Xe Mới</title>
</head>
<body>
    <h1>Thêm Xe Mới</h1>

    <!-- Hiển thị lỗi nếu có -->
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form gửi dữ liệu đến route cars.store -->
    <form action="{{ route('cars.store') }}" method="POST">
        @csrf <!-- Token bảo mật Laravel bắt buộc -->

        <label>Tên xe:</label><br>
        <input type="text" name="name"><br>

        <label>Hãng xe:</label><br>
        <input type="text" name="brand"><br>

        <label>Giá bán:</label><br>
        <input type="number" name="price"><br>

        <label>Màu sắc:</label><br>
        <input type="text" name="color"><br>

        <label>Năm sản xuất:</label><br>
        <input type="number" name="year"><br>

        <label>Mô tả:</label><br>
        <textarea name="description"></textarea><br>

        <button type="submit">Lưu xe</button>
    </form>
</body>
</html>
