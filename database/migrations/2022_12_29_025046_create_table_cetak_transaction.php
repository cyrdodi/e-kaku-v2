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
    Schema::create('cetak_transaction', function (Blueprint $table) {
      $table->id();
      // $table->string('no_pendaftaran')->unique();
      $table->foreignId('biodata_id')->constrained('biodata');
      $table->foreignId('user_id')->constrained('users');
      $table->foreignId('functionary_id')->constrained('functionaries');
      $table->date('expired');
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
    Schema::dropIfExists('cetak_transaction');
  }
};
