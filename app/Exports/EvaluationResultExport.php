<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;

/**
 * Class EvaluationResultExport
 * @package App\Exports
 */
class EvaluationResultExport implements FromArray
{
    protected $invoices;

    /**
     * EvaluationResultExport constructor.
     * @param array $invoices
     */
    public function __construct(array $invoices)
    {
        $this->invoices = $invoices;
    }

    /**
     * @return array
     */
    public function array(): array
    {
        return $this->invoices;
    }
}
