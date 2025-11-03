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
        Schema::create('taksasi', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->integer('pentil')->default(0);
            $table->integer('buah_muda')->default(0);
            $table->integer('buah_mengkal')->default(0);
            $table->integer('buah_masak')->default(0);
            $table->foreignId('id_tanaman')->constrained('tanaman')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('taksasi');
    }
};
