<?php

namespace App\Exports;

use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Style;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use App\Models\avv;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithDefaultStyles;

class AVV_EstadoExport implements FromCollection, ShouldAutoSize, WithHeadings, WithColumnWidths, WithStyles, WithDefaultStyles
{
    public function styles(Worksheet $sheet)
    {
        $sheet->insertNewRowBefore(1, 1);
        $sheet->mergeCells('A1:BE1');
        $sheet->getCell('A1')->setValue("DATA ASAMBLEA VIVIENDO VENEZOLANO");
        $sheet->getStyle('A1')->getFont()->setSize(30);
        $sheet->getStyle('A1:BE1')->getFill()->getStartColor()->setARGB('455D9E');
        $sheet->getStyle('A1:BE1')->getFont()->getColor()->setARGB('FFFFFF');
        $sheet->getRowDimension('1')->setRowHeight(40);
        $sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        $sheet->insertNewRowBefore(2, 1);
        $sheet->mergeCells('A2:L2');
        $sheet->mergeCells('M2:O2');
        $sheet->mergeCells('Q2:U2');
        $sheet->mergeCells('V2:AE2');
        $sheet->mergeCells('AF2:AJ2');
        $sheet->mergeCells('AK2:AU2');
        $sheet->mergeCells('AV2:BE2');
        $sheet->getCell('A2')->setValue("DATOS BASICOS");
        $sheet->getCell('M2')->setValue("DATOS DEL VOCERO");
        $sheet->getCell('P2')->setValue('REDES');
        $sheet->getCell('Q2')->setValue("FMH");
        $sheet->getCell('V2')->setValue("INTU NIVEL 2");
        $sheet->getCell('AF2')->setValue("INTU NIVEL 3");
        $sheet->getCell('AK2')->setValue("OTROS");
        $sheet->getCell('AV2')->setValue("ESCALERA DE LA AVV");
        $sheet->getStyle('A2:L2')->getFill()->getStartColor()->setARGB('B32121');
        $sheet->getStyle('M2:O2')->getFill()->getStartColor()->setARGB('21B326');
        $sheet->getStyle('P2')->getFill()->getStartColor()->setARGB('B37621');
        $sheet->getStyle('Q2:U2')->getFill()->getStartColor()->setARGB('A52A2A');
        $sheet->getStyle('V2:AE2')->getFill()->getStartColor()->setARGB('468110');
        $sheet->getStyle('AF2:AJ2')->getFill()->getStartColor()->setARGB('104066');
        $sheet->getStyle('AK2:AU2')->getFill()->getStartColor()->setARGB('395311');
        $sheet->getStyle('AV2:BE2')->getFill()->getStartColor()->setARGB('7E1450');
        $sheet->getRowDimension('2')->setRowHeight(26);
        $sheet->getStyle('A2:BE2')->getFont()->setSize(20);
        $sheet->getStyle('A2:BE2')->getFont()->getColor()->setARGB('FFFFFF');
        $sheet->getStyle('2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);


        $sheet->getStyle('A3:BE3')->getFill()->getStartColor()->setARGB('424344');
        $sheet->getStyle('A3:BE3')->getFont()->getColor()->setARGB('FFFFFF');
        $sheet->getStyle('A3:BE3')->getFont()->setSize(15);
        $sheet->getRowDimension('3')->setRowHeight(20);
    }
    public function defaultStyles(Style $defaultStyle)
    {
        // return $defaultStyle->getFill()->setFillType(Fill::FILL_SOLID);
    
        return [
            'fill' => ['fillType' => Fill::FILL_SOLID],
            
        ];
    }
    public function collection()
    {
        return collect(avv::getAllAvv());
    }
    public function columnWidths(): array
    {
        return [
            'G' => 55,
            'U' => 55,
            'AE' =>55,
            'AI' =>55,
            'AJ' =>55,
            'AP' =>55,
        ];
    }
    public function headings(): array
    {
        return [
            'FECHA',
            'ESTADO',
            'MUNICIPIO',
            'PARROQUIA',
            'NOMBRE DE LA AVV',
            'NOMBRE DEL TERRENO',
            'DIRECCION',
            'CANTIDAD DE FAMILIAS',
            'CANTIDAD DE PERSONAS',
            'CONSEJO COMUNAL',
            'COMUNA',
            'ORGANO EJECUTOR',
            'CEDULA',
            'NOMBRE Y APELLIDO',
            'TELEFONO',
            'DESCRIPCION',
            'NOMBRE DEL PROYECTO',
            'IMPLANTACION',
            'PROYECTO',
            'CANTIDAD DE VIVIENDAS',
            'OBSERVACION',
            'AREA DEL TERRENO',
            'CODIGO INTU',
            'MATRIZ INTU',
            'PREFACTIBILIDAD',
            'FACTIBILIDAD DE SERVICIOS',
            'SALIDA CARTOGRAFICA',
            'LEVANTAMIENTO TOPOGRAFICO',
            'ESTUDIO DE SUELO',
            'SERVICIOS CERCANOS',
            'OBSERVACION',
            'GACETA OFICIAL',
            'DECRETO 3330',
            'PROPIEDAD DEL TERRENO',
            'TENENCIA DEL TERRENO',
            'OBSERVACION',
            'LATITUD',
            'LONGITUD',
            'METODOLOGIA DE EJECUCION',
            'TIPOLOGIA CONSTRUCTIVA',
            'CMG',
            'NOMBRE DEL CMG',
            'TITULO DE PROPIEDAD MULTIFAMILIAR',
            'Nro DE FOLIO TPM',
            'INCRITO EN EL SIGEVIH',
            'ID DEL SIGEVIH',
            'EL URBANISMO ESTA PROTOCOLIZADO',
            'PREREGISTRO',
            'NIVEL 1',
            'NIVEL 2',
            'NIVEL 3',
            'NIVEL 4',
            'NIVEL 5',
            'NIVEL 6',
            'NIVEL 7',
            'NIVEL 8',
            'NIVEL 9'
        ];
    }
}
