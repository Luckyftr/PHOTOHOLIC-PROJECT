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

        @forelse ($studios as $studio)
          <div class="studio-card">

            {{-- Studio Image --}}
            <img 
              src="{{ asset('asset/Studio-foto/' . $studio->gambar) }}" 
              class="studio-img" 
              alt="{{ $studio->nama }}"
            >

            <div class="studio-body">

              {{-- Studio Name --}}
              <h2>{{ $studio->nama }}</h2>

              {{-- Studio Description (multi-line) --}}
              <p class="studio-desc">
                {!! nl2br(e($studio->deskripsi)) !!}
              </p>

              {{-- Price --}}
              <p class="studio-price">
                Rp {{ number_format($studio->harga, 0, ',', '.') }}/Sesi
              </p>

              {{-- Booking Button --}}
              <a 
                href="{{ route('booking.create', ['studio' => $studio->code]) }}" 
                class="studio-btn"
              >
                Pesan Sekarang
              </a>

            </div>
          </div>
        @empty
          <p style="text-align:center; color:#666; margin-top:20px;">
            Studio belum tersedia.
          </p>
        @endforelse

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
