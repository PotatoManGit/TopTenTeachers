<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\System\DataProcessing;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class ResultView
 * @package App\Http\Controllers\Admin
 * 管理员数据查询控制器
 */

class ResultView extends Controller
{
    public function ResultView(Request $request)
    {
//        return view('admin/resultView');
        return $this->ViewOne($request);
    }


    public function ViewOne($request)
    {
        $re = new DataProcessing();

        if(!empty($request['award']) && (int)$request['award'] <= config('sjjs_awardSetting.awardNum')
            && (int)$request['award'] > 0 && !empty($request['num']))
        {
            $data = $re->DataFormatting((int)$request['award'], (int)$request['num']);
            //当前页数 默认1
            $page = $request->page ?: 1;
            //每页的条数
            $perPage = 20;
            //计算每页分页的初始位置
            $offset = ($page * $perPage) - $perPage;
            //实例化LengthAwarePaginator类，并传入对应的参数
            $data = new LengthAwarePaginator(array_slice($data, $offset, $perPage, true), count($data), $perPage,
                $page, ['path' => $request->url(), 'query' => $request->query()]);
            return view('admin/resultView', compact('data'));
        }
        else
            return view('admin/operationFinished', ['result' => 0]);
    }
}
