<?php

namespace Database\Seeders;

use App\Models\StatusPerkawinan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusPerkawinanSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    StatusPerkawinan::create(['name' => 'Belum Kawin']);
    StatusPerkawinan::create(['name' => 'Sudah Kawin']);
    StatusPerkawinan::create(['name' => 'Janda']);
    StatusPerkawinan::create(['name' => 'Duda']);
  }
}
