<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TT_user;
use Illuminate\Support\Facades\Crypt;

/**
 * Class SignIn
 * @package App\Http\Controllers\User
 * 用户登录系统
 */

class SignIn extends Controller
{
    public function SignIn()
    {
        $check_result = "\n\n";
        return view('user/signIn', compact('check_result'));
    }

    public function SignInCheck()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $db = new TT_user();
        $getData = $db->GetUserPassword($username);

        if($getData->password == $password)
        {
            // 加密操作
            $U_uid = Crypt::encryptString($getData->uid);
            $U_password = Crypt::encryptString($getData->password);

            $coTime = time()+config('sjjs_userSystem.cookie_hold_time');
            if($getData->type == 111)
            {
                $coTime = time()+3600;
            }
            setcookie("tokenId", $U_uid, $coTime, '/');
            setcookie("token", $U_password, $coTime, '/');
            return redirect('/user/');
        }
        else
        {
            $check_result = '用户名或密码错误!';
            return view('user/signIn', compact('check_result'));
        }
    }
}
