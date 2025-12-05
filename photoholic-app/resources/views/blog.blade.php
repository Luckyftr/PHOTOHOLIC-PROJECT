<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blog Photoholic</title>

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/pelanggan/blog.css') }}">
</head>

<body>
  <div class="phone">

    <!-- STATUS BAR -->
    <div class="status-bar">
      <img src="{{ asset('asset/pelanggan/blog/jam.png') }}" class="status-clock" alt="clock">
      <img src="{{ asset('asset/pelanggan/blog/icons.png') }}" class="status-img" alt="status">
    </div>

    <!-- HEADER -->
    <header class="app-header">
      <img src="{{ asset('asset/pelanggan/blog/logo-header.png') }}" class="header-logo" alt="logo">

      <nav class="header-nav">
        <a href="/beranda" class="nav-link">Beranda</a>
        <a href="/studio" class="nav-link">Studio</a>
        <a href="/blog" class="nav-link active">Blog</a>
        <a href="/pemesanan" class="nav-link">Pemesanan</a>
      </nav>

      <button class="profile-btn" onclick="location.href='/profil'">
        <img src="{{ asset('asset/pelanggan/blog/icon-profil.png') }}" class="profile-icon" alt="profil">
      </button>
    </header>

    <!-- CONTENT -->
    <div class="screen">

      <!-- TITLE + BACK -->
      <div class="blog-title-row">
        <button class="back-btn-blog" onclick="location.href='/beranda'">
          <img src="{{ asset('asset/pelanggan/blog/back.png') }}" class="back-icon-blog" alt="kembali">
        </button>
        <h1 class="blog-title">Blog</h1>
      </div>

      <!-- LIST BLOG -->
      <div class="blog-list">

        <!-- ITEM 1 -->
        <article class="blog-item">
          <img src="{{ asset('asset/pelanggan/blog/blog1.png') }}" class="blog-thumb" alt="Opening Hours">
          <div class="blog-text-wrap">
            <p class="blog-text">
              Photoholic selalu siap jadi tempat kabur sebentar dari rutinitas ✨.
              Mau sendirian, bareng bestie, atau sama pasangan, booth kita selalu ready buat negasin momen kamu.
              <a href="#" class="blog-more">Selengkapnya..</a>
            </p>
            <button class="blog-btn">Baca Sekarang</button>
          </div>
        </article>

        <!-- ITEM 2 -->
        <article class="blog-item">
          <img src="{{ asset('asset/pelanggan/blog/blog2.png') }}" class="blog-thumb" alt="Cafe">
          <div class="blog-text-wrap">
            <p class="blog-text">
              Double vibes unlocked: ngopi ☕ + foto 📸.
              Photoholic x @haxa_idn open 11.00–23.00 ✨
              📍Jalan Jimerto blok II No 14
              <a href="#" class="blog-more">Selengkapnya..</a>
            </p>
            <button class="blog-btn">Baca Sekarang</button>
          </div>
        </article>

        <!-- ITEM 3 (ulang pola) -->
        <article class="blog-item">
          <img src="{{ asset('asset/pelanggan/blog/blog1.png') }}" class="blog-thumb" alt="Opening Hours">
          <div class="blog-text-wrap">
            <p class="blog-text">
              Photoholic selalu siap jadi tempat kabur sebentar dari rutinitas ✨.
              Mau sendirian, bareng bestie, atau sama pasangan, booth kita selalu ready buat negasin momen kamu.
              <a href="#" class="blog-more">Selengkapnya..</a>
            </p>
            <button class="blog-btn">Baca Sekarang</button>
          </div>
        </article>

        <article class="blog-item">
          <img src="{{ asset('asset/pelanggan/blog/blog2.png') }}" class="blog-thumb" alt="Cafe">
          <div class="blog-text-wrap">
            <p class="blog-text">
              Double vibes unlocked: ngopi ☕ + foto 📸.
              Photoholic x @haxa_idn open 11.00–23.00 ✨
              📍Jalan Jimerto blok II No 14
              <a href="#" class="blog-more">Selengkapnya..</a>
            </p>
            <button class="blog-btn">Baca Sekarang</button>
          </div>
        </article>

      </div><!-- /blog-list -->

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
</body>
</html>
