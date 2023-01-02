<?php

namespace Database\Factories;

use App\Models\Biodata;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Biodata>
 */
class BiodataFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */

  protected $model = Biodata::class;
  public function definition()
  {
    return [
      // 'no_pendaftaran' => rand(0, 10000),
      'nik' => rand(0, 800000),
      'name' => fake()->name(),
      'tempat_lahir' => fake()->word(),
      'tanggal_lahir' => fake()->date(),
      'jenis_kelamin' => rand(0, 1) == 1 ? 'l' : 'p',
      'kecamatan_id' => rand(1, 10),
      'kelurahan' => fake()->word(),
      'kode_pos' => fake()->numberBetween(0, 8000),
      'alamat' => fake()->address(),
      'rtrw' => fake()->randomNumber(),
      'no_hp' => fake()->phoneNumber(),
      'email' => fake()->safeEmail(),
      'agama_id' => rand(1, 6),
      'status_perkawinan_id' => rand(1, 4),
      'tinggi_badan' => rand(1, 200),
      'berat_badan' => rand(1, 200),
      'disabilitas' => rand(0, 1),
      'pendidikan_terakhir_id' => rand(1, 10),
      'institusi_pendidikan' => fake()->sentence(),
      'tahun_lulus' => fake()->year(),
      'jurusan' => fake()->sentence(),
      'keterampilan' => fake()->sentence(),
      'pengalaman' => fake()->sentence(),
      'tujuan_lamaran' => fake()->sentence(),
      'pas_foto' => fake()->sentence(),
      'pas_foto_path' => fake()->sentence(),
      'ktp' => fake()->sentence(),
      'ktp_path' => fake()->sentence(),
      'ijazah' => fake()->sentence(),
      'ijazah_path' => fake()->sentence(),
      'sertifikat' => fake()->sentence(),
      'sertifikat_path' => fake()->sentence(),
      'user_id' => rand(1, 10),
      'created_at' => now(),
      'updated_at' => now(),

    ];
  }
}
