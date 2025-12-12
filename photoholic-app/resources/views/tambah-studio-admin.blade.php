<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Halaman Utama</title>

<link href="https://fonts.googleapis.com/css2?family=Commissioner:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/admin/tambah-studio-admin.css') }}">
</head>

<body>
  <div class="phone">

    <!-- STATUS BAR -->
    <div class="status-bar">
      <div class="status-left">
        <img src="assets/jam.png" alt="Jam" class="status-clock">
      </div>

      <div class="status-icons">
        <img src="assets/icons.png" alt="Status icons" class="status-img">
      </div>
    </div>

 <!-- HEADER -->
    <header class="studio-header">
      <button class="back-btn">
        <img src="assets/back.png" class="back-icon">
      </button>
      <h1 class="page-title">Tambah Studio</h1>
    </header>

    <!-- KONTEN -->
    <main class="studio-screen">

      <!-- UPLOAD FOTO -->
      <div class="upload-box">
        <img src="assets/no-image.png" class="upload-placeholder">
        <button class="upload-btn">Tambahkan Foto</button>
      </div>

      <!-- FORM -->
      <label class="form-label">Nama Studio</label>
      <input type="text" class="form-input">

      <label class="form-label">Deskripsi</label>
      <textarea class="form-input form-textarea"></textarea>

      <label class="form-label">Harga Per Sesi</label>
      <input type="number" class="form-input">

      <!-- BUTTONS -->
      <button class="btn-primary">Tambah Studio</button>
      <button class="btn-secondary">Batalkan</button>

    </main>

    <!-- NAV BAR -->
    <nav class="bottom-nav">
      <div class="nav-item">
        <img src="assets/nav-home.png" class="nav-item-icon">
        <span>Halaman Utama</span>
      </div>

      <div class="nav-item">
        <img src="assets/nav-booking.png" class="nav-item-icon">
        <span>Pemesanan</span>
      </div>

      <div class="nav-item active">
        <img src="assets/nav-studio.png" class="nav-item-icon">
        <span>Studio</span>
      </div>

      <div class="nav-item">
        <img src="assets/nav-payment.png" class="nav-item-icon">
        <span>Pembayaran</span>
      </div>

      <div class="nav-item">
        <img src="assets/nav-more.png" class="nav-item-icon">
        <span>Lainnya</span>
      </div>
    </nav>

  </div>
</body>
</html>