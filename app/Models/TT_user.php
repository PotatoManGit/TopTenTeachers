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

    /**
     * @param $username
     * @return mixed
     */
    public function GetUserPassword($username)
    {
        return $this->where('username', $username)->first();
    }

    /**
     * @param $uid
     * @param $newUserStatus
     * @return mixed
     */
    public function UpdateUserStatus($uid, $newUserStatus)
    {
        return $this->where('uid', $uid)
            ->update(['status' => $newUserStatus]);
    }

    /**
     * @param $uid
     * @return mixed
     */
    public function UpdateLastSignInTime($uid)
    {
        $time = time();
        return $this->where('uid', $uid)
            ->update(['last_sign_in' => $time]);
    }

    /**
     * @param $uid
     * @return mixed
     */
    public function UpdateFinishTime($uid)
    {
        $time = time();
        return $this->where('uid', $uid)
            ->update(['finish_time' => $time]);
    }

    /**
     * @param $uid
     * @return mixed
     */
    public function GetUserStatus($uid)
    {
        return $this->where('uid', $uid)->value('status');
    }

    /**
     * @param $uid
     * @return mixed
     */
    public function CheckCookie($uid)
    {
        return $this->where('uid', $uid)->value('password');
    }

    /**
     * @param $uid
     * @return mixed
     */
    public function GetUserType($uid)
    {
        return $this->where('uid', $uid)->value('type');
    }

    /**
     *
     */
    public function DelAllUserWithoutAdmin()
    {
        $admin = $this->where('type', 777)->get();
        $this->truncate();
        foreach($admin as $ad)
        {
            $this->insert(['username'=>$ad->username,
                'password'=>$ad->password,
                'type'=>777,
                'last_sign_in'=>$ad->last_sign_in]);
        }
    }

    /**
     * @param $UserList
     */
    public function PushNewUserList($UserList)
    {
        foreach($UserList as $user)
        {
            $this->insert(['username'=>$user['username'],
                'password'=>$user['password']]);
        }
    }
}
