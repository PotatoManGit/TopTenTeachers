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

    /**
     * @return mixed
     */
    public function GetAll()
    {
        return $this->get();
    }

    /**
     * @param $tid
     * @return mixed
     */
    public function GetNameByTid($tid)
    {
        return $this->where('tid', $tid)->value('name');
    }
}
