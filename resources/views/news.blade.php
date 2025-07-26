@extends('layout.index')

@section('content')
@vite(['resources/css/news.css', 'resources/js/news.js'])
<!-- Hero Section -->
<section class="hero-section">
  <div class="container">
    <div class="hero-content text-center fade-in-up">
      <h1 class="hero-title">Berita & Kegiatan</h1>
      <p class="hero-subtitle">Informasi Terkini dari Puskesmas Sehat Sentosa</p>
    </div>
  </div>
</section>

<!-- Search & Filter Section -->
<section class="section-padding bg-light-custom">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="search-filter-card">
          <div class="row g-3">
            <div class="col-md-6">
              <div class="search-box">
                <input type="text" class="form-control search-input" id="searchInput" placeholder="Cari berita atau kegiatan...">
                <i class="fas fa-search search-icon"></i>
              </div>
            </div>
            <div class="col-md-4">
              <select class="form-select filter-select" id="categoryFilter">
                <option value="">Semua Kategori</option>
                <option value="pengumuman">Pengumuman</option>
                <option value="program">Program Kesehatan</option>
                <option value="kegiatan">Kegiatan</option>
                <option value="edukasi">Edukasi</option>
                <option value="info">Informasi Umum</option>
              </select>
            </div>
            <div class="col-md-2">
              <button class="btn btn-primary w-100" id="searchBtn">
                <i class="fas fa-search me-1"></i>Cari
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Featured News Section -->
<section class="section-padding bg-white">
  <div class="container">
    <h2 class="section-title text-center fade-in-up">Berita Utama</h2>
    <div class="row">
      <div class="col-lg-8 mx-auto">
        <div class="featured-news-card fade-in-up">
          <img src="https://images.unsplash.com/photo-1584515933487-779824d29309?w=800&h=400&fit=crop" 
               class="featured-news-image" alt="Berita Utama">
          <div class="featured-news-content">
            <div class="news-meta">
              <span class="news-date"><i class="fas fa-calendar me-2"></i>25 Juli 2025</span>
              <span class="news-category">Pengumuman</span>
            </div>
            <h3 class="featured-news-title">Puskesmas Sehat Sentosa Raih Akreditasi Paripurna</h3>
            <p class="featured-news-excerpt">
              Dalam upaya meningkatkan kualitas pelayanan kesehatan, Puskesmas Sehat Sentosa berhasil meraih akreditasi paripurna dari Komisi Akreditasi Fasilitas Kesehatan Tingkat Pertama (KAFKTP). Pencapaian ini menunjukkan komitmen kami dalam memberikan pelayanan kesehatan yang berkualitas dan berstandar nasional.
            </p>
            <a href="#" class="btn btn-outline-custom">Baca Selengkapnya</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Latest News Section -->
