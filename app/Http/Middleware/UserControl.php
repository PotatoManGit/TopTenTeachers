<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\TT_user;
use Illuminate\Support\Facades\Crypt;

/**
 * Class UserControl
 * @package App\Http\Middleware
 * 中间键，用于确保用户有效登录
 */

class UserControl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
//        if (empty($_COOKIE['tokenId']))
//        {
//            return redirect('/user/sign_in');
//        }
//        else if ($_COOKIE['statues'] == '1')
//        {
//            return $next($request); // 进入
//        }
//        else
//        {
//            return redirect('/user/sign_in');
//        }
        // 获取cookie 验证存在性
        if(empty($_COOKIE['tokenId']) || empty($_COOKIE['token']))
        {
            echo "13";
            // 错误输出 未完成
            return redirect('/user/sign_in');
        }
        else
        {
            // 解密
            $uid = Crypt::decryptString($_COOKIE['tokenId']);
            $password = Crypt::decryptString($_COOKIE['token']);
        }

        $db = new TT_user();

        $truePassword = $db->CheckCookie($uid);

        if($truePassword == $password)
        {
            return $next($request);
        }
        else
        {
            redirect('/user/sign_in');
        }
    }
}
