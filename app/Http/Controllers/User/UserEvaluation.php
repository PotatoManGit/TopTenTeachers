<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\TT_teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class UserEvaluation extends Controller
{
    public function UserEvaluation(Request $request)
    {
        if(empty($request['award']))
        {
            return $this->makeWeb(1, 0);
        }
//        elseif(!empty($_POST['choice']) && (int)$request['award'] == 1 + config('sjjs_awardSetting.awardNum'))
//        {
//            return redirect('/user/evaluation/check/?status=1');
//        }
        elseif(!empty($_COOKIE['award'.$request['award']]))
        {
            return $this->makeWeb((int)$request['award'], 2);
        }
        else
        {
            if(empty($_POST['choice']))
            {
                return $this->makeWeb((int)$request['award'] - 1, 1);
            }
            else
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

        if(!empty($_COOKIE['award'.$awardId]) && $status == 2)
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
        if(empty($request['status']) || $request['status'] != '1')
        {
            return redirect('/user');
        }
        elseif($request['status'] == '1' || $request['status'] == '2')
        {
            $awardData = array();
            $awardNum = config('sjjs_awardSetting.awardNum');

            $db = new TT_teacher();

            for($i = 1; $i <= $awardNum; $i++)
            {
                if(!empty($_COOKIE['award'.$i]))
                {
                    $tid = (int)Crypt::decryptString($_COOKIE['award'.$i]);
                    $awardData[] = $db->GetNameByTid($tid);
                }
                else
                    $awardData[] = null;
            }

            if($request['status'] == '1')
            {
                return view('user/checkEvaluationResult', compact('awardData', 'awardNum'));
            }
            else
            {
                return 'update';
            }
        }
        else
        {
            return redirect('user/');
        }
    }
}
