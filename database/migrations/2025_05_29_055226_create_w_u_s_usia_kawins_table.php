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
        Schema::create('w_u_s_usia_kawins', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_rw')->nullable();
            $table->integer('dibawah_20')->nullable();
            $table->integer('diatas_20')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('w_u_s_usia_kawins');
    }
};
