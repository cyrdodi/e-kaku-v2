<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('biodata', function (Blueprint $table) {
      $table->id();
      $table->string('no_pendaftaran')->unique();
      $table->string('nik');
      $table->string('name');
      $table->string('tempat_lahir');
      $table->date('tanggal_lahir');
      $table->enum('jenis_kelamin', ['l', 'p']);
      $table->string('provinsi')->default('BANTEN');
      $table->string('kabupaten')->default('PANDEGLANG');
      $table->foreignId('kecamatan_id')->constrained('kecamatan');
      $table->string('kelurahan');
      $table->string('kode_pos');
      $table->text('alamat');
      $table->string('rtrw');
      $table->string('no_hp');
      $table->string('email');
      $table->foreignId('agama_id')->constrained('agama');
      $table->foreignId('status_perkawinan_id')->constrained('status_perkawinan');
      $table->integer('tinggi_badan');
      $table->integer('berat_badan');
      $table->boolean('disabilitas');
      $table->foreignId('pendidikan_terakhir_id')->constrained('pendidikan_terakhir');
      $table->string('institusi_pendidikan');
      $table->integer('tahun_lulus');
      $table->string('jurusan');
      $table->text('keterampilan')->nullable();
      $table->text('pengalaman')->nullable();
      $table->string('tujuan_lamaran')->nullable();
      $table->string('pas_foto');
      $table->string('pas_foto_path');
      $table->string('ktp');
      $table->string('ktp_path');
      $table->string('ijazah');
      $table->string('ijazah_path');
      $table->string('sertifikat')->nullable();
      $table->string('sertifikat_path')->nullable();
      $table->foreignId('user_id')->constrained('users');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('biodata');
  }
};
