<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TT_user
 * @package App\Models
 * 用户信息模型
 */

class TT_user extends Model
{
    use HasFactory;

    protected $table = "TT_user";
    public $timestamps = false;

    public function GetUserPassword($username)
    {
        $data = $this->select('SELECT * FROM `TT_user` WHERE `username` = ?', [$username]);
        return $data;
    }
}
