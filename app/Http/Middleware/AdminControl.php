<?php

namespace App\Http\Middleware;

use App\Models\TT_user;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class AdminControl
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
        // 获取cookie 验证存在性
        if(empty($_COOKIE['tokenId']) || empty($_COOKIE['token']))
        {
            echo "13";
            // 错误输出 未完成
            return redirect('/user/sign_in?cause=0');
        }
        else
        {
            // 解密
            $uid = Crypt::decryptString($_COOKIE['tokenId']);
            $password = Crypt::decryptString($_COOKIE['token']);
        }

        $db = new TT_user();

        $truePassword = $db->CheckCookie($uid);

        $dbd = $db->GetUserType($uid);

        if($truePassword == $password && ($dbd == null || $dbd == config('sjjs_userSystem.admin_user_type')))
        {
            return $next($request);
        }
        else
        {
            return redirect('/user/sign_in?cause=2');
        }
    }
}