<section class="section-padding bg-light-custom">
  <div class="container">
    <div class="row">
      <div class="col-lg-9">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h2 class="section-title mb-0">Berita Terbaru</h2>
          <div class="results-info">
            <span class="text-muted">Menampilkan 1-9 dari 45 berita</span>
          </div>
        </div>
        
        <div class="row" id="newsContainer">
          <!-- News Item 1 -->
          <div class="col-lg-4 col-md-6 mb-4 news-item" data-category="kegiatan" data-title="Kegiatan Posyandu Balita Bulan Juli">
            <div class="news-card fade-in-up">
              <img src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1f?w=400&h=250&fit=crop" 
                   class="card-img-top" alt="Posyandu Balita">
              <div class="card-body">
                <div class="news-meta">
                  <span class="news-date"><i class="fas fa-calendar me-2"></i>22 Juli 2025</span>
                  <span class="news-category category-kegiatan">Kegiatan</span>
                </div>
                <h5 class="card-title">Kegiatan Posyandu Balita Bulan Juli</h5>
                <p class="card-text">Posyandu balita dilaksanakan setiap hari Rabu minggu ke-2 dengan agenda penimbangan, pengukuran, dan edukasi gizi untuk balita.</p>
                <a href="#" class="btn btn-outline-custom btn-sm">Baca Selengkapnya</a>
              </div>
            </div>
          </div>

          <!-- News Item 2 -->
          <div class="col-lg-4 col-md-6 mb-4 news-item" data-category="program" data-title="Program Pemeriksaan Gigi Gratis">
            <div class="news-card fade-in-up">
              <img src="https://images.unsplash.com/photo-1609840114035-3c981b782dfe?w=400&h=250&fit=crop" 
                   class="card-img-top" alt="Pemeriksaan Gigi">
              <div class="card-body">
                <div class="news-meta">
                  <span class="news-date"><i class="fas fa-calendar me-2"></i>20 Juli 2025</span>
                  <span class="news-category category-program">Program</span>
                </div>
                <h5 class="card-title">Program Pemeriksaan Gigi Gratis</h5>
                <p class="card-text">Dalam rangka memperingati Hari Kesehatan Nasional, tersedia layanan pemeriksaan gigi gratis untuk seluruh masyarakat.</p>
                <a href="#" class="btn btn-outline-custom btn-sm">Baca Selengkapnya</a>
              </div>
            </div>
          </div>

          <!-- News Item 3 -->
          <div class="col-lg-4 col-md-6 mb-4 news-item" data-category="edukasi" data-title="Penyuluhan Gizi Seimbang untuk Remaja">
            <div class="news-card fade-in-up">
              <img src="https://images.unsplash.com/photo-1559757148-5c350d0d3c56?w=400&h=250&fit=crop" 
                   class="card-img-top" alt="Penyuluhan Gizi">
              <div class="card-body">
                <div class="news-meta">
                  <span class="news-date"><i class="fas fa-calendar me-2"></i>18 Juli 2025</span>
                  <span class="news-category category-edukasi">Edukasi</span>
                </div>
                <h5 class="card-title">Penyuluhan Gizi Seimbang untuk Remaja</h5>
                <p class="card-text">Program edukasi gizi seimbang untuk pelajar SMP dan SMA guna mendukung pertumbuhan dan perkembangan optimal.</p>
                <a href="#" class="btn btn-outline-custom btn-sm">Baca Selengkapnya</a>
              </div>
            </div>
          </div>

          <!-- News Item 4 -->
          <div class="col-lg-4 col-md-6 mb-4 news-item" data-category="program" data-title="Update Program Vaksinasi COVID-19">
            <div class="news-card fade-in-up">
              <img src="https://images.unsplash.com/photo-1666214280557-f1b5022eb634?w=400&h=250&fit=crop" 
                   class="card-img-top" alt="Vaksinasi">
              <div class="card-body">
                <div class="news-meta">
                  <span class="news-date"><i class="fas fa-calendar me-2"></i>15 Juli 2025</span>
                  <span class="news-category category-program">Program</span>
                </div>
                <h5 class="card-title">Update Program Vaksinasi COVID-19</h5>
                <p class="card-text">Tersedia vaksin booster COVID-19 untuk semua kelompok usia. Daftar melalui aplikasi PeduliLindungi atau datang langsung.</p>
                <a href="#" class="btn btn-outline-custom btn-sm">Baca Selengkapnya</a>
              </div>
            </div>
          </div>

          <!-- News Item 5 -->
          <div class="col-lg-4 col-md-6 mb-4 news-item" data-category="kegiatan" data-title="Senam Sehat Bersama Lansia">
            <div class="news-card fade-in-up">
              <img src="https://images.unsplash.com/photo-1605296867304-46d5465a13f1?w=400&h=250&fit=crop" 
                   class="card-img-top" alt="Senam Sehat">
              <div class="card-body">
                <div class="news-meta">
                  <span class="news-date"><i class="fas fa-calendar me-2"></i>12 Juli 2025</span>
                  <span class="news-category category-kegiatan">Kegiatan</span>
                </div>
                <h5 class="card-title">Senam Sehat Bersama Lansia</h5>
                <p class="card-text">Kegiatan senam sehat untuk lansia dilaksanakan setiap hari Jumat pagi di halaman Puskesmas dengan instruktur berpengalaman.</p>
                <a href="#" class="btn btn-outline-custom btn-sm">Baca Selengkapnya</a>
              </div>
            </div>
          </div>

          <!-- News Item 6 -->
          <div class="col-lg-4 col-md-6 mb-4 news-item" data-category="info" data-title="Pelatihan Kader Kesehatan Masyarakat">
            <div class="news-card fade-in-up">
              <img src="https://images.unsplash.com/photo-1584467735871-8d512626aa5a?w=400&h=250&fit=crop" 
                   class="card-img-top" alt="Pelatihan">
              <div class="card-body">
                <div class="news-meta">
                  <span class="news-date"><i class="fas fa-calendar me-2"></i>10 Juli 2025</span>
                  <span class="news-category category-info">Informasi</span>
                </div>
                <h5 class="card-title">Pelatihan Kader Kesehatan Masyarakat</h5>
                <p class="card-text">Pelatihan untuk meningkatkan kapasitas kader kesehatan dalam memberikan edukasi dan pendampingan kesehatan masyarakat.</p>
                <a href="#" class="btn btn-outline-custom btn-sm">Baca Selengkapnya</a>
              </div>
            </div>
          </div>

          <!-- News Item 7 -->
          <div class="col-lg-4 col-md-6 mb-4 news-item" data-category="program" data-title="Peluncuran Program Deteksi Dini Diabetes">
            <div class="news-card fade-in-up">
              <img src="https://images.unsplash.com/photo-1559757175-0eb30cd8c063?w=400&h=250&fit=crop" 
                   class="card-img-top" alt="Deteksi Diabetes">
              <div class="card-body">
                <div class="news-meta">
                  <span class="news-date"><i class="fas fa-calendar me-2"></i>8 Juli 2025</span>
                  <span class="news-category category-program">Program</span>
                </div>
                <h5 class="card-title">Peluncuran Program Deteksi Dini Diabetes</h5>
                <p class="card-text">Program skrining diabetes gratis untuk masyarakat usia 40 tahun ke atas sebagai upaya pencegahan komplikasi diabetes.</p>
                <a href="#" class="btn btn-outline-custom btn-sm">Baca Selengkapnya</a>
              </div>
            </div>
          </div>

          <!-- News Item 8 -->
          <div class="col-lg-4 col-md-6 mb-4 news-item" data-category="edukasi" data-title="Workshop Kesehatan Mental untuk Remaja">
            <div class="news-card fade-in-up">
              <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=400&h=250&fit=crop" 
                   class="card-img-top" alt="Workshop Mental Health">
              <div class="card-body">
                <div class="news-meta">
                  <span class="news-date"><i class="fas fa-calendar me-2"></i>5 Juli 2025</span>
                  <span class="news-category category-edukasi">Edukasi</span>
                </div>
                <h5 class="card-title">Workshop Kesehatan Mental untuk Remaja</h5>
                <p class="card-text">Workshop edukasi kesehatan mental untuk remaja dengan tema "Mengelola Stres dan Kecemasan di Era Digital".</p>
                <a href="#" class="btn btn-outline-custom btn-sm">Baca Selengkapnya</a>
              </div>
            </div>
          </div>

          <!-- News Item 9 -->
          <div class="col-lg-4 col-md-6 mb-4 news-item" data-category="kegiatan" data-title="Kampanye Hidup Sehat Tanpa Rokok">
            <div class="news-card fade-in-up">
              <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?w=400&h=250&fit=crop" 
                   class="card-img-top" alt="Anti Rokok">
              <div class="card-body">
                <div class="news-meta">
                  <span class="news-date"><i class="fas fa-calendar me-2"></i>3 Juli 2025</span>
                  <span class="news-category category-kegiatan">Kegiatan</span>
                </div>
                <h5 class="card-title">Kampanye Hidup Sehat Tanpa Rokok</h5>
                <p class="card-text">Kampanye anti rokok dengan berbagai kegiatan edukatif untuk meningkatkan kesadaran bahaya merokok bagi kesehatan.</p>
                <a href="#" class="btn btn-outline-custom btn-sm">Baca Selengkapnya</a>
              </div>
            </div>
          </div>
        </div>

        <!-- No Results Message -->
        <div id="noResults" class="text-center py-5" style="display: none;">
          <div class="no-results-content">
            <i class="fas fa-search fa-3x text-muted mb-3"></i>
            <h4 class="text-muted">Tidak ada hasil ditemukan</h4>
            <p class="text-muted">Coba gunakan kata kunci yang berbeda atau ubah filter kategori</p>
          </div>
        </div>

        <!-- Pagination -->
        <nav aria-label="News pagination" class="mt-5">
          <ul class="pagination justify-content-center">
            <li class="page-item disabled">
              <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                <i class="fas fa-chevron-left"></i> Sebelumnya
              </a>
            </li>
            <li class="page-item active">
              <a class="page-link" href="#">1</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">2</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">3</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">4</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">5</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">
                Selanjutnya <i class="fas fa-chevron-right"></i>
              </a>
            </li>
          </ul>
        </nav>
      </div>
      
      <!-- Sidebar -->
      <div class="col-lg-3">
        <div class="sidebar-widget">
          <h4 class="widget-title">Kategori Berita</h4>
          <ul class="category-list">
            <li><a href="#" class="d-flex justify-content-between" data-filter="pengumuman">
              <span>Pengumuman</span> <span class="badge bg-primary">5</span>
            </a></li>
            <li><a href="#" class="d-flex justify-content-between" data-filter="program">
              <span>Program Kesehatan</span> <span class="badge bg-primary">8</span>
            </a></li>
            <li><a href="#" class="d-flex justify-content-between" data-filter="kegiatan">
              <span>Kegiatan</span> <span class="badge bg-primary">12</span>
            </a></li>
            <li><a href="#" class="d-flex justify-content-between" data-filter="edukasi">
              <span>Edukasi</span> <span class="badge bg-primary">6</span>
            </a></li>
            <li><a href="#" class="d-flex justify-content-between" data-filter="info">
              <span>Informasi Umum</span> <span class="badge bg-primary">4</span>
            </a></li>
          </ul>
        </div>
        
        <div class="sidebar-widget">
          <h4 class="widget-title">Berita Populer</h4>
          <div class="popular-news">
            <div class="popular-item">
              <img src="https://images.unsplash.com/photo-1559757148-5c350d0d3c56?w=80&h=60&fit=crop" alt="Popular 1">
              <div class="popular-content">
                <h6><a href="#">Tips Menjaga Kesehatan di Musim Hujan</a></h6>
                <small class="text-muted">28 Juni 2025</small>
              </div>
            </div>
            
            <div class="popular-item">
              <img src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1f?w=80&h=60&fit=crop" alt="Popular 2">
              <div class="popular-content">
                <h6><a href="#">Pentingnya Imunisasi Lengkap untuk Anak</a></h6>
                <small class="text-muted">25 Juni 2025</small>
              </div>
            </div>
            
            <div class="popular-item">
              <img src="https://images.unsplash.com/photo-1609840114035-3c981b782dfe?w=80&h=60&fit=crop" alt="Popular 3">
              <div class="popular-content">
                <h6><a href="#">Cara Merawat Gigi dan Mulut yang Benar</a></h6>
                <small class="text-muted">22 Juni 2025</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection