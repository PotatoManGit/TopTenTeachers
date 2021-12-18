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
    public function SignIn(Request $request)
    {
        $check_result = 0;
        if(empty((int)$request['cause']))
            $cause = null;
        else
            $cause = (int)$request['cause'];
        return view('user/signIn', compact('check_result', 'cause'));
    }

    public function SignInCheck()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $db = new TT_user();
        $getData = $db->GetUserPassword($username);

        if(!empty($getData->password) && $getData->password == $password)
        {
            $db -> UpdateUserStatus($getData->uid, 1);
            $db -> UpdateLastSignInTime($getData->uid);

            // 加密操作
            $U_uid = Crypt::encryptString($getData->uid);
            $U_password = Crypt::encryptString($getData->password);

            $coTime = time()+config('sjjs_userSystem.cookieHoldTime_signIn');
            if($getData->type == config('sjjs_userSystem.admin_user_type'))
            {
                $coTime = time()+3600;
            }
            setcookie("tokenId", $U_uid, $coTime, '/');
            setcookie("token", $U_password, $coTime, '/');
            return redirect('user');
        }
        else
        {
            $check_result = 1;
            return view('user/signIn', compact('check_result'));
        }
    }
}
