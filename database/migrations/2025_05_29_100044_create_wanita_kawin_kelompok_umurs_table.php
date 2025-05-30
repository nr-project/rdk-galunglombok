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
        Schema::create('wanita_kawin_kelompok_umurs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_rw')->constrained('nama_r_w_s')->onDelete('cascade');
            $table->integer('jumlah_wanita_kawin')->default(0);
            $table->integer('umur_10_14')->default(0);
            $table->integer('umur_15_19')->default(0);
            $table->integer('umur_20_24')->default(0);
            $table->integer('umur_25_29')->default(0);
            $table->integer('umur_30_34')->default(0);
            $table->integer('umur_35_39')->default(0);
            $table->integer('umur_40_44')->default(0);
            $table->integer('umur_45_49')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wanita_kawin_kelompok_umurs');
    }
};
