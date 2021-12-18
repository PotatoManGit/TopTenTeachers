<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

/**
 * Class Control
 * @package App\Http\Controllers\System
 * 用于管理网站，修改状态等等
 */
class Control extends Controller
{
    public function evaluationStatus($val)
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
}
