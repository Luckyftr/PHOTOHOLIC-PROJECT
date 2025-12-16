<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Ubah Kata Sandi</title>

  <link href="https://fonts.googleapis.com/css2?family=Commissioner:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/pelanggan/ubahPW2.css') }}">
</head>

<body>
  <div class="phone">
    <!-- STATUS BAR -->
    <div class="status-bar">
      <div class="status-left">
        <img src="{{ asset('asset/pelanggan/ubahPW2/jam.png') }}" alt="Jam" class="status-clock">
      </div>

      <div class="status-icons">
        <img src="{{ asset('asset/pelanggan/ubahPW2/icons.png') }}" alt="Status icons" class="status-img">
      </div>
    </div>

    <!-- ISI HALAMAN -->
    <div class="screen">
      <!-- tombol back -->
      <div class="top-row">
        <button class="back-btn" type="button" onclick="history.back()">
          <img src="{{ asset('asset/pelanggan/ubahPW2/back.png') }}" alt="Kembali" class="back-icon">
        </button>
      </div>

      <h1 class="title">Ubah Kata Sandi</h1>
      <p class="subtitle">
        Jaga keamanan akun Anda dengan mengganti kata sandi secara berkala!
      </p>

      <form action="{{ route('ubah.password.update') }}" method="POST" id="ubahForm">
        @csrf
        <input type="hidden" name="email" value="{{ $email }}">

        <!-- Kata sandi lama -->
        <div class="input-group">
          <div class="input-with-icon">
            <input
              type="password"
              id="oldPassword"
              name="old_password"
              placeholder="Masukkan kata sandi lama Anda"
              required
            />
            <button type="button" class="eye-icon" onclick="togglePassword('oldPassword', this)">
              <img src="{{ asset('asset/pelanggan/ubahPW2/eye-closed.png') }}" alt="">
            </button>
          </div>
          @error('old_password')
            <p style="color:red">{{ $message }}</p>
          @enderror
        </div>

        <!-- Kata sandi baru -->
        <div class="input-group">
          <div class="input-with-icon">
            <input
              type="password"
              id="newPassword"
              name="password"
              placeholder="Masukkan kata sandi baru Anda"
              required
            />
            <button type="button" class="eye-icon" onclick="togglePassword('newPassword', this)">
              <img src="{{ asset('asset/pelanggan/ubahPW2/eye-closed.png') }}" alt="">
            </button>
          </div>
          @error('password')
            <p style="color:red">{{ $message }}</p>
          @enderror
        </div>

        <!-- Konfirmasi kata sandi baru -->
        <div class="input-group">
          <div class="input-with-icon">
            <input
              type="password"
              id="confirmNewPassword"
              name="password_confirmation"
              placeholder="Masukkan kembali kata sandi baru Anda"
              required
            />
            <button type="button" class="eye-icon" onclick="togglePassword('confirmNewPassword', this)">
              <img src="{{ asset('asset/pelanggan/ubahPW2/eye-closed.png') }}" alt="">
            </button>
          </div>
        </div>

        <button type="submit" id="btnKirim" class="btn-primary" disabled>
          Kirim
        </button>
      </form>
    </div>
  </div>

  <!-- JS -->
  <script>
    // show / hide password
    function togglePassword(inputId, btn) {
      const input = document.getElementById(inputId);
      const img = btn.querySelector("img");

      if (input.type === "password") {
        input.type = "text";
        img.src = "{{ asset('asset/pelanggan/ubahPW2/eye-open.png') }}";
      } else {
        input.type = "password";
        img.src = "{{ asset('asset/pelanggan/ubahPW2/eye-closed.png') }}";
      }
    }

    // enable/disable tombol submit
    const passLama = document.getElementById('oldPassword');
    const passBaru = document.getElementById('newPassword');
    const passKonf = document.getElementById('confirmNewPassword');
    const btnKirim = document.getElementById('btnKirim');
    const form     = document.getElementById('ubahForm');

    function updateButtonState() {
      const lamaTerisi = passLama.value.trim() !== "";
      const baruTerisi = passBaru.value.trim() !== "";
      const konfTerisi = passKonf.value.trim() !== "";
      const sama       = passBaru.value === passKonf.value;

      btnKirim.disabled = !(lamaTerisi && baruTerisi && konfTerisi && sama);
      btnKirim.classList.toggle('enabled', lamaTerisi && baruTerisi && konfTerisi && sama);
    }

    passLama.addEventListener('input', updateButtonState);
    passBaru.addEventListener('input', updateButtonState);
    passKonf.addEventListener('input', updateButtonState);

    // optional: demo prevent reload
    form.addEventListener('submit', function(e) {
      // biarkan submit Laravel tetap jalan
    });
  </script>
</body>
</html>
