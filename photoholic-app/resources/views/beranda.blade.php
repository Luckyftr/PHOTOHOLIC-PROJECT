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

      <!-- HERO BANNER SLIDER (UI Baru) -->
      <section class="hero-banner">
        <div class="hero-slider">

          <div class="hero-slide active">
            <img src="{{ asset('asset/pelanggan/beranda/hero-weekend1.png') }}" alt="Slide 1">
          </div>

          <div class="hero-slide">
            <img src="{{ asset('asset/pelanggan/beranda/hero-weekend2.png') }}" alt="Slide 2">
          </div>

          <div class="hero-slide">
            <img src="{{ asset('asset/pelanggan/beranda/hero-weekend3.png') }}" alt="Slide 3">
          </div>

        </div>

        <div class="hero-dots">
          <span class="hero-dot active" data-slide="0"></span>
          <span class="hero-dot" data-slide="1"></span>
          <span class="hero-dot" data-slide="2"></span>
        </div>
      </section>

      <!-- BOOKING WIDGET -->
      <section class="booking-widget">
        <h1 class="booking-title">Pesan Photobooth</h1>

        <div class="booking-row">
          <div class="booking-field">
            <select class="booking-select" name="studio" required>
              <option value="A">Classy</option>
              <option value="B">Lavatory</option>
              <option value="C">Oven</option>
              <option value="D">Spotlight</option>
          </select>
          
          </div>

          <div class="booking-field">
            <select class="booking-select">
              <option>Sesi</option>
              <option>Sesi 1</option>
              <option>Sesi 2</option>
              <option>Sesi 3</option>
            </select>
          </div>

          <div class="booking-field">
            <select class="booking-select">
              <option>Tanggal</option>
              <option>Hari ini</option>
              <option>Besok</option>
            </select>
          </div>

          <div class="booking-field">
            <select class="booking-select">
              <option>Waktu</option>
              <option>10.00</option>
              <option>11.00</option>
              <option>12.00</option>
              <option>13.00</option>
            </select>
          </div>
        </div>

        <button class="booking-check-btn" onclick="location.href='/ketersediaan'">
          <img src="{{ asset('asset/pelanggan/beranda/icon-search.png') }}" style="width:14px">
          Cek Ketersediaan
        </button>
      </section>

      <!-- PILIH STUDIO -->
      <section class="section">
        <h2 class="section-title">PILIH STUDIO PHOTOBOOTH KAMU</h2>

        <div class="studio-list">
          <article class="studio-card">
            <img src="{{ asset('asset/pelanggan/beranda/studio-classy.png') }}" class="studio-img" alt="Classy">
            <div class="studio-body">
              <h3>Classy</h3>
              <p class="studio-desc">Max 10 Orang<br>Paper Negatif Film</p>
              <p class="studio-price">Rp 45.000/Sesi</p>
              <button class="studio-btn" onclick="location.href='/pesan-sekarang'">Pesan Sekarang</button>
            </div>
          </article>

          <article class="studio-card">
            <img src="{{ asset('asset/pelanggan/beranda/studio-lavatory.png') }}" class="studio-img" alt="Lavatory">
            <div class="studio-body">
              <h3>Lavatory</h3>
              <p class="studio-desc">Max 6 Orang<br>Photo Paper 4R</p>
              <p class="studio-price">Rp 45.000/Sesi</p>
              <button class="studio-btn">Pesan Sekarang</button>
            </div>
          </article>

          <article class="studio-card">
            <img src="{{ asset('asset/pelanggan/beranda/studio-oven.png') }}" class="studio-img" alt="Oven">
            <div class="studio-body">
              <h3>Oven</h3>
              <p class="studio-desc">Max 6 Orang<br>Photo Paper 4R</p>
              <p class="studio-price">Rp 45.000/Sesi</p>
              <button class="studio-btn">Pesan Sekarang</button>
            </div>
          </article>

          <article class="studio-card">
            <img src="{{ asset('asset/pelanggan/beranda/studio-spotlight.png') }}" class="studio-img" alt="Spotlight">
            <div class="studio-body">
              <h3>Spotlight</h3>
              <p class="studio-desc">Max 6 Orang<br>Photo Paper 4R</p>
              <p class="studio-price">Rp 45.000/Sesi</p>
              <button class="studio-btn">Pesan Sekarang</button>
            </div>
          </article>
        </div>
      </section>

      <!-- INFO TERBARU -->
      <section class="section">
        <h2 class="section-title">INFO TERBARU PHOTOHOLIC</h2>

        <div class="blog-highlight">
          <img src="{{ asset('asset/pelanggan/beranda/blog1.png') }}" class="blog-thumb" alt="Info Terbaru">

          <div class="blog-content">
            <p class="blog-text">
              Photoholic selalu siap jadi tempat kabur sebentar dari rutinitas ✨.
              Mau sendirian, bareng bestie, atau sama pasangan, booth kita ready buat negasin momen kamu.
              <a href="/blog" class="blog-more">Selengkapnya..</a>
            </p>

            <div class="blog-dots">
              <span class="dot active"></span>
              <span class="dot"></span>
              <span class="dot"></span>
            </div>
          </div>
        </div>
      </section>

    </div><!-- /screen -->

    <!-- FOOTER -->
    <footer class="footer-bar">
      <div class="footer-inner">
        <span>0851-2400-0950</span>
        <span>@myphotoholic</span>
        <span>@photoholic.indonesia</span>
      </div>
    </footer>

  </div><!-- /phone -->

<!-- SLIDER JS -->
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
