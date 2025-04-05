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

    protected static function booted()
{
    static::creating(function ($post) {
        if (empty($post->slug)) {
            $post->slug = \Str::slug($post->title);
        }
    });

    static::updating(function ($post) {
        if (empty($post->slug)) {
            $post->slug = \Str::slug($post->title);
        }
    });
}

}
