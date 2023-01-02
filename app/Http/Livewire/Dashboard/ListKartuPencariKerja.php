<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Biodata;
use Livewire\Component;
use Livewire\WithPagination;

class ListKartuPencariKerja extends Component
{
  use WithPagination;

  public $search = '';



  public function updatingSearch()
  {
    $this->resetPage();
  }

  public function render()
  {
    $biodata = Biodata::with('pendidikanTerakhir', 'kecamatan')
      ->when(!empty($this->search), fn ($query) => $query->where('name', 'like', '%' .  $this->search . '%')
        ->orWhere('nik', 'like', '%' . $this->search . '%'))
      ->paginate(10);
    return view('livewire.dashboard.list-kartu-pencari-kerja', compact('biodata'));
  }
}
