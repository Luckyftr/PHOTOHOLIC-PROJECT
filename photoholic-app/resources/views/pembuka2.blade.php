<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Layar Pembuka</title>

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/pelanggan/pembuka2.css">
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
      <!-- logo kamera -->
      <img src="{{ asset('asset/pelanggan/pembuka2/logo1.png') }}" alt="Logo kamera" class="logo-camera">

      <!-- tulisan photoholic -->
      <img src="{{ asset('asset/pelanggan/pembuka2/brand-text.png') }}" alt="Photoholic" class="brand-logo">
    </main>

  </div>

  <script>
    setTimeout(() => {
      document.body.classList.add("fade-out");
      setTimeout(() => {
        window.location.href = "/masuk"; // route login
      }, 900);
    }, 2000);
  </script>  
</body>
</html>
