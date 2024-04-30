<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    use HasFactory;

    public $table = 'kelurahan';

    public $fillable = ['id', 'name', 'kecamatan_id', 'kodepos'];
}
