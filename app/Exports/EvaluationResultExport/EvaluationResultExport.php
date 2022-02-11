<?php

namespace App\Exports\EvaluationResultExport;

use App\Exports\EvaluationResultExport\EvaluationResultExportOne;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

/**
 * Class EvaluationResultExport
 * @package App\Exports
 */
class EvaluationResultExport implements WithMultipleSheets
{
    use Exportable;

    protected $data;
    protected $max;
    protected $need;

    public function __construct(array $data, int $max, array $need)
    {
        $this->max = $max;
        $this->data = $data;
        $this->need = $need;
    }

    /**
     * @return array
     */
    public function sheets(): array
    {
        $sheets = [];

        foreach($this->need as $now=>$val)
        {
            $sheets[] = new EvaluationResultExportOne($this->data, $now, $val);
        }

        return $sheets;
    }
}
