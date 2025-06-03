<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting2 extends Model
{
    use HasFactory;

    protected $table = 'setting2'; // Tên bảng

    protected $fillable = [
        'api_url',
        'api_key',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
