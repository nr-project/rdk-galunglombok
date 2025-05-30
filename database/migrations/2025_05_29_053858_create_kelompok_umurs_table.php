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
        Schema::create('kelompok_umurs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_rw')->nullable();
            $table->enum('jenis_kelamin', ['Laki-Laki', 'Perempuan'])->nullable();
            $table->integer('umur_0_1')->nullable();
            $table->integer('umur_2_4')->nullable();
            $table->integer('umur_5_9')->nullable();
            $table->integer('umur_10_14')->nullable();
            $table->integer('umur_15_19')->nullable();
            $table->integer('umur_20_24')->nullable();
            $table->integer('umur_25_29')->nullable();
            $table->integer('umur_30_34')->nullable();
            $table->integer('umur_35_39')->nullable();
            $table->integer('umur_40_44')->nullable();
            $table->integer('umur_45_49')->nullable();
            $table->integer('umur_50_54')->nullable();
            $table->integer('umur_55_59')->nullable();
            $table->integer('umur_60_64')->nullable();
            $table->integer('umur_65_69')->nullable();
            $table->integer('umur_70_74')->nullable();
            $table->integer('umur_75')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelompok_umurs');
    }
};
