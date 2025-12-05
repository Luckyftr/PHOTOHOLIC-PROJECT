<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Pembayaran Berhasil</title>

  <link href="https://fonts.googleapis.com/css2?family=Commissioner:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/pelanggan/pembayaran-berhasil.css') }}">
</head>

<body>
  <div class="phone">

    <!-- status bar -->
    <div class="status-bar">
      <div class="status-left">
        <img src="{{ asset('asset/pelanggan/bayar-sekarang/jam.png') }}" alt="Jam" class="status-clock">
      </div>

      <div class="status-icons">
        <img src="{{ asset('asset/pelanggan/bayar-sekarang/icons.png') }}" alt="Status icons" class="status-img">
      </div>
    </div>

    <!-- KONTEN UTAMA -->
    <main class="success-screen">
      <h1 class="success-title">Pembayaran Berhasil!</h1>

      <div class="success-check">
        <img src="{{ asset('asset/pelanggan/bayar-sekarang/ceklis.png') }}" alt="Ceklis" class="check-image">
      </div>

      <p class="success-subtitle">
        Anda akan diarahkan ke<br>
        Halaman beranda di <span id="countdown">3</span> detik
      </p>

      <p class="success-note">
        Klik <a href="{{ url('/beranda') }}" id="manual-link">disini</a> jika Anda tidak diarahkan<br>
        secara otomatis
      </p>
    </main>

  </div>

  <!-- JS: hitung mundur & redirect -->
  <script>
    let seconds = 3;
    const span = document.getElementById("countdown");

    const timer = setInterval(() => {
      seconds--;
      if (span) span.textContent = seconds;

      if (seconds <= 0) {
        clearInterval(timer);
        window.location.href = "{{ url('/beranda') }}";
      }
    }, 1000);
  </script>
</body>
</html>
