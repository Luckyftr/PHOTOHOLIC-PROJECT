<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Ubah Kata Sandi</title>

  <link href="https://fonts.googleapis.com/css2?family=Commissioner:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
        <button class="back-btn" type="button" onclick="history.back()">
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

      <form action="{{ route('ubah.password.verify') }}" method="POST" id="ubahForm">
        @csrf
        <div class="input-group">
          <input
            type="email"
            name="email"
            id="email"
            class="input-field"
            placeholder="Alamat Email"
            required
          />
        </div>
        @error('email')
            <p style="color:red">{{ $message }}</p>
        @enderror

        <button type="submit" id="btnKirim" class="btn-primary" disabled>
          Kirim
        </button>
      </form>
    </div>
  </div>

  <script>
    const emailInput = document.getElementById('email');
    const btnKirim   = document.getElementById('btnKirim');
    const form       = document.getElementById('ubahForm');

    function updateButtonState() {
      const adaEmail = emailInput.value.trim() !== '';

      if (adaEmail) {
        btnKirim.disabled = false;
        btnKirim.classList.add('enabled');
      } else {
        btnKirim.disabled = true;
        btnKirim.classList.remove('enabled');
      }
    }

    // cek setiap user ngetik
    emailInput.addEventListener('input', updateButtonState);

    // demo: cegah reload halaman (bisa dihapus jika backend siap)
    form.addEventListener('submit', function (e) {
      if (!btnKirim.disabled) {
        // default submit Laravel akan tetap jalan
      } else {
        e.preventDefault();
      }
    });
  </script>
</body>
</html>
