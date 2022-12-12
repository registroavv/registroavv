<?php

namespace App\Exports;

use App\Models\avv;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class AVVsExport implements FromView, ShouldAutoSize, WithColumnWidths
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view():View
    {
        return view('exports.avv', [
            'avvs' => avv::all()
        ]);
    }

    public function columnWidths(): array
    {
        return [
            'E' => 55,
            'F' => 55,
            'G' => 55,
            'AJ'=> 55,
            'AK'=> 55,
            'AQ'=> 55,
            'AI'=> 55,
        ];
    }
}
