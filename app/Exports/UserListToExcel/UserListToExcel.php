<?php

namespace App\Exports\UserListToExcel;

use App\Exports\EvaluationResultExport\EvaluationResultExportOne;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

/**
 * Class UserListToExcel
 * @package App\Exports\UserListToExcel
 * 用户列表toExcel 所以表数据
 */
class UserListToExcel implements WithMultipleSheets
{
    use Exportable;

    protected $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return array
     */
    public function sheets(): array
    {
        $sheets = [];

        foreach($this->data as $now=>$val)
            $sheets[] = new UserListToExcelOne($this->data, $now);

        return $sheets;
    }
}
