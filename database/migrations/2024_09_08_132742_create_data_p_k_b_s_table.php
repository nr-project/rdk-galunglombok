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
        Schema::create('data_p_k_b_s', function (Blueprint $table) {
            $table->id();
            $table->string('nip')->nullable();
            $table->string('nama')->nullable();
            $table->string('nama_gelar')->nullable();
            $table->enum('jenis_kelamin', ['Laki-Laki', 'Perempuan'])->nullable();
            $table->dateTime('ttl')->nullable();
            $table->dateTime('tmt')->nullable();
            $table->dateTime('bup')->nullable();
            $table->enum('status_pegawai', ['ASN Perwakilan', 'PKB'])->nullable();
            $table->enum('jenis_jabatan', ['S', 'FT', 'FU'])->nullable();
            $table->foreignId('id_gol')->nullable();
            $table->foreignId('id_jabatan')->nullable();
            $table->foreignId('id_pendidikan')->nullable();
            $table->enum('jenis_pegawai', ['PNS', 'PPPK'])->nullable();
            $table->foreignId('id_lokasi')->nullable();
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_p_k_b_s');
    }
};
