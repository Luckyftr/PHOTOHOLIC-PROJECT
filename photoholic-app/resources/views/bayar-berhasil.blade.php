<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bukti Pembayaran</title>

  <link href="https://fonts.googleapis.com/css2?family=Commissioner:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/pelanggan/bayar-berhasil.css') }}">
</head>

<body>
  <div class="phone">

    <!-- STATUS BAR -->
    <div class="status-bar">
      <img src="{{ asset('asset/pelanggan/bayar-berhasil/jam.png') }}" class="status-clock" alt="clock">
      <img src="{{ asset('asset/pelanggan/bayar-berhasil/icons.png') }}" class="status-img" alt="status">
    </div>

    <!-- HEADER -->
    <header class="app-header">
      <img src="{{ asset('asset/pelanggan/bayar-berhasil/logo-header.png') }}" class="header-logo" alt="logo">

      <nav class="header-nav">
        <a href="/beranda" class="nav-link">Beranda</a>
        <a href="/studio" class="nav-link">Studio</a>
        <a href="/blog" class="nav-link">Blog</a>
        <a href="/pemesanan" class="nav-link active">Pemesanan</a>
      </nav>

      <button class="profile-btn" onclick="location.href='/profil'">
        <img src="{{ asset('asset/pelanggan/bayar-berhasil/icon-profil.png') }}" class="profile-icon" alt="profil">
      </button>
    </header>

    <!-- CONTENT -->
    <main class="screen">
        <div class="page-title-row">
            <button class="back-btn" onclick="location.href='/beranda'">
            <img src="{{ asset('asset/pelanggan/bayar-berhasil/back.png') }}" class="back-icon">
            </button>
        </div>

      <!-- INVOICE CARD -->
      <section class="invoice-card">
        <!-- HEADER FAKTUR -->
        <div class="invoice-header">
          <div class="invoice-title">Bukti <br> Pembayaran</div>
          <div class="invoice-meta">
            <p>{{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
            <p>Faktur No: {{ $booking->id }}</p>
          </div>
        </div>

        <!-- INFO PELANGGAN & PEMESANAN -->
        <div class="invoice-info-row">
          <div class="invoice-info-block">
                <h3>Ditagihkan Kepada:</h3>
                <p>{{ $booking->user->name }}</p>
                <p>{{ $booking->user->phone ?? '-' }}</p>
                <p>{{ $booking->user->email }}</p>
          </div>

          <div class="invoice-info-block right">
            <h4>Informasi Pemesanan:</h4>
            <p>{{ \Carbon\Carbon::parse($booking->tanggal)->translatedFormat('d F Y') }}</p>
            <p>Nomor Antrian: {{ $booking->queue_number }}</p>
            <p>{{ $booking->waktu }} WIB</p>
          </div>
          <hr class="divider">
        </div>

        <hr class="divider"></hr>

        <!-- TABLE -->
        <div class="invoice-table">
            <div class="table-header">
                <span>Deskripsi</span>
                <span>Harga</span>
                <span>Sesi</span>
                <span>Jumlah</span>
            </div>

            <div class="table-row">
              <span>Studio: {{ $booking->studio }} ({{ $booking->jumlah_sesi }}x5 menit)</span>
              <span>Rp{{ number_format($booking->harga_sesi,0,',','.') }}/Sesi</span>
              <span>{{ $booking->jumlah_sesi }}</span>
              <span>Rp{{ number_format($booking->subtotal,0,',','.') }}</span>
            </div>
        </div>

        <!-- SUMMARY -->
        <div class="invoice-total">
            <div class="total-row">
              <span>Subtotal</span>
              <span>Rp{{ number_format($booking->subtotal,0,',','.') }}</span>
            </div>
  
            <div class="total-row">
              <span>Pajak (0%)</span>
              <span>Rp0</span>
            </div>
  
            <hr class="divider bottom">
  
            <div class="total-row total-final">
              <span>Total</span>
              <span>Rp{{ number_format($booking->subtotal,0,',','.') }}</span>
            </div>
        </div>


        <!-- PAYMENT INFO -->
        <div class="invoice-bottom">
          <div class="payment-info">
            <span>Metode Pembayaran: {{ $payment->method ?? 'QRIS' }}</h4>
            <span>ID Transaksi: {{ $booking->id }}</span>
            <span>Tanggal Bayar: {{ \Carbon\Carbon::parse($payment->paid_at ?? now())->translatedFormat('d F Y') }}</span>
          </div>
        </div>

        <hr class="divider bottom">

        <!-- FOOTER FAKTUR -->
        <div class="invoice-footer">
            <div class="footer-text">
              <p>Photoholic Indonesia</p>
              <p>Pasar Tukupring 2 no. 84–85</p>
              <p>0851 2400 0950</p>
            </div>
            <div class="footer-logo">
              <img src="{{ asset('asset/pelanggan/faktur/logo1.png') }}" alt="Photoholic" class="footer-logo-img">
            </div>
          </div>
      </section>
    </main>

  </div>
</body>
</html>
