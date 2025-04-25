<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('mo_hinhs', function (Blueprint $table) {
    $table->string('yolo_model_path')->nullable()->after('path');
    $table->text('openai_api_key')->nullable()->after('yolo_model_path');
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mo_hinhs', function (Blueprint $table) {
    $table->string('yolo_model_path')->nullable()->after('path');
    $table->text('openai_api_key')->nullable()->after('yolo_model_path');
});

    }
};
