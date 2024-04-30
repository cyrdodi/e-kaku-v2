<?php

namespace App\Http\Livewire\Pengaturan;

use Livewire\Component;
use App\Models\Functionary;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Concerns\InteractsWithTable;
use Illuminate\Database\Eloquent\Relations\Relation;
use Filament\Forms;
use Filament\Tables;

class TablePejabat extends Component implements HasForms, HasTable
{
  use InteractsWithTable;
  use InteractsWithForms;

  public function table(Tables\Table $table): Tables\Table
  {
    return $table
      ->query(Functionary::query())
      ->columns([
        Tables\Columns\TextColumn::make('name'),

        Tables\Columns\TextColumn::make('nip'),

        Tables\Columns\TextColumn::make('golongan'),

        Tables\Columns\TextColumn::make('jabatan'),

        Tables\Columns\ImageColumn::make('ttd'),

        Tables\Columns\ToggleColumn::make('is_active'),

      ])

      ->actions([
        Tables\Actions\EditAction::make('edit')
          ->form([
            Forms\Components\TextInput::make('name'),
            Forms\Components\TextInput::make('nip')
              ->numeric(),
            Forms\Components\TextInput::make('golongan'),
            Forms\Components\TextInput::make('jabatan'),
            Forms\Components\FileUpload::make('ttd')
              ->directory('ttd'),
          ])
      ]);
  }

  // protected function getTableQuery(): Builder|Relation
  // {
  //   return Functionary::query();
  // }

  // protected function getTableColumns(): array
  // {
  //   return [
  //     TextColumn::make('name'),
  //     TextColumn::make('nip'),
  //     TextColumn::make('golongan'),
  //     TextColumn::make('jabatan')
  //       ->wrap(),
  //   ];
  // }

  protected function getTableActions(): array
  {
    return [
      Action::make('edit')
        ->url(route('pengaturan.index'))
    ];
  }

  public function render()
  {
    return view('livewire.pengaturan.table-pejabat');
  }
}
