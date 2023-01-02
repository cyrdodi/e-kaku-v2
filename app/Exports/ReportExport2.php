<?php

namespace App\Exports;

use App\Models\CetakTransaction;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ReportExport2 implements FromView, ShouldAutoSize
{
  protected $bulan, $tahun;

  public function __construct($bulan, $tahun)
  {
    $this->bulan = $bulan;
    $this->tahun = $tahun;
  }

  public function view(): View
  {


    return view('report.export', [
      'list' => CetakTransaction::with('biodata')->whereMonth('created_at', $this->bulan)->whereYear('created_at', $this->tahun)->get()
    ]);
  }

  public function startCell(): string
  {
    return 'B2';
  }
}
