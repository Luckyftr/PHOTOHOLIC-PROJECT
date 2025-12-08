<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Studio</title>

<link href="https://fonts.googleapis.com/css2?family=Commissioner:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/admin/studio-admin.css') }}">
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
    <main class="studio-screen">
      <h1 class="page-title-main">Studio</h1>

      <div class="studio-list">

        <!-- CARD 1 -->
        <article class="studio-card">
          <div class="studio-card-body">
            <div class="studio-thumb">
              <img src="{{ asset('asset/admin/studio-admin/studio-classy.png') }}" alt="Classy">
            </div>
            <div class="studio-info">
              <div class="studio-info-header">
                <h2 class="studio-name">Classy</h2>
                <span class="status-pill active">AKTIF</span>
              </div>
              <p class="studio-detail">Max 10 Orang · Paper Negatif Film</p>
              <p class="studio-price">Harga : <span>Rp 45.000/Sesi</span></p>
            </div>
          </div>

          <div class="studio-card-actions">
            <button class="btn-card btn-card-danger" type="button">Nonaktifkan</button>
            <button class="btn-card btn-card-edit" type="button">Edit</button>
          </div>
        </article>

        <!-- CARD 2 -->
        <article class="studio-card">
          <div class="studio-card-body">
            <div class="studio-thumb">
              <img src="{{ asset('asset/admin/studio-admin/studio-oven.png') }}" alt="Oven">
            </div>
            <div class="studio-info">
              <div class="studio-info-header">
                <h2 class="studio-name">Oven</h2>
                <span class="status-pill active">AKTIF</span>
              </div>
              <p class="studio-detail">Max 4 Orang · Photo Paper 4R</p>
              <p class="studio-price">Harga : <span>Rp 45.000/Sesi</span></p>
            </div>
          </div>

          <div class="studio-card-actions">
            <button class="btn-card btn-card-danger" type="button">Nonaktifkan</button>
            <button class="btn-card btn-card-edit" type="button">Edit</button>
          </div>
        </article>

        <!-- CARD 3 -->
        <article class="studio-card">
          <div class="studio-card-body">
            <div class="studio-thumb">
              <img src="{{ asset('asset/admin/studio-admin/studio-lavatory.png') }}" alt="Lavatory">
            </div>
            <div class="studio-info">
              <div class="studio-info-header">
                <h2 class="studio-name">Lavatory</h2>
                <span class="status-pill active">AKTIF</span>
              </div>
              <p class="studio-detail">Max 6 Orang · Photo Paper 4R</p>
              <p class="studio-price">Harga : <span>Rp 45.000/Sesi</span></p>
            </div>
          </div>

          <div class="studio-card-actions">
            <button class="btn-card btn-card-danger" type="button">Nonaktifkan</button>
            <button class="btn-card btn-card-edit" type="button">Edit</button>
          </div>
        </article>

        <!-- CARD 4 -->
        <article class="studio-card">
          <div class="studio-card-body">
            <div class="studio-thumb">
              <img src="{{ asset('asset/admin/studio-admin/studio-spotlight.png') }}" alt="Spot Light">
            </div>
            <div class="studio-info">
              <div class="studio-info-header">
                <h2 class="studio-name">Spot Light</h2>
                <span class="status-pill active">AKTIF</span>
              </div>
              <p class="studio-detail">Max 8 Orang · Photo Paper 4R</p>
              <p class="studio-price">Harga : <span>Rp 45.000/Sesi</span></p>
            </div>
          </div>

          <div class="studio-card-actions">
            <button class="btn-card btn-card-danger" type="button">Nonaktifkan</button>
            <button class="btn-card btn-card-edit" type="button">Edit</button>
          </div>
        </article>

      </div>
    </main>

    <!-- FAB TAMBAH -->
    <button class="fab-add" type="button">+</button>

    <!-- BOTTOM NAV -->
    <nav class="bottom-nav">
        <a href="admin-beranda">
            <div class="nav-item">
                <img src="{{ asset('asset/admin/studio-admin/nav-home.png') }}" alt="Halaman Utama" class="nav-item-icon">
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
            <div class="nav-item active">
                <img src="{{ asset('asset/admin/studio-admin/nav-studio.png') }}" alt="Studio" class="nav-item-icon">
                <span class="nav-link active">Studio</span>
            </div>
        </a>

        <a href="pembayaran-admin">
            <div class="nav-item">
                <img src="{{ asset('asset/admin/admin-beranda/nav-payment.png') }}" alt="Pembayaran" class="nav-item-icon">
                <span class="nav-link">Pembayaran</span>
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
