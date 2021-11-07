<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TT_user;

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

    public function SignInCheck()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $db = new TT_user();
        $TruePassword = $db->GetUserPassword($username)->password;
        return $TruePassword;
//        if($TruePassword == $password)
//        {
//            setcookie("statues", "1", time()+60, '/');
//            redirect('/user/');
//        }
    }
}
