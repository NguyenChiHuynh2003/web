<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsActiveToMoHinhsTable extends Migration
{
    public function up(): void
    {
        Schema::table('mo_hinhs', function (Blueprint $table) {
            $table->boolean('is_active')->default(0); // Mặc định là không kích hoạt
        });
    }

    public function down(): void
    {
        Schema::table('mo_hinhs', function (Blueprint $table) {
            $table->dropColumn('is_active');
        });
    }
}
