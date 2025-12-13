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
        <img src="{{ asset('asset/pelanggan/beranda/jam.png') }}" alt="Jam" class="status-clock">
      </div>

      <div class="status-icons">
        <img src="{{ asset('asset/pelanggan/beranda/icons.png') }}" alt="Status icons" class="status-img">
      </div>
    </div>

 <!-- HEADER -->
    <header class="studio-header">
      <button class="back-btn">
        <img src="{{ asset('asset/admin/tambah-studio-admin/back.png') }}" class="back-icon">
      </button>
      <h1 class="page-title">Tambah Studio</h1>
    </header>

    <!-- KONTEN -->
  

    <main class="studio-screen">

      
      <form action="{{ route('admin.studio.store') }}"
      method="POST"
      enctype="multipart/form-data">
      @csrf

      <!-- UPLOAD FOTO -->
      <div class="upload-box">
        <img
          src="{{ asset('asset/admin/tambah-studio-admin/no-image.png') }}"
          class="upload-placeholder"
          id="previewImage"
        >

        <!-- HIDDEN FILE INPUT -->
        <input
          type="file"
          name="gambar"
          id="gambarInput"
          accept="image/*"
          hidden
        >

        <button
          type="button"
          class="upload-btn"
          onclick="document.getElementById('gambarInput').click()"
        >
          Tambahkan Foto
        </button>
      </div>

      <!-- FORM -->
      <label class="form-label">Nama Studio</label>
      <input type="text"
            class="form-input"
            name="nama"
            required>

      <label class="form-label">Deskripsi</label>
      <textarea class="form-input form-textarea"
                name="deskripsi"
                required></textarea>

      <label class="form-label">Harga Per Sesi</label>
      <input type="number"
            class="form-input"
            name="harga"
            required>


      <!-- BUTTONS -->
      <button type="submit" class="btn-primary">
        Tambah Studio
      </button>
      <button class="btn-secondary">Batalkan</button>

      </form>
    </main>

    <!-- NAV BAR -->
    <nav class="bottom-nav">
      <a href="admin-beranda">
            <div class="nav-item">
                <img src="{{ asset('asset/admin/studio-admin/nav-home.png') }}" alt="Halaman Utama" class="nav-item-icon">
                <span class="nav-link">Halaman Utama</span>
            </div>
        </a>

        <a href="daftar-pemesanan-admin">
            <div class="nav-item">
                <img src="{{ asset('asset/admin/admin-beranda/nav-booking.png') }}" alt="Pemesanan" class="nav-item-icon">
                <span class="nav-link">Pemesanan</span>
            </div>
        </a>

        <a href="studio-admin">
            <div class="nav-item active">
                <img src="{{ asset('asset/admin/studio-admin/nav-studio.png') }}" alt="Studio" class="nav-item-icon">
                <span class="nav-link active">Studio</span>
            </div>
        </a>

        <a href="pembayaran-admin">
            <div class="nav-item">
                <img src="{{ asset('asset/admin/admin-beranda/nav-payment.png') }}" alt="Pembayaran" class="nav-item-icon">
                <span class="nav-link">Pembayaran</span>
            </div>
        </a>

        <a href="lainya-admin">
            <div class="nav-item">
                <img src="{{ asset('asset/admin/admin-beranda/nav-more.png') }}" alt="Lainnya" class="nav-item-icon">
                <span class="nav-link">Lainnya</span>
            </div>
        </a>
    </nav>

  </div>
  <script>
    document.getElementById('gambarInput').addEventListener('change', function (e) {
        const file = e.target.files[0];
        if (file) {
            document.getElementById('previewImage').src =
                URL.createObjectURL(file);
        }
    });
  </script>

</body>
</html>