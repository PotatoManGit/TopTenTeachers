<?php

namespace App\Exports\UserListToExcel;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

/**
 * Class UserListToExcelOne
 * @package App\Exports\UserListToExcel
 * 用户列表toExcel 但个表数据
 */
class UserListToExcelOne implements FromArray,WithTitle,WithHeadings
{
    protected $data;
    protected $now;

    /**
     * EvaluationResultExport constructor.
     * @param array $data
     * @param int $now
     */
    public function __construct(array $data, int $now)
    {
        $this->data = $data;
        $this->now = $now;
    }

    /**
     * @return array
     */
    public function array(): array
    {
        return $this->data[$this->now];
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return ($this->now + 1).'班';
    }

    /**
     * @return string[]
     */
    public function headings(): array
    {
        return ['用户名', '密码'];
    }
}
