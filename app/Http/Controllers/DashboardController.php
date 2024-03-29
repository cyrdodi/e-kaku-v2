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

  public function print()
  {
    $data = 'Dodi Yulian';

    // $pdf = Pdf::loadView('pdf.test')
    //   ->setPaper('a4', 'landscape');
    // return $pdf->download('invoice.pdf');

    // retreive all records from db
    // $data = Employee::all();
    // share data to view
    // view()->share('pdf.kaku', $data);
    Pdf::setOption(['dpi' => 150, 'defaultFont' => 'sans-serif']);

    $pdf = Pdf::loadView('pdf.test');
    // download PDF file with download method

    $customPaper = array(0, 0, 841.89, 297.64);
    $pdf->set_paper($customPaper);

    return $pdf->download('pdf_file.pdf');
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

    // dd($cetak);

    return view('dashboard.show', compact('biodata', 'cetak'));
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
