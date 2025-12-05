<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Daftar</title>

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/pelanggan/daftar.css') }}">
</head>

<body>
  <div class="phone">
    <!-- status bar -->
    <div class="status-bar">
      <div class="status-left">
        <img src="{{ asset('asset/pelanggan/daftar/jam.png') }}" alt="Jam" class="status-clock">
      </div>

      <div class="status-icons">
        <img src="{{ asset('asset/pelanggan/daftar/icons.png') }}" alt="Status icons" class="status-img">
      </div>
    </div>

    <div class="screen">

      <!-- ilustrasi -->
      <div class="illustration">
        <img src="{{ asset('asset/pelanggan/daftar/logo1.png') }}" alt="Ilustrasi" class="illustration-img">
      </div>

      <h1 class="title">Daftar</h1>
      <p class="subtitle">Masukkan detail anda untuk Mendaftar</p>

      @if ($errors->any())
        <div class="alert" style="color:red; font-size:14px;">
          @foreach ($errors->all() as $error)
          <div>{{ $error }}</div>
          @endforeach
        </div>
      @endif

      <form action="{{ route('daftar.aksi') }}" method="POST">
        @csrf

        <div class="input-group">
          <input type="text" name="username" class="input-field" placeholder="Username" required />
        </div>
        
        <div class="input-group">
          <input type="email" name="email" class="input-field" placeholder="Alamat Email" required />
        </div>
        
        <div class="input-group">
          <input type="tel" name="phone" class="input-field" placeholder="Nomor Telepon" required />
        </div>
        
        <div class="input-group">
          <div class="input-with-icon">
            <input type="password" name="password" id="password" placeholder="Kata Sandi" required />
            <button type="button" class="eye-icon" onclick="togglePassword('password', this)">
              <img src="{{ asset('asset/pelanggan/daftar/eye-closed.png') }}" alt="">
            </button>
          </div>
        </div>
        
        <div class="input-group">
          <div class="input-with-icon">
            <input type="password" name="password_confirmation" id="confirmPassword" placeholder="Konfirmasi Kata Sandi" required />
            <button type="button" class="eye-icon" onclick="togglePassword('confirmPassword', this)">
              <img src="{{ asset('asset/pelanggan/daftar/eye-closed.png') }}" alt="">
            </button>
          </div>
        </div>

        <div class="checkbox-row">
          <input type="checkbox" id="terms" name="terms" {{ old('terms') ? 'checked' : '' }} />
          <label for="terms">
            Saya setuju dengan <a href="#">syarat dan ketentuan</a>
          </label>
        </div>

        @error('terms')
          <p style="color: red; font-size: 13px; margin-top: 5px;">{{ $message }}</p>
        @enderror

        <button type="submit" class="btn-daftar">Daftar</button>
      </form>

      <div class="google-section">
        <button type="button" class="google-btn">
          <img src="{{ asset('asset/pelanggan/daftar/google.png') }}" alt="Google" class="google-logo">
        </button>
      </div>

      <p class="bottom-text">
        Sudah punya akun? <a href="/masuk">Masuk</a>
      </p>

    </div>
  </div>

  <!-- JS untuk show/hide password -->
  <script>
    function togglePassword(inputId, btn) {
      const input = document.getElementById(inputId);
      const img = btn.querySelector("img");

      if (input.type === "password") {
        input.type = "text";
        img.src = "{{ asset('asset/pelanggan/daftar/eye-open.png') }}";
      } else {
        input.type = "password";
        img.src = "{{ asset('asset/pelanggan/daftar/eye-closed.png') }}";
      }
    }
  </script>

</body>
</html>
