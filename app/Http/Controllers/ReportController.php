<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ReportExport;
use App\Exports\ReportExport2;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
  public function index()
  {
    return view('report/index');
  }

  public function export($bulan, $tahun)
  {
    return Excel::download(new ReportExport($bulan, $tahun), 'E-Kaku Report bulan ' . $bulan . ' tahun ' . $tahun . '.xlsx');
  }
}
