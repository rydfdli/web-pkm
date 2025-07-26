@extends('layout.index')

@section('content')
@vite('resources/css/home.css')
<!-- Hero Section -->
<section id="beranda" class="hero-section">
  <!-- Background Image -->
  <img src="https://images.unsplash.com/photo-1586773860418-d37222d8fce3?w=1920&h=1080&fit=crop&crop=center" 
       alt="Ruang Rumah Sakit - Puskesmas Sehat Sentosa" 
       class="hero-bg-image">
  
  <!-- Overlay -->
  <div class="hero-overlay"></div>
  
  <div class="container">
    <div class="hero-content text-center fade-in-up">
      <h1 class="hero-title">Selamat Datang di Website Resmi</h1>
      <p class="hero-subtitle">Puskesmas Sehat Sentosa - Pelayanan Kesehatan Terdepan untuk Masyarakat</p>
      <a href="{{ route('visi') }}" class="btn btn-hero">
        <i class="fas fa-arrow-right me-2"></i>Lihat Profil Kami
      </a>
    </div>
  </div>
</section>

<!-- Stats Section -->
<section class="section-padding bg-white">
  <div class="container">
    <div class="row text-center">
      <div class="col-md-3 col-6 mb-4">
        <div class="service-icon mx-auto mb-3">
          <i class="fas fa-users"></i>
        </div>
        <h3 class="fw-bold text-primary">10,000+</h3>
        <p class="text-muted">Pasien Terlayani</p>
      </div>
      <div class="col-md-3 col-6 mb-4">
        <div class="service-icon mx-auto mb-3">
          <i class="fas fa-user-md"></i>
        </div>
        <h3 class="fw-bold text-primary">25+</h3>
        <p class="text-muted">Tenaga Medis</p>
      </div>
      <div class="col-md-3 col-6 mb-4">
        <div class="service-icon mx-auto mb-3">
          <i class="fas fa-hospital"></i>
        </div>
        <h3 class="fw-bold text-primary">15+</h3>
        <p class="text-muted">Layanan Kesehatan</p>
      </div>
      <div class="col-md-3 col-6 mb-4">
        <div class="service-icon mx-auto mb-3">
          <i class="fas fa-award"></i>
        </div>
        <h3 class="fw-bold text-primary">5+</h3>
        <p class="text-muted">Tahun Pengalaman</p>
      </div>
    </div>
  </div>
</section>

<!-- Services Preview Section -->
<section id="layanan-preview" class="section-padding bg-light-custom">
  <div class="container">
    <h2 class="section-title text-center fade-in-up">Layanan Unggulan</h2>
    <div class="row">
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="service-card fade-in-up">
          <div class="card-body">
            <div class="service-icon">
              <i class="fas fa-stethoscope"></i>
            </div>
            <h5 class="card-title">Poli Umum</h5>
            <p class="card-text">Pelayanan konsultasi dan pengobatan penyakit umum dengan dokter berpengalaman dan fasilitas modern.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="service-card fade-in-up">
          <div class="card-body">
            <div class="service-icon">
              <i class="fas fa-syringe"></i>
            </div>
            <h5 class="card-title">Imunisasi</h5>
            <p class="card-text">Program imunisasi lengkap untuk bayi dan anak-anak sesuai jadwal nasional untuk perlindungan optimal.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="service-card fade-in-up">
          <div class="card-body">
            <div class="service-icon">
              <i class="fas fa-baby"></i>
            </div>
            <h5 class="card-title">KIA & KB</h5>
            <p class="card-text">Pelayanan kesehatan ibu dan anak serta program keluarga berencana untuk kesejahteraan keluarga.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="service-card fade-in-up">
          <div class="card-body">
            <div class="service-icon">
              <i class="fas fa-tooth"></i>
            </div>
            <h5 class="card-title">Kesehatan Gigi</h5>
            <p class="card-text">Pemeriksaan, perawatan, dan edukasi kesehatan gigi dan mulut untuk seluruh keluarga.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="service-card fade-in-up">
          <div class="card-body">
            <div class="service-icon">
              <i class="fas fa-vial"></i>
            </div>
            <h5 class="card-title">Laboratorium</h5>
            <p class="card-text">Pemeriksaan laboratorium lengkap dengan hasil akurat dan cepat untuk mendukung diagnosis.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="service-card fade-in-up">
          <div class="card-body">
            <div class="service-icon">
              <i class="fas fa-pills"></i>
            </div>
            <h5 class="card-title">Apotek</h5>
            <p class="card-text">Penyediaan obat-obatan berkualitas dengan konsultasi farmasis untuk penggunaan yang tepat.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="text-center mt-4">
      <a href="{{ route('layanan') }}" class="btn btn-hero">
        <i class="fas fa-arrow-right me-2"></i>Lihat Semua Layanan
      </a>
    </div>
  </div>
