<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Models\TT_result;
use App\Models\TT_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

/**
 * Class Control
 * @package App\Http\Controllers\System
 * 用于管理网站，修改状态等等
 */
class Control extends Controller
{
    /**
     * @param $val
     * @return bool
     */
    public function evaluationStatus($val): bool
    {
        if($val == 'run')
        {
            Cache::forget('evaluation_status');
            Cache::forever('evaluation_status', 1);
            Cache::forever('evaluation_start_at', time());
            return 1;
        }
        elseif($val == 'stop')
        {
            Cache::forget('evaluation_status');
            Cache::forever('evaluation_status', 0);
            Cache::forget('evaluation_start_at');
            return 1;
        }
        else
        {
            return 0;
        }
    }

    /**
     * @param $g1
     * @param $c1
     * @param $g2
     * @param $c2
     * @param $g3
     * @param $c3
     * @return array[]
     * 生成新用户名密码
     */
    public function newEvaluationUser($g1, $c1, $g2, $c2, $g3, $c3): array
    {
        $re = Array(['username'=>null, 'password'=>null]);

        for($i = 1; $i <= $g1; $i++)
        {
            for($j = 1; $j <= $c1; $j++)
            {
                $us = 'u' . (100000 + $i*100 + $j);
                $str = md5(uniqid());
                $key = substr($str,-6);
                $ps = 'p' . $key;
                $re[] = ['username'=>$us, 'password'=>$ps];
            }
        }
        for($i = 1; $i <= $g2; $i++)
        {
            for($j = 1; $j <= $c2; $j++)
            {
                $us = 'u' . (100000 + $i*100 + $j);
                $str = md5(uniqid());
                $key = substr($str,-6);
                $ps = 'p' . $key;
                $re[] = ['username'=>$us, 'password'=>$ps];
            }
        }
        for($i = 1; $i <= $g3; $i++)
        {
            for($j = 1; $j <= $c3; $j++)
            {
                $us = 'u' . (100000 + $i*100 + $j);
                $str = md5(uniqid());
                $key = substr($str,-6);
                $ps = 'p' . $key;
                $re[] = ['username'=>$us, 'password'=>$ps];
            }
        }
        unset($re[0]);
        return $re;
    }

    public function pushEvaluationUser($evaluationUser)
    {
        $db = new TT_user();
        $db->DelAllUserWithoutAdmin();
        $db->PushNewUserList($evaluationUser);
        $db = new TT_result();
        $db->DelAll();
    }
}
