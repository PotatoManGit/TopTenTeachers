<?php

namespace App\Http\Controllers\System;

use App\Exports\EvaluationResultExport\EvaluationResultExport;
use App\Exports\UserListToExcel\UserListToExcel;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class Export extends Controller
{
    /**
     * @param $data
     * @param $max
     * @param $fileName
     * @return BinaryFileResponse
     * 格式化并导出为excel
     */
    public function EvaluationResultToExcel($data, $max, $fileName): BinaryFileResponse
    {
        $re = Array();

        foreach($data as $key=>$val)
        {
            array_unshift($val, ['排名','姓名','得票数']);
            $re[] = $val;
        }

        $export = new EvaluationResultExport($re, $max);
        return Excel::download($export, $fileName);
    }

    /**
     * @param $grade
     * @param $data
     * @return Application|Factory|View|BinaryFileResponse
     */
    public function UserListToExcel($grade, $data)
    {
        if($grade == 1)
            $fileName = '高一.xlsx';
        elseif($grade == 2)
            $fileName = '高二.xlsx';
        elseif($grade == 3)
            $fileName = '高三.xlsx';
        else
            return view('admin/operationFinished', ['result'=>0]);

        $re = Array(Array());
        foreach($data as $key=>$val)
        {
            $tmp = (int)str_replace('u', '', $val[0]);
            if($tmp > ($grade * 100000) && $tmp < ($grade * 100000 + 100000))
            {
                $tmp -= $grade * 100000;
                $tmp = intval($tmp/100);
                $re[$tmp-1][] = $val;
            }
        }
//        $re = Array([1,2],[2,3],[4,5]);
        $export = new UserListToExcel($re);
        return Excel::download($export, $fileName);
    }
}
