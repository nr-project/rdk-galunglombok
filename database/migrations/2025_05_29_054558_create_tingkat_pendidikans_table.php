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
        Schema::create('tingkat_pendidikans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_rw')->nullable();
            $table->enum('jenis_kelamin', ['Laki-Laki', 'Perempuan'])->nullable();
            $table->integer('tidak_sekolah')->nullable();
            $table->integer('tidak_tamat_sd')->nullable();
            $table->integer('tamat_sd')->nullable();
            $table->integer('tamat_smp')->nullable();
            $table->integer('tamat_sma')->nullable();
            $table->integer('tamat_pt')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tingkat_pendidikans');
    }
};
