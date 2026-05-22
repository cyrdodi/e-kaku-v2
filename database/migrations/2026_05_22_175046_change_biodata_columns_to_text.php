<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('biodata', function (Blueprint $table) {
            $table->text('nik')->change();
            $table->text('no_hp')->change();
            $table->text('email')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('biodata', function (Blueprint $table) {
            $table->string('nik')->change();
            $table->string('no_hp')->change();
            $table->string('email')->change();
        });
    }
};
