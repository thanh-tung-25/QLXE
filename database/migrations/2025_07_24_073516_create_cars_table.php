<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('cars', function (Blueprint $table) {
        $table->id();
        $table->string('name');             // Tên xe
        $table->string('brand');            // Hãng xe
        $table->integer('price');           // Giá bán
        $table->string('color')->nullable(); // Màu sắc (có thể để trống)
        $table->integer('year')->nullable(); // Năm sản xuất (có thể để trống)
        $table->text('description')->nullable(); // Mô tả chi tiết
        $table->timestamps();               // created_at, updated_at
    });
}
};
