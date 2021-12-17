<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\System\Control;
use Illuminate\Http\Request;

/**
 * Class AdminControl
 * @package App\Http\Controllers\admin
 * 管理员控制系统，url命令
 */
class AdminControl extends Controller
{
    public function AdminControl(Request $request)
    {
        $func = new Control();
        if(empty($request['cmd']))
        {
            $result = 0;
        }

        elseif($request['cmd'] == 'evaluationStatus' && !empty($request['val-1']))
        {
            $result = $func->evaluationStatus($request['val-1']);
        }

        else
            $result = 0;

        return view('admin/operationFinished', compact('result'));
    }
}
