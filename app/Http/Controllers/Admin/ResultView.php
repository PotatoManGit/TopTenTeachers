<?php

namespace App\Http\Controllers\Admin;

use App\Exports\EvaluationResultExport\EvaluationResultExport\EvaluationResultExport;
use App\Http\Controllers\Controller;
use App\Http\Controllers\System\DataProcessing;
use App\Http\Controllers\System\Export;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Maatwebsite\Excel\Facades\Excel;


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
            $awardNeed = $_POST['award'];

            if(in_array(-1, $awardNeed))
                return redirect('/admin/result_view');

            foreach($awardNeed as $key => $i)
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

        $need = explode(',', str_replace(' ', '', $request['award'])); // php 7+
        if(!($need === false))
        {
            $num = (int)$request['num'];
            $data = Array();

            $max = 0;

            foreach($need as $key=>$i)
            {
                $data[] = $re->DataFormatting((int)$i, $num);
                $max = $key;
            }

            if(!empty($request['export']) && $request['export'] == 'download')
            {
                if(($max+1) < config('sjjs_awardSetting.awardNum') || ($num != $re->FinishEvaluationNum() && $num > 0))
                    $fileName = '部分评教结果.xlsx';
                else
                    $fileName = '全部评教结果.xlsx';
                return (new Export())->EvaluationResultToExcel($data, ($max + 1), $fileName);
            }

            $type = 1;
            $needStr = $request['award'];
            return view('admin/resultView', compact('data', 'num', 'type', 'need', 'needStr', 'max'));
        }
        else
        {
            return view('admin/operationFinished', ['result' => 0]);
        }
    }

    public function DownloadControl($fileName, $data, $url)
    {
        //创建文件到指定目录
        file_put_contents($fileName,$data);
        //打开文件，如果文件不存在会进行创建
        $fp=fopen($fileName,"r");
        //返回文件大小
        $file_size=filesize($fileName);
        //下载文件需要用到的头
        Header("Content-type: application/octet-stream");
        Header("Accept-Ranges: bytes");
        Header("Accept-Length:".$file_size);
        Header("Content-Disposition: attachment; filename=".str_replace('../public', "", $fileName));
        $buffer=1024; //设置一次读取的字节数，每读取一次，就输出数据（即返回给浏览器）
        $file_count=0; //读取的总字节数
        //向浏览器返回数据
        while(!feof($fp) && $file_count<$file_size){
            //读取打开的文件
            $file_con=fread($fp,$buffer);
            $file_count+=$buffer;
            echo $file_con;
        }
        //关闭打开的文件
        fclose($fp);
        //下载完成后删除文件
        if($file_count >= $file_size)
        {
            unlink($fileName);
        }
        return 0;
    }
}
