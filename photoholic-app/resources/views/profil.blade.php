<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Profil</title>

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/pelanggan/profil.css') }}">
</head>

<body>
  <div class="phone">
    <!-- STATUS BAR -->
    <div class="status-bar">
      <div class="status-left">
        <img src="{{ asset('asset/pelanggan/profil/jam.png') }}" alt="Jam" class="status-clock">
      </div>
      <div class="status-icons">
        <img src="{{ asset('asset/pelanggan/profil/icons.png') }}" alt="Status icons" class="status-img">
      </div>
    </div>

    <!-- HEADER PINK -->
    <header class="app-header">
      <div class="header-left">
        <img src="{{ asset('asset/pelanggan/profil/logo-header.png') }}" alt="Photoholic" class="header-logo">
      </div>

      <nav class="header-nav">
        <a href="/beranda" class="nav-link">Beranda</a>
        <a href="/studio" class="nav-link">Studio</a>
        <a href="/blog" class="nav-link">Blog</a>
        <a href="/pemesanan" class="nav-link">Pemesanan</a>
      </nav>

      <button class="profile-btn" type="button">
        <img src="{{ asset('asset/pelanggan/profil/icon-profil.png') }}" alt="Profil" class="profile-icon active">
      </button>
    </header>

    <!-- ISI LAYAR -->
    <main class="screen">
      <!-- KARTU PROFIL ATAS -->
      <section class="profile-card">
        <p class="profile-greeting">Hallo, {{ $user->name }}!</p>

        <div class="profile-main-row">
          <div class="profile-photo-wrap">
            <img src="{{ asset('storage/profil/' . ($user->foto_profil ?? 'default.png')) }}" alt="profil">
          </div>

          <div class="profile-info">
            <p class="profile-name">{{ $user->name }}</p>
            <p class="profile-email">{{ $user->email }}</p>
            <p class="profile-phone">{{ $user->phone ?? '-' }}</p> <!-- kalau belum ada nomor -->
          </div>

          <button class="edit-btn" type="button" onclick="location.href='/edit-profile'">
            <img src="{{ asset('asset/pelanggan/profil/icon-edit.png') }}" alt="Edit" class="edit-icon">
          </button>
        </div>

        <p class="order-label">Pesanan Saya</p>

        <div class="order-actions">
          <button class="order-item" type="button" onclick="location.href='/pemesanan'">
            <img src="{{ asset('asset/pelanggan/profil/icon-jadwal.png') }}" alt="" class="order-icon">
            <span class="order-text">Jadwal<br>Saya</span>
          </button>

          <button class="order-item" type="button" onclick="location.href='/pemesanan'">
            <img src="{{ asset('asset/pelanggan/profil/icon-riwayat.png') }}" alt="" class="order-icon">
            <span class="order-text">Riwayat<br>Pembayaran</span>
          </button>

          <button class="order-item" type="button" onclick="location.href='/keluar'">
            <img src="{{ asset('asset/pelanggan/profil/icon-logout.png') }}" alt="" class="order-icon">
            <span class="order-text">Keluar</span>
          </button>
        </div>
      </section>

      <!-- MENU AKUN -->
      <section class="menu-section">
        <h2 class="menu-title">Akun</h2>

        <button class="menu-row" type="button" onclick="location.href='/ubahPW'">
          <div class="menu-left">
            <img src="{{ asset('asset/pelanggan/profil/icon-ganti-password.png') }}" alt="" class="menu-icon">
            <span class="menu-text">Ganti Kata Sandi</span>
          </div>
          <img src="{{ asset('asset/pelanggan/profil/icon-chevron-right.png') }}" alt="" class="menu-chevron">
        </button>

        <button class="menu-row" type="button" onclick="location.href='/ganti-akun'">
          <div class="menu-left">
            <img src="{{ asset('asset/pelanggan/profil/icon-ganti-akun.png') }}" alt="" class="menu-icon">
            <span class="menu-text">Ganti Akun</span>
          </div>
          <img src="{{ asset('asset/pelanggan/profil/icon-chevron-right.png') }}" alt="" class="menu-chevron">
        </button>
      </section>

      <!-- MENU BANTUAN -->
      <section class="menu-section">
        <h2 class="menu-title">Bantuan</h2>

        <button class="menu-row" type="button" onclick="location.href='/faq'">
          <div class="menu-left">
            <img src="{{ asset('asset/pelanggan/profil/icon-faq.png') }}" alt="" class="menu-icon">
            <span class="menu-text">Pertanyaan yang Sering Diajukan</span>
          </div>
          <img src="{{ asset('assets/icon-chevron-right.png') }}" alt="" class="menu-chevron">
        </button>

        <button class="menu-row" type="button" onclick="location.href='/tentang-kami'">
          <div class="menu-left">
            <img src="{{ asset('asset/pelanggan/profil/icon-tentang-kami.png') }}" alt="" class="menu-icon">
            <span class="menu-text">Tentang Kami</span>
          </div>
          <img src="a{{ asset('sset/pelanggan/profil/icon-chevron-right.png') }}" alt="" class="menu-chevron">
        </button>

        <button class="menu-row" type="button" onclick="location.href='/rating-apk'">
          <div class="menu-left">
            <img src="{{ asset('asset/pelanggan/profil/icon-rating.png') }}" alt="" class="menu-icon">
            <span class="menu-text">Rating Aplikasi</span>
          </div>
          <img src="{{ asset('asset/pelanggan/profil/icon-chevron-right.png') }}" alt="" class="menu-chevron">
        </button>
      </section>
    </main>
  </div>
</body>
</html>
