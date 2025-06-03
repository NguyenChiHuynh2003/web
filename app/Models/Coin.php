<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coin extends Model
{
    use HasFactory;

    protected $table = 'coin';           // Tên bảng

    protected $primaryKey = 'IDXU';      // Khóa chính

    public $incrementing = false;        // IDXU không tự động tăng

    public $timestamps = false;          // <== QUAN TRỌNG: nếu không có cột created_at, updated_at

    protected $fillable = [
        'TENXU',
        'IDQG',
    ];
}
