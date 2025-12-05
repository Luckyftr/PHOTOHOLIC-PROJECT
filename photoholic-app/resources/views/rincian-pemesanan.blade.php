<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Rincian Pemesanan</title>

<link href="https://fonts.googleapis.com/css2?family=Commissioner:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/pelanggan/rincian-pemesanan.css') }}">
</head>

<body>
  <div class="phone">

    <!-- STATUS BAR -->
    <div class="status-bar">
      <div class="status-left">
        <img src="{{ asset('asset/pelanggan/rincian-pemesanan/jam.png') }}" class="status-clock" alt="Jam">
      </div>
      <div class="status-icons">
        <img src="{{ asset('asset/pelanggan/rincian-pemesanan/icons.png') }}" class="status-img" alt="Status Icons">
      </div>
    </div>

    <!-- HEADER -->
    <header class="app-header">
      <img src="{{ asset('asset/pelanggan/rincian-pemesanan/logo-header.png') }}" class="header-logo" alt="Photoholic">

      <nav class="header-nav">
        <a href="/beranda" class="nav-link">Beranda</a>
        <a href="/studio" class="nav-link">Studio</a>
        <a href="/blog" class="nav-link">Blog</a>
        <a href="/pemesanan" class="nav-link active">Pemesanan</a>
      </nav>

      <button class="profile-btn">
        <img src="{{ asset('asset/pelanggan/rincian-pemesanan/icon-profil.png') }}" class="profile-icon" alt="Profil">
      </button>
    </header>

    <!-- ISI LAYAR -->
    <main class="screen">

      <!-- TITLE BAR -->
      <div class="page-title-row">
        <button class="back-btn">
          <img src="{{ asset('asset/pelanggan/rincian-pemesanan/back.png') }}" class="back-icon" alt="Kembali">
        </button>
        <h1 class="page-title">Rincian Pemesanan</h1>
      </div>

      <!-- KARTU 1: INFORMASI PEMESANAN -->
      <section class="info-card">
        <h2 class="card-title">Informasi Pemesanan</h2>

        <div class="info-row">
          <span class="label">Studio</span>
          <span class="value">Classy</span>
        </div>
        <div class="info-row">
          <span class="label">Tanggal</span>
          <span class="value">17 Oktober 2025</span>
        </div>
        <div class="info-row">
          <span class="label">Waktu</span>
          <span class="value">15:00 - 15:25 WIB</span>
        </div>
        <div class="info-row">
          <span class="label">Durasi Sesi</span>
          <span class="value">25 Menit</span>
        </div>
      </section>

      <!-- KARTU 2: RINCIAN BIAYA -->
      <section class="info-card">
        <h2 class="card-title">Rincian Biaya</h2>

        <div class="info-row">
          <span class="label">Harga Sesi</span>
          <span class="value">Rp 45.000</span>
        </div>
        <div class="info-row">
          <span class="label">Jumlah Sesi</span>
          <span class="value">5</span>
        </div>

        <div class="info-row subtotal-row">
          <span class="label">Subtotal</span>
          <span class="value subtotal">Rp 225.000</span>
        </div>
      </section>

      <!-- KARTU 3: STATUS PEMBAYARAN -->
      <section class="info-card">
        <div class="card-title-row">
          <h2 class="card-title">Status Pembayaran</h2>
          <span class="status-badge">Lunas</span>
        </div>

        <div class="info-row">
          <span class="label">Metode Pembayaran</span>
          <span class="value">QRIS</span>
        </div>
        <div class="info-row">
          <span class="label">ID Transaksi</span>
          <span class="value">98765432100QR</span>
        </div>
        <div class="info-row">
          <span class="label">Tanggal Bayar</span>
          <span class="value">15 Oktober 2025</span>
        </div>

        <button class="btn-bukti">Lihat Bukti Pembayaran</button>
      </section>

    </main>

  </div>
</body>

</html>
