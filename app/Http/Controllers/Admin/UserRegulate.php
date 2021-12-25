<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\System\Control;
use App\Http\Controllers\System\Export;
use App\Models\TT_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class UserRegulate extends Controller
{
    public function UserRegulate(Request $request)
    {
        $adminData = (new TT_user)->GetAdmin();
        if(!empty($request['export']))
        {
            $req = $request['export'];
            if($req == '1' || $req == '2' || $req == '3')
            {
                $dw = new Export();
                $data = Cache::get('evaluation_user_list');
                return $dw->UserListToExcel((int)$req, $data); // 调用导出方法
            }
            else
                return view('admin/userRegulate', compact('adminData'));
        }
        else
            return view('admin/userRegulate', compact('adminData'));
    }

    public function NewEvaluationUser(Request $request)
    {
        $make = new Control();
        $list = Array();
        if(!empty($request['do']) && $request['do'] == 1)
        {
            return redirect('admin/user_regulate');
        }
        elseif(empty($request['step']))
        {
            $list = $make->newEvaluationUser((int)$_POST['g1'], (int)$_POST['c1'], (int)$_POST['g2'],
                (int)$_POST['c2'], (int)$_POST['g3'], (int)$_POST['c3']);
            Cache::forever('evaluation_user_list', $list);
            $evaluationStatus = Cache::get('evaluation_status');
            if($evaluationStatus == 'run')
            {
                return '<script language="JavaScript">;alert("此操作会删除用户除管理员数据和所有评教数据。确实要删除吗？");
                    location.href="/admin/user_regulate/new_evaluation_user?step=2";</script>;';
            }
            else
            {
                $make->evaluationStatus('stop');
                return '<script language="JavaScript">;alert("评教进行中执行此操作将会造成评教系统错误，点击确认停止评教");
                    location.href="/admin/user_regulate/new_evaluation_user";</script>;';
            }
        }
        elseif($request['step'] == 2)
        {
            $list = Cache::get('evaluation_user_list');
            if($list != null)
            {
                $make->pushEvaluationUser($list);
                return view('admin/operationFinished', ['result'=>1]);
            }
            else
            {
                return view('admin/operationFinished', ['result'=>0]);
            }
        }
        else
            return view('admin/operationFinished', ['result'=>0]);
    }

    public function AddAdmin(Request $request)
    {
        if(!empty($request['do']) && (int)$request['do'] == 1)
            return redirect('admin/user_regulate');
        else
        {
            $db = new TT_user();
            $db->AddAdmin($_POST['admin_username'], $_POST['admin_password'], config('sjjs_userSystem.admin_user_type'));
            return view('admin/operationFinished', ['result'=>1]);
        }
    }
}
