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
    protected $primaryKey = 'uid';
    const UPDATED_AT = 'last_sign_in';

    public function GetUserPassword($username)
    {
        return $this->where('username', $username)->first();
    }

    public function CheckCookie($uid)
    {
        return $this->where('uid', $uid)->value('password');
    }
}
