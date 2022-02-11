<?php

namespace App\Exports\EvaluationResultExport;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class EvaluationResultExportOne implements FromArray,WithTitle
{
    protected $data;
    protected $now;
    protected $index;

    /**
     * EvaluationResultExport constructor.
     * @param array $data
     * @param int $now
     * @param int $index
     */
    public function __construct(array $data, int $now, int $index)
    {
        $this->data = $data;
        $this->now = $now;
        $this->index = $index;
    }

    /**
     * @return array
     */
    public function array(): array
    {
        return $this->data[$this->now];
    }

    public function title(): string
    {
        return config(('sjjs_awardSetting.award'.($this->index)));
    }
}
