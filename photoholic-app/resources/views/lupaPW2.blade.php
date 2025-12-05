<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Kata Sandi Baru</title>

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/pelanggan/lupaPW2.css') }}">
</head>

<body>
  <div class="phone">
    <!-- status bar -->
    <div class="status-bar">
      <div class="status-left">
        <img src="{{ asset('asset/pelanggan/lupaPW2/jam.png') }}" alt="Jam" class="status-clock">
      </div>

      <div class="status-icons">
        <img src="{{ asset('asset/pelanggan/lupaPW2/icons.png') }}" alt="Status icons" class="status-img">
      </div>
    </div>

    <div class="screen">
      <!-- tombol back -->
      <div class="top-row">
        <button class="back-btn" type="button" onclick="location.href='{{ url('/lupaPW') }}'">
          <img src="{{ asset('asset/pelanggan/lupaPW2/back.png') }}" alt="Kembali" class="back-icon">
        </button>
      </div>

      <h1 class="title">Kata Sandi Baru</h1>
      <p class="subtitle">
        Buat kata sandi baru. Pastikan kata sandi tersebut berbeda dari
        kata sandi sebelumnya untuk keamanan.
      </p>

      <!-- Form reset password -->
      <form action="{{ route('lupa.password.update') }}" method="POST">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <input type="hidden" name="email" value="{{ $email }}">

        <!-- Password baru -->
        <div class="input-group">
          <div class="input-with-icon">
            <input type="password" id="newPassword" name="password" placeholder="Masukkan kata sandi baru Anda" required />
            <button 
              type="button" 
              class="eye-icon" 
              onclick="togglePassword('newPassword', this)"
              data-eye-open="{{ asset('asset/pelanggan/lupaPW2/eye-open.png') }}"
              data-eye-closed="{{ asset('asset/pelanggan/lupaPW2/eye-closed.png') }}"
            >
              <img src="{{ asset('asset/pelanggan/lupaPW2/eye-closed.png') }}" alt="">
            </button>
          </div>
        </div>

        <!-- Konfirmasi password baru -->
        <div class="input-group">
          <div class="input-with-icon">
            <input type="password" id="confirmNewPassword" name="password_confirmation" placeholder="Masukkan kembali kata sandi baru Anda" required />
            <button 
              type="button" 
              class="eye-icon" 
              onclick="togglePassword('confirmNewPassword', this)"
              data-eye-open="{{ asset('asset/pelanggan/lupaPW2/eye-open.png') }}"
              data-eye-closed="{{ asset('asset/pelanggan/lupaPW2/eye-closed.png') }}"
            >
              <img src="{{ asset('asset/pelanggan/lupaPW2/eye-closed.png') }}" alt="">
            </button>
          </div>
        </div>

        @error('password')
            <p style="color:red">{{ $message }}</p>
        @enderror

        <button type="submit" class="btn-primary">Kirim</button>
      </form>
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
  </script>
</body>
</html>
