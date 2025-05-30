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
        Schema::create('p_u_s_alasan_tidak_k_b_s', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_rw')->constrained('nama_r_w_s')->onDelete('cascade');

            $table->integer('jumlah_pus_bukan_peserta_kb')->default(0);
            $table->integer('ingin_hamil_anak')->default(0);
            $table->integer('tidak_tahu_tentang_kb')->default(0);
            $table->integer('alasan_kesehatan')->default(0);
            $table->integer('efek_samping_kegagalan_kb')->default(0);
            $table->integer('tempat_pelayanan_jauh')->default(0);
            $table->integer('alat_obat_cara_kb_tidak_tersedia')->default(0);
            $table->integer('biaya_mahal')->default(0);
            $table->integer('tidak_ada_alat_cara_kb_yang_cocok')->default(0);
            $table->integer('suami_keluarga_menolak')->default(0);
            $table->integer('alasan_agama')->default(0);
            $table->integer('tidak_ada_petugas_pelayanan_kb')->default(0);
            $table->integer('baru_melahirkan')->default(0);
            $table->integer('jarang_melakukan_hubungan_suami_istri')->default(0);
            $table->integer('infertilitas_menopause')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('p_u_s_alasan_tidak_k_b_s');
    }
};
