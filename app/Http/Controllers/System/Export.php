<?php

namespace App\Http\Controllers\System;

use App\Exports\EvaluationResultExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class Export extends Controller
{
    /**
     * @param $data
     * @param $need
     * @param $fileName
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     * 格式化并导出为excel
     */
    public function EvaluationResultToExcel($data, $need, $fileName): \Symfony\Component\HttpFoundation\BinaryFileResponse
    {
//        $export = $data;
        $export = new EvaluationResultExport($data);
        return Excel::download($export, $fileName);
    }
}
