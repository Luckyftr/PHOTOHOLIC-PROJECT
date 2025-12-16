<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Detail Pemesanan Studio</title>

  <link href="https://fonts.googleapis.com/css2?family=Commissioner:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/admin/admin-pesan-sekarang.css') }}">
</head>

<body>
  <div class="phone">

    <!-- STATUS BAR -->
    <div class="status-bar">
      <div class="status-left">
        <img src="{{ asset('asset/pelanggan/pesan-sekarang/jam.png') }}" class="status-clock" alt="Jam">
      </div>
      <div class="status-icons">
        <img src="{{ asset('asset/pelanggan/pesan-sekarang/icons.png') }}" class="status-img" alt="Icons">
      </div>
    </div>

    <!-- HEADER -->

    <!-- CONTENT -->
    <main class="screen">

      <!-- HERO STUDIO -->
      <section class="studio-hero">
        <img src="{{ asset('asset/Studio-foto/' . $studioImage) }}" 
            alt="Studio {{ $studioName }}" 
            class="hero-img">

        <img src="{{ asset('asset/pelanggan/pesan-sekarang/back.png') }}" alt="Back" class="hero-back-img" onclick="history.back()">

        <div class="hero-info">
          <h1 class="hero-title">Studio {{ $studioName }}</h1>
          <p class="hero-price">Rp {{ $studioPrice }}/Sesi</p>
          <p class="hero-detail">
            {{ $studioDescription }}
          </p>
        </div>
      </section>

      <!-- FORM PEMESANAN -->
      <section class="booking-panel">
        <form id="bookingForm" action="{{ route('admin.booking.store') }}" method="POST">
          @csrf

          <!-- hidden input studio -->
          <input type="hidden" name="studio" value="{{ $studioCode }}">

          <!-- TANGGAL -->
          <div class="field-group">
            <label for="tanggal">Tanggal</label>
            <div class="input-wrapper">
              <input type="date" id="tanggal" name="tanggal" class="input-field input-date" required />
            </div>
          </div>

          <!-- SESI -->
          <div class="field-group">
            <label for="sesi">Sesi</label>
            <div class="input-wrapper">
              <select id="sesi" name="sesi" class="input-field select-field" required>
                <option value="">Pilih sesi booking</option>
                <option value="1">Sesi 1</option>
                <option value="2">Sesi 2</option>
              </select>
            </div>
          </div>

          <!-- WAKTU -->
          <div class="field-group">
            <label for="waktu">Waktu</label>
            <div class="input-wrapper">
              <input type="time" id="waktu" name="waktu" class="input-field input-time"
                    step="300" min="11:00" max="23:00" required />
            </div>
            <p class="helper-text">Jam operasional 11.00 – 23.00 WIB</p>
            <p id="waktuError" class="error-text" style="display:none;">
              Waktu di luar jam operasional.
            </p>
          </div>
        </form>
      </section>

      <!-- TOTAL & BUTTON -->
      <section class="bottom-bar">
        <div class="total-box">
          <span>Total</span>
          <span id="totalHarga">Rp. 0</span>
        </div>

        <button id="btnPesan" class="btn-pesan" type="button" disabled>
          Pesan Sekarang
        </button>
      </section>
    </main>
  </div>

  <script>
    const tanggalInput = document.getElementById('tanggal');
    const sesiSelect   = document.getElementById('sesi');
    const waktuInput   = document.getElementById('waktu');
    const btnPesan     = document.getElementById('btnPesan');
    const totalHargaEl = document.getElementById('totalHarga');
    const waktuErrorEl = document.getElementById('waktuError');
    const hargaPerSesi = {{ $studioPrice }};

    function isWaktuValid(value) {
      if (!value) return false;
      const [h, m] = value.split(':').map(Number);
      const total = h * 60 + m;
      return total >= 11*60 && total <= 23*60;
    }

    function updateButtonAndTotal() {
      const tanggalTerisi = tanggalInput.value.trim() !== "";
      const sesiTerisi = sesiSelect.value.trim() !== "";
      const waktuVal = waktuInput.value;
      const waktuValid = isWaktuValid(waktuVal);

      waktuErrorEl.style.display = (waktuVal && !waktuValid) ? 'block' : 'none';

      const semuaTerisi = tanggalTerisi && sesiTerisi && waktuValid;

      btnPesan.disabled = !semuaTerisi;
      totalHargaEl.textContent = semuaTerisi ? 'Rp. ' + (parseInt(sesiSelect.value)*hargaPerSesi).toLocaleString() : 'Rp. 0';

      if (semuaTerisi) btnPesan.classList.add('enabled');
      else btnPesan.classList.remove('enabled');
    }

    btnPesan.addEventListener('click', () => {
      document.getElementById('bookingForm').submit();
    });

    tanggalInput.addEventListener('change', updateButtonAndTotal);
    sesiSelect.addEventListener('change', updateButtonAndTotal);
    waktuInput.addEventListener('change', updateButtonAndTotal);
  </script>
</body>
</html>
