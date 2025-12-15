<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Lainnya - Admin</title>

<link href="https://fonts.googleapis.com/css2?family=Commissioner:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/admin/lainya-admin.css') }}">
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

    <!-- ISI LAYAR -->
    <main class="screen">
      <h1 class="page-title">Lainnya</h1>

      <!-- KARTU PROFIL ATAS -->
      <section class="profile-card">
        <p class="profile-greeting">Hallo, SuperAdmin!</p>

        <div class="profile-main-row">
          <div class="profile-photo-wrap">
            <img src="{{ asset('asset/admin/lainya-admin/icon-profil.png') }}" alt="Foto Profil" class="profile-photo">
          </div>

          <div class="profile-info">
            <p class="profile-name">{{ $user->name }}</p>
            <p class="profile-email">{{ $user->email }}</p>
            <p class="profile-phone">{{ $user->phone ?? '-' }}</p> <!-- kalau belum ada nomor -->
          </div>

          <button class="edit-btn" type="button">
            <img src="{{ asset('asset/admin/lainya-admin/icon-edit.png') }}" alt="Edit" class="edit-icon">
          </button>
        </div>
      </section>

      <!-- MENU: MANAJEMEN DATA -->
      <section class="menu-section">
        <h2 class="menu-title">Manajemen Data</h2>

        <a href="{{ route('admin.users.index') }}" class="menu-link">
          <button class="menu-row" type="button">
            <div class="menu-left">
              <img src="{{ asset('asset/admin/lainya-admin/icon-kelola-pengguna.png') }}" alt="" class="menu-icon">
              <span class="menu-text">Kelola Pengguna</span>
            </div>
            <img src="assets/icon-chevron-right.png" alt="" class="menu-chevron">
          </button>
        </a>

        <button class="menu-row" type="button">
          <div class="menu-left">
            <img src="{{ asset('asset/admin/lainya-admin/icon-kelola-blog.png') }}" alt="" class="menu-icon">
            <span class="menu-text">Kelola Blog</span>
          </div>
          <img src="assets/icon-chevron-right.png" alt="" class="menu-chevron">
        </button>

        <button class="menu-row" type="button">
          <div class="menu-left">
            <img src="{{ asset('asset/admin/lainya-admin/icon-tentang-kami.png') }}" alt="" class="menu-icon">
            <span class="menu-text">Kelola Tentang Kami</span>
          </div>
          <img src="assets/icon-chevron-right.png" alt="" class="menu-chevron">
        </button>
      </section>

      <!-- MENU: PENGATURAN -->
      <section class="menu-section">
        <h2 class="menu-title">Pengaturan</h2>

        <button class="menu-row" type="button">
          <div class="menu-left">
            <img src="{{ asset('asset/admin/lainya-admin/icon-ganti-password.png') }}" alt="" class="menu-icon">
            <span class="menu-text">Ganti Kata Sandi</span>
          </div>
          <img src="assets/icon-chevron-right.png" alt="" class="menu-chevron">
        </button>
      </section>
    </main>

    <!-- BOTTOM NAV -->
    <nav class="bottom-nav">
        <a href="admin-beranda">
            <div class="nav-item">
                <img src="{{ asset('asset/admin/lainya-admin/nav-home.png') }}" alt="Halaman Utama" class="nav-item-icon">
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
            <div class="nav-item">
                <img src="{{ asset('asset/admin/admin-beranda/nav-payment.png') }}" alt="Pembayaran" class="nav-item-icon">
                <span class="nav-link">Pembayaran</span>
            </div>
        </a>

        <a href="lainya-admin">
            <div class="nav-item active">
                <img src="{{ asset('asset/admin/lainya-admin/nav-more.png') }}" alt="Lainnya" class="nav-item-icon">
                <span class="nav-link active">Lainnya</span>
            </div>
        </a>
    </nav>
  </div>
</body>
</html>
