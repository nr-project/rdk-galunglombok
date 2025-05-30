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
        Schema::create('jenis_kegiatans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_rw')->constrained('nama_r_w_s')->onDelete('cascade');
            $table->integer('jumlah_individu_umur_10')->default(0);
            $table->integer('bekerja_umur_10_jumlah')->default(0);

            $table->integer('jumlah_individu_umur_10_14')->default(0);
            $table->integer('bekerja_umur_10_14_jumlah')->default(0);

            $table->integer('jumlah_individu_umur_15')->default(0);
            $table->integer('bekerja_umur_15_laki')->default(0);
            $table->integer('bekerja_umur_15_perempuan')->default(0);

            $table->integer('jumlah_bekerja')->default(0);

            $table->integer('tidak_bekerja_laki')->default(0);
            $table->integer('tidak_bekerja_perempuan')->default(0);
            $table->integer('jumlah_tidak_bekerja')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_kegiatans');
    }
};
