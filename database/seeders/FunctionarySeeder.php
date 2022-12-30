<?php

namespace Database\Seeders;

use App\Models\Functionary;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FunctionarySeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Functionary::create([
      'name' => 'Parti',
      'nip' => '196504151985032003',
      'golongan' => 'Pembina IV/a',
      'jabatan' => 'Kepala Bidang Penempatan Tenaga Kerja, Perluasan Kesempatan Kerja dan Transmigrasi',
      'is_active' => 1,
    ]);
    Functionary::create([
      'name' => '',
      'nip' => '',
      'golongan' => '',
      'jabatan' => '',
      'is_active' => 1,
    ]);
  }
}
