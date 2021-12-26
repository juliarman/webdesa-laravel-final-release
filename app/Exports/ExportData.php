<?php

namespace App\Exports;

use App\Models\Penduduk;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat as StyleNumberFormat;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ExportData implements WithColumnFormatting, FromCollection,  WithStyles, WithHeadings, ShouldAutoSize, WithEvents
{

    use Exportable;
    public function columnFormats(): array
    {
        return [

            'D' => StyleNumberFormat::FORMAT_NUMBER,

        ];
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function (AfterSheet $event) {
                $cellRange = 'A1:F1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(10);
            },
        ];
    }
    public function headings(): array
    {
        return [
            '#id',
            'Nama',
            'Tanggal Lahir',
            'No KK',
            'Jenis Kelamin',
            'Agama',
        ];
    }
    public function styles(Worksheet $sheet)
    {




        $sheet->getStyle('A1:F1')->getAlignment()->setHorizontal('center');

        $sheet->getStyle('A1:F1')->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => '000000'],
                ],
            ]
        ]);
        return [


            'A1'    => ['font' => ['bold' => true]],
            'B1'    => ['font' => ['bold' => true]],
            'C1'    => ['font' => ['bold' => true]],
            'D1'    => ['font' => ['bold' => true]],
            'E1'    => ['font' => ['bold' => true]],
            'F1'    => ['font' => ['bold' => true]],



        ];
    }



    public function collection()
    {


        $penduduk = Penduduk::select('penduduk_id', 'nama', 'tgl_lahir', 'no_kk', 'kelamin', 'agama')->get();
        $filter = $penduduk->filter(function ($value) {
            return $value->tgl_lahir->age > 18 && $value->tgl_lahir->age <= 60;
        });

        $filter->all();

        return $filter;
    }
}
