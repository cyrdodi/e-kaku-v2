<?php

namespace Database\Seeders;

use App\Models\Kelurahan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KelurahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Kelurahan
        $csvFile = fopen('./database/csv/kelurahan.csv', 'r');
        $villages = [];
        while (($row = fgetcsv($csvFile)) !== false) {
            $villages[] = ['id' => $row[0], 'kecamatan_id' => $row[1], 'name' => $row[2], 'kodepos' => $row[3]];
        }

        Kelurahan::insert($villages);
    }
}
