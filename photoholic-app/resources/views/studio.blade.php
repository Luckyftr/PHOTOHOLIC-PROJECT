<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pilih Studio</title>

  <link href="https://fonts.googleapis.com/css2?family=Commissioner:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/pelanggan/studio.css') }}">
</head>

<body>
  <div class="phone">

    <!-- STATUS BAR -->
    <div class="status-bar">
      <img src="{{ asset('asset/pelanggan/studio/jam.png') }}" class="status-clock" alt="clock">
      <img src="{{ asset('asset/pelanggan/studio/icons.png') }}" class="status-img" alt="status">
    </div>

    <!-- HEADER -->
    <header class="app-header">
      <img src="{{ asset('asset/pelanggan/studio/logo-header.png') }}" class="header-logo" alt="logo">

      <nav class="header-nav">
        <a href="/beranda" class="nav-link">Beranda</a>
        <a href="/studio" class="nav-link active">Studio</a>
        <a href="/blog" class="nav-link">Blog</a>
        <a href="/pemesanan" class="nav-link">Pemesanan</a>
      </nav>

      <button class="profile-btn" onclick="location.href='/profil'">
        <img src="{{ asset('asset/pelanggan/studio/icon-profil.png') }}" alt="Profil" class="profile-icon">
      </button>
    </header>

    <!-- CONTENT -->
    <div class="screen">

      <!-- BAR JUDUL HIJAU -->
      <div class="studio-title-row">
        <button class="back-btn-studio" onclick="history.back()">
          <img src="{{ asset('asset/pelanggan/studio/back.png') }}" class="back-icon" alt="Kembali">
        </button>
        <h1 class="studio-title">Pilih Studio Kesukaan Kamu</h1>
      </div>

      <!-- LIST STUDIO -->
      <div class="studio-list">

        <!-- CARD 1 -->
        <div class="studio-card">
          <img src="{{ asset('asset/pelanggan/studio/studio-classy.png') }}" class="studio-img" alt="Classy">
          <div class="studio-body">
            <h2>Classy</h2>
            <p class="studio-desc">Max 10 Orang<br>Paper Negatif Film</p>
            <p class="studio-price">Rp 45.000/Sesi</p>
            <a href="{{ route('booking.create', ['studio' => 'A']) }}" class="studio-btn">Pesan Sekarang</a>
          </div>
        </div>

        <!-- CARD 2 -->
        <div class="studio-card">
          <img src="{{ asset('asset/pelanggan/studio/studio-lavatory.png') }}" class="studio-img" alt="Lavatory">
          <div class="studio-body">
            <h2>Lavatory</h2>
            <p class="studio-desc">Max 6 Orang<br>Photo Paper A6</p>
            <p class="studio-price">Rp 45.000/Sesi</p>
            <a href="{{ route('booking.create', ['studio' => 'B']) }}" class="studio-btn">Pesan Sekarang</a>
          </div>
        </div>

        <!-- CARD 3 -->
        <div class="studio-card">
          <img src="{{ asset('asset/pelanggan/studio/studio-oven.png') }}" class="studio-img" alt="Oven">
          <div class="studio-body">
            <h2>Oven</h2>
            <p class="studio-desc">Max 6 Orang<br>Photo Paper A6</p>
            <p class="studio-price">Rp 45.000/Sesi</p>
            <a href="{{ route('booking.create', ['studio' => 'C']) }}" class="studio-btn">Pesan Sekarang</a>
          </div>
        </div>

        <!-- CARD 4 -->
        <div class="studio-card">
          <img src="{{ asset('asset/pelanggan/studio/studio-spotlight.png') }}" class="studio-img" alt="Spotlight">
          <div class="studio-body">
            <h2>Spotlight</h2>
            <p class="studio-desc">Max 6 Orang<br>Photo Paper A6</p>
            <p class="studio-price">Rp 45.000/Sesi</p>
            <a href="{{ route('booking.create', ['studio' => 'D']) }}" class="studio-btn">Pesan Sekarang</a>
          </div>
        </div>

      </div>

    </div>
    
    <!-- FOOTER -->
    <footer class="footer-bar">
      <div class="footer-inner">
        <span>0851-2400-0950</span>
        <span>@myphotoholic</span>
        <span>@photoholic.indonesia</span>
      </div>
    </footer>

  </div>
</body>
</html>
