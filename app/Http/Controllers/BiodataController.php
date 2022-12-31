<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use Illuminate\Support\Facades\Gate;

class BiodataController extends Controller
{
  public function index()
  {
    $biodata = Biodata::where('user_id', auth()->user()->id)->first();

    return view('biodata/index', compact('biodata'));
  }

  public function show()
  {
    $biodata = Biodata::where('user_id', auth()->user()->id)->first();
    return view('biodata/show', compact('biodata'));
  }

  public function create()
  {
    // jika user sudah membuat biodata maka abort
    if (!Gate::allows('create')) {
      abort(403, 'Anda sudah memiliki Biodata');
    }

    return view('biodata/create');
  }

  public function edit(Biodata $biodata)
  {
    $this->authorize('update', $biodata);

    return view('biodata/edit', compact('biodata'));
  }
}
