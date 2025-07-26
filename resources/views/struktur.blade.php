@extends('layout.index')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
  <div class="container">
    <div class="hero-content text-center fade-in-up">
      <h1 class="hero-title">Struktur Organisasi</h1>
      <p class="hero-subtitle">Puskesmas Sehat Sentosa</p>
    </div>
  </div>
</section>

<!-- Organization Chart Section -->
<section class="section-padding bg-white">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-12">
        <div class="text-center fade-in-up">
          <div class="org-chart-container">
            <img src="{{ asset('images/struktur-organisasi-puskesmas.png') }}" 
                 alt="Struktur Organisasi Puskesmas Sehat Sentosa" 
                 class="org-chart-image">
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection