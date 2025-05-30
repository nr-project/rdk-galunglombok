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
        Schema::create('keinginan_hamils', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_rw')->constrained('nama_r_w_s')->onDelete('cascade');

            $table->integer('jumlah_pus_status_hamil')->default(0);
            $table->integer('ingin_hamil_saat_itu')->default(0);
            $table->integer('ingin_hamil_nantikedepan')->default(0);
            $table->integer('tidak_ingin_anak_lagi')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keinginan_hamils');
    }
};
