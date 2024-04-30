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
    StatusPerkawinan::create([
      'id' => 1,
      'name' => 'Belum Kawin',
      'is_active' => true,
    ]);
    StatusPerkawinan::create([
      'id' => 2,
      'name' => 'Sudah Kawin',
      'is_active' => true,
    ]);
    StatusPerkawinan::create([
      'id' => 3,
      'name' => 'Janda',
      'is_active' => false,
    ]);
    StatusPerkawinan::create([
      'id' => 4,
      'name' => 'Duda',
      'is_active' => false,
    ]);
    StatusPerkawinan::create([
      'id' => 5,
      'name' => 'Cerai Hidup',
      'is_active' => true,
    ]);
    StatusPerkawinan::create([
      'id' => 6,
      'name' => 'Cerai Mati',
      'is_active' => true,
    ]);
  }
}
