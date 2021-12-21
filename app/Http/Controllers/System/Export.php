<?php

namespace App\Http\Controllers\System;

use App\Exports\EvaluationResultExport\EvaluationResultExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
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
}
