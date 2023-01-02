<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Biodata;
use App\Models\Functionary;
use App\Models\CetakTransaction;
use Illuminate\Support\Facades\DB;
use LivewireUI\Modal\ModalComponent;

class Cetak extends ModalComponent
{
  public $expired;
  public $functionary_id;
  public $functionaries, $biodata;

  public function mount(Biodata $biodata)
  {
    $this->biodata = $biodata;
    $this->expired = date('Y-m-d', strtotime('+2 Year'));
    $this->functionaries = Functionary::where('is_active', 1)->get();
  }

  public function submit()
  {
    $this->validate([
      'functionary_id' => 'required',
      'expired' => 'required'
    ]);

    try {

      DB::transaction(function () {
        $cetakTransId = CetakTransaction::create([
          'user_id' => auth()->user()->id,
          'biodata_id' => $this->biodata->id,
          'functionary_id' => $this->functionary_id,
          'expired' => $this->expired,
        ]);

        $noPendaftaran = $this->generateNoPendaftaran();
        // dd($noPendaftaran);

        $this->biodata->update(['no_pendaftaran' => $noPendaftaran]);
        // Biodata::find($this->biodata->id)
        //   ->update(['no_pendaftaran' => $noPendaftaran]);

        return redirect()->route('dashboardPrintView', ['cetak_trans' => $cetakTransId]);
      });
    } catch (\Exception $e) {
      toastr()->error($e->getMessage(), 'Error');
    }


    // toastr()->success('Berhasil input');

    // go to preview pdf
  }

  private function generateNoPendaftaran()
  {

    $prefix = substr($this->biodata->nik, 0, 4);
    $suffix = date('dmY');

    // cek apakah ada data pada bulan ini
    $noUrut = CetakTransaction::whereYear('created_at', date('Y'))
      ->whereMonth('created_at', date('m'))
      ->count();

    $noUrut = sprintf('%05d', $noUrut + 1);

    return $prefix . $noUrut . $suffix;
  }

  public function render()
  {
    return view('livewire.dashboard.cetak');
  }
}
