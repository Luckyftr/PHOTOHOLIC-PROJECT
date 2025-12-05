<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Lupa Kata Sandi</title>

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/pelanggan/ubahPW.css') }}">
</head>

<body>
  <div class="phone">
    <!-- status bar -->
    <div class="status-bar">
      <div class="status-left">
        <img src="{{ asset('asset/pelanggan/ubahPW/jam.png') }}" alt="Jam" class="status-clock">
      </div>

      <div class="status-icons">
        <img src="{{ asset('asset/pelanggan/ubahPW/icons.png') }}" alt="Status icons" class="status-img">
      </div>
    </div>

    <div class="screen">
      <!-- tombol back -->
      <div class="top-row">
        <button class="back-btn" type="button" onclick="location.href='/profil'">
          <img src="{{ asset('asset/pelanggan/ubahPW/back.png') }}" alt="Kembali" class="back-icon">
        </button>
      </div>

      <!-- ilustrasi -->
      <div class="illustration">
        <img src="{{ asset('asset/pelanggan/ubahPW/logo1.png') }}" alt="Ilustrasi" class="illustration-img">
      </div>

      <h1 class="title">Ubah Kata Sandi</h1>
      <p class="subtitle">
        Jaga keamanan akun Anda dengan mengganti kata sandi secara berkala!
      </p>

      <form action="{{ route('ubah.password.verify') }}" method="POST" class="input-group">
        @csrf
        <div class="input-group">
            <input type="email" name="email" class="input-field" placeholder="Masukkan email Anda" required />
        </div>
        @error('email')
            <p style="color:red">{{ $message }}</p>
        @enderror
        <button type="submit" class="btn-primary">Verifikasi Email</button>
      </form>
    </div>
  </div>
</body>
</html>
