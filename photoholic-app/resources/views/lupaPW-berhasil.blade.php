<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Daftar</title>

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/pelanggan/lupaPW-berhasil.css') }}">
</head>

<body>
  <div class="phone">
    <!-- status bar -->
<div class="status-bar">
  <div class="status-left">
    <img src="{{ asset('asset/pelanggan/lupaPW-berhasil/jam.png') }}" alt="Jam" class="status-clock">
  </div>

  <div class="status-icons">
    <img src="{{ asset('asset/pelanggan/lupaPW-berhasil/icons.png') }}" alt="Status icons" class="status-img">
  </div>
</div>

  <!-- KONTEN UTAMA -->
    <main class="success-screen">
      <h1 class="success-title">Kata Sandi telah Berhasil diubah!</h1>

    <div class="success-check">
        <img src="{{ asset('asset/pelanggan/lupaPW-berhasil/ceklis.png') }}" alt="Ceklis" class="check-image">
    </div>

      <p class="success-subtitle">
        Anda akan diarahkan ke<br>
        Halaman masuk di <span id="countdown">3</span> detik
      </p>

      <p class="success-note">
        Klik <a href="/masuk" id="manual-link">disini</a> jika Anda tidak diarahkan<br>
        secara otomatis
      </p>
    </main>

  </div>

  <!-- JS -->
  <script>
    let seconds = 3;
    const span = document.getElementById("countdown");

    const timer = setInterval(() => {
      seconds--;
      if (span) span.textContent = seconds;

      if (seconds <= 0) {
        clearInterval(timer);
        window.location.href = "/masuk";
      }
    }, 1000);
  </script>
</body>
</html>
