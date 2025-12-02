<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;
use Carbon\Carbon;

class Berita extends Model
{
    protected $fillable = [
        'judul',
        'slug',
        'excerpt',
        'isi',
        'gambar',
        'kategori',
        'is_featured',
        'is_published',
        'views_count',
        'meta_description',
        'tags',
        'published_at',
        'user_id'
    ];

    protected $casts = [
        'tags' => 'array',
        'is_featured' => 'boolean',
        'is_published' => 'boolean',
        'published_at' => 'datetime',
        'views_count' => 'integer'
    ];

    protected $dates = [
        'published_at',
        'created_at',
        'updated_at'
    ];

    // Auto generate slug when creating
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($berita) {
            if (empty($berita->slug)) {
                $berita->slug = Str::slug($berita->judul);
            }

            if (empty($berita->published_at)) {
                $berita->published_at = now();
            }
        });
    }

    // ========== RELATIONSHIPS ==========

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // ========== SCOPES ==========

    public function scopePublished($query)
    {
        return $query->where('is_published', true)
            ->where('published_at', '<=', now());
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeByCategory($query, $category)
    {
        return $query->where('kategori', $category);
    }

    public function scopePopular($query)
    {
        return $query->orderBy('views_count', 'desc');
    }

    public function scopeLatest($query)
    {
        return $query->orderBy('published_at', 'desc');
    }

    public function scopeSearch($query, $search)
    {
        return $query->where(function ($q) use ($search) {
            $q->where('judul', 'like', "%{$search}%")
                ->orWhere('excerpt', 'like', "%{$search}%")
                ->orWhere('isi', 'like', "%{$search}%");
        });
    }

    // ========== METHODS ==========

    /**
     * Increment view counter
     */
    public function incrementViews()
    {
        $this->increment('views_count');
    }

    /**
     * Get formatted published date
     */
    public function getFormattedPublishedDateAttribute()
    {
        return $this->published_at ? $this->published_at->format('d M Y') : '';
    }

    /**
     * Get category display name
     */
    public function getCategoryDisplayAttribute()
    {
        $categories = [
            'pengumuman' => 'Pengumuman',
            'program' => 'Program Kesehatan',
            'kegiatan' => 'Kegiatan',
            'edukasi' => 'Edukasi',
            'info' => 'Informasi Umum'
        ];

        return $categories[$this->kategori] ?? $this->kategori;
    }

    /**
     * Get excerpt or generate from content
     */
    public function getExcerptAttribute($value)
    {
        if ($value) {
            return $value;
        }

        // Generate excerpt from isi if not provided
        return Str::limit(strip_tags($this->isi), 150);
    }

    /**
     * Get image URL with fallback
     */
    public function getImageUrlAttribute()
    {
        // Jika ada gambar, tampilkan dari storage
        if (!empty($this->gambar)) {
            return asset('storage/' . ltrim($this->gambar, '/'));
        }

        // Placeholder default berdasarkan kategori
        $placeholders = [
            'pengumuman' => 'https://images.unsplash.com/photo-1584515933487-779824d29309?w=400&h=250&fit=crop',
            'program'    => 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1f?w=400&h=250&fit=crop',
            'kegiatan'   => 'https://images.unsplash.com/photo-1609840114035-3c981b782dfe?w=400&h=250&fit=crop',
            'edukasi'    => 'https://images.unsplash.com/photo-1559757148-5c350d0d3c56?w=400&h=250&fit=crop',
            'info'       => 'https://images.unsplash.com/photo-1666214280557-f1b5022eb634?w=400&h=250&fit=crop',
        ];

        // Kembalikan placeholder berdasarkan kategori, atau default 'info' jika kategori tidak dikenali
        $kategori = strtolower($this->kategori ?? 'info');
        return $placeholders[$kategori] ?? $placeholders['info'];
    }


    /**
     * Get route key name for URL binding
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Get meta description or generate from excerpt
     */
    public function getMetaDescriptionAttribute($value)
    {
        if ($value) {
            return $value;
        }

        return Str::limit($this->excerpt, 160);
    }
}
