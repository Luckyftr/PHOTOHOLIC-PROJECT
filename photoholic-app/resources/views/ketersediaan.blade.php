<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cek Ketersediaan</title>

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/pelanggan/ketersediaan.css') }}">
</head>

<body>
  <div class="phone">

    <!-- STATUS BAR -->
    <div class="status-bar">
      <div class="status-left">
        <img src="{{ asset('asset/pelanggan/ketersediaan/jam.png') }}" class="status-clock">
      </div>
      <div class="status-icons">
        <img src="{{ asset('asset/pelanggan/ketersediaan/icons.png') }}" class="status-img">
      </div>
    </div>

    <!-- HEADER -->
    <header class="app-header">
      <img src="{{ asset('asset/pelanggan/ketersediaan/logo-header.png') }}" class="header-logo">

      <nav class="header-nav">
        <a href="/beranda" class="nav-link">Beranda</a>
        <a href="/studio" class="nav-link">Studio</a>
        <a href="blog" class="nav-link">Blog</a>
        <a href="/pemesanan" class="nav-link">Pemesanan</a>
      </nav>

      <button class="profile-btn">
        <img src="{{ asset('asset/pelanggan/ketersediaan/icon-profil.png') }}" class="profile-icon">
      </button>
    </header>

    <!-- CONTENT -->
    <div class="screen">

      <!-- TITLE BAR -->
      <div class="page-title-row">
        <button class="back-btn" onclick="location.href='/beranda'">
            <img src="{{ asset('asset/pelanggan/ketersediaan/back.png') }}" class="back-icon"></button>
        <h1 class="page-title">Cek Ketersediaan</h1>
      </div>

      <!-- DATE SELECTOR -->
      <div class="date-row">
        <div class="date-box active">
          <span class="day">Jumat</span>
          <span class="num">17</span>
        </div>

        <div class="date-box">
          <span class="day">Sabtu</span>
          <span class="num">18</span>
        </div>

        <div class="date-box">
          <span class="day">Minggu</span>
          <span class="num">19</span>
        </div>

        <div class="date-box">
          <span class="day">Senin</span>
          <span class="num">20</span>
        </div>

        <div class="date-box">
          <span class="day">Selasa</span>
          <span class="num">21</span>
        </div>

        <div class="date-box">
          <span class="day">Rabu</span>
          <span class="num">22</span>
        </div>
      </div>

      <!-- LIST CARD -->
      <div class="booking-list">

        <!-- CARD 1 -->
        <div class="booking-card">
          <img src="{{ asset('asset/pelanggan/ketersediaan/sample1.png') }}" class="studio-img">

          <div class="card-body">
            <div class="top-row">
              <h3 class="studio-title">Classy</h3>
              <span class="badge available">Tersedia</span>
            </div>

            <p class="studio-info">Max 10 Orang • Paper Negatif Film</p>
            <p class="studio-info">Jumat, 17 Oktober 2025</p>
            <p class="studio-info">15:00 WIB – 15:05 WIB</p>

            <p class="studio-price">Harga: Rp 45.000/Sesi</p>

            <button class="btn-order">Pesan Sekarang</button>
          </div>
        </div>

        <!-- CARD 2 -->
        <div class="booking-card">
          <img src="{{ asset('asset/pelanggan/ketersediaan/sample2.png') }}" class="studio-img">

          <div class="card-body">
            <div class="top-row">
              <h3 class="studio-title">Spotlight</h3>
              <span class="badge not-available">Tidak Tersedia</span>
            </div>

            <p class="studio-info">Max 10 Orang • Paper Negatif Film</p>
            <p class="studio-info">Jumat, 17 Oktober 2025</p>
            <p class="studio-info">15:00 WIB – 15:05 WIB</p>

            <p class="studio-price">Harga: Rp 35.000/Sesi</p>

            <button class="btn-order disabled">Pesan Sekarang</button>
          </div>
        </div>

        <!-- CARD 3 -->
        <div class="booking-card">
          <img src="{{ asset('asset/pelanggan/ketersediaan/sample1.png') }}" class="studio-img">

          <div class="card-body">
            <div class="top-row">
              <h3 class="studio-title">Classy</h3>
              <span class="badge available">Tersedia</span>
            </div>

            <p class="studio-info">Max 10 Orang • Paper Negatif Film</p>
            <p class="studio-info">Jumat, 17 Oktober 2025</p>
            <p class="studio-info">15:00 WIB – 15:05 WIB</p>

            <p class="studio-price">Harga: Rp 45.000/Sesi</p>

            <button class="btn-order">Pesan Sekarang</button>
          </div>
        </div>

        <!-- CARD 4 -->
        <div class="booking-card">
          <img src="{{ asset('asset/pelanggan/ketersediaan/sample1.png') }}" class="studio-img">

          <div class="card-body">
            <div class="top-row">
              <h3 class="studio-title">Classy</h3>
              <span class="badge available">Tersedia</span>
            </div>

            <p class="studio-info">Max 10 Orang • Paper Negatif Film</p>
            <p class="studio-info">Jumat, 17 Oktober 2025</p>
            <p class="studio-info">15:00 WIB – 15:05 WIB</p>

            <p class="studio-price">Harga: Rp 45.000/Sesi</p>

            <button class="btn-order">Pesan Sekarang</button>
          </div>
        </div>

      </div>
    </div>

  </div>
</body>
</html>
