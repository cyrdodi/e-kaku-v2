<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusPerkawinan extends Model
{
  use HasFactory;

  public $table = 'status_perkawinan';
  public $guarded = [];
}