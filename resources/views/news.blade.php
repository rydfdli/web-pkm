@extends('layout.index')


@section('content')
@vite(['resources/css/news.css'])
<!-- Hero Section -->
<section class="hero-section">
  <div class="container">
    <div class="hero-content text-center fade-in-up">
      <h1 class="hero-title">Berita & Kegiatan</h1>
      <p class="hero-subtitle">{{ $settings->berita_tagline }}</p>
    </div>
  </div>
</section>

<!-- Search & Filter Section -->
<section class="section-padding bg-light-custom">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="search-filter-card">
          <form method="GET" action="{{ route('news') }}" class="row g-3">
            <div class="col-md-6">
              <div class="search-box">
                <input type="text" 
                       class="form-control search-input" 
                       id="searchInput" 
                       name="search"
                       value="{{ request('search') }}"
                       placeholder="Cari berita atau kegiatan...">
                <i class="fas fa-search search-icon"></i>
              </div>
            </div>
            <div class="col-md-4">
              <select class="form-select filter-select" id="categoryFilter" name="kategori">
                <option value="">Semua Kategori</option>
                <option value="pengumuman" {{ request('kategori') == 'pengumuman' ? 'selected' : '' }}>Pengumuman</option>
                <option value="program" {{ request('kategori') == 'program' ? 'selected' : '' }}>Program Kesehatan</option>
                <option value="kegiatan" {{ request('kategori') == 'kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                <option value="edukasi" {{ request('kategori') == 'edukasi' ? 'selected' : '' }}>Edukasi</option>
                <option value="info" {{ request('kategori') == 'info' ? 'selected' : '' }}>Informasi Umum</option>
              </select>
            </div>
            <div class="col-md-2">
              <button type="submit" class="btn btn-primary w-100" id="searchBtn">
                <i class="fas fa-search me-1"></i>Cari
              </button>
            </div>
          </form>
          
          @if(request('search') || request('kategori'))
          <div class="mt-3 text-center">
            <a href="{{ route('news') }}" class="btn btn-outline-secondary btn-sm">
              <i class="fas fa-times me-1"></i>Reset Filter
            </a>
          </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</section>



<!-- Featured News Section -->
@if($featuredNews && !request('search') && !request('kategori'))
<section class="section-padding bg-white">
  <div class="container">
    <h2 class="section-title text-center fade-in-up">Berita Utama</h2>
    <div class="row">
      <div class="col-lg-8 mx-auto">
        <div class="featured-news-card fade-in-up">
          <img src="{{ $featuredNews->image_url  }}" 
               class="featured-news-image" 
               alt="{{ $featuredNews->judul }}" style="width: 100%; max-height: 300px; object-fit: cover;">
          <div class="featured-news-content">
            <div class="news-meta">
              <span class="news-date">
                <i class="fas fa-calendar me-2"></i>{{ $featuredNews->formatted_published_date }}
              </span>
              <span class="news-category category-{{ $featuredNews->kategori }}">
                {{ $featuredNews->category_display }}
              </span>
            </div>
            <h3 class="featured-news-title">{{ $featuredNews->judul }}</h3>
            <p class="featured-news-excerpt">{{ $featuredNews->excerpt }}</p>
            <a href="{{ route('berita.show', $featuredNews->slug) }}" class="btn btn-outline-custom">
              Baca Selengkapnya
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endif

<!-- Latest News Section -->
<section class="section-padding {{ $featuredNews && !request('search') && !request('kategori') ? 'bg-light-custom' : 'bg-white' }}">
  <div class="container">
    <div class="row">
      <div class="col-lg-9">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h2 class="section-title mb-0">
            @if(request('search'))
              Hasil Pencarian: "{{ request('search') }}"
            @elseif(request('kategori'))
              Kategori: {{ 
                match(request('kategori')) {
                  'pengumuman' => 'Pengumuman',
                  'program' => 'Program Kesehatan',
                  'kegiatan' => 'Kegiatan',
                  'edukasi' => 'Edukasi',
                  'info' => 'Informasi Umum',
                  default => 'Berita'
                }
              }}
            @else
              Berita Terbaru
            @endif
          </h2>
          <div class="results-info">
            <span class="text-muted">
              Menampilkan {{ $latestNews->firstItem() ?? 0 }}-{{ $latestNews->lastItem() ?? 0 }} 
              dari {{ $latestNews->total() }} berita
            </span>
          </div>
        </div>
        
        @if($latestNews->count() > 0)
        <div class="row" id="newsContainer">
          @foreach($latestNews as $berita)
          <div class="col-lg-4 col-md-6 mb-4 news-item" 
               data-category="{{ $berita->kategori }}" 
               data-title="{{ $berita->judul }}">
            <div class="news-card fade-in-up">
                <img src="{{ $berita->image_url }}" alt="Gambar Berita" class="img-fluid" style="max-height: 150px; min-width: 100%; object-fit: cover;">
              <div class="card-body">
                <div class="news-meta">
                  <span class="news-date text-sm">
                    <i class="fas fa-calendar me-2"></i>{{ $berita->formatted_published_date }}
                  </span>
                  <span class="news-category category-{{ $berita->kategori }}" style="font-size: 0.6em;">
                    {{ $berita->category_display }}
                  </span>
                </div>
                <h5 class="card-title">{{ $berita->judul }}</h5>
                <p class="card-text">{{ Str::limit($berita->excerpt, 120) }}</p>
                <div class="d-flex justify-content-between align-items-center">
                  <a href="{{ route('berita.show', $berita->slug) }}" class="btn btn-outline-custom btn-sm">
                    Baca Selengkapnya
                  </a>
                  <small class="text-muted">
                    <i class="fas fa-eye me-1"></i>{{ number_format($berita->views_count) }}
                  </small>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
        
        <!-- Pagination -->
        @if($latestNews->hasPages())
        <nav aria-label="News pagination" class="mt-5">
          {{ $latestNews->onEachSide(2)->links('pagination::bootstrap-4') }}
        </nav>
        @endif
        
        @else
        <!-- No Results Message -->
        <div id="noResults" class="text-center py-5">
          <div class="no-results-content">
            <i class="fas fa-search fa-3x text-muted mb-3"></i>
            <h4 class="text-muted">Tidak ada hasil ditemukan</h4>
            <p class="text-muted">
              @if(request('search'))
                Tidak ada berita yang cocok dengan pencarian "{{ request('search') }}"
              @elseif(request('kategori'))
                Tidak ada berita dalam kategori ini
              @else
                Belum ada berita yang dipublikasikan
              @endif
            </p>
            <a href="{{ route('news') }}" class="btn btn-outline-primary">
              <i class="fas fa-arrow-left me-1"></i>Kembali ke Semua Berita
            </a>
          </div>
        </div>
        @endif
      </div>
      
      <!-- Sidebar -->
      <div class="col-lg-3">
        <div class="sidebar-widget">
          <h4 class="widget-title">Kategori Berita</h4>
          <ul class="category-list">
            <li>
              <a href="{{ route('news', ['kategori' => 'pengumuman']) }}" 
                 class="d-flex justify-content-between {{ request('kategori') == 'pengumuman' ? 'active' : '' }}">
                <span>Pengumuman</span> 
                <span class="badge bg-primary">{{ $categoryCounts['pengumuman'] ?? 0 }}</span>
              </a>
            </li>
            <li>
              <a href="{{ route('news', ['kategori' => 'program']) }}" 
                 class="d-flex justify-content-between {{ request('kategori') == 'program' ? 'active' : '' }}">
                <span>Program Kesehatan</span> 
                <span class="badge bg-primary">{{ $categoryCounts['program'] ?? 0 }}</span>
              </a>
            </li>
            <li>
              <a href="{{ route('news', ['kategori' => 'kegiatan']) }}" 
                 class="d-flex justify-content-between {{ request('kategori') == 'kegiatan' ? 'active' : '' }}">
                <span>Kegiatan</span> 
                <span class="badge bg-primary">{{ $categoryCounts['kegiatan'] ?? 0 }}</span>
              </a>
            </li>
            <li>
              <a href="{{ route('news', ['kategori' => 'edukasi']) }}" 
                 class="d-flex justify-content-between {{ request('kategori') == 'edukasi' ? 'active' : '' }}">
                <span>Edukasi</span> 
                <span class="badge bg-primary">{{ $categoryCounts['edukasi'] ?? 0 }}</span>
              </a>
            </li>
            <li>
              <a href="{{ route('news', ['kategori' => 'info']) }}" 
                 class="d-flex justify-content-between {{ request('kategori') == 'info' ? 'active' : '' }}">
                <span>Informasi Umum</span> 
                <span class="badge bg-primary">{{ $categoryCounts['info'] ?? 0 }}</span>
              </a>
            </li>
          </ul>
        </div>
        
        @if($popularNews->count() > 0)
        <div class="sidebar-widget">
          <h4 class="widget-title">Berita Populer</h4>
          <div class="popular-news">
            @foreach($popularNews as $popular)
            <div class="popular-item">
              <img src="{{ $popular->image_url }}" alt="{{ $popular->judul }}">
              <div class="popular-content">
                <h6>
                  <a href="{{ route('berita.show', $popular->slug) }}">
                    {{ Str::limit($popular->judul, 60) }}
                  </a>
                </h6>
                <small class="text-muted">
                  {{ $popular->formatted_published_date }} • 
                  {{ number_format($popular->views_count) }} views
                </small>
              </div>
            </div>
            @endforeach
          </div>
        </div>
        @endif
      </div>
    </div>
  </div>
</section>

@endsection
