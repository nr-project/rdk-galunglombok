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
        Schema::create('informasi_k_b_s', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_rw')->constrained('nama_r_w_s')->onDelete('cascade');
            $table->integer('jumlah_pus_peserta_kb_dan_pernah_kb')->default(0);
            $table->integer('jenis_alat_obat_cara_kb_kontrasepsi')->default(0);
            $table->integer('efek_samping_alat_obat_cara_kb_kontrasepsi')->default(0);
            $table->integer('apa_yang_harus_dilakukan_jika_efek_samping')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informasi_k_b_s');
    }
};
