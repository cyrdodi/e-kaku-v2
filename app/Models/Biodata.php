<?php

namespace App\Models;

use App\Models\Kecamatan;
use App\Models\PendidikanTerakhir;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Biodata extends Model
{
  use HasFactory;

  public $table = 'biodata';
  public $guarded = [];

  public function kecamatan()
  {
    return $this->belongsTo(Kecamatan::class);
  }

  public function pendidikanTerakhir()
  {
    return $this->belongsTo(PendidikanTerakhir::class);
  }
}
