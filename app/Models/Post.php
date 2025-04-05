<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Thêm các trường vào $fillable để cho phép gán giá trị
    protected $fillable = [
        'title',
        'content',
    ];
}
