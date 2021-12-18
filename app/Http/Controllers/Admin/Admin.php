<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\System\DataProcessing;
use Illuminate\Support\Facades\Cache;

/**
 * Class Admin
 * @package App\Http\Controllers\Admin
 * 管理员管理系统主控制器
 */

class Admin extends Controller
{
    public function Admin()
    {
        $makeData = new DataProcessing();
        $allFinishNum = $makeData->FinishEvaluationNum();
        $result = $makeData->Result(1, 3);
        $evaluationStatus = Cache::get('evaluation_status');
        $cle = time() - Cache::get('evaluation_start_at', 9999999999999999);

        // 时间差计算
        $d = floor($cle/3600/24);
        $h = floor(($cle%(3600*24))/3600);
        $m = floor(($cle%(3600*24))%3600/60);
//        $s = floor(($cle%(3600*24))%60);

        $evaluationContinueTime = " $d 天 $h 小时 $m 分";

        return view('admin/admin', compact('allFinishNum', 'evaluationStatus',
            'evaluationContinueTime'));
//        print("<pre>"); // 格式化输出数组
//        print_r($result);
//        print("</pre>");
//        return $result;
    }
}
