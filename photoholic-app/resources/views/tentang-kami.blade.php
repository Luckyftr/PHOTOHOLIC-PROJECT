<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Tentang Kami</title>

  <link href="https://fonts.googleapis.com/css2?family=Commissioner:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/pelanggan/tentang-kami.css') }}">
</head>

<body>
  <div class="phone">

    <!-- STATUS BAR -->
    <div class="status-bar">
      <img src="{{ asset('asset/pelanggan/tentang-kami/jam.png') }}" class="status-clock" alt="Jam">
      <img src="{{ asset('asset/pelanggan/tentang-kami/icons.png') }}" class="status-icons" alt="Status icons">
    </div>

    <!-- HEADER PINK + LOGO -->
    <header class="topbar">
      <img src="{{ asset('asset/pelanggan/tentang-kami/logo-header.png') }}" class="topbar-logo" alt="Photoholic">
    </header>

    <!-- TITLE PUTIH DI BAWAH HEADER -->
    <section class="page-head">
      <h1 class="page-title">Tentang Kami</h1>
      <p class="page-subtitle">
        {{ $about_pages->subtitle ?? '' }}
      </p>
    </section>

    <!-- CONTENT -->
    <div class="about-wrapper">

      <!-- INTRO / DESKRIPSI SINGKAT -->
      <section class="about-hero-card">
        <h2 class="about-hero-title">Apa itu Photoholic?</h2>
        <p class="about-hero-text">
          {{ $about_pages->description ?? '' }}
        </p>
      </section>

      <!-- VISI -->
      <section class="about-section">
        <h3 class="about-title">Visi</h3>
        <p class="about-paragraph">
          {{ $about_pages->vision ?? '' }}
        </p>
      </section>

      <!-- MISI -->
      <section class="about-section">
        <h3 class="about-title">Misi</h3>
        <ul class="about-list">
          @if(!empty($about_pages->mission))
            @foreach(explode("\n", $about_pages->mission) as $item)
              <li>{{ $item }}</li>
            @endforeach
          @endif
        </ul>
      </section>

      <!-- KENAPA MEMILIH PHOTOHOLIC -->
      <section class="about-section">
        <h3 class="about-title">Kenapa memilih Photoholic?</h3>

        <div class="about-feature">
          <span class="about-dot"></span>
          <p>Tim fotografer berpengalaman dan komunikatif.</p>
        </div>
        <div class="about-feature">
          <span class="about-dot"></span>
          <p>Pilihan paket studio & photobooth yang fleksibel.</p>
        </div>
        <div class="about-feature">
          <span class="about-dot"></span>
          <p>
            Proses booking, pembayaran, dan cek jadwal bisa dilakukan
            langsung melalui aplikasi.
          </p>
        </div>
      </section>

      <!-- KONTAK -->
      <section class="about-section contact-section">
        <h3 class="about-title">Kontak</h3>
        <p class="about-paragraph">
          {!! nl2br(e($about_pages->contact ?? '')) !!}
        </p>
      </section>

    </div>
  </div>
</body>
</html>
