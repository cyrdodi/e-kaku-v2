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

  public function columnFormats(): array
  {
    return [
      // F is the column
      'D' => '#0',
      'E' => '#0',
    ];
  }

  public function map($cetakTrans): array
  {
    return [
      date('Y-m-d', strtotime($cetakTrans->created_at)),
      strtoupper($cetakTrans->biodata->name),
      "`" . $cetakTrans->biodata->nik,
      "`" . $cetakTrans->biodata->no_pendaftaran,
      strtoupper($cetakTrans->biodata->tempat_lahir),
      $cetakTrans->biodata->tanggal_lahir,
      strtoupper($cetakTrans->biodata->jenis_kelamin),
      strtoupper($cetakTrans->biodata->alamat) . ', ' . strtoupper($cetakTrans->biodata->kelurahan) . ', ' . strtoupper($cetakTrans->biodata->kecamatan->name) . ', ' . strtoupper($cetakTrans->biodata->kabupaten) . ' - ' . strtoupper($cetakTrans->biodata->provinsi) . ' ' . $cetakTrans->biodata->kode_post,
      strtoupper($cetakTrans->biodata->kecamatan->name),
      $cetakTrans->biodata->kode_pos,
      strtoupper($cetakTrans->biodata->statusPerkawinan->name),
      strtoupper($cetakTrans->biodata->pendidikanTerakhir->name),
      strtoupper($cetakTrans->biodata->jurusan),
      $cetakTrans->biodata->tahun_lulus,
      strtoupper($cetakTrans->biodata->pengalaman),
      strtoupper($cetakTrans->biodata->keterampilan),
      $cetakTrans->biodata->no_hp,
      strtoupper($cetakTrans->biodata->email),

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
        'NIK',
        'No. Pendaftaran',
        'Tempat Lahir',
        'Tanggal Lahir',
        'Jenis Kelamin',
        'Alamat Lengkap',
        'Kecamatan',
        'Kode Pos',
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

    $sheet->getStyle('B5:S' . $this->totalRow + 5)->applyFromArray($styleArray);

    return [
      1 => ['font' => ['bold' => true, 'size' => 13]],
      2 => ['font' => ['bold' => true]],
      5 => ['font' => ['bold' => true]],
    ];
  }
}
