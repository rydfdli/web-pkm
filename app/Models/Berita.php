<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Berita extends Model
{
    protected $guarded = [
        'id'
    ];

    // No casts needed for simple model

    protected static function booted()
    {
        static::creating(function ($berita) {
            // Hanya generate slug jika belum ada (biar Filament bisa override)
            if (empty($berita->slug)) {
                $berita->slug = static::generateUniqueSlug($berita->judul);
            }
            
            // Set user_id otomatis jika belum ada
            if (empty($berita->user_id) && auth()->check()) {
                $berita->user_id = auth()->id();
            }
        });

        static::updating(function ($berita) {
            // Regenerate slug jika judul berubah DAN slug masih default
            if ($berita->isDirty('judul') && !$berita->isDirty('slug')) {
                $originalSlug = Str::slug($berita->getOriginal('judul'));
                if ($berita->slug === $originalSlug) {
                    $berita->slug = static::generateUniqueSlug($berita->judul, $berita->id);
                }
            }
        });
    }

    /**
     * Generate unique slug
     */
    protected static function generateUniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $baseSlug = Str::slug($title);
        $slug = $baseSlug;
        $counter = 1;

        while (static::where('slug', $slug)
            ->when($ignoreId, fn($query) => $query->where('id', '!=', $ignoreId))
            ->exists()) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }

    /**
     * Relasi ke User (penulis)
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope untuk berita berdasarkan status
     */
    public function scopeByStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    /**
     * Scope untuk berita draft
     */
    public function scopeDraft($query)
    {
        return $query->where('status', 'draft');
    }

    /**
     * Accessor untuk URL berita
     */
    public function getUrlAttribute(): string
    {
        return route('berita.show', $this->slug);
    }

    /**
     * Accessor untuk excerpt/ringkasan
     */
    public function getExcerptAttribute(): string
    {
        return Str::limit(strip_tags($this->isi), 150);
    }

    /**
     * Accessor untuk featured image URL
     */
    public function getFeaturedImageAttribute(): ?string
    {
        if ($this->gambar) {
            return asset('storage/' . $this->gambar);
        }
        
        // Extract first image from rich editor content
        preg_match('/<img[^>]+src="([^"]+)"/', $this->isi, $matches);
        return $matches[1] ?? null;
    }
}