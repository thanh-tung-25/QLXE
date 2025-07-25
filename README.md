# 🚗 Hệ thống Quản lý Xe Ô tô

Đây là một dự án web đơn giản được xây dựng bằng **Laravel Framework**, phục vụ cho việc **quản lý thông tin các xe ô tô** bao gồm các chức năng cơ bản như:

- Thêm xe mới
- Hiển thị danh sách xe (có phân trang)
- Chỉnh sửa thông tin xe
- Xoá xe
- Upload ảnh xe và hiển thị ảnh

---

## 🛠 Công nghệ sử dụng

- Laravel 10.x
- PHP 8.x
- MySQL/MariaDB
- Bootstrap 5 (Frontend đơn giản)
- Blade Templating
- XAMPP (hoặc Laravel Valet, Homestead...)

---

## 📁 Cấu trúc thư mục chính

QLXE/
├── app/
├── database/
│ └── migrations/
├── public/
│ └── uploads/ # Nơi lưu ảnh xe upload
├── resources/
│ └── views/
│ └── cars/ # Các file giao diện (index, create, edit)
├── routes/
│ └── web.php # Định tuyến web
├── .env # Cấu hình DB, mail, v.v.
├── README.md # Tài liệu này

---

## ⚙️ Cài đặt

1. Clone dự án:
```bash
git clone https://github.com/your-username/QLXE.git
cd QLXE

2. Cài đặt thư viện:
composer install

3. Tạo file .env và cấu hình database:
cp .env.example .env
