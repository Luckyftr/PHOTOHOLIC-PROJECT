<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Profil</title>

  <link href="https://fonts.googleapis.com/css2?family=Commissioner:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/pelanggan/profil.css') }}">
</head>

<body>
<div class="phone">

  <!-- STATUS BAR -->
  <div class="status-bar">
    <div class="status-left">
      <img src="{{ asset('asset/pelanggan/profil/jam.png') }}" class="status-clock" alt="jam">
    </div>
    <div class="status-icons">
      <img src="{{ asset('asset/pelanggan/profil/icons.png') }}" class="status-img" alt="icons">
    </div>
  </div>

  <!-- HEADER -->
  <header class="app-header">
    <div class="header-left">
      <img src="{{ asset('asset/pelanggan/profil/logo-header.png') }}" class="header-logo" alt="logo">
    </div>

    <nav class="header-nav">
      <a href="/beranda" class="nav-link">Beranda</a>
      <a href="/studio" class="nav-link">Studio</a>
      <a href="/blog" class="nav-link">Blog</a>
      <a href="/pemesanan" class="nav-link">Pemesanan</a>
    </nav>

    <button class="profile-btn" type="button">
      <img src="{{ asset('asset/pelanggan/profil/icon-profil.png') }}" class="profile-icon active" alt="profil">
    </button>
  </header>

  <!-- CONTENT -->
  <main class="screen">

    <!-- PROFILE CARD -->
    <section class="profile-card">
      <p class="profile-greeting">Hallo, {{ $user->name }}!</p>

      <div class="profile-main-row">
        <div class="profile-photo-wrap">
          <img
            src="{{ asset('storage/profil/' . ($user->foto_profil ?? 'default.png')) }}"
            alt="Foto Profil"
          >
        </div>

        <div class="profile-info">
          <p class="profile-name">{{ $user->name }}</p>
          <p class="profile-email">{{ $user->email }}</p>
          <p class="profile-phone">{{ $user->phone ?? '-' }}</p>
        </div>

        <button class="edit-btn" type="button" onclick="location.href='/edit-profile'">
          <img src="{{ asset('asset/pelanggan/profil/icon-edit.png') }}" class="edit-icon" alt="edit">
        </button>
      </div>

      <p class="order-label">Pesanan Saya</p>

      <div class="order-actions">
        <button class="order-item" type="button" onclick="location.href='/pemesanan'">
          <img src="{{ asset('asset/pelanggan/profil/icon-jadwal.png') }}" class="order-icon" alt="">
          <span class="order-text">Jadwal<br>Saya</span>
        </button>

        <button class="order-item" type="button" onclick="location.href='/pemesanan'">
          <img src="{{ asset('asset/pelanggan/profil/icon-riwayat.png') }}" class="order-icon" alt="">
          <span class="order-text">Riwayat<br>Pembayaran</span>
        </button>

        <button class="order-item" type="button" onclick="location.href='/keluar'">
          <img src="{{ asset('asset/pelanggan/profil/icon-logout.png') }}" class="order-icon" alt="">
          <span class="order-text">Keluar</span>
        </button>
      </div>
    </section>

    <!-- MENU AKUN -->
    <section class="menu-section">
      <h2 class="menu-title">Akun</h2>

      <button class="menu-row" type="button" onclick="location.href='/ubahPW'">
        <div class="menu-left">
          <img src="{{ asset('asset/pelanggan/profil/icon-ganti-password.png') }}" class="menu-icon" alt="">
          <span class="menu-text">Ganti Kata Sandi</span>
        </div>
        <img src="{{ asset('asset/pelanggan/profil/icon-chevron-right.png') }}" class="menu-chevron" alt="">
      </button>

      <button class="menu-row" type="button" onclick="location.href='/ganti-akun'">
        <div class="menu-left">
          <img src="{{ asset('asset/pelanggan/profil/icon-ganti-akun.png') }}" class="menu-icon" alt="">
          <span class="menu-text">Ganti Akun</span>
        </div>
        <img src="{{ asset('asset/pelanggan/profil/icon-chevron-right.png') }}" class="menu-chevron" alt="">
      </button>
    </section>

    <!-- MENU BANTUAN -->
    <section class="menu-section">
      <h2 class="menu-title">Bantuan</h2>

      <button class="menu-row" type="button" onclick="location.href='/faq'">
        <div class="menu-left">
          <img src="{{ asset('asset/pelanggan/profil/icon-faq.png') }}" class="menu-icon" alt="">
          <span class="menu-text">Pertanyaan yang Sering Diajukan</span>
        </div>
        <img src="{{ asset('asset/pelanggan/profil/icon-chevron-right.png') }}" class="menu-chevron" alt="">
      </button>

      <button class="menu-row" type="button" onclick="location.href='/tentang-kami'">
        <div class="menu-left">
          <img src="{{ asset('asset/pelanggan/profil/icon-tentang-kami.png') }}" class="menu-icon" alt="">
          <span class="menu-text">Tentang Kami</span>
        </div>
        <img src="{{ asset('asset/pelanggan/profil/icon-chevron-right.png') }}" class="menu-chevron" alt="">
      </button>

      <button class="menu-row" type="button" onclick="location.href='/rating-apk'">
        <div class="menu-left">
          <img src="{{ asset('asset/pelanggan/profil/icon-rating.png') }}" class="menu-icon" alt="">
          <span class="menu-text">Rating Aplikasi</span>
        </div>
        <img src="{{ asset('asset/pelanggan/profil/icon-chevron-right.png') }}" class="menu-chevron" alt="">
      </button>
    </section>

  </main>

  <!-- FOOTER (diambil dari UI baru) -->
  <footer class="footer-bar">
    <div class="footer-inner">

      <div class="footer-item">
        <img src="{{ asset('asset/pelanggan/footer/icon_wa.png') }}" class="footer-icon" alt="">
        <span>0851-2400-0950</span>
      </div>

      <div class="footer-item">
        <img src="{{ asset('asset/pelanggan/footer/icon_ig.png') }}" class="footer-icon" alt="">
        <span>@photoholic.indonesia</span>
      </div>

      <div class="footer-item">
        <img src="{{ asset('asset/pelanggan/footer/icon_email.png') }}" class="footer-icon" alt="">
        <span>minphotoholic@gmail.com</span>
      </div>

    </div>
  </footer>

</div>
</body>
</html>
