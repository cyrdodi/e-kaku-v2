<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Biodata;
use App\Models\Functionary;
use App\Models\CetakTransaction;
use LivewireUI\Modal\ModalComponent;

class Cetak extends ModalComponent
{
  public $expired;
  public $functionary_id;
  public $functionaries, $biodata;

  public function mount(Biodata $biodata)
  {
    $this->bidoata = $biodata;
    $this->expired = date('Y-m-d', strtotime('+2 Year'));
    $this->functionaries = Functionary::where('is_active', 1)->get();
  }

  public function submit()
  {
    $this->validate([
      'functionary_id' => 'required',
      'expired' => 'required'
    ]);

    $cetakTransId = CetakTransaction::create([
      'user_id' => auth()->user()->id,
      'biodata_id' => $this->biodata,
      'functionary_id' => $this->functionary_id,
      'expired' => $this->expired,
    ]);

    // toastr()->success('Berhasil input');

    // go to preview pdf
    return redirect()->route('dashboardPrintView', ['cetak_trans' => $cetakTransId]);
  }

  public function render()
  {
    return view('livewire.dashboard.cetak');
  }
}
