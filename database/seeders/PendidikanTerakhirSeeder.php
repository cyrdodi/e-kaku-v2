<?php

namespace Database\Seeders;

use App\Models\PendidikanTerakhir;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PendidikanTerakhirSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    PendidikanTerakhir::create(['name' => 'SD']);
    PendidikanTerakhir::create(['name' => 'SMP']);
    PendidikanTerakhir::create(['name' => 'MTS']);
    PendidikanTerakhir::create(['name' => 'SMA']);
    PendidikanTerakhir::create(['name' => 'MA']);
    PendidikanTerakhir::create(['name' => 'D1']);
    PendidikanTerakhir::create(['name' => 'D2']);
    PendidikanTerakhir::create(['name' => 'D3']);
    PendidikanTerakhir::create(['name' => 'D4']);
    PendidikanTerakhir::create(['name' => 'S1']);
    PendidikanTerakhir::create(['name' => 'S2']);
    PendidikanTerakhir::create(['name' => 'S3']);
  }
}
