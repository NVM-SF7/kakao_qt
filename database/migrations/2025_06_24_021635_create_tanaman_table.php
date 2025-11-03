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
        Schema::create('tanaman', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('code')->nullable();
            $table->date('tanggal_pembibitan');
            $table->date('tanggal_penanaman');
            $table->foreignId('id_klon')->nullable()->constrained('klon')->onDelete('set null');
            $table->foreignId('id_blok_jalur')->nullable()->constrained('blok_jalur')->onDelete('set null');
            $table->foreignId('id_status')->nullable()->constrained('status')->onDelete('set null');
            $table->foreignId('id_kebun')->nullable()->constrained('kebun')->onDelete('set null');
            $table->string('qr_code')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tanaman');
    }
};
