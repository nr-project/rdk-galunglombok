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
        Schema::create('harian_disiplins', function (Blueprint $table) {
            $table->id();
            $table->string('nip')->nullable();
            $table->dateTime('date')->nullable();
            $table->integer('telat_menit')->nullable();
            $table->integer('pc_menit')->nullable();
            $table->integer('a1_menit')->nullable();
            $table->integer('tk_hari')->nullable();
            $table->integer('telat_sanggah')->nullable();
            $table->integer('pc_sanggah')->nullable();
            $table->integer('total')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('harian_disiplins');
    }
};
