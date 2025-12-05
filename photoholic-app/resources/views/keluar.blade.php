<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Keluar</title>

<link href="https://fonts.googleapis.com/css2?family=Commissioner:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/pelanggan/keluar.css') }}">
</head>

<body>
  <div class="phone">

    <!-- STATUS BAR -->
    <div class="status-bar">
      <img src="{{ asset('asset/pelanggan/keluar/jam.png') }}" class="status-clock">
      <img src="{{ asset('asset/pelanggan/keluar/icons.png') }}" class="status-icons">
    </div>

    <!-- HEADER -->
    <header class="topbar">
      <div class="topbar-inner">
        <img src="{{ asset('asset/pelanggan/keluar/logo-header.png') }}" class="logo">
        <h1 class="page-title">Keluar</h1>
      </div>
    </header>

    <!-- CONTENT -->
    <div class="logout-wrapper">

      <section class="logout-card">
        <div class="logout-icon-circle">
          <!-- kalau punya icon keluar sendiri, ganti jadi <img> -->
          <span class="logout-icon">⇦</span>
        </div>

        <h2 class="logout-title">Yakin ingin keluar?</h2>
        <p class="logout-text">
          Kamu akan keluar dari akun Photoholic.<br>
          Kamu tetap bisa masuk kembali kapan saja.
        </p>

        <button class="btn-primary">Keluar dari Akun</button>
        <button class="btn-secondary">Batal</button>
      </section>

    </div>
  </div>

  <script>
    //super simple (kalau mau pakai)
        document.querySelector(".btn-secondary").onclick = () => {
        window.history.back(); // balik ke halaman sebelumnya
        };

        document.querySelector(".btn-primary").onclick = () => {
        // redirect ke halaman login / landing
        window.location.href = "/masuk"; // ganti sesuai file kamu
        };
  </script>
</body>
</html>
