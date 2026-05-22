<?php

namespace App\Http\Livewire\Pengaturan;

use Livewire\Component;
use App\Models\Functionary;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Concerns\InteractsWithTable;

class TablePejabat extends Component implements HasTable
{
  use InteractsWithTable;

  public function table(Table $table): Table
  {
    return $table
      ->query(Functionary::query())
      ->columns([
        TextColumn::make('name'),
        TextColumn::make('nip'),
        TextColumn::make('golongan'),
        TextColumn::make('jabatan')
          ->wrap(),
      ])
      ->actions([
        Action::make('edit')
          ->url(route('pengaturan.index'))
      ]);
  }

  public function render()
  {
    return view('livewire.pengaturan.table-pejabat');
  }
}
