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
        Schema::create('p_u_s_balitas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_rw')->constrained('nama_r_w_s')->onDelete('cascade');
            $table->integer('jumlah_pus_dan_anak_terkecil_6bln')->default(0);
            $table->integer('jumlah_pus_punya_balita')->default(0);

            for ($year = 0; $year <= 4; $year++) {
                $table->integer("peserta_kb_modern_{$year}thn")->default(0);
                $table->integer("peserta_kb_tradisional_{$year}thn")->default(0);
                $table->integer("bukan_peserta_kb_{$year}thn")->default(0);
            }

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('p_u_s_balitas');
    }
};
