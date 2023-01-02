<?php

namespace App\Http\Livewire\Biodata;

use App\Models\Biodata;
use Livewire\Component;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;

class EditBerkas extends ModalComponent
{

  use WithFileUploads;

  public $biodata;
  public $pas_foto;

  public function mount(Biodata $biodata)
  {
    $this->biodata = $biodata;
  }

  public function savePasFoto()
  {
    $this->validate([
      'pas_foto' => 'image|requred|max:2048'
    ]);

    $originalName = $this->pas_foto->getClientOriginalName();
    $filename = $this->pas_foto->store('berkas');

    $this->biodata->pas_foto->update($originalName);
    $this->biodata->pas_foto_path->update($filename);

    toastr('Berhasil upload', 'Sukses');
  }

  public function render()
  {
    return view('livewire.biodata.edit-berkas');
  }
}
