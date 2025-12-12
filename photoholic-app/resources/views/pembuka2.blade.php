<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Layar Pembuka</title>

  <link href="https://fonts.googleapis.com/css2?family=Commissioner:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/pelanggan/pembuka2.css') }}">
</head>

<body>
  <div class="phone">
    <!-- STATUS BAR -->
    <div class="status-bar">
      <div class="status-left">
        <img src="{{ asset('asset/pelanggan/pembuka2/jam.png') }}" alt="Jam" class="status-clock">
      </div>

      <div class="status-icons">
        <img src="{{ asset('asset/pelanggan/pembuka2/icons.png') }}" alt="Status icons" class="status-img">
      </div>
    </div>

    <!-- ISI SPLASH -->
    <main class="splash-screen">
      <div class="splash-content">
        <!-- logo kamera -->
        <img src="{{ asset('asset/pelanggan/pembuka2/logo1.png') }}" alt="Logo kamera" class="logo-camera">
        <!-- tulisan photoholic (+ tagline jika sudah satu gambar) -->
        <img src="{{ asset('asset/pelanggan/pembuka2/brand-text.png') }}" alt="Photoholic" class="brand-logo">
      </div>
    </main>

    <!-- NAV BAR BAWAH -->
    <footer class="nav-bar">
      <div class="nav-btn nav-back"></div>
      <div class="nav-btn nav-home"></div>
      <div class="nav-btn nav-recent"></div>
    </footer>
  </div>

  <script>
    // redirect otomatis ke halaman login setelah 1.4 detik
    setTimeout(() => {
      window.location.href = "{{ url('/masuk') }}";
    }, 1400);
  </script>
</body>
</html>
