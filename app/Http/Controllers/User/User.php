<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\User\UserEvaluation;

/**
 * Class User
 * @package App\Http\Controllers\User
 * 用户操作系统
 */

class User extends Controller
{
    public function User()
    {
//        return view('user/userEvaluation');
        // 暂时使用这个函数
        $ev = new UserEvaluation();
        return $ev->UserEvaluation();
    }
}
