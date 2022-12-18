<?php

namespace App\Http\Controllers;

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
    $pdf = Pdf::loadView('pdf.test')
      ->setPaper('a4', 'landscape');
    // download PDF file with download method
    return $pdf->download('pdf_file.pdf');
  }

  public function printView()
  {
    return view('pdf/kaku');
  }

  // public function createPDF()
}