<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use App\Models\CetakTransaction;
use App\Models\Functionary;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class DashboardController extends Controller
{
  public function index()
  {

    return view('dashboard/index');
  }

  // public function print()
  // {
  //   $data = 'Dodi Yulian';

  //   // $pdf = Pdf::loadView('pdf.test')
  //   //   ->setPaper('a4', 'landscape');
  //   // return $pdf->download('invoice.pdf');

  //   // retreive all records from db
  //   // $data = Employee::all();
  //   // share data to view
  //   // view()->share('pdf.kaku', $data);
  //   Pdf::setOption(['dpi' => 150, 'defaultFont' => 'sans-serif']);

  //   $pdf = Pdf::loadView('pdf.test');
  //   // download PDF file with download method

  //   $customPaper = array(0, 0, 841.89, 297.64);
  //   $pdf->set_paper($customPaper);

  //   return $pdf->download('pdf_file.pdf');
  // }

  // v2.1
  public function print()
  {
    $functionary = Functionary::find(request()->input('functionary'));
    $biodata = Biodata::find(request()->input('biodata'));

    $pdf = Pdf::loadView('pdf.yellow-card', compact('functionary', 'biodata'));
    Pdf::setOption(['isHtml5ParserEnabled' => true, 'isPhpEnabled' => true]);
    $pdf->setPaper('A5', 'landscape');


    // $pdf->setPaper([0.0, 0.0, 595.00, 420.50]);

    $font = $pdf->getFontMetrics()->get_font("helvetica", "bold");

    $pdf->getCanvas()->page_text(72, 18, "Header: {PAGE_NUM} of {PAGE_COUNT}", $font, 10, array(0, 0, 0));

    return $pdf->stream('e-kaku_' . 'test' . '.pdf');
  }

  public function printView(CetakTransaction $cetakTrans)
  {
    // $this->authorize('cetak', $biodata);
    // dd($cetakTrans->functionary->name);



    return view('pdf/kaku', compact('cetakTrans'));
  }

  // public function createPDF()


  public function show(Biodata $biodata)
  {

    // dd($biodata);

    $cetak = CetakTransaction::where('biodata_id', $biodata->id)->first();

    $functionaries = Functionary::where('is_active', 1)
      ->orderBy('name', 'desc')
      ->get();

    return view('dashboard.show', compact('biodata', 'cetak', 'functionaries'));
  }

  public function edit(Biodata $biodata)
  {
    return view('dashboard.edit', compact('biodata'));
  }

  public function create()
  {

    return view('dashboard.create');
  }
}
