<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Halaman Utama</title>

<link href="https://fonts.googleapis.com/css2?family=Commissioner:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/admin/admin-beranda.css') }}">
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

    <!-- HEADER BRAND -->
    <header class="home-header">
      <img src="{{ asset('asset/pelanggan/beranda/logo-header.png') }}" alt="Photoholic" class="home-logo">
    </header>

    <!-- KONTEN UTAMA -->
    <main class="home-screen">
      <section class="dashboard-card">
        <h1 class="dashboard-title">Halaman Utama</h1>

        <!-- GRID STATISTIK -->
        <div class="stats-grid">
          <!-- Total booking hari ini -->
          <div class="stat-card primary">
            <div class="stat-top-row">
              <div class="stat-label">Total Booking Hari Ini</div>
              <!-- ikon kalender (placeholder) -->
              <img src="{{ asset('asset/admin/admin-beranda/icon-booking.png') }} " alt="Booking" class="stat-icon">
            </div>
            <div class="stat-value">12</div>
          </div>

          <!-- Total pendapatan bulan ini -->
          <div class="stat-card">
            <div class="stat-top-row">
              <div class="stat-label">Total Pendapatan Bulan Ini</div>
              <!-- ikon uang (placeholder) -->
              <img src="{{ asset('asset/admin/admin-beranda/icon-income.png') }}" alt="Pendapatan" class="stat-icon">
            </div>
            <div class="stat-text">Rp 4.5 Juta</div>
          </div>

          <!-- Studio terpopuler -->
          <div class="stat-card">
            <div class="stat-top-row">
              <div class="stat-label">Studio Terpopuler</div>
              <!-- ikon studio (placeholder) -->
              <img src="{{ asset('asset/admin/admin-beranda/icon-studio.png') }}" alt="Studio" class="stat-icon">
            </div>
            <div class="stat-text">Classy</div>
          </div>

          <!-- Total pengguna -->
          <div class="stat-card">
            <div class="stat-top-row">
              <div class="stat-label">Total Pengguna</div>
              <!-- ikon user (placeholder) -->
              <img src="{{ asset('asset/admin/admin-beranda/icon-user.png') }}" alt="Pengguna" class="stat-icon">
            </div>
            <div class="stat-text">240</div>
          </div>
        </div>

        <!-- PEMESANAN / CHART -->
        <h2 class="booking-section-title">Pemesanan</h2>

        <div class="chart-card">
          <div class="chart-header">
            <div class="chart-title">Pemesanan</div>
            <button class="chart-filter" type="button">
              Mingguan
              <span class="chart-filter-icon">▾</span>
            </button>
          </div>

          <div class="chart-body">
            <div class="chart-area">
              <div class="chart-line"></div>
              <div class="chart-point"></div>
            </div>

            <div class="chart-footer">
              <span>Sun</span>
              <span>Mon</span>
              <span>Tue</span>
              <span>Wed</span>
              <span>Thu</span>
              <span>Fri</span>
              <span>Sat</span>
            </div>
          </div>
        </div>
      </section>
    </main>

    <!-- NAV BAR BAWAH -->
    <nav class="bottom-nav">
        <a href="admin-beranda">
            <div class="nav-item active">
                <img src="{{ asset('asset/admin/admin-beranda/nav-home.png') }}" alt="Halaman Utama" class="nav-item-icon">
                <span class="nav-link active">Halaman Utama</span>
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
            <div class="nav-item">
                <img src="{{ asset('asset/admin/admin-beranda/nav-more.png') }}" alt="Lainnya" class="nav-item-icon">
                <span class="nav-link">Lainnya</span>
            </div>
        </a>
    </nav>

  </div>
</body>
</html>
