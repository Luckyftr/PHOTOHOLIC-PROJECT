<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pembayaran QRIS</title>

  <link href="https://fonts.googleapis.com/css2?family=Commissioner:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/pelanggan/qris.css') }}">
</head>

<body>
  <div class="phone">

    <!-- STATUS BAR -->
    <div class="status-bar">
      <img src="{{ asset('asset/pelanggan/qris/jam.png') }}" class="status-clock" alt="Jam">
      <img src="{{ asset('asset/pelanggan/qris/icons.png') }}" class="status-img" alt="Icons">
    </div>

    <!-- HEADER -->
    <header class="app-header">
      <img src="{{ asset('asset/pelanggan/qris/logo-header.png') }}" class="header-logo" alt="Logo">

      <nav class="header-nav">
        <a class="nav-link" href="/beranda">Beranda</a>
        <a class="nav-link" href="/studio">Studio</a>
        <a class="nav-link" href="/blog">Blog</a>
        <a class="nav-link active" href="/pemesanan">Pemesanan</a>
      </nav>

      <button class="profile-btn" onclick="location.href='/profil'">
        <img src="{{ asset('asset/pelanggan/qris/icon-profil.png') }}" class="profile-icon" alt="Profil">
      </button>
    </header>

    <!-- CONTENT -->
    <div class="screen">

      <button class="back-btn" onclick="history.back()">
        <img src="{{ asset('asset/pelanggan/qris/back.png') }}" class="back-icon" alt="Back">
      </button>

      <h1 class="title">PINDAI UNTUK PEMBAYARAN</h1>
      <p class="subtitle">
        Gunakan dompet elektronik atau perbankan <br>
        seluler untuk memindai QRIS di bawah ini.
      </p>

      <!-- QR CARD -->
      <div class="qr-card">
        <img src="{{ asset('asset/pelanggan/qris/qris.png') }}" class="qr-img" alt="QRIS">
      </div>

      <!-- BUTTONS -->
      <button class="btn-primary">Unduh QRIS</button>
      <button class="btn-outline">Laporkan Masalah</button>

      <p class="note">
        Pembayaran berlaku selama <span id="countdown">10</span> detik. <br>
        Setelah itu, pemesanan akan dibatalkan otomatis.
      </p>

    </div>
  </div>

  <!-- TIMER + REDIRECT -->
  <script>
    let timeLeft = 10; // 15 menit = 900 detik
    const countdownText = document.getElementById("countdown");

    const timer = setInterval(() => {
        timeLeft--;
        countdownText.textContent = timeLeft;

        if (timeLeft <= 0) {
          clearInterval(timer);
          // AUTO REDIRECT ke halaman bukti bayar Laravel
          window.location.href = "{{ route('pembayaran.bukti', $booking->id) }}";
        }
    }, 1000);
  </script>

</body>
</html>
