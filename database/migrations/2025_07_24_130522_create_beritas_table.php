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
        Schema::create('beritas', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('slug')->unique();
            $table->text('excerpt')->nullable(); // For featured news excerpt
            $table->longText('isi'); // Changed to longText for longer content
            $table->string('gambar')->nullable();
            $table->enum('kategori', ['pengumuman', 'program', 'kegiatan', 'edukasi', 'info']); // Categories
            $table->boolean('is_featured')->default(false); // For featured news
            $table->boolean('is_published')->default(true); // Publication status
            $table->integer('views_count')->default(0); // For popular news
            $table->string('meta_description')->nullable(); // SEO
            $table->json('tags')->nullable(); // Tags for better categorization
            $table->timestamp('published_at')->nullable(); // Custom publish date
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
            
            // Indexes for better performance
            $table->index(['kategori', 'is_published']);
            $table->index(['is_featured', 'published_at']);
            $table->index('views_count');
            $table->index('slug');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beritas');
    }
};