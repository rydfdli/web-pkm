@extends('layout.index')

@section('content')
@vite('resources/css/visi-misi.css')
<!-- Hero Section -->
<section class="hero-section">
  <div class="container">
    <div class="hero-content text-center fade-in-up">
      <h1 class="hero-title">Visi & Misi</h1>
      <p class="hero-subtitle">Komitmen Puskesmas Sehat Sentosa untuk Masyarakat</p>
    </div>
  </div>
</section>

<!-- Visi & Misi Content -->
<section class="section-padding bg-white">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        
        <!-- Visi Section -->
        <div class="text-center mb-5 fade-in-up">
          <h2 class="section-title">VISI</h2>
          <div class="service-card">
            <div class="card-body p-5">
              <div class="service-icon mx-auto mb-4">
                <i class="fas fa-eye"></i>
              </div>
              <p class="lead text-center" style="font-size: 1.3rem; line-height: 1.8; color: var(--dark-text); font-weight: 500;">
                "Menjadi Puskesmas terdepan dalam memberikan pelayanan kesehatan yang berkualitas, profesional, dan terjangkau untuk mewujudkan masyarakat yang sehat dan sejahtera di wilayah kerja Puskesmas Sehat Sentosa."
              </p>
            </div>
          </div>
        </div>

        <!-- Divider -->
        <div class="text-center my-5">
          <div style="width: 100px; height: 4px; background: linear-gradient(90deg, var(--primary-color), var(--primary-light)); margin: 0 auto; border-radius: 2px;"></div>
        </div>

        <!-- Misi Section -->
        <div class="text-center fade-in-up">
          <h2 class="section-title">MISI</h2>
          <div class="service-card">
            <div class="card-body p-5">
              <div class="service-icon mx-auto mb-4">
                <i class="fas fa-bullseye"></i>
              </div>
              <div class="text-start">
                <div class="misi-item mb-4">
                  <div class="d-flex align-items-start">
                    <div class="misi-number">1</div>
                    <p class="misi-text">Memberikan pelayanan kesehatan yang komprehensif dan berkualitas tinggi untuk seluruh masyarakat tanpa diskriminasi</p>
                  </div>
                </div>
                
                <div class="misi-item mb-4">
                  <div class="d-flex align-items-start">
                    <div class="misi-number">2</div>
                    <p class="misi-text">Meningkatkan derajat kesehatan masyarakat melalui program promotif dan preventif yang berkelanjutan</p>
                  </div>
                </div>
                
                <div class="misi-item mb-4">
                  <div class="d-flex align-items-start">
                    <div class="misi-number">3</div>
                    <p class="misi-text">Mengembangkan sumber daya manusia yang profesional, kompeten, dan berintegritas dalam bidang kesehatan</p>
                  </div>
                </div>
                
                <div class="misi-item mb-4">
                  <div class="d-flex align-items-start">
                    <div class="misi-number">4</div>
                    <p class="misi-text">Menjalin kemitraan strategis dengan berbagai pihak untuk mendukung program kesehatan masyarakat</p>
                  </div>
                </div>
                
                <div class="misi-item">
                  <div class="d-flex align-items-start">
                    <div class="misi-number">5</div>
                    <p class="misi-text">Memanfaatkan teknologi informasi dan inovasi untuk meningkatkan efisiensi dan kualitas pelayanan kesehatan</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>

<!-- Values Section -->
<section class="section-padding bg-light-custom">
  <div class="container">
    <h2 class="section-title text-center fade-in-up">Nilai-Nilai Kami</h2>
    <div class="row">
      <div class="col-lg-3 col-md-6 mb-4">
        <div class="service-card h-100 fade-in-up">
          <div class="card-body text-center">
            <div class="service-icon">
              <i class="fas fa-heart"></i>
            </div>
            <h5 class="card-title">PEDULI</h5>
            <p class="card-text">Memberikan perhatian penuh terhadap kebutuhan kesehatan masyarakat dengan penuh empati</p>
          </div>
        </div>
      </div>
      
      <div class="col-lg-3 col-md-6 mb-4">
        <div class="service-card h-100 fade-in-up">
          <div class="card-body text-center">
            <div class="service-icon">
              <i class="fas fa-shield-alt"></i>
            </div>
            <h5 class="card-title">INTEGRITAS</h5>
            <p class="card-text">Menjalankan tugas dengan jujur, transparan, dan bertanggung jawab kepada masyarakat</p>
          </div>
        </div>
      </div>
      
      <div class="col-lg-3 col-md-6 mb-4">
        <div class="service-card h-100 fade-in-up">
          <div class="card-body text-center">
            <div class="service-icon">
              <i class="fas fa-star"></i>
            </div>
            <h5 class="card-title">UNGGUL</h5>
            <p class="card-text">Memberikan pelayanan terbaik dengan standar kualitas tinggi dan inovasi berkelanjutan</p>
          </div>
        </div>
      </div>
      
      <div class="col-lg-3 col-md-6 mb-4">
        <div class="service-card h-100 fade-in-up">
          <div class="card-body text-center">
            <div class="service-icon">
              <i class="fas fa-handshake"></i>
            </div>
            <h5 class="card-title">KOLABORASI</h5>
            <p class="card-text">Bekerja sama dengan berbagai pihak untuk mencapai tujuan kesehatan bersama</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection