<?php

namespace App\Exports;

use App\Models\Karyawan;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithStyles;
use \Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithEvents;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;

class GajiKaryawanExport implements FromCollection, WithStyles, WithHeadings, WithEvents
{
    private $data;

    function __construct($data)
    {
        $this->data = $data;
    }

    public function styles(Worksheet $sheet)
    {
        $numOfRows = count($this->data) + 1;
        $totalRow = $numOfRows + 1;

        // Add cell with SUM formula to last row
        $sheet->setCellValue("F{$totalRow}", "=SUM(F1:F{$numOfRows})");
        $sheet->setCellValue("E{$totalRow}", "Total : ");
    }

    public function headings(): array
    {
        return ["Nama", "Jabatan", "Gaji pokok", "Bonus", "PPH", "Total"];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function (AfterSheet $event) {


                $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(30);
                $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(10);
                $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(10);
                $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(10);
                $event->sheet->getDelegate()->getColumnDimension('E')->setWidth(10);
                $event->sheet->getDelegate()->getColumnDimension('F')->setWidth(10);
            },
        ];
    }
    public function collection()
    {
        // Add new row with Total cell
        $extendedArr = [
            $this->data
        ];

        return new Collection($extendedArr);
    }
}