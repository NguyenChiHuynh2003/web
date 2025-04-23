<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_xx_xx_create_models_table.php
public function up()
{
    Schema::create('models', function (Blueprint $table) {
        $table->id();
        $table->string('name');  // Tên mô hình (ví dụ: CNN, YOLO)
        $table->string('path');  // Đường dẫn đến mô hình
        $table->boolean('is_active')->default(false);  // Trạng thái mô hình (đang sử dụng hay không)
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('models');
    }
};
