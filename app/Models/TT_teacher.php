<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TT_teacher
 * @package App\Models
 * 教师信息模型
 */

class TT_teacher extends Model
{
    use HasFactory;

    protected $table = "TT_teacher";
    public $timestamps = false;
    protected $primaryKey = 'tid';

    public function GetAll()
    {
        return $this->get();
    }

    public function GetByTid($tid)
    {
        return $this->where('tid', $tid)->value('name');
    }
}