<?php

namespace App\Models;

use App\Models\User;
use App\Models\Biodata;
use App\Models\Functionary;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CetakTransaction extends Model
{
  use HasFactory;

  protected $table = 'cetak_transaction';

  protected $guarded = [];

  public function biodata()
  {
    return $this->belongsTo(Biodata::class);
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function functionary()
  {
    return $this->belongsTo(Functionary::class);
  }
}
