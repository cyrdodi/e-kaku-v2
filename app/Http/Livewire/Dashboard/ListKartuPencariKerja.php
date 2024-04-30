<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Biodata;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\CetakTransaction;

class ListKartuPencariKerja extends Component
{
  use WithPagination;

  public $search = '';

  public $years;
  public $year;

  public $countRegisteredYearly;
  public $countPrintedYearly;

  public function mount()
  {
    $this->years = \DB::table('biodata')->selectRaw('DISTINCT YEAR(created_at) years')->get()->toArray();
    $this->year = date('Y');
  }


  public function updatingSearch()
  {
    $this->resetPage();
  }

  public function render()
  {

    $this->countRegisteredYearly = Biodata::whereYear('created_at', $this->year)->count();
    $this->countPrintedYearly = CetakTransaction::whereYear('created_at', $this->year)->count();


    $biodata = Biodata::with('pendidikanTerakhir', 'kecamatanName')
      ->whereYear('created_at', $this->year)
      ->when(!empty($this->search), function ($query) {
        return  $query->where('name', 'like', '%' .  $this->search . '%')
          ->orWhere('nik', 'like', '%' . $this->search . '%');
      })
      ->orderBy('id', 'desc')
      ->paginate(10);

    // dd($biodata[3]->kecamatanName->name);

    return view('livewire.dashboard.list-kartu-pencari-kerja', compact('biodata'));
  }
}
