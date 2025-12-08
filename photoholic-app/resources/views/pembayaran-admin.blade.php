<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Pembayaran</title>

<link href="https://fonts.googleapis.com/css2?family=Commissioner:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/admin/pembayaran-admin.css') }}">
</head>

<body>
  <div class="phone">

    <!-- STATUS BAR -->
    <div class="status-bar">
      <div class="status-left">
        <img src="{{ asset('asset/pelanggan/beranda/jam.png') }}" alt="Jam" class="status-clock">
      </div>

      <div class="status-icons">
        <img src="{{ asset('asset/pelanggan/beranda/icons.png') }}" alt="Status icons" class="status-img">
      </div>
    </div>

    <!-- KONTEN UTAMA -->
    <main class="payment-screen">
      <h1 class="page-title-main">Pembayaran</h1>

      <!-- BAR PENCARIAN + FILTER -->
      <div class="filter-row">
        <div class="search-box">
          <img src="{{ asset('asset/admin/pembayaran-admin/icon-search.png') }}" alt="Cari" class="search-icon">
          <input type="text" placeholder="Cari" class="search-input">
        </div>

        <button class="chip chip-outline" type="button">
          Terbaru
          <span class="chip-arrow">▾</span>
        </button>

        <button class="chip chip-outline" type="button">
          Semua
          <span class="chip-arrow">▾</span>
        </button>
      </div>

      <!-- LIST PEMBAYARAN -->
      <section class="payment-list">

        <!-- ITEM 1 - LUNAS -->
        <article class="payment-item">
          <div class="payment-card">
            <div class="payment-row">
              <div class="payment-left">
                <p class="payment-id">9876543210QR</p>
                <p class="payment-name">Berlian Ika</p>
                <p class="payment-method">Metode Pembayaran : QRIS</p>
                <p class="payment-total">Total : <span>Rp. 220.000</span></p>
              </div>

              <span class="status-pill status-lunas">LUNAS</span>
            </div>
          </div>

          <div class="btn-detail-wrapper">
            <button class="btn-detail" type="button">Lihat Rincian</button>
          </div>
        </article>

        <!-- ITEM 2 - MENUNGGU PEMBAYARAN -->
        <article class="payment-item">
          <div class="payment-card">
            <div class="payment-row">
              <div class="payment-left">
                <p class="payment-id">9876543210QR</p>
                <p class="payment-name">Berlian Ika</p>
                <p class="payment-method">Metode Pembayaran : QRIS</p>
                <p class="payment-total">Total : <span>Rp. 220.000</span></p>
              </div>

              <span class="status-pill status-pending">Menunggu Pembayaran</span>
            </div>
          </div>

          <div class="btn-detail-wrapper">
            <button class="btn-detail" type="button">Lihat Rincian</button>
          </div>
        </article>

        <!-- ITEM 3 - LUNAS -->
        <article class="payment-item">
          <div class="payment-card">
            <div class="payment-row">
              <div class="payment-left">
                <p class="payment-id">9876543210QR</p>
                <p class="payment-name">Berlian Ika</p>
                <p class="payment-method">Metode Pembayaran : QRIS</p>
                <p class="payment-total">Total : <span>Rp. 220.000</span></p>
              </div>

              <span class="status-pill status-lunas">LUNAS</span>
            </div>
          </div>

          <div class="btn-detail-wrapper">
            <button class="btn-detail" type="button">Lihat Rincian</button>
          </div>
        </article>

        <!-- ITEM 4 - LUNAS -->
        <article class="payment-item">
          <div class="payment-card">
            <div class="payment-row">
              <div class="payment-left">
                <p class="payment-id">9876543210QR</p>
                <p class="payment-name">Berlian Ika</p>
                <p class="payment-method">Metode Pembayaran : QRIS</p>
                <p class="payment-total">Total : <span>Rp. 220.000</span></p>
              </div>

              <span class="status-pill status-lunas">LUNAS</span>
            </div>
          </div>

          <div class="btn-detail-wrapper">
            <button class="btn-detail" type="button">Lihat Rincian</button>
          </div>
        </article>

      </section>
    </main>

    <!-- BOTTOM NAV -->
    <nav class="bottom-nav">
        <a href="admin-beranda">
            <div class="nav-item">
                <img src="{{ asset('asset/admin/pembayaran-admin/nav-home.png') }}" alt="Halaman Utama" class="nav-item-icon">
                <span class="nav-link">Halaman Utama</span>
            </div>
        </a>

        <a href="daftar-pemesanan-admin">
            <div class="nav-item">
                <img src="{{ asset('asset/admin/admin-beranda/nav-booking.png') }}" alt="Pemesanan" class="nav-item-icon">
                <span class="nav-link">Pemesanan</span>
            </div>
        </a>

        <a href="studio-admin">
            <div class="nav-item">
                <img src="{{ asset('asset/admin/admin-beranda/nav-studio.png') }}" alt="Studio" class="nav-item-icon">
                <span class="nav-link">Studio</span>
            </div>
        </a>

        <a href="pembayaran-admin">
            <div class="nav-item active">
                <img src="{{ asset('asset/admin/pembayaran-admin/nav-payment.png') }}" alt="Pembayaran" class="nav-item-icon">
                <span class="nav-link active">Pembayaran</span>
            </div>
        </a>

        <a href="lainya-admin">
            <div class="nav-item">
                <img src="{{ asset('asset/admin/admin-beranda/nav-more.png') }}" alt="Lainnya" class="nav-item-icon">
                <span class="nav-link">Lainnya</span>
            </div>
        </a>
    </nav>

  </div>
</body>
</html>
