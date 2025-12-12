<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cek Ketersediaan</title>

  <link href="https://fonts.googleapis.com/css2?family=Commissioner:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/pelanggan/ketersediaan.css') }}">
</head>

<body>
  <div class="phone">

    <!-- STATUS BAR -->
    <div class="status-bar">
      <div class="status-left">
        <img src="{{ asset('asset/pelanggan/ketersediaan/jam.png') }}" class="status-clock">
      </div>
      <div class="status-icons">
        <img src="{{ asset('asset/pelanggan/ketersediaan/icons.png') }}" class="status-img">
      </div>
    </div>

    <!-- HEADER -->
    <header class="app-header">
      <img src="{{ asset('asset/pelanggan/ketersediaan/logo-header.png') }}" class="header-logo">

      <nav class="header-nav">
        <a href="/beranda" class="nav-link">Beranda</a>
        <a href="/studio" class="nav-link">Studio</a>
        <a href="/blog" class="nav-link">Blog</a>
        <a href="/pemesanan" class="nav-link active">Pemesanan</a>
      </nav>

      <button class="profile-btn">
        <img src="{{ asset('asset/pelanggan/ketersediaan/icon-profil.png') }}" class="profile-icon">
      </button>
    </header>

    <!-- CONTENT -->
    <div class="screen">

      <!-- TITLE BAR -->
      <div class="page-title-row">
        <button class="back-btn" onclick="location.href='/beranda'">
          <img src="{{ asset('asset/pelanggan/ketersediaan/back.png') }}" class="back-icon">
        </button>
        <h1 class="page-title">Cek Ketersediaan</h1>
      </div>

      <!-- DATE SELECTOR -->
      <div class="date-row">
        @foreach($dates as $date)
        <div class="date-box {{ $date['full'] == $tanggal ? 'active' : '' }}" data-date="{{ $date['full'] }}">
            <span class="day">{{ $date['day'] }}</span>
            <span class="num">{{ $date['num'] }}</span>
        </div>
        @endforeach
      </div>

<!-- LIST CARD -->
    <div class="booking-list">
      <div class="booking-card">
          <img src="{{ asset('asset/pelanggan/ketersediaan/sample1.png') }}" class="studio-img">

          <div class="card-body">
              <div class="top-row">
                  <h3 class="studio-title">{{ $studioName }}</h3>
                  @if($isAvailable)
                      <span class="badge available">Tersedia</span>
                  @else
                      <span class="badge not-available">Tidak Tersedia</span>
                  @endif
              </div>

              <p class="studio-info">{{ \Carbon\Carbon::parse($tanggal)->locale('id')->isoFormat('dddd, D MMMM YYYY') }}</p>
              <p class="studio-info">{{ $jamMulai }} WIB – {{ $jamSelesai }} WIB</p>

              <p class="studio-price">Harga: Rp 45.000/Sesi</p>

              @if($isAvailable)
                  <a href="{{ route('booking.create', ['studio' => $studioCode]) }}" class="btn-order">
                      Pesan Sekarang
                  </a>
              @else
                  <button class="btn-order disabled">Tidak Tersedia</button>
              @endif
          </div>
      </div>
    </div>

      
    </div>

  </div>

  <script>
    <script>
    const dateBoxes = document.querySelectorAll('.date-box');

    dateBoxes.forEach(box => {
        box.addEventListener('click', () => {
            const date = box.dataset.date;
            const studio = "{{ $studioCode }}";
            const sesi = "{{ $sesi }}";
            const jam = "{{ $jamMulai }}";

            // redirect dengan query param
            window.location.href = `/ketersediaan?studio=${studio}&tanggal=${date}&sesi=${sesi}&waktu=${jam}`;
        });
    });
</script>

  </script>

</body>
</html>
