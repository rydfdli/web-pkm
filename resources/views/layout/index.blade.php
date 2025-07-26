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
  
  <!-- Custom CSS -->
  @vite(['resources/css/style.css', 'resources/js/script.js'])
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">
        <i class="fas fa-hospital-alt me-2"></i>
        Puskesmas Sentosa
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
          <h5><i class="fas fa-hospital-alt me-2"></i>Puskesmas Sehat Sentosa</h5>
          <p>Memberikan pelayanan kesehatan terbaik dengan teknologi modern dan tenaga medis profesional untuk kesejahteraan masyarakat.</p>
        </div>
        <div class="footer-section">
          <h5>Layanan Kami</h5>
          <a href="#">Poli Umum</a>
          <a href="#">Imunisasi</a>
          <a href="#">KIA & KB</a>
          <a href="#">Kesehatan Gigi</a>
          <a href="#">Laboratorium</a>
        </div>
        <div class="footer-section">
          <h5>Informasi</h5>
          <a href="#">Profil Puskesmas</a>
          <a href="#">Dokter & Staff</a>
          <a href="#">Fasilitas</a>
          <a href="#">Jadwal Pelayanan</a>
          <a href="#">Cara Pendaftaran</a>
        </div>
        <div class="footer-section">
          <h5>Kontak & Sosial Media</h5>
          <p><i class="fas fa-phone me-2"></i>(021) 1234-5678</p>
          <p><i class="fas fa-envelope me-2"></i>info@puskesmassehatssentosa.go.id</p>
          <div class="mt-3">
            <a href="#" class="me-3"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="me-3"><i class="fab fa-instagram"></i></a>
            <a href="#" class="me-3"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
          </div>
        </div>
      </div>
      <div class="footer-bottom">
        <p>&copy; 2025 Puskesmas Sehat Sentosa. All rights reserved. | Kementerian Kesehatan Republik Indonesia</p>
      </div>
    </div>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  
  <!-- Custom JS -->
</body>
</html>