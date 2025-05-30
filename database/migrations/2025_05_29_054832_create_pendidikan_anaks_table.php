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
        Schema::create('pendidikan_anaks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_rw')->nullable();
            $table->enum('klasifikasi_umur', ['7_12', '13_15', '16_18', '19_24'])->nullable();
            $table->integer('sekolah_lk')->nullable();
            $table->integer('tidak_sekolah_lk')->nullable();
            $table->integer('sekolah_pr')->nullable();
            $table->integer('tidak_sekolah_pr')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendidikan_anaks');
    }
};
