<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Daftar Pemesanan</title>

<link href="https://fonts.googleapis.com/css2?family=Commissioner:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/admin/daftar-pemesanan-admin.css') }}">
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
    <main class="booking-screen">
      <h1 class="page-title-main">Daftar Pemesanan</h1>

      <!-- BAR PENCARIAN + FILTER -->
      <div class="filter-row">
        <div class="search-box">
          <img src="{{ asset('asset/admin/daftar-pemesanan-admin/icon-search.png') }}" alt="Cari" class="search-icon">
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

      <!-- LIST PEMESANAN -->
      <section class="booking-list">

      @forelse ($bookings as $b)
        <article class="booking-item">
          <div class="booking-card">
            <div class="booking-main">
              <div class="booking-left">

                <div class="avatar-circle">
                  <img src="{{ asset('asset/admin/daftar-pemesanan-admin/icon-orang.png') }}"
                      class="avatar-img">
                </div>

                <div class="booking-text">
                  <p class="booking-name">
                    {{ $b->user->name ?? 'Guest' }}
                  </p>

                  <p class="booking-studio">
                    Studio {{ $b->studio }}
                  </p>

                  <p class="booking-time">
                    <span class="time-dot"></span>
                    {{ \Carbon\Carbon::parse($b->tanggal)->translatedFormat('d M Y') }},
                    {{ $b->waktu }}
                  </p>
                </div>

              </div>

              <button class="edit-btn" type="button">
                <img src="{{ asset('asset/admin/daftar-pemesanan-admin/icon-edit.png') }}"
                    class="edit-icon">
              </button>
            </div>
          </div>

          <a href="{{ route('admin.booking.show', $b->id) }}"
            class="btn-detail btn-detail-link">
            Lihat Rincian
          </a>


        </article>

      @empty
        <p class="empty-text">Belum ada pemesanan.</p>
      @endforelse

      </section>

    </main>

    <!-- FAB TAMBAH -->
    <a href="{{ route('admin.studio.index') }}">
      <button class="fab-add" type="button">
        <span>+</span>
      </button>
    </a>

    <!-- BOTTOM NAV -->
    <nav class="bottom-nav">
        <a href="admin-beranda">
            <div class="nav-item">
                <img src="{{ asset('asset/admin/daftar-pemesanan-admin/nav-home.png') }}" alt="Halaman Utama" class="nav-item-icon">
                <span class="nav-link">Halaman Utama</span>
            </div>
        </a>

        <a href="daftar-pemesanan-admin">
            <div class="nav-item active">
                <img src="{{ asset('asset/admin/daftar-pemesanan-admin/nav-booking.png') }}" alt="Pemesanan" class="nav-item-icon">
                <span class="nav-link active">Pemesanan</span>
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
