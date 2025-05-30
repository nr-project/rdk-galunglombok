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
        Schema::create('jenis_pekerjaans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_rw')->constrained('nama_r_w_s')->onDelete('cascade');
            $table->integer('jumlah_individu_dalam_keluarga')->default(0);
            $table->integer('petani_jumlah')->default(0);
            $table->integer('nelayan_jumlah')->default(0);
            $table->integer('pedagang_jumlah')->default(0);
            $table->integer('pejabat_negara_jumlah')->default(0);
            $table->integer('pns_tni_polri_jumlah')->default(0);
            $table->integer('swasta_jumlah')->default(0);
            $table->integer('pensiunan_jumlah')->default(0);
            $table->integer('pekerja_lepas_jumlah')->default(0);
            $table->integer('jumlah_bekerja')->default(0);
            $table->integer('tidak_bekerja_jumlah')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_pekerjaans');
    }
};
