<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    // 👉 Hiển thị danh sách xe
    public function index()
    {
        $cars = Car::all();
        return view('cars.index', compact('cars'));
    }

    // 👉 Hiển thị form thêm xe
    public function create()
    {
        return view('cars.create');
    }

    // 👉 Lưu xe mới vào database
    public function store(Request $request)
    {
        // ✅ Kiểm tra dữ liệu hợp lệ
        $request->validate([
            'name' => 'required',
            'brand' => 'required',
            'price' => 'required|integer|min:0',
        ]);

        // ✅ Lưu xe vào database
        Car::create([
            'name' => $request->name,
            'brand' => $request->brand,
            'price' => $request->price,
            'color' => $request->color,
            'year' => $request->year,
            'description' => $request->description,
        ]);

        // ✅ Quay lại danh sách với thông báo
        return redirect()->route('cars.index')->with('success', 'Thêm xe thành công!');
    }
    // Hiển thị form sửa xe
public function edit($id)
{
    $car = Car::findOrFail($id);
    return view('cars.edit', compact('car'));
}

// Lưu thông tin xe đã chỉnh sửa
public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'brand' => 'required',
        'price' => 'required|integer|min:0',
    ]);

    $car = Car::findOrFail($id);
    $car->update([
        'name' => $request->name,
        'brand' => $request->brand,
        'price' => $request->price,
        'color' => $request->color,
        'year' => $request->year,
        'description' => $request->description,
    ]);

    return redirect()->route('cars.index')->with('success', 'Cập nhật xe thành công!');
}

}
