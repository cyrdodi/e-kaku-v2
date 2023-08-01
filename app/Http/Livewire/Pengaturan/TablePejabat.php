<?php

namespace App\Http\Livewire\Pengaturan;

use Livewire\Component;
use App\Models\Functionary;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Concerns\InteractsWithTable;
use Illuminate\Database\Eloquent\Relations\Relation;

class TablePejabat extends Component implements HasTable
{
  use InteractsWithTable;

  protected function getTableQuery(): Builder|Relation
  {
    return Functionary::query();
  }

  protected function getTableColumns(): array
  {
    return [
      TextColumn::make('name'),
      TextColumn::make('nip'),
      TextColumn::make('golongan'),
      TextColumn::make('jabatan')
        ->wrap(),
    ];
  }

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
