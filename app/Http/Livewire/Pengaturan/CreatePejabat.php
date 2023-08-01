<?php

namespace App\Http\Livewire\Pengaturan;

use Filament\Forms\Components\TextInput;
use Livewire\Component;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;

class CreatePejabat extends Component implements HasForms
{
  use InteractsWithForms;

  protected function getFormSchema(): array
  {
    return [
      TextInput::make('name'),
      TextInput::make('nip'),
      TextInput::make('golongan'),
      TextInput::make('jabatan'),
    ];
  }

  public function render()
  {
    return view('livewire.pengaturan.create-pejabat');
  }
}
