@extends('layout.index')

@section('content')
<!-- Hero Section -->
<section id="beranda" class="hero-section">
  <!-- Background Image -->
  <img src="{{ asset('storage/' . $settings->hero_image) }}" 
       alt="Ruang Rumah Sakit - Puskesmas Sehat Sentosa" 
       class="hero-bg-image">
  
  <!-- Overlay -->
  <div class="hero-overlay"></div>
  
  <div class="container">
    <div class="hero-content text-center fade-in-up">
      <h1 class="hero-title">{{ $settings->wellcome_text }}</h1>
      <p class="hero-subtitle">{{ $settings->wellcome_subtext }}</p>
      <a href="{{ route('visi') }}" class="btn btn-hero">
        <i class="fas fa-arrow-right me-2"></i>Lihat Profil Kami
      </a>
    </div>
  </div>
</section>

<!-- Stats Section -->
{{-- <section class="section-padding bg-white">
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
</section> --}}

<!-- Services Preview Section -->
<section id="layanan-preview" class="section-padding bg-light-custom">
  <div class="container">
    <h2 class="section-title text-center fade-in-up">Layanan Unggulan</h2>
    <div class="row">
      <div class="col-lg-4 col-md-6 mb-4">
        @foreach ($layanans as $layanan)  
        <div class="service-card fade-in-up">
          <div class="card-body">
            <div class="service-icon">
              <i class="{{ $layanan->icon }}"></i>
            </div>
            <h5 class="card-title">{{ $layanan->judul_layanan }}</h5>
            <p class="card-text">Pelayanan konsultasi dan pengobatan penyakit umum dengan dokter berpengalaman dan fasilitas modern.</p>
          </div>
        </div>
        @endforeach
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
      @foreach($beritaTerbaru as $berita)
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="news-card fade-in-up">
          <img src="{{ $berita->image_url }}" 
               class="card-img-top" alt="{{ $berita->judul }}" style="max-height: 200px; width: 100%; object-fit: cover;">
          <div class="card-body">
            <h5 class="card-title">{{ $berita->judul }}</h5>
            <p class="card-text">Posyandu rutin dilakukan setiap hari Rabu minggu ke-2 setiap bulan untuk pemantauan tumbuh kembang balita.</p>
            <a href="#" class="btn btn-outline-custom">
              <i class="fas fa-arrow-right me-1"></i>Baca Selengkapnya
            </a>
          </div>
        </div>
      </div>
      @endforeach
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
            <div class="mb-3 d-flex align-items-baseline text-start">
              <i class="fas fa-map-marker-alt text-primary me-3"></i>
              <span>{!! $kontak->alamat !!}</span>
            </div>
            <hr>
            <div class="mb-3 d-flex align-items-center text-start">
              <i class="fas fa-phone text-primary me-3"></i>
              <span>{{ $kontak->telepon }}</span>
            </div>
            <hr>
            <div class="mb-3 d-flex align-items-center text-start">
              <i class="fas fa-envelope text-primary me-3"></i>
              <span>{{ $kontak->email }}</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 mb-4">
        <div class="service-card h-100">
          <div class="card-body">
            <h5 class="card-title">Jam Operasional</h5>
            <div class="row">
              @foreach ($jams as $jam)  
              <div class="col-12 text-start">
                @if($jam->keterangan)
                  <strong class="text-danger">{{ $jam->hari }}</strong><br>
                @else
                  <strong class="text-success">{{ $jam->hari }}</strong><br>
                @endif
                {{ \Carbon\Carbon::parse($jam->jam_mulai)->format('H:i') }} - 
                {{ \Carbon\Carbon::parse($jam->jam_selesai)->format('H:i') }}
                @if($jam->keterangan)
                  <span class="text-danger"> *({{ $jam->keterangan }})</span> 
                @endif
              <hr>
              </div>
              @endforeach
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