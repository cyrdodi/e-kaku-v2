<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Biodata;
use Livewire\Component;

class ListKartuPencariKerja extends Component
{
  public $biodata;

  public function render()
  {
    $this->biodata = Biodata::all();

    return view('livewire.dashboard.list-kartu-pencari-kerja');
  }
}
