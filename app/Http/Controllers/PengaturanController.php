<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengaturanController extends Controller
{
  public function index()
  {
    return view('pengaturan/index');
  }

  public function pejabatIndex()
  {
    return view('pengaturan/pejabat-index');
  }

  public function pejabatCreate()
  {
    return view('pengaturan/pejabat-create');
  }
}
