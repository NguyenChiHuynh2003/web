<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('setting2', function (Blueprint $table) {
            $table->id();
            $table->string('api_url');
            $table->string('api_key')->nullable();
            $table->boolean('is_active')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('setting2');
    }
};
