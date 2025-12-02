@extends('layout.index')

@section('content')
@vite('resources/css/layanan.css')
<!-- Hero Section -->
<section class="hero-section">
  <div class="container">
    <div class="hero-content text-center fade-in-up">
      <h1 class="hero-title">Layanan Kesehatan</h1>
      <p class="hero-subtitle">{{ $settings->layanan_tagline }}</p>
    </div>
  </div>
</section>

<!-- Services Section -->
<section class="section-padding bg-white">
  <div class="container">
    <div class="row">
      @foreach ($layanans as $layanan)  
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="service-card h-100 fade-in-up">
          <div class="card-body">
            <div class="service-icon">
              <i class="{{ $layanan->icon }}"></i>
            </div>
            <h5 class="card-title">{{ $layanan->judul_layanan }}</h5>
            <p class="card-text">Pelayanan konsultasi dan pengobatan penyakit umum dengan dokter berpengalaman dan fasilitas modern.</p>
            <span class="badge bg-{{ $layanan->badge_color }} my-2">{{ $layanan->badge_text }}</span>
          </div>
        </div>
      </div>
      @endforeach

    </div>
  </div>
</section>

{{-- <!-- Information Section -->
<section class="section-padding bg-light-custom">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="service-card">
          <div class="card-body text-center p-5">
            <h3 class="mb-4">Informasi Penting</h3>
            <div class="row">
              <div class="col-md-6 mb-3">
                <h5 class="text-primary">Persyaratan Berobat</h5>
                <ul class="list-unstyled text-start">
                  <li><i class="fas fa-check text-success me-2"></i>KTP/Identitas diri</li>
                  <li><i class="fas fa-check text-success me-2"></i>Kartu BPJS (jika ada)</li>
                  <li><i class="fas fa-check text-success me-2"></i>Surat rujukan (jika dari Puskesmas lain)</li>
                </ul>
              </div>
              <div class="col-md-6 mb-3">
                <h5 class="text-primary">Pendaftaran</h5>
                <ul class="list-unstyled text-start">
                  <li><i class="fas fa-clock text-primary me-2"></i>Loket buka: 07:30 WIB</li>
                  <li><i class="fas fa-users text-primary me-2"></i>Antrian terbatas</li>
                  <li><i class="fas fa-info-circle text-primary me-2"></i>Datang lebih awal</li>
                </ul>
              </div>
            </div>
            <div class="alert alert-info mt-4">
              <i class="fas fa-info-circle me-2"></i>
              <strong>Catatan:</strong> Untuk layanan tertentu, silakan hubungi Puskesmas terlebih dahulu untuk konfirmasi jadwal dan ketersediaan.
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> --}}

@endsection