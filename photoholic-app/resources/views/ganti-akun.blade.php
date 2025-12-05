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
      <img src="{{ asset('asset/pelanggan/ganti-akun/jam.png') }}" class="status-clock">
      <img src="{{ asset('asset/pelanggan/ganti-akun/icons.png') }}" class="status-icons">
    </div>

    <!-- HEADER -->
    <header class="topbar">
      <img src="{{ asset('asset/pelanggan/ganti-akun/logo-header.png') }}" class="logo">
      <h1 class="page-title">Ganti Akun</h1>
    </header>

    <!-- CONTENT -->
    <div class="form-card">

      <label class="label">Email Baru</label>
      <input type="email" class="input" placeholder="Masukkan email baru">

      <label class="label">Password</label>
      <input type="password" class="input" placeholder="Masukkan password untuk konfirmasi">

      <button class="btn-ganti">Ganti Akun</button>
      <button class="btn-cancel" onclick="location.href='/profil'">Batal</button>

    </div>

  </div>
</body>
</html>
