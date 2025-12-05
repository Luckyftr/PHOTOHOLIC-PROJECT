<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Layar Pembuka</title>

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/pelanggan/pembuka.css') }}">
</head>

<body>
  <div class="phone">

    <!-- STATUS BAR -->
    <div class="status-bar">
      <div class="status-left">
        <img src="{{ asset('asset/pelanggan/pembuka/jam.png') }}" alt="Jam" class="status-clock">
      </div>

      <div class="status-icons">
        <img src="{{ asset('asset/pelanggan/pembuka/icons.png') }}" alt="Status icons" class="status-img">
      </div>
    </div>
    
    <!-- ISI SPLASH -->
    <main class="splash-screen">
      <div class="splash-circle">
        <a href="{{ url('/pembuka2') }}">
          <img src="{{ asset('asset/pelanggan/pembuka/logo1.png') }}" alt="Logo Kyuu" class="splash-logo">
        </a>
      </div>          
    </main>

  </div>

  <script>
    setTimeout(() => {
      document.body.classList.add("fade-out");
      setTimeout(() => {
        window.location.href = "{{ url('/pembuka2') }}";
      }, 900);
    }, 2000);
  </script>

</body>
</html>
