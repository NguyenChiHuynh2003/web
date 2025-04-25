<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MoHinh extends Model
{
    // Nếu bạn muốn khai báo rõ tên bảng (dù Laravel sẽ tự hiểu)
    protected $table = 'mo_hinhs';

    // Khai báo các field được phép gán
   protected $fillable = ['tenMoHinh', 'path', 'yolo_model_path', 'openai_api_key', 'is_active'];

}
