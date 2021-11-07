<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TT_result
 * @package App\Models
 * 结果数据模型
 */

class TT_result extends Model
{
    use HasFactory;

    protected $table = "TT_result";
    public $timestamps = false;
}
