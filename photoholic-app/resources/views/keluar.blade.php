<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Keluar</title>
  <link href="https://fonts.googleapis.com/css2?family=Commissioner:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="keluar.css">
</head>

<body>
  <div class="phone">

    <!-- STATUS BAR -->
    <div class="status-bar">
      <img src="assets/jam.png" class="status-clock" alt="Jam">
      <img src="assets/icons.png" class="status-icons" alt="Status Icons">
    </div>

    <!-- HEADER (hanya logo di area pink) -->
    <header class="topbar">
      <div class="topbar-inner">
        <img src="assets/logo-header.png" class="logo" alt="Photoholic">
      </div>
    </header>

    <!-- CONTENT -->
    <div class="logout-wrapper">

      <section class="logout-card">
        <div class="logout-icon-circle">
          <span class="logout-icon">⎋</span>
        </div>

        <h2 class="logout-title">Yakin ingin keluar?</h2>
        <p class="logout-text">
          Kamu akan keluar dari akun Photoholic.<br>
          Kamu tetap bisa masuk kembali kapan saja.
        </p>

        <button class="btn-primary" type="button">Keluar dari Akun</button>
        <button class="btn-secondary" type="button">Batal</button>
      </section>

    </div>
  </div>

  <script>
    document.querySelector(".btn-primary").onclick = () => {
    fetch("/keluar", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
            "Accept": "application/json",
        }
    }).then(response => {
        window.location.href = "/masuk"; 
    });
  };
  </script>

</body>
</html>
