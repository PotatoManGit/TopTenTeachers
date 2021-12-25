<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\TT_result;
use App\Models\TT_teacher;
use App\Models\TT_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

/**
 * Class UserEvaluation
 * @package App\Http\Controllers\User
 * 用户评教控制器，懂的都懂
 */

class UserEvaluation extends Controller
{

    public function UserEvaluation(Request $request)
    {
        if(empty($request['award'])) //点击入口访问后初始化
        {
            return redirect('user/evaluation?award=1&status=op');
        }
//        elseif(!empty($_POST['choice']) && (int)$request['award'] == 1 + config('sjjs_awardSetting.awardNum'))
//        {
//            return redirect('/user/evaluation/check/?status=1');
//        }
        elseif(!empty($request['status']) && $request['status'] == 're_check') //核实页面提交
        {
            $coTime = time()+config('sjjs_userSystem.cookieHoldTime_saveChoice');
            setcookie('award'.($request['award']), Crypt::encryptString($_POST['choice']), $coTime, '/');
            if(!empty($_POST['choice']) && (int)$request['award'] == 1 + config('sjjs_awardSetting.awardNum'))
            {
                return redirect('/user/evaluation/check/?status=1');
            }
            return redirect('user/evaluation/check?status=1');
        }
        elseif(!empty($request['status']) && $request['status'] == 're') //定位到特定奖项
        {
            if(!empty($_COOKIE['award'.$request['award']]))
            {
                return $this->makeWeb((int)$request['award'], -2);
            }
            else
            {
                return $this->makeWeb((int)$request['award'], -1);
            }
        }
        elseif(!empty($request['status']) && $request['status'] == 'op') //检测到入口，判断是否评价
        {
            if(!empty($_COOKIE['award'.$request['award']]))
                return $this->makeWeb((int)$request['award'], 2);
            else
                return $this->makeWeb((int)$request['award'], 0);
        }
        elseif(!empty($_COOKIE['award'.$request['award']])) //判断是否评价
        {
            return $this->makeWeb((int)$request['award'], 2);
        }
        else
        {
            if(empty($_POST['choice']))
            {
                return $this->makeWeb((int)$request['award'] - 1, 1);
            }
            else //每次评选完提交
            {
                $coTime = time()+config('sjjs_userSystem.cookieHoldTime_saveChoice');
                setcookie('award'.($request['award'] - 1), Crypt::encryptString($_POST['choice']), $coTime, '/');
                if(!empty($_POST['choice']) && (int)$request['award'] == 1 + config('sjjs_awardSetting.awardNum'))
                {
                    return redirect('/user/evaluation/check/?status=1');
                }
                return $this->makeWeb((int)$request['award'], 0);
            }
        }
    }

    public function makeWeb($awardId, $status)
    {
        $db = new TT_teacher();

        if(!empty($_COOKIE['award'.$awardId]) && ($status == 2 || $status == -2)) //获取tid，如果已评价返回，未评级警告
        {
            $tid = (int)Crypt::decryptString($_COOKIE['award' . $awardId]);
            $teacherChose = $db->GetNameByTid($tid);
        }
        else
        {
            $tid = 0;
            $teacherChose = '0';
        }

        $awardName = config('sjjs_awardSetting.award'.$awardId);
        $data = $db->GetAll();
//        return $data[1]->type;
        return view('user/userEvaluation', compact('data',
            'awardId', 'awardName', 'status', 'teacherChose', 'tid'));
    }

    public function CheckEvaluationResult(Request $request)
    {
        $uid = Crypt::decryptString($_COOKIE['tokenId']);
        if(empty($request['status']))
        {
            return redirect('/user');
        }
        elseif($request['status'] == '1' || $request['status'] == '2')
        {
            $awardData = array();
            $awardTidData = array();
            $awardNum = config('sjjs_awardSetting.awardNum');
            $emp = 0;

            $db = new TT_teacher();

            for($i = 1; $i <= $awardNum; $i++)
            {
                if(!empty($_COOKIE['award'.$i]))
                {
                    $tid = (int)Crypt::decryptString($_COOKIE['award'.$i]);
                    $awardTidData[] = $tid;
                    $awardData[] = $db->GetNameByTid($tid);
                }
                else
                {
                    $awardTidData[] = null;
                    $awardData[] = null;
                    $emp++;
                }
            }

            if($request['status'] == '1' && $emp <= 0)
            {
                return view('user/checkEvaluationResult', compact('awardData', 'awardNum', 'emp'));
            }
            elseif($request['status'] == '2' && $emp <= 0)
            {
                $db = new TT_result();
                $result = $db->UpdateOneByUidTid($uid ,$awardTidData);
                for($i = 1; $i <= $awardNum; $i++)
                {
                    if(!empty($_COOKIE['award'.$i]))
                    {
                        setcookie('award'.$i, $_COOKIE['award'.$i], time()-1, '/');
                    }
                }
                $dbU = new TT_user();
                $dbU -> UpdateUserStatus($uid, 2);
                $dbU -> UpdateFinishTime($uid);
                return view('user/finishEvaluation', compact('result'));
            }
            else
            {
                return redirect('user/evaluation/check?status=1');
            }
        }
        else
        {
            return redirect('user/');
        }
    }
}