</section>

<!-- News Preview Section -->
<section id="berita-preview" class="section-padding bg-white">
  <div class="container">
    <h2 class="section-title text-center fade-in-up">Berita & Kegiatan Terbaru</h2>
    <div class="row">
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="news-card fade-in-up">
          <img src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1f?w=400&h=250&fit=crop" 
               class="card-img-top" alt="Posyandu Balita">
          <div class="card-body">
            <h5 class="card-title">Kegiatan Posyandu Balita</h5>
            <p class="card-text">Posyandu rutin dilakukan setiap hari Rabu minggu ke-2 setiap bulan untuk pemantauan tumbuh kembang balita.</p>
            <a href="#" class="btn btn-outline-custom">
              <i class="fas fa-arrow-right me-1"></i>Baca Selengkapnya
            </a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="news-card fade-in-up">
          <img src="https://images.unsplash.com/photo-1609840114035-3c981b782dfe?w=400&h=250&fit=crop" 
               class="card-img-top" alt="Pemeriksaan Gigi">
          <div class="card-body">
            <h5 class="card-title">Pemeriksaan Gigi Gratis</h5>
            <p class="card-text">Dalam rangka Hari Kesehatan Nasional, tersedia pemeriksaan gigi gratis untuk seluruh masyarakat.</p>
            <a href="#" class="btn btn-outline-custom">
              <i class="fas fa-arrow-right me-1"></i>Baca Selengkapnya
            </a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="news-card fade-in-up">
          <img src="https://images.unsplash.com/photo-1559757148-5c350d0d3c56?w=400&h=250&fit=crop" 
               class="card-img-top" alt="Penyuluhan Gizi">
          <div class="card-body">
            <h5 class="card-title">Penyuluhan Gizi Remaja</h5>
            <p class="card-text">Program edukasi dan penyuluhan gizi seimbang untuk pelajar demi mendukung pertumbuhan optimal.</p>
            <a href="#" class="btn btn-outline-custom">
              <i class="fas fa-arrow-right me-1"></i>Baca Selengkapnya
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="text-center mt-4">
      <a href="{{ route('news') }}" class="btn btn-outline-custom">
        <i class="fas fa-newspaper me-2"></i>Lihat Semua Berita
      </a>
    </div>
  </div>
</section>

<!-- Contact Preview Section -->
<section id="kontak-preview" class="section-padding bg-light-custom">
  <div class="container">
    <h2 class="section-title text-center fade-in-up">Hubungi Kami</h2>
    <div class="row">
      <div class="col-lg-6 mb-4">
        <div class="service-card h-100">
          <div class="card-body">
            <h5 class="card-title">Informasi Kontak</h5>
            <div class="mb-3">
              <i class="fas fa-map-marker-alt text-primary me-3"></i>
              <span>Jl. Sehat Sentosa No. 123, Jakarta Selatan 12345</span>
            </div>
            <div class="mb-3">
              <i class="fas fa-phone text-primary me-3"></i>
              <span>(021) 1234-5678</span>
            </div>
            <div class="mb-3">
              <i class="fas fa-envelope text-primary me-3"></i>
              <span>info@puskesmassehatssentosa.go.id</span>
            </div>
            <div class="mb-3">
              <i class="fas fa-clock text-primary me-3"></i>
              <span>Senin - Jumat: 08:00 - 16:00 WIB</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 mb-4">
        <div class="service-card h-100">
          <div class="card-body">
            <h5 class="card-title">Jam Operasional</h5>
            <div class="row">
              <div class="col-6">
                <strong>Poli Umum:</strong><br>
                08:00 - 14:00 WIB
              </div>
              <div class="col-6">
                <strong>Gawat Darurat:</strong><br>
                24 Jam
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-6">
                <strong>Laboratorium:</strong><br>
                08:00 - 12:00 WIB
              </div>
              <div class="col-6">
                <strong>Apotek:</strong><br>
                08:00 - 15:00 WIB
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="text-center mt-4">
      <a href="{{ route('contact') }}" class="btn btn-hero">
        <i class="fas fa-phone me-2"></i>Hubungi Kami Sekarang
      </a>
    </div>
  </div>
</section>

@endsection