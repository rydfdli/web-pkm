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
        Schema::create('layanans', function (Blueprint $table) {
            $table->id();
            $table->string('judul_layanan');
            $table->text('deskripsi');
            $table->string('icon'); // Font Awesome class
            $table->string('badge_text')->nullable(); // Text untuk badge
            $table->enum('badge_color', ['primary', 'secondary', 'success', 'danger', 'warning', 'info'])->default('primary');
            $table->boolean('is_active')->default(true);
            $table->integer('urutan')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('layanans');
    }
};
