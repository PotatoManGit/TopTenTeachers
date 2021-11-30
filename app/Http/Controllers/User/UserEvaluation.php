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
        elseif((int)$request['award'] == config('sjjs_awardSetting.awardNum'))
        {
            return 'ok';
        }
        elseif(!empty($request['status']) && $request['status'] == 'back')
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
            $teacherChose = $db->GetByTid($tid);
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

}
