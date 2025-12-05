<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Lupa Kata Sandi</title>

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/pelanggan/lupaPW.css') }}">
</head>

<body>
  <div class="phone">
    <!-- status bar -->
    <div class="status-bar">
      <div class="status-left">
        <img src="{{ asset('asset/pelanggan/lupaPW/jam.png') }}" alt="Jam" class="status-clock">
      </div>

      <div class="status-icons">
        <img src="{{ asset('asset/pelanggan/lupaPW/icons.png') }}" alt="Status icons" class="status-img">
      </div>
    </div>

    <div class="screen">
      <!-- tombol back -->
      <div class="top-row">
        <button class="back-btn" type="button" onclick="location.href='/masuk'">
          <img src="{{ asset('asset/pelanggan/lupaPW/back.png') }}" alt="Kembali" class="back-icon">
        </button>
      </div>

      <!-- ilustrasi -->
      <div class="illustration">
        <img src="{{ asset('asset/pelanggan/lupaPW/logo1.png') }}" alt="Ilustrasi" class="illustration-img">
      </div>

      <h1 class="title">Lupa Kata Sandi?</h1>
      <p class="subtitle">
        Jangan khawatir! Hal itu bisa terjadi. Silakan masukkan alamat email Anda untuk verifikasi.
      </p>

      <!-- Form kirim email -->
      <form action="{{ route('lupa.password.verify') }}" method="POST">
        @csrf
        <div class="input-group">
          <input type="email" name="email" class="input-field" placeholder="Alamat Email" required />
        </div>

        @error('email')
            <p style="color:red">{{ $message }}</p>
        @enderror

        <button type="submit" class="btn-primary">Kirim</button>
      </form>
    </div>
  </div>
</body>
</html>
