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

    public function __construct(array $data, int $max)
    {
        $this->max = $max;
        $this->data = $data;
    }

    /**
     * @return array
     */
    public function sheets(): array
    {
        $sheets = [];

        for ($now = 0; $now < $this->max; $now++) {
            $sheets[] = new EvaluationResultExportOne($this->data, $now);
        }

        return $sheets;
    }
}
