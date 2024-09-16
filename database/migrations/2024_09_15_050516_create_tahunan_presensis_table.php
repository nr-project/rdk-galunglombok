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
        Schema::create('tahunan_presensis', function (Blueprint $table) {
            $table->id();
            $table->string('nip')->nullable();
            $table->dateTime('date')->nullable();
            $table->integer('hari_kerja')->nullable();
            $table->integer('hadir_normal')->nullable();
            $table->integer('terlambat')->nullable();
            $table->integer('pulang_cepat')->nullable();
            $table->integer('tanpa_absen')->nullable();
            $table->integer('absen_error')->nullable();
            $table->integer('kehadiran')->nullable();
            $table->integer('absen_sekali')->nullable();
            $table->integer('tanpa_keterangan')->nullable();
            $table->integer('cuti')->nullable();
            $table->integer('ketidakhadiran')->nullable();
            $table->integer('DL')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tahunan_presensis');
    }
};
