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
        Schema::create('jams', function (Blueprint $table) {
            $table->id();
            $table->string('hari'); // e.g., Senin, Selasa, Sabtu
            $table->time('jam_mulai')->nullable(); // e.g., 08:00
            $table->time('jam_selesai')->nullable(); // e.g., 16:00
            $table->string('keterangan')->nullable(); // e.g., "hanya tindakan darurat"
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jams');
    }
};
