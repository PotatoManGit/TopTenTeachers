<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

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
        if (empty($_COOKIE['statues']))
        {
            return redirect('/user/sign_in');
        }
        else if ($_COOKIE['statues'] == '1')
        {
            return $next($request); // 进入
        }
        else
        {
            return redirect('/user/sign_in');
        }
    }
}
