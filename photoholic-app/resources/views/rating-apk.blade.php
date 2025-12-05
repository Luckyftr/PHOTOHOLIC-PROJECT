<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Rating Aplikasi</title>

<link href="https://fonts.googleapis.com/css2?family=Commissioner:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/pelanggan/rating-apk.css') }}">
</head>

<body>
  <div class="phone">

    <!-- STATUS BAR -->
    <div class="status-bar">
      <img src="{{ asset('asset/pelanggan/rating-apk/jam.png') }}" class="status-clock">
      <img src="{{ asset('asset/pelanggan/rating-apk/icons.png') }}" class="status-icons">
    </div>

    <!-- HEADER -->
    <header class="topbar">
      <div class="topbar-inner">
        <img src="{{ asset('asset/pelanggan/rating-apk/logo-header.png') }}" class="logo">
        <h1 class="page-title">Rating Aplikasi</h1>
      </div>
    </header>

    <!-- CONTENT -->
    <div class="rating-wrapper">

      <!-- INTRO CARD -->
      <section class="rating-hero-card">
        <div class="rating-logo-circle">
          <img src="{{ asset('asset/pelanggan/rating-apk/logo1.png') }}" alt="Photoholic" class="rating-logo">
        </div>
        <div class="rating-hero-text">
          <h2>Bagaimana pengalamanmu<br>dengan Photoholic?</h2>
          <p>
            Beri kami penilaian untuk membantu kami
            meningkatkan kualitas layanan.
          </p>
        </div>
      </section>

      <!-- STAR RATING -->
      <section class="rating-section">
        <h3 class="rating-title">Beri Rating</h3>
        <div class="stars" data-selected="0">
          <span class="star" data-value="1">★</span>
          <span class="star" data-value="2">★</span>
          <span class="star" data-value="3">★</span>
          <span class="star" data-value="4">★</span>
          <span class="star" data-value="5">★</span>
        </div>
        <p class="rating-caption">Tap bintang untuk memilih.</p>
      </section>

      <!-- FEEDBACK TEXT -->
      <section class="rating-section">
        <h3 class="rating-title">Kritik & Saran</h3>
        <textarea class="rating-textarea" placeholder="Tulis hal yang kamu sukai atau yang perlu kami perbaiki..."></textarea>
      </section>

      <!-- BUTTON -->
      <button class="rating-submit-btn">Kirim Rating</button>

    </div>
  </div>

  <script>
    const starsContainer = document.querySelector(".stars");
    const stars = document.querySelectorAll(".star");

    stars.forEach(star => {
    star.addEventListener("click", () => {
        const value = parseInt(star.getAttribute("data-value"), 10);

        // simpan nilai ke attribute container (kalau nanti mau dikirim ke backend)
        starsContainer.setAttribute("data-selected", value);

        // update tampilan bintang
        stars.forEach(s => {
        const sValue = parseInt(s.getAttribute("data-value"), 10);
        if (sValue <= value) {
            s.classList.add("active");
        } else {
            s.classList.remove("active");
        }
        });
    });
    });

  </script>
</body>
</html>
