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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('hero_image')->nullable();
            $table->string('wellcome_text')->nullable();
            $table->string('wellcome_subtext')->nullable();
            $table->string('visi_misi_tagline')->nullable();
            $table->string('struktur_tagline')->nullable();
            $table->string('layanan_tagline')->nullable();
            $table->string('kontak_tagline')->nullable();
            $table->string('berita_tagline')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
