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
        Schema::create('p_u_s_tempat_k_b_s', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_rw')->constrained('nama_r_w_s')->onDelete('cascade');
            $table->integer('jumlah_pus_modern')->default(0);
            $table->integer('rs_pemerintah_tni_polri')->default(0);
            $table->integer('rs_swasta')->default(0);
            $table->integer('puskesmas_klinik_tni_polri')->default(0);
            $table->integer('klinik_swasta')->default(0);
            $table->integer('praktek_dokter')->default(0);
            $table->integer('pustu_pusling_bidan_desa')->default(0);
            $table->integer('praktek_mandiri_bidan')->default(0);
            $table->integer('mobil_pelayanan_kb')->default(0);
            $table->integer('toko_obat_apotik')->default(0);
            $table->integer('lainnya')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('p_u_s_tempat_k_b_s');
    }
};
