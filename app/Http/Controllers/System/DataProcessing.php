<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Models\TT_result;
use App\Models\TT_teacher;

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

        $resultData = Array(
            Array(null, null),
        );
        $award = 'award'.$awardNum;

        foreach($allData as $i)
        {
            $te = $i->$award;
            $re = $this->IsInArr($te, $resultData, 0);
            if($re == 0)
                $resultData[] = [$te, 1];
            else
                $resultData[$re][1]++;
        }

        unset($resultData[0]);

        array_multisort(array_column($resultData, 1), SORT_DESC, $resultData);

//        $this->ARRFormOutput($resultData);

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

    /**
     * @param $data
     * @param $need
     * @return string
     * 生成符合excel导出要求的HTML字符串
     */
    public function DataFormattingCsv($data, $need, $num): string
    {
        $text = "<html xmlns:x='urn:schemas-microsoft-com:office:excel'>";//设置html输出格式
        $text.= "<body><table><tr>";

        if($num != $this->FinishEvaluationNum() && $num > 0)
            $tmp = '（部分数据）';
        else
            $tmp = '';

        foreach($data as $key=>$val)
        {
            $text.= "<td>".config('sjjs_awardSetting.award'.$need[$key])."$tmp</td>";
        }

        $text.= "</tr><tr>";
        foreach($need as $key=>$ne)
        {
            $text.= "<td x:str><table><tr><td>编号</td><td>排名</td><td>姓名</td><td>得票</td></tr>";
            foreach($data[$key] as $num=>$val)
            {


                $text.="<tr><td>".$num."</td><td>".$val[0]['ranking']."</td><td>".$val[0]['name'].
                    "</td><td>".$val[0]['vote']."</td></tr>";

            }

            $text.="</table></td>";
        }

        $text.= "</tr></table></body></html>";

        return $text;
    }

    /**
     * @param $aim
     * @param $arr
     * @param $key
     * @return int
     * 用于检查对象是否在数组相应索引内
     */
    private function IsInArr($aim, $arr, $key): int
    {
        foreach($arr as $k=>$i)
        {
            if($i[$key] == $aim)
                return $k;
        }
        return 0;
    }

    public function ARRFormOutput($arr)
    {
        print("<pre>"); // 格式化输出数组
        print_r($arr);
        print("</pre>");
    }
}
