<?php

namespace App\Exports;

use App\Models\CetakTransaction;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;

class ReportExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithCustomStartCell, WithStyles
{
  protected $bulan, $tahun, $data, $totalRow;

  public function __construct($bulan, $tahun)
  {
    $this->bulan = $bulan;
    $this->tahun = $tahun;
  }

  public function collection()
  {
    $this->data = CetakTransaction::with('biodata')->whereMonth('created_at', $this->bulan)->whereYear('created_at', $this->tahun)->get();
    $this->totalRow = $this->data->count();
    // dd($this->totalRow);
    return $this->data;
  }

  public function map($cetakTrans): array
  {
    return [
      date('Y-m-d', strtotime($cetakTrans->created_at)),
      $cetakTrans->biodata->name,
      (string)$cetakTrans->biodata->no_pendaftaran,
      $cetakTrans->biodata->tempat_lahir,
      $cetakTrans->biodata->tanggal_lahir,
      $cetakTrans->biodata->jenis_kelamin,
      $cetakTrans->biodata->alamat . ', ' . $cetakTrans->biodata->kelurahan . ', ' . $cetakTrans->biodata->kecamatan->name . ', ' . $cetakTrans->biodata->kabupaten . ' - ' . $cetakTrans->biodata->provinsi . ' ' . $cetakTrans->biodata->kode_post,
      $cetakTrans->biodata->kecamatan->name,
      $cetakTrans->biodata->statusPerkawinan->name,
      $cetakTrans->biodata->pendidikanTerakhir->name,
      $cetakTrans->biodata->jurusan,
      $cetakTrans->biodata->tahun_lulus,
      $cetakTrans->biodata->pengalaman,
      $cetakTrans->biodata->keterampilan,
      $cetakTrans->biodata->no_hp,
      $cetakTrans->biodata->email,

    ];
  }


  public function headings(): array
  {
    return [
      [
        'E-Kaku'
      ],
      [
        'Report',
        'Bulan ' .  $this->bulan . ' Tahun ' . $this->tahun
      ],
      [],
      [
        'Tanggal',
        'Nama',
        'No. Pendaftaran',
        'Tempat Lahir',
        'Tanggal Lahir',
        'Jenis Kelamin',
        'Alamat Lengkap',
        'Kecamatan',
        'Status',
        'Pendidikan',
        'Jurusan',
        'Tahun Lulus',
        'Pengalaman Kerja',
        'Keterampilan',
        'No. HP',
        'Email',
      ]
    ];
  }

  public function startCell(): string
  {
    return 'B2';
  }

  public function styles(Worksheet $sheet)
  {

    $styleArray = [
      'borders' => [
        'outline' => [
          'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
          'color' => ['argb' => 'ff000000'],
        ],
      ],
    ];

    $sheet->getStyle('B5:Q' . $this->totalRow + 5)->applyFromArray($styleArray);

    return [
      1 => ['font' => ['bold' => true, 'size' => 13]],
      2 => ['font' => ['bold' => true]],
      5 => ['font' => ['bold' => true]],
    ];
  }
}
