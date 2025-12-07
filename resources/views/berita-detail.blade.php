{{-- @dd('hello', $berita->judul) -- IGNORE --}}
@extends('layout.index')


@section('content')
{{-- @vite(['resources/css/detail.css', 'resources/css/news.css']) --}}

{{-- Breadcrumb Section --}}

<!-- Breadcrumb Section -->
<section class="breadcrumb-section">
  <div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
        <li class="breadcrumb-item"><a href="{{ route('news') }}">Berita & Kegiatan</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ Str::limit($berita->judul, 50) }}</li>
      </ol>
    </nav>
  </div>
</section>

<!-- Article Content -->
<section class="section-padding bg-white">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <article class="news-detail-card fade-in-up">
          <!-- Article Header -->
          <div class="article-header">
            <div class="news-meta mb-3">
              <span class="news-date me-3">
                <i class="fas fa-calendar me-2"></i>{{ $berita->formatted_published_date }}
              </span>
              <span class="news-category category-{{ $berita->kategori }}">
                {{ $berita->category_display }}
              </span>
              <span class="news-views ms-3">
                <i class="fas fa-eye me-2"></i>{{ number_format($berita->views_count) }} views
              </span>
            </div>
            <h1 class="article-title">{{ $berita->judul }}</h1>
            <div class="article-meta">
              <small class="text-muted">
                <i class="fas fa-user me-2"></i>
                @if($berita->user)
                  {{ $berita->user->name }}
                @else
                  Puskesmas Sehat Sentosa
                @endif
              </small>
            </div>
          </div>

          <!-- Featured Image -->
          <div class="article-image mb-4">
            <img src="{{ $berita->image_url }}" 
                 class="img-fluid rounded" 
                 alt="{{ $berita->judul }}">
          </div>

          <!-- Article Content -->
          <div class="article-content">
            <div class="content-body">
              {!! $berita->isi !!}
            </div>
          </div>

          <!-- Article Tags -->
          @if($berita->tags && is_array($berita->tags) && count($berita->tags) > 0)
          <div class="article-tags mt-4">
            <h6><i class="fas fa-tags me-2"></i>Tags:</h6>
            <div class="tags-list">
              @foreach($berita->tags as $tag)
              <span class="badge bg-light text-dark me-2 mb-2">{{ $tag }}</span>
              @endforeach
            </div>
          </div>
          @endif

          <!-- Share Buttons -->
          <div class="article-share mt-4 pt-4 border-top">
            <h6><i class="fas fa-share-alt me-2"></i>Bagikan:</h6>
            <div class="share-buttons">
              <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" 
                 target="_blank" 
                 class="btn btn-outline-primary btn-sm me-2">
                <i class="fab fa-facebook-f me-1"></i>Facebook
              </a>
              <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($berita->judul) }}" 
                 target="_blank" 
                 class="btn btn-outline-info btn-sm me-2">
                <i class="fab fa-twitter me-1"></i>Twitter
              </a>
              <a href="https://wa.me/?text={{ urlencode($berita->judul . ' - ' . request()->fullUrl()) }}" 
                 target="_blank" 
                 class="btn btn-outline-success btn-sm me-2">
                <i class="fab fa-whatsapp me-1"></i>WhatsApp
              </a>
              <button onclick="copyToClipboard('{{ request()->fullUrl() }}')" 
                      class="btn btn-outline-secondary btn-sm">
                <i class="fas fa-copy me-1"></i>Copy Link
              </button>
            </div>
          </div>

          <!-- Navigation to Previous/Next - Removed since not provided by controller -->
        </article>
      </div>

      <!-- Sidebar -->
      <div class="col-lg-4">
        <!-- Back to News -->
        <div class="sidebar-widget">
          <a href="{{ route('news') }}" class="btn btn-outline-primary w-100 mb-4">
            <i class="fas fa-arrow-left me-2"></i>Kembali ke Berita
          </a>
        </div>

        <!-- Related News -->
        @if($relatedNews && $relatedNews->count() > 0)
        <div class="sidebar-widget">
          <h4 class="widget-title">Berita Terkait</h4>
          <div class="related-news">
            @foreach($relatedNews as $related)
            <div class="related-item">
              <img src="{{ $related->image_url }}" alt="{{ $related->judul }}">
              <div class="related-content">
                <h6>
                  <a href="{{ route('berita.show', $related) }}">
                    {{ Str::limit($related->judul, 80) }}
                  </a>
                </h6>
                <small class="text-muted">
                  {{ $related->formatted_published_date }}
                </small>
              </div>
            </div>
            @endforeach
          </div>
        </div>
        @endif

        <!-- Categories -->
        <div class="sidebar-widget">
          <h4 class="widget-title">Kategori Berita</h4>
          <ul class="category-list">
            <li>
              <a href="{{ route('news', ['kategori' => 'pengumuman']) }}" 
                 class="d-flex justify-content-between">
                <span>Pengumuman</span> 
                <span class="badge bg-primary">{{ $categoryCounts['pengumuman'] ?? 0 }}</span>
              </a>
            </li>
            <li>
              <a href="{{ route('news', ['kategori' => 'program']) }}" 
                 class="d-flex justify-content-between">
                <span>Program Kesehatan</span> 
                <span class="badge bg-primary">{{ $categoryCounts['program'] ?? 0 }}</span>
              </a>
            </li>
            <li>
              <a href="{{ route('news', ['kategori' => 'kegiatan']) }}" 
                 class="d-flex justify-content-between">
                <span>Kegiatan</span> 
                <span class="badge bg-primary">{{ $categoryCounts['kegiatan'] ?? 0 }}</span>
              </a>
            </li>
            <li>
              <a href="{{ route('news', ['kategori' => 'edukasi']) }}" 
                 class="d-flex justify-content-between">
                <span>Edukasi</span> 
                <span class="badge bg-primary">{{ $categoryCounts['edukasi'] ?? 0 }}</span>
              </a>
            </li>
            <li>
              <a href="{{ route('news', ['kategori' => 'info']) }}" 
                 class="d-flex justify-content-between">
                <span>Informasi Umum</span> 
                <span class="badge bg-primary">{{ $categoryCounts['info'] ?? 0 }}</span>
              </a>
            </li>
          </ul>  
        </div>
      </div>
    </div>
  </div>
</section>

<script>
function copyToClipboard(text) {
  navigator.clipboard.writeText(text).then(function() {
    // Show success message
    const btn = event.target.closest('button');
    const originalText = btn.innerHTML;
    btn.innerHTML = '<i class="fas fa-check me-1"></i>Tersalin!';
    btn.classList.remove('btn-outline-secondary');
    btn.classList.add('btn-success');
    
    setTimeout(() => {
      btn.innerHTML = originalText;
      btn.classList.remove('btn-success');
      btn.classList.add('btn-outline-secondary');
    }, 2000);
  }).catch(function(err) {
    console.error('Error copying text: ', err);
  });
}

// Track article view (you can implement this in your controller)
document.addEventListener('DOMContentLoaded', function() {
  // Optional: Track reading time or scroll depth
  let startTime = Date.now();
  
  window.addEventListener('beforeunload', function() {
    let readingTime = Math.round((Date.now() - startTime) / 1000);
    // You can send this data to your analytics endpoint
  });
});
</script>

@endsection