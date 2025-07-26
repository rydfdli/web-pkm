@extends('layout.index')

@section('content')
@vite('resources/css/layanan.css')
<!-- Hero Section -->
<section class="hero-section">
  <div class="container">
    <div class="hero-content text-center fade-in-up">
      <h1 class="hero-title">Layanan Kesehatan</h1>
      <p class="hero-subtitle">Pelayanan Kesehatan Terpadu untuk Seluruh Keluarga</p>
    </div>
  </div>
</section>

<!-- Services Section -->
<section class="section-padding bg-white">
  <div class="container">
    <div class="row">
      <!-- Poli Umum -->
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="service-card h-100 fade-in-up">
          <div class="card-body">
            <div class="service-icon">
              <i class="fas fa-stethoscope"></i>
            </div>
            <h5 class="card-title">Poli Umum</h5>
            <p class="card-text">Pelayanan konsultasi dan pengobatan penyakit umum dengan dokter berpengalaman dan fasilitas modern.</p>
            <div class="service-details">
              <h6 class="text-primary">Jam Pelayanan:</h6>
              <p class="mb-2"><i class="fas fa-clock me-2"></i>Senin - Jumat: 08:00 - 14:00 WIB</p>
              <p class="mb-2"><i class="fas fa-clock me-2"></i>Sabtu: 08:00 - 12:00 WIB</p>
              <h6 class="text-primary mt-3">Fasilitas:</h6>
              <ul class="service-list">
                <li>Pemeriksaan kesehatan umum</li>
                <li>Konsultasi medis</li>
                <li>Pengobatan penyakit ringan</li>
                <li>Rujukan ke spesialis</li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <!-- Poli Gigi -->
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="service-card h-100 fade-in-up">
          <div class="card-body">
            <div class="service-icon">
              <i class="fas fa-tooth"></i>
            </div>
            <h5 class="card-title">Poli Gigi</h5>
            <p class="card-text">Pemeriksaan, perawatan, dan edukasi kesehatan gigi dan mulut untuk seluruh keluarga.</p>
            <div class="service-details">
              <h6 class="text-primary">Jam Pelayanan:</h6>
              <p class="mb-2"><i class="fas fa-clock me-2"></i>Senin - Jumat: 08:00 - 12:00 WIB</p>
              <h6 class="text-primary mt-3">Fasilitas:</h6>
              <ul class="service-list">
                <li>Pemeriksaan gigi rutin</li>
                <li>Pembersihan karang gigi</li>
                <li>Penambalan gigi</li>
                <li>Pencabutan gigi</li>
                <li>Edukasi kesehatan gigi</li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <!-- KIA & KB -->
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="service-card h-100 fade-in-up">
          <div class="card-body">
            <div class="service-icon">
              <i class="fas fa-baby"></i>
            </div>
            <h5 class="card-title">KIA & KB</h5>
            <p class="card-text">Pelayanan kesehatan ibu dan anak serta program keluarga berencana untuk kesejahteraan keluarga.</p>
            <div class="service-details">
              <h6 class="text-primary">Jam Pelayanan:</h6>
              <p class="mb-2"><i class="fas fa-clock me-2"></i>Senin - Jumat: 08:00 - 13:00 WIB</p>
              <h6 class="text-primary mt-3">Fasilitas:</h6>
              <ul class="service-list">
                <li>Pemeriksaan kehamilan (ANC)</li>
                <li>Persalinan normal</li>
                <li>Pemeriksaan bayi dan balita</li>
                <li>Konseling KB</li>
                <li>Pemasangan KB</li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <!-- Imunisasi -->
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="service-card h-100 fade-in-up">
          <div class="card-body">
            <div class="service-icon">
              <i class="fas fa-syringe"></i>
            </div>
            <h5 class="card-title">Imunisasi</h5>
            <p class="card-text">Program imunisasi lengkap untuk bayi dan anak-anak sesuai jadwal nasional untuk perlindungan optimal.</p>
            <div class="service-details">
              <h6 class="text-primary">Jam Pelayanan:</h6>
              <p class="mb-2"><i class="fas fa-clock me-2"></i>Senin - Jumat: 08:00 - 11:00 WIB</p>
              <h6 class="text-primary mt-3">Jenis Imunisasi:</h6>
              <ul class="service-list">
                <li>Imunisasi dasar lengkap</li>
                <li>Imunisasi lanjutan</li>
                <li>Imunisasi dewasa</li>
                <li>Vaksin COVID-19</li>
                <li>Vaksin influenza</li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <!-- Laboratorium -->
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="service-card h-100 fade-in-up">
          <div class="card-body">
            <div class="service-icon">
              <i class="fas fa-vial"></i>
            </div>
            <h5 class="card-title">Laboratorium</h5>
            <p class="card-text">Pemeriksaan laboratorium lengkap dengan hasil akurat dan cepat untuk mendukung diagnosis.</p>
            <div class="service-details">
              <h6 class="text-primary">Jam Pelayanan:</h6>
              <p class="mb-2"><i class="fas fa-clock me-2"></i>Senin - Jumat: 08:00 - 12:00 WIB</p>
              <h6 class="text-primary mt-3">Jenis Pemeriksaan:</h6>
              <ul class="service-list">
                <li>Darah lengkap</li>
                <li>Gula darah</li>
                <li>Kolesterol</li>
                <li>Urine lengkap</li>
                <li>Tes kehamilan</li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <!-- Apotek -->
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="service-card h-100 fade-in-up">
          <div class="card-body">
            <div class="service-icon">
              <i class="fas fa-pills"></i>
            </div>
            <h5 class="card-title">Apotek</h5>
            <p class="card-text">Penyediaan obat-obatan berkualitas dengan konsultasi farmasis untuk penggunaan yang tepat.</p>
            <div class="service-details">
              <h6 class="text-primary">Jam Pelayanan:</h6>
              <p class="mb-2"><i class="fas fa-clock me-2"></i>Senin - Jumat: 08:00 - 15:00 WIB</p>
              <p class="mb-2"><i class="fas fa-clock me-2"></i>Sabtu: 08:00 - 12:00 WIB</p>
              <h6 class="text-primary mt-3">Layanan:</h6>
              <ul class="service-list">
                <li>Obat resep dokter</li>
                <li>Obat bebas dan bebas terbatas</li>
                <li>Konsultasi obat</li>
                <li>Alat kesehatan</li>
                <li>Suplemen dan vitamin</li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <!-- UGD -->
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="service-card h-100 fade-in-up emergency-card">
          <div class="card-body">
            <div class="service-icon emergency-icon">
              <i class="fas fa-ambulance"></i>
            </div>
            <h5 class="card-title">Unit Gawat Darurat</h5>
            <p class="card-text">Pelayanan gawat darurat 24 jam untuk menangani kasus emergency dan rujukan.</p>
            <div class="service-details">
              <h6 class="text-danger">Jam Pelayanan:</h6>
              <p class="mb-2 text-danger"><i class="fas fa-clock me-2"></i><strong>24 Jam Setiap Hari</strong></p>
              <h6 class="text-primary mt-3">Fasilitas:</h6>
              <ul class="service-list">
                <li>Penanganan kasus emergency</li>
                <li>Ambulance siaga</li>
                <li>Ruang observasi</li>
                <li>Alat resusitasi lengkap</li>
                <li>Tim medis 24 jam</li>
              </ul>
              <div class="emergency-contact">
                <h6 class="text-danger mt-3">Kontak Darurat:</h6>
                <p class="text-danger"><i class="fas fa-phone me-2"></i><strong>(021) 1234-9999</strong></p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Posyandu -->
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="service-card h-100 fade-in-up">
          <div class="card-body">
            <div class="service-icon">
              <i class="fas fa-users"></i>
            </div>
            <h5 class="card-title">Posyandu</h5>
            <p class="card-text">Pos pelayanan terpadu untuk pemantauan tumbuh kembang balita dan kesehatan ibu.</p>
            <div class="service-details">
              <h6 class="text-primary">Jadwal:</h6>
              <p class="mb-2"><i class="fas fa-calendar me-2"></i>Rabu minggu ke-2 setiap bulan</p>
              <p class="mb-2"><i class="fas fa-clock me-2"></i>08:00 - 11:00 WIB</p>
              <h6 class="text-primary mt-3">Kegiatan:</h6>
              <ul class="service-list">
                <li>Penimbangan balita</li>
                <li>Pengukuran tinggi badan</li>
                <li>Pemeriksaan kesehatan</li>
                <li>Penyuluhan gizi</li>
                <li>Imunisasi tambahan</li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <!-- Promkes -->
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="service-card h-100 fade-in-up">
          <div class="card-body">
            <div class="service-icon">
              <i class="fas fa-bullhorn"></i>
            </div>
            <h5 class="card-title">Promosi Kesehatan</h5>
            <p class="card-text">Program edukasi dan penyuluhan kesehatan untuk meningkatkan kesadaran masyarakat.</p>
            <div class="service-details">
              <h6 class="text-primary">Program:</h6>
              <ul class="service-list">
                <li>Penyuluhan hidup sehat</li>
                <li>Edukasi gizi seimbang</li>
                <li>Kampanye anti rokok</li>
                <li>Senam sehat bersama</li>
                <li>Pemberdayaan masyarakat</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Information Section -->
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
</section>

@endsection