<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Models\TT_result;
use App\Models\TT_teacher;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Array_;

/**
 * Class DataProcessing
 * @package App\Http\Controllers\System
 * 工具函数实现
 */
class DataProcessing extends Controller
{
    /**
     * @return int
     * 获取评教人数
     */
    public function FinishEvaluationNum(): int
    {
        $db = new TT_result();
        $allData = $db->GetAllData();
        $cou = 0;
        foreach($allData as $i)
        {
            if($i->status == 1)
                $cou++;
        }
        return $cou;
    }

    /**
     * @param int $awardNum
     * @return \null[][]
     * 排序统计算法
     */
    public function Result(int $awardNum): array
    {
        $db = new TT_result();
        $allData = $db->GetAllData();
        $max = $this->FinishEvaluationNum();
        $cou = 0;
        $resultData = Array(
            Array(null, null),
        );
        $award = 'award'.$awardNum;
        for($j = 1; $p = 1; $j++)
        {
            if($max <= $cou)
                break;

            $resultData[][0] = $j;
            $resultData[$j][1] = 0;
            foreach($allData as $i)
            {
                if($i->status == 1)
                {
                    if($i->$award == $j)
                    {
                        $cou++;
                        $resultData[$j][1]++;
                    }
                }
            }
        }
        unset($resultData[0]);

        array_multisort(array_column($resultData, 1), SORT_DESC, $resultData);

        return $resultData;
    }

    /**
     * @param int $award
     * @param int $num
     * @return \null[][]
     * 格式化结果数据，显示前n名或显示全部
     */
    public function DataFormatting(int $award, int $num/* 为-1时显示全部 */): array
    {
        $dbT = new TT_teacher();
        $formativeResult = Array(
            Array('ranking'=> null ,'name' => null, 'vote' => null)
        );
        if($award > 0)
        {
            $data = $this->Result($award);
            $max = 0;
            $nowRanking = 1;
            $cou = 0;
            foreach($data as $key=>$i)
            {
                $cou++;
                if (($num > 0 && $nowRanking > $num))
                {
                    unset($formativeResult[$key]);
                    break;
                }

                if($i[1] == $max)
                    $formativeResult[][] = ['ranking' =>  $nowRanking,'name' => $dbT->GetNameByTid($i[0]), 'vote' => $i[1]];
                else
                {
                    $formativeResult[][] = ['ranking' =>  $cou,'name' => $dbT->GetNameByTid($i[0]), 'vote' => $i[1]];
                    $nowRanking = $cou;
                    $max = $i[1];
                }
            }
        }
        unset($formativeResult[0]);
        return $formativeResult;
    }

}
