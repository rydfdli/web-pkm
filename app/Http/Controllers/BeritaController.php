<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class BeritaController extends Controller
{
    // Constants untuk kategori dan konfigurasi
    private const CATEGORIES = ['pengumuman', 'program', 'kegiatan', 'edukasi', 'info'];
    private const ITEMS_PER_PAGE = 9;
    private const POPULAR_NEWS_LIMIT = 3;
    private const RELATED_NEWS_LIMIT = 3;
    private const CACHE_TTL = 3600; // 1 hour
    
    public function index(Request $request)
    {
        
        // Validasi input
        $validated = $request->validate([
            'search' => 'nullable|string|max:255',
            'kategori' => 'nullable|string|in:' . implode(',', self::CATEGORIES),
            'page' => 'nullable|integer|min:1'
        ]);
        
        // Base query untuk berita published
        $query = Berita::published()->with(['user:id,name']);
        
        // Search functionality dengan sanitasi
        if (!empty($validated['search'])) {
            $search = trim($validated['search']);
            $query->where(function($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                  ->orWhere('excerpt', 'like', "%{$search}%")
                  ->orWhere('isi', 'like', "%{$search}%");
            });
        }
        
        // Category filter
        if (!empty($validated['kategori'])) {
            $query->where('kategori', $validated['kategori']);
        }
        
        // Get featured news dengan caching
        $featuredNews = Cache::remember('featured_news', self::CACHE_TTL, function() {
            return Berita::published()
                ->featured()
                ->with(['user:id,name'])
                ->latest('published_at')
                ->first();
        });
        
        // Get latest news dengan exclude featured news
        $latestNews = $query
            ->when($featuredNews, function($q) use ($featuredNews) {
                return $q->where('id', '!=', $featuredNews->id);
            })
            ->latest('published_at')
            ->paginate(self::ITEMS_PER_PAGE)
            ->withQueryString();
        
        // Get popular news untuk sidebar dengan caching
        $popularNews = Cache::remember('popular_news', self::CACHE_TTL, function() {
            return Berita::published()
                ->popular()
                ->with(['user:id,name'])
                ->take(self::POPULAR_NEWS_LIMIT)
                ->get();
        });
        
        // Get category counts dengan caching dan query optimization
        $categoryCounts = Cache::remember('category_counts', self::CACHE_TTL, function() {
            $counts = Berita::published()
                ->select('kategori', DB::raw('COUNT(*) as count'))
                ->groupBy('kategori')
                ->pluck('count', 'kategori')
                ->toArray();
            
            // Ensure all categories have counts
            return array_merge(
                array_fill_keys(self::CATEGORIES, 0),
                $counts
            );
        });
        

        $layanans = Layanan::all()->sortBy('urutan');
        $kontak = \App\Models\Kontak::first();
        $settings = \App\Models\Setting::first();

        return view('news', compact(
            'featuredNews',
            'latestNews', 
            'popularNews',
            'categoryCounts',
            'kontak',
            'layanans',
            'settings',
        ));
    }
    
    public function show(Berita $berita)
    {
        // dd('hello', $berita->judul); // Debugging line, remove in production
        // Check jika berita published menggunakan gate/policy lebih baik
        if (!$this->isBeritaAccessible($berita)) {
            abort(404);
        }
        
        // Load relasi yang dibutuhkan
        $berita->load(['user:id,name']);
        
        // Increment view count secara async atau queue
        $this->incrementViewCount($berita);
        
        // Get related news dengan caching per kategori
        $relatedNews = Cache::remember(
            "related_news_{$berita->kategori}_{$berita->id}", 
            self::CACHE_TTL, 
            function() use ($berita) {
                return Berita::published()
                    ->where('kategori', $berita->kategori)
                    ->where('id', '!=', $berita->id)
                    ->with(['user:id,name'])
                    ->latest('published_at')
                    ->take(self::RELATED_NEWS_LIMIT)
                    ->get();
            }
        );
        
        $layanans = Layanan::all()->sortBy('urutan');
        $kontak = \App\Models\Kontak::first();
        $settings = \App\Models\Setting::first();
        // dd('hello',$berita->judul, $relatedNews); // Debugging line, remove in production,
        return view('berita-detail', compact('berita', 'relatedNews', 'kontak', 'layanans', 'settings'));
    }
    
    /**
     * Check if berita is accessible to public
     */
    private function isBeritaAccessible(Berita $berita): bool
    {
        return $berita->is_published && 
               $berita->published_at && 
               $berita->published_at <= now();
    }
    
    /**
     * Increment view count (bisa dijadikan job untuk performa)
     */
    private function incrementViewCount(Berita $berita): void
    {
        // Gunakan increment untuk atomic operation
        $berita->increment('views_count');
        
        // Atau bisa dispatch job untuk async processing
        // IncrementViewJob::dispatch($berita);
        
        // Clear related cache jika ada
        Cache::forget('popular_news');
    }
    
    /**
     * Clear related caches when needed
     */
    public function clearCache(): void
    {
        Cache::forget('featured_news');
        Cache::forget('popular_news');
        Cache::forget('category_counts');
        
        // Clear related news cache untuk semua kategori
        foreach (self::CATEGORIES as $category) {
            Cache::tags(['related_news', $category])->flush();
        }
    }
}