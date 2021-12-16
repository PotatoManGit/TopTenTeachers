<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Models\TT_result;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Array_;

class DataProcessing extends Controller
{
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

    // 排序统计算法-获取前x名
    public function Result($awardNum, $num)
    {
        $db = new TT_result();
        $allData = $db->GetAllData();
        $max = $this->FinishEvaluationNum();
        $cou = 0;
        $resultData = Array(
            Array(null, null),
        );
        $result = Array(
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

        $cou = 0;
        $nowMax = 0;
        $num++;
        foreach($resultData as $i)
        {
            $cou++;
            if($i[1] == $nowMax)
            {
                $result[][0] = $i[0];
                $result[$cou][1] = $i[1];
            }
            else
            {
                if($num >= 1 && $cou >= $num)
                    break;

                $result[][0] = $i[0];
                $result[$cou][1] = $i[1];
                $nowMax = $i[1];
            }
        }
        unset($result[0]);
        return $result;
    }
}
