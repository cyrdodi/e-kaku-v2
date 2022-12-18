<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Biodata;
use Livewire\Component;
use Livewire\WithPagination;

class ListKartuPencariKerja extends Component
{
  use WithPagination;

  public $search = '';



  public $biodatsa;

  public function updatingSearch()
  {
    $this->resetPage();
  }

  public function render()
  {
    $biodata = Biodata::when(!empty($this->search), fn ($query) => $query->where('name', 'like', '%' .  $this->search . '%'))
      ->paginate(10);

    return view('livewire.dashboard.list-kartu-pencari-kerja', [
      'biodata' => $biodata
    ]);
  }
}
