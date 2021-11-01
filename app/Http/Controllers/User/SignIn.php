<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Class SignIn
 * @package App\Http\Controllers\User
 * 用户登录系统
 */

class SignIn extends Controller
{
    public function SignIn()
    {
        return view('user/signIn');
    }
}
