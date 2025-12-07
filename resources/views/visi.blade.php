@extends('layout.index')

@section('content')
{{-- @vite('resources/css/visi-misi.css') --}}
<!-- Hero Section -->
<section class="hero-section">
  <div class="container">
    <div class="hero-content text-center fade-in-up">
      <h1 class="hero-title">Visi & Misi</h1>
      <p class="hero-subtitle">{{ $settings->visi_misi_tagline }}</p>
    </div>
  </div>
</section>

<!-- Visi & Misi Content -->
<section class="section-padding bg-white">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6">
        
        <!-- Visi Section -->
        <div class="text-center mb-5 fade-in-up">
          <h2 class="section-title">VISI</h2>
          <div class="service-card">
            <div class="card-body">
              <div class="service-icon mx-auto mb-4">
                <i class="fas fa-eye"></i>
              </div>
                {!! $visiMisi->visi !!}
            </div>
          </div>
        </div>


      </div>

      <div class="col-lg-6">
        <!-- Misi Section -->
         <div class="text-center fade-in-up">
           <h2 class="section-title">MISI</h2>
           <div class="service-card">
             <div class="card-body">
               <div class="service-icon mx-auto mb-4">
                 <i class="fas fa-bullseye"></i>
               </div>
               <div class="text-start text-6xl">
                 {!! $visiMisi->misi !!}
               </div>
             </div>
           </div>
         </div>
      </div>
    </div>
  </div>
</section>

{{-- <!-- Values Section -->
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
</section> --}}

@endsection