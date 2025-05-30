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
        Schema::create('kesertaan_poktans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_rw')->nullable();
            $table->enum('poktan', ['BKB', 'BKR', 'BKL', 'UPPKS'])->nullable();
            $table->integer('total_keluarga')->nullable();
            $table->integer('total_ikut')->nullable();
            $table->integer('bukan_pus')->nullable();
            $table->integer('mow')->nullable();
            $table->integer('mop')->nullable();
            $table->integer('iud')->nullable();
            $table->integer('implan')->nullable();
            $table->integer('suntik')->nullable();
            $table->integer('pil')->nullable();
            $table->integer('kondom')->nullable();
            $table->integer('mal')->nullable();
            $table->integer('tradisional')->nullable();
            $table->integer('tidak_kb')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kesertaan_poktans');
    }
};
