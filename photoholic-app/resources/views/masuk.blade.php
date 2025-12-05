<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Masuk</title>

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/pelanggan/masuk.css') }}">
</head>

<body>
  <div class="phone">
    <!-- status bar -->
    <div class="status-bar">
      <div class="status-left">
        <img src="{{ asset('asset/pelanggan/masuk/jam.png') }}" alt="Jam" class="status-clock">
      </div>

      <div class="status-icons">
        <img src="{{ asset('asset/pelanggan/masuk/icons.png') }}" alt="Status icons" class="status-img">
      </div>
    </div>

    <div class="screen">

      <!-- ilustrasi -->
      <div class="illustration">
        <img src="{{ asset('asset/pelanggan/masuk/logo1.png') }}" alt="Ilustrasi" class="illustration-img">
      </div>

      <h1 class="title">Masuk</h1>
      <p class="subtitle">
        Selamat datang kembali! Silakan masukkan detail Anda.
      </p>

      <form action="{{ route('masuk.aksi') }}" method="POST">
        @csrf
        <div class="input-group">
          <input type="email" name="email" class="input-field" placeholder="Email" required />
        </div>

        <!-- Password -->
        <div class="input-group">
          <div class="input-with-icon">
            <input type="password" name="password" id="password" placeholder="Password" required />
            <button 
              type="button" 
              class="eye-icon" 
              onclick="togglePassword('password', this)"
              data-eye-open="{{ asset('asset/pelanggan/masuk/eye-open.png') }}"
              data-eye-closed="{{ asset('asset/pelanggan/masuk/eye-closed.png') }}"
            >
              <img src="{{ asset('asset/pelanggan/masuk/eye-closed.png') }}" alt="">
            </button>
          </div>
        </div>

        <!-- Lupa kata sandi -->
        <div class="forgot-row">
          <a href="{{ url('/lupaPW') }}">Lupa Kata Sandi?</a>
        </div>

        <button type="submit" class="btn-primary">Masuk</button>
      </form>

      <!-- Google login -->
      <div class="google-section">
        <button type="button" class="google-btn">
          <img src="{{ asset('asset/pelanggan/masuk/google.png') }}" alt="Google" class="google-logo">
        </button>
      </div>

      <p class="bottom-text">
        Belum punya akun? <a href="{{ url('/daftar') }}">Daftar</a>
      </p>

    </div>
  </div>

  <!-- JS show/hide password -->
  <script>
    function togglePassword(inputId, btn) {
      const input = document.getElementById(inputId);
      const img = btn.querySelector("img");

      const openIcon = btn.dataset.eyeOpen;
      const closedIcon = btn.dataset.eyeClosed;

      if (input.type === "password") {
        input.type = "text";
        img.src = openIcon;
      } else {
        input.type = "password";
        img.src = closedIcon;
      }
    }

    // animasi untuk tombol login
    document.querySelector(".btn-primary").addEventListener("click", function () {
      this.classList.add("pressed");
      setTimeout(() => this.classList.remove("pressed"), 150);
    });
  </script>
</body>
</html>
