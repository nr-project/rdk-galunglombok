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
        Schema::create('p_u_s_kesertaan_k_b_s', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_rw')->constrained('nama_r_w_s')->onDelete('cascade');

            $table->integer('jumlah_pus')->default(0);
            $table->integer('pus_peserta_kb_modern')->default(0);
            $table->integer('pus_peserta_kb_tradisional')->default(0);
            $table->integer('jumlah_pus_peserta_kb')->default(0);
            $table->integer('pus_bukan_peserta_kb')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('p_u_s_kesertaan_k_b_s');
    }
};
