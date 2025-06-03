<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Qg extends Model
{
    protected $table = 'qg';              // Tên bảng

    protected $primaryKey = 'IDQG';       // Khóa chính

    public $incrementing = false;         // Không tự động tăng

    public $timestamps = false;           // Không có created_at, updated_at

    protected $fillable = [
        'TENQG',
    ];
}
