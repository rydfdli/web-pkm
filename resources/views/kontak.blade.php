@extends('layout.index')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
  <div class="container">
    <div class="hero-content text-center fade-in-up">
      <h1 class="hero-title">Hubungi Kami</h1>
      <p class="hero-subtitle">Puskesmas Sehat Sentosa siap melayani Anda</p>
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
              Jl. Sehat Sentosa No. 123<br>
              Jakarta Selatan 12345<br>
              DKI Jakarta
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
              <strong>Telepon:</strong> (021) 1234-5678<br>
              <strong>Emergency:</strong> (021) 1234-9999<br>
              <strong>WhatsApp:</strong> 0812-3456-7890
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
            <p class="card-text">
              <strong>Email:</strong><br>
              info@puskesmassehatssentosa.go.id<br><br>
              <strong>Media Sosial:</strong><br>
              @puskesmassentosa
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
      <div class="col-lg-8">
        <div class="service-card fade-in-up">
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <h5 class="card-title text-center mb-4">
                  <i class="fas fa-clock text-primary me-2"></i>Layanan Reguler
                </h5>
                <div class="mb-3">
                  <strong>Senin - Jumat</strong><br>
                  Poli Umum: 08:00 - 14:00 WIB<br>
                  Laboratorium: 08:00 - 12:00 WIB<br>
                  Apotek: 08:00 - 15:00 WIB
                </div>
                <div class="mb-3">
                  <strong>Sabtu</strong><br>
                  Poli Umum: 08:00 - 12:00 WIB<br>
                  UGD: 24 Jam
                </div>
              </div>
              
              <div class="col-md-6">
                <h5 class="card-title text-center mb-4">
                  <i class="fas fa-ambulance text-danger me-2"></i>Layanan Darurat
                </h5>
                <div class="alert alert-danger">
                  <strong>UGD & Ambulance</strong><br>
                  <i class="fas fa-clock me-1"></i> 24 Jam Setiap Hari<br>
                  <i class="fas fa-phone me-1"></i> (021) 1234-9999
                </div>
                <div class="text-muted">
                  <small>
                    <i class="fas fa-info-circle me-1"></i>
                    Untuk kasus darurat, hubungi nomor emergency atau datang langsung ke UGD
                  </small>
                </div>
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
            <a href="tel:02112345678" class="btn btn-outline-custom w-100 py-3">
              <i class="fas fa-phone mb-2 d-block"></i>
              <strong>Telepon</strong><br>
              <small>(021) 1234-5678</small>
            </a>
          </div>
          <div class="col-md-4 mb-3">
            <a href="https://wa.me/6281234567890" target="_blank" class="btn btn-outline-custom w-100 py-3">
              <i class="fab fa-whatsapp mb-2 d-block"></i>
              <strong>WhatsApp</strong><br>
              <small>Chat Langsung</small>
            </a>
          </div>
          <div class="col-md-4 mb-3">
            <a href="mailto:info@puskesmassehatssentosa.go.id" class="btn btn-outline-custom w-100 py-3">
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

<!-- Location Section -->
<section class="section-padding bg-light-custom">
  <div class="container">
    <h2 class="section-title text-center fade-in-up">Lokasi & Petunjuk Arah</h2>
    <div class="row">
      <div class="col-lg-8 mx-auto">
        <div class="service-card fade-in-up">
          <div class="card-body">
            <div class="text-center mb-4">
              <h5 class="card-title">Puskesmas Sehat Sentosa</h5>
              <p class="text-muted">Jl. Sehat Sentosa No. 123, Jakarta Selatan 12345</p>
            </div>
            
            <div class="row">
              <div class="col-md-6">
                <h6><i class="fas fa-directions text-primary me-2"></i>Petunjuk Arah:</h6>
                <ul class="list-unstyled">
                  <li><i class="fas fa-bus text-muted me-2"></i>TransJakarta: Halte Blok M</li>
                  <li><i class="fas fa-train text-muted me-2"></i>KRL: Stasiun Blok M</li>
                  <li><i class="fas fa-car text-muted me-2"></i>Parkir tersedia</li>
                </ul>
              </div>
              <div class="col-md-6">
                <h6><i class="fas fa-landmark text-primary me-2"></i>Patokan:</h6>
                <ul class="list-unstyled">
                  <li><i class="fas fa-store text-muted me-2"></i>Dekat Blok M Plaza</li>
                  <li><i class="fas fa-hospital text-muted me-2"></i>Seberang RS Mayapada</li>
                  <li><i class="fas fa-road text-muted me-2"></i>Jalan Raya Utama</li>
                </ul>
              </div>
            </div>
            
            <div class="text-center mt-4">
              <a href="https://maps.google.com/?q=Puskesmas+Sehat+Sentosa+Jakarta" target="_blank" class="btn btn-hero">
                <i class="fas fa-map-marked-alt me-2"></i>Buka Google Maps
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection