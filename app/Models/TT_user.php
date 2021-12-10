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
    public $timestamps = false;

    public function GetUserPassword($username)
    {
        return $this->where('username', $username)->first();
    }
    public function UpdateUserStatus($uid, $newUserStatus)
    {
        return $this->where('uid', $uid)
            ->update(['status' => $newUserStatus]);
    }
    public function UpdateLastSignInTime($uid)
    {
        $time = time();
        return $this->where('uid', $uid)
            ->update(['last_sign_in' => $time]);
    }
    public function UpdateFinishTime($uid)
    {
        $time = time();
        return $this->where('uid', $uid)
            ->update(['finish_time' => $time]);
    }
    public function GetUserStatus($uid)
    {
        return $this->where('uid', $uid)->value('status');
    }
    public function CheckCookie($uid)
    {
        return $this->where('uid', $uid)->value('password');
    }
    public function GetUserType($uid)
    {
        return $this->where('uid', $uid)->value('type');
    }
}
