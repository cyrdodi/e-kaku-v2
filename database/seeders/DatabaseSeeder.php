<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Biodata;
use Illuminate\Database\Seeder;
use Database\Seeders\AgamaSeeder;
use Database\Seeders\KecamatanSeeder;
use Database\Seeders\KelurahanSeeder;
use Database\Seeders\StatusPerkawinanSeeder;
use Database\Seeders\PendidikanTerakhirSeeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    \App\Models\User::factory(10)->create();

    \App\Models\User::factory()->create([
      'name' => 'Administrator',
      'email' => 'admin@disnakertrans.com',
      'password' => bcrypt('badak123'),
      'is_admin' => 1
    ]);

    $this->call([
      AgamaSeeder::class,
      KecamatanSeeder::class,
      PendidikanTerakhirSeeder::class,
      StatusPerkawinanSeeder::class,
      FunctionarySeeder::class,
      KelurahanSeeder::class,
    ]);


    // testing only
    // Biodata::factory(50)->create();
  }
}
