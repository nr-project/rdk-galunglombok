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
        Schema::create('hamil4_t_s', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_rw')->constrained('nama_r_w_s')->onDelete('cascade');

            $table->integer('jumlah_pus_status_hamil')->default(0);

            $table->integer('umur_kurang_20')->default(0);
            $table->integer('umur_20_35')->default(0);
            $table->integer('umur_lebih_35')->default(0);

            $table->integer('jumlah_anak_lahir_lebih_2')->default(0);
            $table->integer('jarak_kelahiran_sebelumnya_kurang_2_tahun')->default(0);
            $table->integer('umur_anak_terkecil_kurang_3_tahun')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hamil4_t_s');
    }
};
