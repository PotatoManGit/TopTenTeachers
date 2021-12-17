<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\TT_user;
use Illuminate\Http\Request;
use App\Http\Controllers\User\UserEvaluation;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;

/**
 * Class User
 * @package App\Http\Controllers\User
 * 用户操作系统
 */

class User extends Controller
{
    public function User(Request $request)
    {
        $db = new TT_user();
        $uid = Crypt::decryptString($_COOKIE['tokenId']);
        $status = $db->GetUserStatus($uid);
        $webStatus = Cache::get('evaluation_status');

        if($db->GetUserType($uid) == config('sjjs_userSystem.admin_user_type'))
        {
            $status = 1;
        }
        if(!empty($request['status']) && $request['status'] == 'webStopped')
        {
            $webStatus = 0;
        }

        return view('user/user', compact('status', 'webStatus'));
    }
}
