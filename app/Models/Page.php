<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    // Tên bảng trong cơ sở dữ liệu
    protected $table = 'pages';

    // Các thuộc tính có thể gán giá trị
    protected $fillable = [
        'site_name',      // Tên trang web
        'logo_path',      // Đường dẫn logo trang web
        'is_active',      // Trạng thái kích hoạt
    ];

    // Lọc trạng thái kích hoạt
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Lọc trạng thái không kích hoạt
    public function scopeInactive($query)
    {
        return $query->where('is_active', false);
    }
}
