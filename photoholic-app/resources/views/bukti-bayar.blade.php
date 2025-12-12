<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Bukti Pembayaran</title>

  <link href="https://fonts.googleapis.com/css2?family=Commissioner:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/pelanggan/bukti-bayar.css') }}">
</head>

<body>
  <div class="phone">

    <!-- STATUS BAR -->
    <div class="status-bar">
      <div class="status-left">
        <img src="{{ asset('asset/pelanggan/bukti-bayar/jam.png') }}" class="status-clock" alt="Jam">
      </div>
      <div class="status-icons">
        <img src="{{ asset('asset/pelanggan/bukti-bayar/icons.png') }}" class="status-img" alt="Status Icons">
      </div>
    </div>

    <!-- HEADER -->
    <header class="app-header">
      <img src="{{ asset('asset/pelanggan/bukti-bayar/logo-header.png') }}" class="header-logo" alt="Photoholic">

      <nav class="header-nav">
        <a href="/beranda" class="nav-link">Beranda</a>
        <a href="/studio" class="nav-link">Studio</a>
        <a href="/blog" class="nav-link">Blog</a>
        <a href="/pemesanan" class="nav-link active">Pemesanan</a>
      </nav>

      <button class="profile-btn" type="button" onclick="location.href='/profil'">
        <img src="{{ asset('asset/pelanggan/bukti-bayar/icon-profil.png') }}" class="profile-icon" alt="Profil">
      </button>
    </header>

    <!-- CONTENT -->
    <div class="screen">

      <!-- TITLE BAR -->
      <div class="page-title-row">
        <button class="back-btn" type="button" onclick="location.href='/beranda'">
          <img src="{{ asset('asset/pelanggan/bukti-bayar/back.png') }}" class="back-icon" alt="Kembali">
        </button>
        <h1 class="page-title">Bukti Pembayaran</h1>
      </div>

      <!-- LIST CARD -->
      <div class="booking-list">

        <!-- CARD 1 - LUNAS -->
        <div class="booking-card">
          <img src="{{ asset('asset/pelanggan/bukti-bayar/sample1.png') }}" class="studio-img" alt="Studio Classy">

          <div class="card-body">
            <div class="top-row">
              <h3 class="studio-title">Classy</h3>
              <span class="badge available">Lunas</span>
            </div>

            <p class="studio-info">Max 10 Orang • Paper Negatif Film</p>
            <p class="studio-info">Jumat, 17 Oktober 2025</p>
            <p class="studio-info">15:00 WIB – 15:05 WIB</p>

            <p class="studio-total">Total : Rp 45.000</p>

            <button class="btn-payment" type="button" onclick="location.href='/rincian-pemesanan'">
              Lihat Rincian Pembayaran
            </button>
          </div>
        </div>

        <!-- CARD 2 - MENUNGGU PEMBAYARAN -->
        <div class="booking-card">
          <img src="{{ asset('asset/pelanggan/bukti-bayar/sample1.png') }}" class="studio-img" alt="Studio Spotlight">

          <div class="card-body">
            <div class="top-row">
              <h3 class="studio-title">Spotlight</h3>
              <span class="badge pending">Menunggu Pembayaran</span>
            </div>

            <p class="studio-info">Max 10 Orang • Photo Paper 4R</p>
            <p class="studio-info">Jumat, 17 Oktober 2025</p>
            <p class="studio-info">15:00 WIB – 15:05 WIB</p>

            <p class="studio-total">Total : Rp 45.000</p>

            <button class="btn-payment disabled" type="button">
              Menunggu Pembayaran
            </button>
          </div>
        </div>

        <!-- CARD 3 - DIBATALKAN -->
        <div class="booking-card">
          <img src="{{ asset('asset/pelanggan/bukti-bayar/sample1.png') }}" class="studio-img" alt="Studio Classy">

          <div class="card-body">
            <div class="top-row">
              <h3 class="studio-title">Classy</h3>
              <span class="badge cancelled">Dibatalkan</span>
            </div>

            <p class="studio-info">Max 10 Orang • Paper Negatif Film</p>
            <p class="studio-info">Jumat, 17 Oktober 2025</p>
            <p class="studio-info">15:00 WIB – 15:05 WIB</p>

            <p class="studio-total">Total : Rp 45.000</p>

            <button class="btn-payment" type="button">
              Pesan Sekarang
            </button>
          </div>
        </div>

      </div>
    </div>

  </div>
</body>
</html>
