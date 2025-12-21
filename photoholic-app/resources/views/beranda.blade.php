<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Beranda Photoholic</title>

  <link href="https://fonts.googleapis.com/css2?family=Commissioner:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/pelanggan/beranda.css') }}">
</head>

<body>
<div class="phone">

  <!-- STATUS BAR -->
  <div class="status-bar">
    <img src="{{ asset('asset/pelanggan/beranda/jam.png') }}" class="status-clock" alt="clock">
    <img src="{{ asset('asset/pelanggan/beranda/icons.png') }}" class="status-img" alt="status">
  </div>

  <!-- HEADER -->
  <header class="app-header">
    <img src="{{ asset('asset/pelanggan/beranda/logo-header.png') }}" class="header-logo" alt="logo">

    <nav class="header-nav">
      <a href="/beranda" class="nav-link active">Beranda</a>
      <a href="/studio" class="nav-link">Studio</a>
      <a href="/blog" class="nav-link">Blog</a>
      <a href="/pemesanan" class="nav-link">Pemesanan</a>
    </nav>

    <button class="profile-btn" onclick="location.href='/profil'">
      <img src="{{ asset('asset/pelanggan/beranda/icon-profil.png') }}" class="profile-icon" alt="profil">
    </button>
  </header>

  <!-- CONTENT -->
  <div class="screen">

    <!-- HERO BANNER -->
    <section class="hero-banner">
      <div class="hero-slider">
        <div class="hero-slide active">
          <img src="{{ asset('asset/pelanggan/beranda/hero-weekend1.png') }}" alt="Happy Weekend 1">
        </div>
        <div class="hero-slide">
          <img src="{{ asset('asset/pelanggan/beranda/hero-weekend2.png') }}" alt="Happy Weekend 2">
        </div>
        <div class="hero-slide">
          <img src="{{ asset('asset/pelanggan/beranda/hero-weekend3.png') }}" alt="Happy Weekend 3">
        </div>
      </div>

      <div class="hero-dots">
        <span class="hero-dot active" data-slide="0"></span>
        <span class="hero-dot" data-slide="1"></span>
        <span class="hero-dot" data-slide="2"></span>
      </div>
    </section>

    <!-- BOOKING WIDGET (STRUKTUR LAMA, STYLE BARU) -->
    <section class="booking-widget">
      <h1 class="booking-title">Pesan Photobooth</h1>

      <form action="/ketersediaan" method="GET">
        <div class="booking-row">

          <div class="booking-field">
            <select class="booking-select" name="studio" required>
              <option value="">Studio</option>
              @foreach ($studios as $studio)
                <option value="{{ $studio->id }}">
                  {{ $studio->name }}
                </option>
              @endforeach
            </select>
          </div>

          <div class="booking-field">
            <select class="booking-select" name="sesi" required>
              <option value="">Sesi</option>
              <option value="1">Sesi 1</option>
              <option value="2">Sesi 2</option>
            </select>
          </div>

          <div class="booking-field">
            <input type="date" class="booking-select" name="tanggal" required>
          </div>

          <div class="booking-field">
            <select class="booking-select" name="waktu" required>
              <option value="">Waktu</option>
              <option value="11:00">11.00</option>
              <option value="12:00">12.00</option>
              <option value="13:00">13.00</option>
            </select>
          </div>

        </div>

        <button type="submit" class="booking-check-btn">
          <img src="{{ asset('asset/pelanggan/beranda/icon-search.png') }}" style="width:12px">
          Cek Ketersediaan
        </button>
      </form>
    </section>

    <!-- PILIH STUDIO -->
    <section class="section">
      <h2 class="section-title">PILIH STUDIO PHOTOBOOTH KAMU</h2>

      <div class="studio-list">
        @foreach ($studios as $studio)
          <article class="studio-card">
            <img
            src="{{ asset('asset/Studio-foto/' . $studio->gambar) }}"
            class="studio-img"
            alt="{{ $studio->nama }}"
            >

            <div class="studio-body">
              <h3>{{ $studio->nama }}</h3>

              <p class="studio-desc">
                {!! nl2br(e($studio->deskripsi)) !!}
              </p>

              <p class="studio-price">
                Rp {{ number_format($studio->harga, 0, ',', '.') }}/Sesi
              </p>

              <a href="{{ route('booking.create', ['studio' => $studio->code]) }}"
                class="studio-btn">
                Pesan Sekarang
              </a>
            </div>
          </article>
        @endforeach
      </div>

    </section>

    <!-- INFO TERBARU -->
    <section class="section">
      <h2 class="section-title">INFO TERBARU PHOTOHOLIC</h2>

      <div class="blog-highlight">
        @foreach ($blogs as $index => $blog)
          <div class="blog-slide {{ $index === 0 ? 'active' : '' }}">

            <img 
              src="{{ asset('storage/blogs/' . $blog->image) }}" 
              class="blog-thumb"
              alt="{{ $blog->title }}"
            >

            <div class="blog-content">
              <p class="blog-text">
                {{ Str::limit($blog->excerpt, 120) }}
                <a href="{{ $blog->instagram_url }}" target="_blank" class="blog-more">
                  Selengkapnya..
                </a>
              </p>

              {{-- DOTS MUST LIVE HERE --}}
              <div class="blog-dots">
                @foreach ($blogs as $i => $dotBlog)
                  <span class="dot {{ $i === 0 ? 'active' : '' }}"></span>
                @endforeach
              </div>
            </div>

          </div>
        @endforeach
      </div>

    </section>

  </div><!-- /screen -->

  <!-- FOOTER (STYLE BARU, STRUKTUR FOOTER LAMA TETAP) -->
  <footer class="footer-bar">
    <div class="footer-inner">
      <span>0851-2400-0950</span>
      <span>@photoholic.indonesia</span>
      <span>minphotoholic@gmail.com</span>
    </div>
  </footer>

</div>

<!-- SLIDER JS (TETAP) -->
<script>
document.addEventListener("DOMContentLoaded", function () {
  const slides = document.querySelectorAll(".hero-slide");
  const dots = document.querySelectorAll(".hero-dot");
  let current = 0;
  const interval = 4000;

  function showSlide(index) {
    slides.forEach((s, i) => s.classList.toggle("active", i === index));
    dots.forEach((d, i) => d.classList.toggle("active", i === index));
    current = index;
  }

  function nextSlide() {
    showSlide((current + 1) % slides.length);
  }

  let timer = setInterval(nextSlide, interval);

  dots.forEach(dot => {
    dot.addEventListener("click", () => {
      showSlide(Number(dot.dataset.slide));
      clearInterval(timer);
      timer = setInterval(nextSlide, interval);
    });
  });
});
</script>

</body>
</html>
