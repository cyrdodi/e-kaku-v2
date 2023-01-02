<?php

namespace App\Http\Livewire\Report;

use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\CetakTransaction;


class ReportList extends Component
{
  use WithPagination;

  public $bulan;
  public $tahun;


  public function mount()
  {
    $this->tahun = date('Y');
    $this->bulan = date('m');
  }

  public function render()
  {
    $list = CetakTransaction::with('biodata')->whereMonth('created_at', $this->bulan)
      ->whereYear('created_at', $this->tahun)
      ->paginate(10);


    return view('livewire.report.report-list', compact('list'));
  }

  public function filter()
  {

    $this->validate([
      'bulan' => 'required',
      'tahun' => 'required'
    ]);

    // ->get();

    // dd($this->list);
  }
}
