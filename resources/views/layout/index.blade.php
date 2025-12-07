<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Beranda | Puskesmas Sehat Sentosa</title>
  
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Font Awesome Icons -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('build/assets/home-BiwRWLpA.css') }}">
  <link rel="stylesheet" href="{{ asset('build/assets/layanan-Ddd6CVZP.css') }}">
  <link rel="stylesheet" href="{{ asset('build/assets/news-B4tsXVYB.css') }}">
  <link rel="stylesheet" href="{{ asset('build/assets/style-DyYBdF_P.css') }}">
  <link rel="stylesheet" href="{{ asset('build/assets/visi-misi-CVxGqjP0.css') }}">
  <script src="{{ asset('build/assets/app-C0G0cght.js') }}"></script>
  <!-- Custom CSS -->
  {{-- @vite(['resources/css/style.css', 'resources/js/script.js']) --}}
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">
        @if ($settings->logo == null)
           <p>No Logo Available</p>
           @else
           <img src="{{ asset('storage/' . $settings->logo) }}" alt="Logo Puskesmas" class="navbar-logo" style="width: 100%; height: 40px; object-fit: cover;">
        @endif
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navmenu">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Beranda</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="profilDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Profil
            </a>
            <ul class="dropdown-menu" aria-labelledby="profilDropdown">
              <li><a class="dropdown-item" href="{{ route('visi') }}">Visi & Misi</a></li>
              <li><a class="dropdown-item" href="{{ route('struktur') }}">Struktur Organisasi</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('layanan') ? 'active' : '' }}" href="{{ route('layanan') }}">Layanan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('news') ? 'active' : '' }}" href="{{ route('news') }}">Berita</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Kontak</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

    <!-- main content -->

    @yield('content')


  <!-- Footer -->
  <footer class="footer-custom">
    <div class="container">
      <div class="footer-content">
        <div class="footer-section">
          <img src="{{ asset('storage/' . $settings->logo) }}" alt="Logo Puskesmas" class="footer-logo" style="width: auto; height: 30px; object-fit: cover;">
          {{-- <p>Memberikan pelayanan kesehatan terbaik dengan teknologi modern dan tenaga medis profesional untuk kesejahteraan masyarakat.</p> --}}
        </div>
        <div class="footer-section">
          <h5>Layanan Kami</h5>
          @foreach ($layanans as $layanan)
          <a href="#">{{ $layanan->judul_layanan }}</a>
          @endforeach
        </div>
        <div class="footer-section">
          <h5>Kontak & Sosial Media</h5>
          <p><i class="fas fa-phone me-2"></i>{{ $kontak->telepon }}</p>
          <p><i class="fas fa-envelope me-2"></i>{{ $kontak->email }}</p>
          <div class="mt-3 d-flex">
            <a href="#" class="me-3"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="me-3"><i class="fab fa-instagram"></i></a>
            <a href="#" class="me-3"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
          </div>
        </div>
      </div>
      <div class="footer-bottom">
        <p>&copy; 2025 {{ $settings->nama_puskesmas }}. All rights reserved. | RF</p>
      </div>
    </div>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  
  <!-- Custom JS -->
</body>
</html>