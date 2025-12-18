<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Daftar Pemesanan Saya</title>

  <link href="https://fonts.googleapis.com/css2?family=Commissioner:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/pelanggan/pemesanan.css') }}">
</head>

<body>
<div class="phone">

  <!-- STATUS BAR -->
  <div class="status-bar">
    <div class="status-left">
      <img src="{{ asset('asset/pelanggan/pemesanan/jam.png') }}" class="status-clock" alt="jam">
    </div>
    <div class="status-icons">
      <img src="{{ asset('asset/pelanggan/pemesanan/icons.png') }}" class="status-img" alt="icons">
    </div>
  </div>

  <!-- HEADER -->
  <header class="app-header">
    <img src="{{ asset('asset/pelanggan/pemesanan/logo-header.png') }}" class="header-logo" alt="logo">

    <nav class="header-nav">
      <a href="/beranda" class="nav-link">Beranda</a>
      <a href="/studio" class="nav-link">Studio</a>
      <a href="/blog" class="nav-link">Blog</a>
      <a href="/pemesanan" class="nav-link active">Pemesanan</a>
    </nav>

    <button class="profile-btn" onclick="location.href='/profil'">
      <img src="{{ asset('asset/pelanggan/pemesanan/icon-profil.png') }}" class="profile-icon" alt="profil">
    </button>
  </header>

  <!-- CONTENT -->
  <div class="screen">

    <!-- TITLE BAR -->
    <div class="page-title-row">
      <button class="back-btn" onclick="location.href='/beranda'">
        <img src="{{ asset('asset/pelanggan/pemesanan/back.png') }}" class="back-icon" alt="kembali">
      </button>
      <h1 class="page-title">Daftar Pemesanan Saya</h1>
    </div>

    <!-- LIST CARD -->
    <div class="booking-list">

      @forelse ($bookings as $b)
        <div class="booking-card">

          <!-- IMAGE -->
          <img
            src="{{ asset('asset/Studio-foto/' . $b->studioRel->gambar) }}"
            class="studio-img"
            alt="{{ $b->studioRel->nama }}"
          >

          <!-- BODY -->
          <div class="card-body">
            <h3 class="studio-title">Studio {{ $b->studioRel->nama }}</h3>

            <p class="studio-info">
              {{ $b->studioRel->kapasitas }} Orang · {{ $b->studioRel->deskripsi }}
            </p>

            <p class="studio-info">
              {{ \Carbon\Carbon::parse($b->tanggal)->translatedFormat('l, d F Y') }}
            </p>

            <p class="studio-info">
              {{ $b->waktu }} WIB
            </p>

            <button
              class="btn-detail"
              onclick="location.href='/rincian-pemesanan/{{ $b->id }}'">
              Lihat Rincian
            </button>
          </div>
        </div>

      @empty
        <p style="text-align:center; color:#666; margin-top:24px;">
          Belum ada pemesanan.
        </p>
      @endforelse

    </div><!-- /booking-list -->

  </div><!-- /screen -->

  <!-- FOOTER -->
  <footer class="footer-bar">
    <div class="footer-inner">
      <span>0851-2400-0950</span>
      <span>@photoholic.indonesia</span>
      <span>minphotoholic@gmail.com</span>
    </div>
  </footer>

</div>
</body>
</html>
