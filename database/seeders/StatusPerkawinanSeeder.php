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
    StatusPerkawinan::create(['name' => 'Belum Menikah']);
    StatusPerkawinan::create(['name' => 'Sudah Menikah']);
    StatusPerkawinan::create(['name' => 'Janda']);
    StatusPerkawinan::create(['name' => 'Duda']);
    StatusPerkawinan::create(['name' => 'Tidak Menikah']);
  }
}
