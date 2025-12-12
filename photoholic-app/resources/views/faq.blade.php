<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Pertanyaan yang Sering Diajukan</title>

  <link href="https://fonts.googleapis.com/css2?family=Commissioner:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/pelanggan/faq.css') }}">
</head>

<body>
  <div class="phone">

    <!-- STATUS BAR -->
    <div class="status-bar">
      <img src="{{ asset('asset/pelanggan/faq/jam.png') }}" class="status-clock" alt="Jam">
      <img src="{{ asset('asset/pelanggan/faq/icons.png') }}" class="status-img" alt="Status Icons">
    </div>

    <!-- HEADER -->
    <header class="app-header">
      <img src="{{ asset('asset/pelanggan/faq/logo-header.png') }}" class="header-logo" alt="Photoholic">

      <nav class="header-nav">
        <a href="/beranda" class="nav-link">Beranda</a>
        <a href="/studio" class="nav-link">Studio</a>
        <a href="/blog" class="nav-link">Blog</a>
        <a href="/pemesanan" class="nav-link active">Pemesanan</a>
      </nav>

      <button class="profile-btn" type="button" onclick="location.href='/profil'">
        <img src="{{ asset('asset/pelanggan/faq/icon-profil.png') }}" class="profile-icon" alt="Profil">
      </button>
    </header>

    <!-- CONTENT -->
    <div class="screen">

      <!-- TITLE -->
      <div class="page-title-row">
        <button class="back-btn" type="button" onclick="history.back()">
          <img src="{{ asset('asset/pelanggan/faq/back.png') }}" class="back-icon" alt="Kembali">
        </button>
        <h1 class="page-title">Pertanyaan yang Sering Diajukan</h1>
      </div>

      <!-- HELP CARD -->
      <section class="faq-help-card">
        <div class="faq-help-icon">
          <span>?</span>
        </div>
        <div class="faq-help-text">
          <p class="faq-help-title">Butuh Bantuan?</p>
          <p class="faq-help-desc">
            Kami rangkum beberapa pertanyaan yang sering ditanyakan pengguna.
          </p>
        </div>
      </section>

      <!-- FAQ LIST -->
      <section class="faq-list">

        <!-- ITEM 1 -->
        <article class="faq-item active">
          <button class="faq-question" type="button">
            <span>Bagaimana cara melakukan pemesanan?</span>
            <span class="faq-toggle-icon">⌄</span>
          </button>
          <div class="faq-answer">
            <p>
              Kamu bisa melakukan pemesanan langsung dari menu <b>Pemesanan</b>,
              pilih studio, tanggal, dan sesi yang diinginkan, lalu ikuti alur
              pembayaran sampai statusnya menjadi <b>Lunas</b>.
            </p>
          </div>
        </article>

        <!-- ITEM 2 -->
        <article class="faq-item">
          <button class="faq-question" type="button">
            <span>Apakah bisa melakukan pemesanan offline &amp; tunai?</span>
            <span class="faq-toggle-icon">⌄</span>
          </button>
          <div class="faq-answer">
            <p>
              Bisa. Kamu dapat datang langsung ke studio dan melakukan
              pemesanan tunai di tempat, selama jadwal dan sesi masih tersedia.
            </p>
          </div>
        </article>

        <!-- ITEM 3 -->
        <article class="faq-item">
          <button class="faq-question" type="button">
            <span>Bagaimana cara melihat jadwal saya?</span>
            <span class="faq-toggle-icon">⌄</span>
          </button>
          <div class="faq-answer">
            <p>
              Semua jadwal yang sudah kamu pesan bisa dilihat di menu
              <b>Riwayat Pemesanan</b> atau <b>Bukti Pembayaran</b> pada akunmu.
            </p>
          </div>
        </article>

        <!-- ITEM 4 -->
        <article class="faq-item">
          <button class="faq-question" type="button">
            <span>Apakah saya bisa mengganti paket?</span>
            <span class="faq-toggle-icon">⌄</span>
          </button>
          <div class="faq-answer">
            <p>
              Perubahan paket dapat dilakukan sebelum hari H pemotretan.
              Hubungi admin Photoholic melalui kontak yang tersedia untuk
              konfirmasi perubahan.
            </p>
          </div>
        </article>

      </section>
    </div>
  </div>

  <!-- SCRIPT DROPDOWN FAQ -->
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const items = document.querySelectorAll(".faq-item");

      items.forEach((item) => {
        const btn = item.querySelector(".faq-question");
        const answer = item.querySelector(".faq-answer");

        if (item.classList.contains("active")) {
          answer.style.maxHeight = answer.scrollHeight + "px";
        }

        btn.addEventListener("click", () => {
          const isOpen = item.classList.contains("active");

          items.forEach((it) => {
            it.classList.remove("active");
            const ans = it.querySelector(".faq-answer");
            ans.style.maxHeight = null;
          });

          if (!isOpen) {
            item.classList.add("active");
            answer.style.maxHeight = answer.scrollHeight + "px";
          }
        });
      });
    });
  </script>

</body>
</html>
