<?php

namespace App\Http\Livewire\Biodata;

use Livewire\Component;

class MultiForm extends Component
{
  public $currentStep = 1;
  public $nik, $name, $tempatLahir, $tanggalLahir, $jenisKelamin, $agama, $statusPerkawinan, $tinggiBadan, $beratBadan, $isDisability;

  public function firstStepSubmit()
  {
    $validatedData = $this->validate([
      'nik' => 'required',
      'name' => 'required',
      'tempatLahir' => 'required',
      'tanggalLahir' => 'required',
      'jenisKelamin' => 'required',
      'agama' => 'required',
      'statusPerkawinan' => 'required',
      'tinggiBadan' => 'required',
      'beratBadan' => 'required',
      'isDisability' => 'required'
    ]);

    $this->currentStep = 2;
  }

  public function back($step)
  {
    $this->currentStep = $step;
  }

  public function render()
  {
    return view('livewire.biodata.multi-form');
  }
}
