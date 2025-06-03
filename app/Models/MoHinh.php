<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MoHinh extends Model
{
    protected $table = 'mo_hinhs';

    protected $fillable = [
        'tenMoHinh',
        'path',
        'yolo_path',
        'openai_api_key',
        'is_active',
    ];
}
