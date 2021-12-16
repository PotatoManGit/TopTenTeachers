<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\System\DataProcessing;

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
//        return view('admin/admin', compact('allFinishNum', 'result'));
        print("<pre>"); // 格式化输出数组
        print_r($result);
        print("</pre>");
        return $result;
    }
}
