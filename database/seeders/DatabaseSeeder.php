<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Database\Seeders\AgamaSeeder;
use Database\Seeders\KecamatanSeeder;
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
    // \App\Models\User::factory(10)->create();

    \App\Models\User::factory()->create([
      'name' => 'Administrator',
      'email' => 'admin@disnakertrans.com',
      'password' => bcrypt('disnakertranspandeglang123'),
    ]);

    $this->call([
      AgamaSeeder::class,
      KecamatanSeeder::class,
      PendidikanTerakhirSeeder::class,
      StatusPerkawinanSeeder::class
    ]);
  }
}
