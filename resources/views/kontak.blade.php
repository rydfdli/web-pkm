@extends('layout.index')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
  <div class="container">
    <div class="hero-content text-center fade-in-up">
      <h1 class="hero-title">Hubungi Kami</h1>
      <p class="hero-subtitle">{{ $settings->kontak_tagline }}</p>
    </div>
  </div>
</section>

<!-- Contact Information Section -->
<section class="section-padding bg-white">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="service-card h-100 fade-in-up">
          <div class="card-body text-center">
            <div class="service-icon">
              <i class="fas fa-map-marker-alt"></i>
            </div>
            <h5 class="card-title">Alamat</h5>
            <p class="card-text">
              {!! $kontak->alamat ?? 'Alamat tidak tersedia' !!}<br>
            </p>
          </div>
        </div>
      </div>
      
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="service-card h-100 fade-in-up">
          <div class="card-body text-center">
            <div class="service-icon">
              <i class="fas fa-phone"></i>
            </div>
            <h5 class="card-title">Telepon</h5>
            <p class="card-text">
              {{ $kontak->telepon ?? 'Telepon tidak tersedia' }}
            </p>
          </div>
        </div>
      </div>
      
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="service-card h-100 fade-in-up">
          <div class="card-body text-center">
            <div class="service-icon">
              <i class="fas fa-envelope"></i>
            </div>
            <h5 class="card-title">Email</h5>
            <p>
              {{ $kontak->email ?? 'Email tidak tersedia' }}
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Operating Hours Section -->
<section class="section-padding bg-light-custom">
  <div class="container">
    <h2 class="section-title text-center fade-in-up">Jam Operasional</h2>
    <div class="row justify-content-center">
      <div class="col-6">
        <div class="service-card fade-in-up">
          <div class="card-body">
            <div class="row">
              <div class="mx-auto">
                <h5 class="card-title text-center mb-4">
                  <i class="fas fa-clock text-primary me-2"></i>Layanan Reguler
                </h5>
              @foreach ($jams as $jam)  
              <div class="col-12 text-start mx-auto">
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
  </div>
</section>

<!-- Quick Contact Section -->
<section class="section-padding bg-white">
  <div class="container">
    <h2 class="section-title text-center fade-in-up">Kontak Cepat</h2>
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="row">
          <div class="col-md-4 mb-3">
            <a href="tel:{{ $kontak->telepon }}" class="btn btn-outline-custom w-100 py-3">
              <i class="fas fa-phone mb-2 d-block"></i>
              <strong>Telepon</strong><br>
              <small>{{ $kontak->telepon }}</small>
            </a>
          </div>
          <div class="col-md-4 mb-3">
            <a href="https://wa.me/{{ $kontak->whatsapp }}" target="_blank" class="btn btn-outline-custom w-100 py-3">
              <i class="fab fa-whatsapp mb-2 d-block"></i>
              <strong>WhatsApp</strong><br>
              <small>Chat Langsung</small>
            </a>
          </div>
          <div class="col-md-4 mb-3">
            <a href="mailto:{{ $kontak->email }}" class="btn btn-outline-custom w-100 py-3">
              <i class="fas fa-envelope mb-2 d-block"></i>
              <strong>Email</strong><br>
              <small>Kirim Email</small>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


@endsection