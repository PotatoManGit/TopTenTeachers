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
        $data = (new TT_user())->GetAllDataToPaging(10);
        $data->fragment('userList');
        if(empty($request['page']))
            $page = 1;
        else
            $page = (int)$request['page'];

        if(!empty($request['export']))
        {
            $req = $request['export'];
            if($req == '1' || $req == '2' || $req == '3')
            {
                $dw = new Export();
                $data = Cache::get('evaluation_user_list');
                if($data == null)
                {
                    echo '<script language="JavaScript">;alert("还没有生成数据，清先生成数据");
                    location.href="/admin/user_regulate/new_evaluation_user?step=2";</script>;';
                    return 0;
                }
                else
                    return $dw->UserListToExcel((int)$req, $data); // 调用导出方法
            }
            else
                return view('admin/userRegulate', compact('adminData', 'data' ,'page'));
        }
        else
            return view('admin/userRegulate', compact('adminData', 'data', 'page'));
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
            Cache::forget('evaluation_user_list');
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

    public function AddUser(Request $request)
    {
        if(!empty($request['do']) && (int)$request['do'] == 1)
            return redirect('admin/user_regulate');
        else
        {
            $db = new TT_user();
            if(!empty($_POST['admin']))
                $type = config('sjjs_userSystem.admin_user_type');
            else
                $type = 0;

            if(empty($_POST['dodo']))
                $re = $db->AddUser($_POST['username'], $_POST['password'], $type, 1);
            elseif(!empty($_POST['admin']) && !empty($_POST['dodo']))
                $re = $db->AddUser($_POST['username'], $_POST['password'], $type, 2);
            else
                $re = $db->AddUser($_POST['username'], $_POST['password'], $type, 2);

            if($re)
                return view('admin/operationFinished', ['result'=>1]);
            else
                return '<script language="JavaScript">;alert("此用户名已存在，请更换");
                location.href="/admin/user_regulate";</script>;';
        }
    }
}
