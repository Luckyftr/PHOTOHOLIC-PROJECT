<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Ganti Akun</title>

  <link href="https://fonts.googleapis.com/css2?family=Commissioner:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/pelanggan/ganti-akun.css') }}">
</head>

<body>
  <div class="phone">

    <!-- STATUS BAR -->
    <div class="status-bar">
      <img src="{{ asset('asset/pelanggan/ganti-akun/jam.png') }}" class="status-clock" alt="Jam">
      <img src="{{ asset('asset/pelanggan/ganti-akun/icons.png') }}" class="status-icons" alt="Status Icons">
    </div>

    <!-- HEADER (LOGO DI AREA PINK) -->
    <header class="topbar">
      <img src="{{ asset('asset/pelanggan/ganti-akun/logo-header.png') }}" class="logo" alt="Photoholic">
    </header>

    <!-- CONTENT -->
    <div class="content">

      <!-- JUDUL FITUR DI LUAR AREA PINK -->
      <div class="feature-header">
        <h1 class="feature-title">Ganti Akun</h1>
        <p class="feature-subtitle">
          Ubah email akunmu dan konfirmasi dengan password yang terdaftar.
        </p>
      </div>

      <!-- FORM CARD -->
      <div class="form-card">

        <label class="label" for="email-baru">Email Baru</label>
        <input
          id="email-baru"
          type="email"
          class="input"
          placeholder="Masukkan email baru"
        >

        <label class="label" for="password-konfirmasi">Password</label>
        <input
          id="password-konfirmasi"
          type="password"
          class="input"
          placeholder="Masukkan password untuk konfirmasi"
        >

        <button class="btn-ganti" type="button">Ganti Akun</button>

        <button class="btn-cancel" type="button" onclick="location.href='/profil'">
          Batal
        </button>

      </div>

    </div>
  </div>
</body>
</html>
