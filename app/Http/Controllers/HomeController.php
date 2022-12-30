<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function index()
  {
    $biodata = Biodata::where('user_id', auth()->user()->id)->first();

    return view('home.index', compact('biodata'));
  }
}
