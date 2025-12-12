<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Lupa Kata Sandi</title>

  <link href="https://fonts.googleapis.com/css2?family=Commissioner:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- CSS Laravel -->
  <link rel="stylesheet" href="{{ asset('css/pelanggan/lupaPW.css') }}">
</head>

<body>
  <div class="phone">

    <!-- STATUS BAR -->
    <div class="status-bar">
      <div class="status-left">
        <img src="{{ asset('asset/pelanggan/lupaPW/jam.png') }}" alt="Jam" class="status-clock">
      </div>

      <div class="status-icons">
        <img src="{{ asset('asset/pelanggan/lupaPW/icons.png') }}" alt="Status icons" class="status-img">
      </div>
    </div>


    <div class="screen">

      <!-- TOMBOL BACK -->
      <div class="top-row">
        <button class="back-btn" type="button" onclick="location.href='{{ url('/masuk') }}'">
          <img src="{{ asset('asset/pelanggan/lupaPW/back.png') }}" alt="Kembali" class="back-icon">
        </button>
      </div>

      <!-- ILUSTRASI -->
      <div class="illustration">
        <img src="{{ asset('asset/pelanggan/lupaPW/logo1.png') }}" alt="Ilustrasi" class="illustration-img">
      </div>

      <h1 class="title">Lupa Kata Sandi?</h1>
      <p class="subtitle">
        Jangan khawatir! Hal itu bisa terjadi. Silakan masukkan alamat email Anda untuk verifikasi.
      </p>

      <!-- FORM VERIFIKASI EMAIL -->
      <form action="{{ route('lupa.password.verify') }}" method="POST">
        @csrf

        <div class="input-group">
          <input 
            type="email" 
            name="email" 
            class="input-field" 
            placeholder="Alamat Email" 
            required 
            oninput="toggleButton()"
          />
        </div>

        @error('email')
          <p style="color:red; margin-top:-10px; margin-bottom:10px;">{{ $message }}</p>
        @enderror

        <button type="submit" class="btn-primary" disabled>Kirim</button>
      </form>
    </div>

  </div>

  <script>
    const emailInput = document.querySelector('.input-field');
    const submitBtn  = document.querySelector('.btn-primary');

    function toggleButton() {
      if (emailInput.value.trim() !== "") {
        submitBtn.disabled = false; // aktif
      } else {
        submitBtn.disabled = true; // nonaktif
      }
    }

    // Initial state
    toggleButton();
  </script>

</body>
</html>
