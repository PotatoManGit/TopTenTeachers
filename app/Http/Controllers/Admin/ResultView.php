<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\System\DataProcessing;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;
use PhpParser\Node\Expr\Array_;

/**
 * Class ResultView
 * @package App\Http\Controllers\Admin
 * 管理员数据查询控制器
 */

class ResultView extends Controller
{
    public function ResultView(Request $request)
    {
        if(empty($request['award']) || empty($request['num']))
        {
            $strIn = '';
            for($i =1; $i <= config('sjjs_awardSetting.awardNum'); $i++)
            {
                if($i == 1)
                    $strIn = $i;
                else
                    $strIn = $strIn.','.$i;
            }
            return redirect('/admin/result_view?award='.$strIn.'&num=-1');
        }
        return $this->Show($request);
    }

    public function Check()
    {
        if(empty($_POST['award']))
        {
            return view('admin/resultView', ['type' => 2]);
        }
        else
        {
            $strIn = '';
            foreach($_POST['award'] as $key => $i)
            {
                if($key == 0)
                    $strIn = $i;
                else
                    $strIn = $strIn.','.$i;
            }
            if(!empty($_POST['num']))
                return redirect('/admin/result_view?award='.$strIn.'&num='.$_POST['num']);

            else
                return redirect('/admin/result_view?award='.$strIn.'&num=-1');
        }
    }

    public function Show($request)
    {
        $re = new DataProcessing();

        if((int)$request['award'] <= config('sjjs_awardSetting.awardNum') && (int)$request['award'] > 0)
        {
            $num = (int)$request['num'];
            $data = Array();
            $need = explode(',', str_replace(' ', '', $request['award']));
            foreach($need as $i)
            {
                $data[] = $re->DataFormatting((int)$i, $num);
            }
            $type = 1;
            return view('admin/resultView', compact('data', 'num', 'type'));
        }
        else
        {
            return view('admin/operationFinished', ['result' => 0]);
        }
    }
}
