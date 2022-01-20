<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TT_result
 * @package App\Models
 * 结果数据模型
 */

class TT_result extends Model
{
    use HasFactory;

    protected $table = "TT_result";
    const CREATED_AT = 'upload_at';

    /**
     * @param $uid
     * @param $awardTidData
     * @return int
     */
    public function UpdateOneByUidTid($uid,$awardTidData): int
    {
//        try{
            $awardNum = config('sjjs_awardSetting.awardNum');
            $list = [
                'uid' => $uid,
            ];
            for($i = 1; $i <= $awardNum; $i++)
            {
                $list['award'.$i] = $awardTidData[$i - 1];
                $list['upload_at'] = time();
            }
            $list['status'] = 1;
            $this->insert($list);
            return 1;
//        }catch (Exception $e)
//        {
//            return 0;
//        }
    }

    /**
     * @return mixed
     */
    public function GetAllData()
    {
        return $this->Get();
    }

    /**
     *
     */
    public function DelAll()
    {
        $this->truncate();
    }


    /**
     * @param $num
     * @return mixed
     */
    public function GetAllDataToPaging($num)
    {
        return $this->paginate($num);
    }

    /**
     * @param $id
     */
    public function DelDataById($id)
    {
        $this->where('id', $id)->delete();
    }
}
