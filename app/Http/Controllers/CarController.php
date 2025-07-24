<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    // Hiển thị danh sách xe (có phân trang)
    public function index()
    {
        $cars = Car::latest()->paginate(5); // phân trang 5 xe mỗi trang
        return view('cars.index', compact('cars'));
    }

    // Hiển thị form thêm xe
    public function create()
    {
        return view('cars.create');
    }

    // Lưu xe mới
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|max:255',
            'brand' => 'required',
            'color' => 'required',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|max:1000',
        ]);

        Car::create($request->all());

        return redirect()->route('cars.index')->with('success', 'Thêm xe thành công!');
    }

    // Hiển thị 1 xe cụ thể (không bắt buộc nếu không dùng)
    public function show(Car $car)
    {
        return view('cars.show', compact('car'));
    }

    // Hiển thị form sửa
    public function edit(Car $car)
    {
        return view('cars.edit', compact('car'));
    }

    // Cập nhật xe
    public function update(Request $request, Car $car)
    {
        $request->validate([
            'name' => 'required|max:255',
            'brand' => 'required',
            'color' => 'required',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|max:1000',
        ]);

        $car->update($request->all());

        return redirect()->route('cars.index')->with('success', 'Cập nhật xe thành công!');
    }

    // Xóa xe
    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('cars.index')->with('success', 'Xóa xe thành công!');
    }
}
