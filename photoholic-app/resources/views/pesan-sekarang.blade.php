<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Studio Classy</title>

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/pelanggan/pesan-sekarang.css') }}">
</head>

<body>
  <div class="phone">

    <!-- STATUS BAR -->
    <div class="status-bar">
      <img src="{{ asset('asset/pelanggan/pesan-sekarang/jam.png') }}" class="status-clock" alt="clock">
      <img src="{{ asset('asset/pelanggan/pesan-sekarang/icons.png') }}" class="status-img" alt="status">
    </div>

    <!-- HEADER (sama seperti blog) -->
    <header class="app-header">
      <img src="{{ asset('asset/pelanggan/blog/logo-header.png') }}" class="header-logo" alt="logo">

      <nav class="header-nav">
        <a href="/beranda" class="nav-link">Beranda</a>
        <a href="/studio" class="nav-link active">Studio</a>
        <a href="/blog" class="nav-link">Blog</a>
        <a href="/pemesanan" class="nav-link">Pemesanan</a>
      </nav>

      <button class="profile-btn" onclick="location.href='/profil'">
        <img src="{{ asset('asset/pelanggan/blog/icon-profil.png') }}" class="profile-icon" alt="profil">
      </button>
    </header>

    <!-- CONTENT -->
    <div class="screen">

      <!-- HERO STUDIO -->
      <div class="studio-hero">
        <img src="{{ asset('asset/pelanggan/pesan-sekarang/studio-classy.png') }}" class="studio-image" alt="Studio Classy">
        <div class="studio-overlay"></div>

        <button class="hero-back-btn" onclick="location.href='/beranda'">
          <img src="{{ asset('asset/pelanggan/pesan-sekarang/back.png') }}" class="hero-back-icon" >
        </button>

        <div class="studio-info">
          <h1>Studio Classy</h1>
          <p class="studio-price">Rp 45.000/Sesi</p>
          <p class="studio-sub">Max 10 Orang · Paper Negatif Film</p>
        </div>
      </div>

      @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif

      <!-- FORM BOOKING -->
      <form id="bookingForm" action="{{ route('booking.store') }}" method="POST">
        @csrf

        <!-- TANGGAL -->
        <div class="field-group">
          <label for="tanggal">Tanggal</label>
          <input type="date" name="tanggal" class="input-box" required>
        </div>

        <!-- SESI -->
        <div class="field-group">
          <label for="sesi">Sesi</label>
          <select name="sesi" class="input-box" required>
            <option value="1">1 Sesi</option>
            <option value="2">2 Sesi</option>
            <option value="3">3 Sesi</option>
            <option value="4">4 Sesi</option>
          </select>
        </div>

        <!-- WAKTU -->
        <div class="field-group">
          <label for="waktu">Waktu Mulai</label>
          <select name="waktu" class="input-box" required>
            <option value="11:00">11:00</option>
            <option value="11:05">11:05</option>
            <option value="11:10">11:10</option>
            <option value="11:15">11:15</option>
            <option value="11:20">11:20</option>
            <option value="11:25">11:25</option>
            <option value="11:30">11:30</option>
            <option value="11:35">11:35</option>
            <option value="11:40">11:40</option>
            <option value="11:45">11:45</option>
            <option value="11:50">11:50</option>
            <option value="11:55">11:55</option>

            <option value="12:00">12:00</option>
            <option value="12:05">12:05</option>
            <option value="12:10">12:10</option>
            <option value="12:15">12:15</option>
            <option value="12:20">12:20</option>
            <option value="12:25">12:25</option>
            <option value="12:30">12:30</option>
            <option value="12:35">12:35</option>
            <option value="12:40">12:40</option>
            <option value="12:45">12:45</option>
            <option value="12:50">12:50</option>
            <option value="12:55">12:55</option>

            <option value="13:00">13:00</option>
            <option value="13:05">13:05</option>
            <option value="13:10">13:10</option>
            <option value="13:15">13:15</option>
            <option value="13:20">13:20</option>
            <option value="13:25">13:25</option>
            <option value="13:30">13:30</option>
            <option value="13:35">13:35</option>
            <option value="13:40">13:40</option>
            <option value="13:45">13:45</option>
            <option value="13:50">13:50</option>
            <option value="13:55">13:55</option>

            <option value="14:00">14:00</option>
            <option value="14:05">14:05</option>
            <option value="14:10">14:10</option>
            <option value="14:15">14:15</option>
            <option value="14:20">14:20</option>
            <option value="14:25">14:25</option>
            <option value="14:30">14:30</option>
            <option value="14:35">14:35</option>
            <option value="14:40">14:40</option>
            <option value="14:45">14:45</option>
            <option value="14:50">14:50</option>
            <option value="14:55">14:55</option>

            <option value="15:00">15:00</option>
            <option value="15:05">15:05</option>
            <option value="15:10">15:10</option>
            <option value="15:15">15:15</option>
            <option value="15:20">15:20</option>
            <option value="15:25">15:25</option>
            <option value="15:30">15:30</option>
            <option value="15:35">15:35</option>
            <option value="15:40">15:40</option>
            <option value="15:45">15:45</option>
            <option value="15:50">15:50</option>
            <option value="15:55">15:55</option>

            <option value="16:00">16:00</option>
            <option value="16:05">16:05</option>
            <option value="16:10">16:10</option>
            <option value="16:15">16:15</option>
            <option value="16:20">16:20</option>
            <option value="16:25">16:25</option>
            <option value="16:30">16:30</option>
            <option value="16:35">16:35</option>
            <option value="16:40">16:40</option>
            <option value="16:45">16:45</option>
            <option value="16:50">16:50</option>
            <option value="16:55">16:55</option>

            <option value="17:00">17:00</option>
            <option value="17:05">17:05</option>
            <option value="17:10">17:10</option>
            <option value="17:15">17:15</option>
            <option value="17:20">17:20</option>
            <option value="17:25">17:25</option>
            <option value="17:30">17:30</option>
            <option value="17:35">17:35</option>
            <option value="17:40">17:40</option>
            <option value="17:45">17:45</option>
            <option value="17:50">17:50</option>
            <option value="17:55">17:55</option>

            <option value="18:00">18:00</option>
            <option value="18:05">18:05</option>
            <option value="18:10">18:10</option>
            <option value="18:15">18:15</option>
            <option value="18:20">18:20</option>
            <option value="18:25">18:25</option>
            <option value="18:30">18:30</option>
            <option value="18:35">18:35</option>
            <option value="18:40">18:40</option>
            <option value="18:45">18:45</option>
            <option value="18:50">18:50</option>
            <option value="18:55">18:55</option>

            <option value="19:00">19:00</option>
            <option value="19:05">19:05</option>
            <option value="19:10">19:10</option>
            <option value="19:15">19:15</option>
            <option value="19:20">19:20</option>
            <option value="19:25">19:25</option>
            <option value="19:30">19:30</option>
            <option value="19:35">19:35</option>
            <option value="19:40">19:40</option>
            <option value="19:45">19:45</option>
            <option value="19:50">19:50</option>
            <option value="19:55">19:55</option>

            <option value="20:00">20:00</option>
            <option value="20:05">20:05</option>
            <option value="20:10">20:10</option>
            <option value="20:15">20:15</option>
            <option value="20:20">20:20</option>
            <option value="20:25">20:25</option>
            <option value="20:30">20:30</option>
            <option value="20:35">20:35</option>
            <option value="20:40">20:40</option>
            <option value="20:45">20:45</option>
            <option value="20:50">20:50</option>
            <option value="20:55">20:55</option>

            <option value="21:00">21:00</option>
            <option value="21:05">21:05</option>
            <option value="21:10">21:10</option>
            <option value="21:15">21:15</option>
            <option value="21:20">21:20</option>
            <option value="21:25">21:25</option>
            <option value="21:30">21:30</option>
            <option value="21:35">21:35</option>
            <option value="21:40">21:40</option>
            <option value="21:45">21:45</option>
            <option value="21:50">21:50</option>
            <option value="21:55">21:55</option>
          </select>
        </div>
      </form>
    </div> 

    <!-- TOTAL HARGA + TOMBOL PESAN -->
    <div class="booking-bottom">
      <div class="total-row">
        <span>Total</span>
        <span class="total-amount">Rp. 0</span>
      </div>
      <button class="btn-book" type="button" id="submitBtn" disabled>Pesan Sekarang</button>
    </div>

    <!-- FOOTER (sama seperti blog) -->
    <footer class="footer-bar">
      <div class="footer-inner">
        <span>0851-2400-0950</span>
        <span>@myphotoholic</span>
        <span>@photoholic.indonesia</span>
      </div>
    </footer>
  </div>

  <script>
    const sesiSelect = document.querySelector('select[name="sesi"]');
    const totalSpan = document.querySelector('.total-amount');
    const btnBook = document.querySelector('.booking-bottom .btn-book');
    const hargaPerSesi = 45000;
    
    function updateTotal() {
        const jumlah = parseInt(sesiSelect.value);
        totalSpan.textContent = 'Rp. ' + (jumlah * hargaPerSesi).toLocaleString();
        btnBook.disabled = false;
    }
    
    sesiSelect.addEventListener('change', updateTotal);
    window.addEventListener('load', updateTotal);

    btnBook.addEventListener('click', () => {
      document.getElementById('bookingForm').submit();
    });
  </script>
</body>
</html>
