<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Rincian Pemesanan</title>

<link href="https://fonts.googleapis.com/css2?family=Commissioner:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/admin/admin-rincian-pemesanan.css') }}">
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
    <main class="detail-screen">

      <!-- HEADER ATAS -->
      <header class="detail-header">
        <button class="back-btn" onclick="history.back()" type="button">
          <img src="{{ asset('asset/admin/admin-rincian-pemesanan/back.png') }}" alt="Kembali" class="back-icon">
        </button>
        <h1 class="page-title-detail">Rincian Pemesanan</h1>
      </header>

      <!-- INFORMASI PEMESAN -->
      <section class="section-block">
        <h2 class="section-title">Informasi Pemesan</h2>

        <div class="card">
          <div class="buyer-row">
            <div class="avatar-circle">
              <img src="assets/icon-orang.png" alt="User" class="avatar-img">
            </div>

            <div class="buyer-text">
                <p class="buyer-name">{{ $booking->user->name }}</p>
                <p class="buyer-contact">
                {{ $booking->user->email }}<br>
                {{ $booking->user->phone }}
                </p>

            </div>
          </div>
        </div>
      </section>

      <!-- INFORMASI PEMESANAN -->
      <section class="section-block">
        <h2 class="section-title">Informasi Pemesanan</h2>

        <div class="card">
          <div class="info-row">
            <span class="info-label">Studio</span>
            <span class="info-value">{{ $booking->studioRel->nama }}</span>
          </div>
          <div class="info-row">
            <span class="info-label">Tanggal</span>
            <span class="info-value">
                {{ \Carbon\Carbon::parse($booking->tanggal)->translatedFormat('d F Y') }}
            </span>

          </div>
          <div class="info-row">
            <span class="info-label">Waktu</span>
            <span class="info-value">
             {{ $booking->waktu }} WIB
            </span>

          </div>
          <div class="info-row">
            <span class="info-label">Durasi Sesi</span>
            <span class="info-value">
                {{ $booking->jumlah_sesi * 5 }} Menit
            </span>
          </div>
        </div>
      </section>

      <!-- RINCIAN BIAYA -->
      <section class="section-block">
        <h2 class="section-title">Rincian Biaya</h2>

        <div class="card">
          <div class="info-row">
            <span class="info-label">Harga Sesi</span>
            <span class="info-value price-strong">
                Rp {{ number_format($booking->harga_sesi, 0, ',', '.') }}
            </span>

          </div>
          <div class="info-row">
            <span class="info-label">Jumlah Sesi</span>
            <span class="info-value">{{ $booking->jumlah_sesi }}</span>

          </div>
          <div class="info-row">
            <span class="info-label">Subtotal</span>
            <span class="info-value price-strong">
             Rp {{ number_format($booking->subtotal, 0, ',', '.') }}
            </span>

          </div>
        </div>
      </section>

      <!-- STATUS PEMBAYARAN -->
      <section class="section-block">
        <h2 class="section-title">Status Pembayaran</h2>

        <div class="card">
          <div class="status-header">
            <span>Status Pembayaran</span>
            <span class="status-badge">
                {{ strtoupper($booking->status) }}
            </span>

          </div>

          <div class="info-row">
            <span class="info-label">Metode Pembayaran</span>
            <span class="info-value">
                {{ $booking->metode_pembayaran ?? '-' }}
            </span>

          </div>
          <div class="info-row">
            <span class="info-label">ID Transaksi</span>
            <span class="info-value">
                {{ $booking->id_transaksi ?? '-' }}
            </span>
          </div>
          <div class="info-row">
            <span class="info-label">Tanggal Bayar</span>
            <span class="info-value">
            {{ $booking->tanggal_bayar
                ? \Carbon\Carbon::parse($booking->tanggal_bayar)->translatedFormat('d F Y')
                : '-' }}
            </span>

          </div>

          @if($booking->status_pembayaran === 'lunas')
            <button class="btn-bukti" type="button">
                Lihat Bukti Pembayaran
            </button>
          @endif

        </div>
      </section>

    </main>

    <!-- BOTTOM NAV -->
    <nav class="bottom-nav">
        <a href="/admin-beranda">
            <div class="nav-item">
                <img src="{{ asset('asset/admin/daftar-pemesanan-admin/nav-home.png') }}" alt="Halaman Utama" class="nav-item-icon">
                <span class="nav-link">Halaman Utama</span>
            </div>
        </a>

        <a href="/daftar-pemesanan-admin">
            <div class="nav-item active">
                <img src="{{ asset('asset/admin/daftar-pemesanan-admin/nav-booking.png') }}" alt="Pemesanan" class="nav-item-icon">
                <span class="nav-link active">Pemesanan</span>
            </div>
        </a>

        <a href="/studio-admin">
            <div class="nav-item">
                <img src="{{ asset('asset/admin/admin-beranda/nav-studio.png') }}" alt="Studio" class="nav-item-icon">
                <span class="nav-link">Studio</span>
            </div>
        </a>

        <a href="/pembayaran-admin">
            <div class="nav-item">
                <img src="{{ asset('asset/admin/admin-beranda/nav-payment.png') }}" alt="Pembayaran" class="nav-item-icon">
                <span class="nav-link">Pembayaran</span>
            </div>
        </a>

        <a href="/lainya-admin">
            <div class="nav-item">
                <img src="{{ asset('asset/admin/admin-beranda/nav-more.png') }}" alt="Lainnya" class="nav-item-icon">
                <span class="nav-link">Lainnya</span>
            </div>
        </a>
    </nav>

  </div>
</body>

</html>
