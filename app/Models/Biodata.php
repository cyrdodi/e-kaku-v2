<?php

namespace App\Models;

use App\Models\Agama;
use App\Models\Kecamatan;
use App\Models\StatusPerkawinan;
use App\Models\PendidikanTerakhir;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Biodata extends Model
{
  use HasFactory;

  public $table = 'biodata';
  public $guarded = [];

  public function kecamatanName()
  {
    return $this->belongsTo(Kecamatan::class, 'kecamatan_id', 'id');
  }

  public function pendidikanTerakhir()
  {
    return $this->belongsTo(PendidikanTerakhir::class);
  }

  public function agama()
  {
    return $this->belongsTo(Agama::class);
  }

  public function statusPerkawinan()
  {
    return $this->belongsTo(StatusPerkawinan::class);
  }
}
