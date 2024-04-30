<?php

namespace App\Http\Livewire\Pengaturan;

use Filament\Forms;
use Livewire\Component;
use App\Models\Functionary;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Forms\Concerns\InteractsWithForms;

class CreatePejabat extends Component implements HasForms
{
  use InteractsWithForms;

  public ?array $data;

  public function mount()
  {
    $this->form->fill();
  }

  public function form(Forms\Form $form): Forms\Form
  {
    return $form
      ->schema([
        Forms\Components\Grid::make()
          ->schema([

            Forms\Components\TextInput::make('name'),
            Forms\Components\TextInput::make('nip')
              ->numeric(),
            Forms\Components\TextInput::make('golongan'),
            Forms\Components\TextInput::make('jabatan'),
            Forms\Components\FileUpload::make('ttd')
              ->directory('ttd')
              ->image(),
          ])
      ])
      ->statePath('data');
  }

  public function submit()
  {
    $formData = $this->form->getState();

    try {
      Functionary::create([
        'name' => $formData['name'],
        'nip' => $formData['nip'],
        'golongan' => $formData['golongan'],
        'jabatan' => $formData['jabatan'],
        'ttd' => $formData['ttd'],
      ]);

      Notification::make()
        ->title('Pejabat berhasil ditambahkan')
        ->success()
        ->send();

      return redirect()->route('pengaturan.pejabat');
    } catch (\Exception $e) {
      Notification::make()
        ->title('Pejabar gagal ditambahkan')
        ->body(env('APP_ENV') === 'production' ? $e->getCode() : $e->getMessage())
        ->danger()
        ->send();
    }
  }


  public function render()
  {
    return view('livewire.pengaturan.create-pejabat');
  }
}
