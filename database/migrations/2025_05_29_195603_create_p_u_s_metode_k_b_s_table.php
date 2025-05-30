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
        Schema::create('p_u_s_metode_k_b_s', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_rw')->constrained('nama_r_w_s')->onDelete('cascade');

            $table->integer('jumlah_pus_modern')->default(0);
            $table->integer('mow')->default(0);
            $table->integer('mop')->default(0);
            $table->integer('iud')->default(0);
            $table->integer('implan')->default(0);
            $table->integer('suntik')->default(0);
            $table->integer('pil')->default(0);
            $table->integer('kondom')->default(0);
            $table->integer('mal')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('p_u_s_metode_k_b_s');
    }
};
