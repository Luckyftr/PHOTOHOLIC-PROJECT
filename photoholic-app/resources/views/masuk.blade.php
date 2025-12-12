<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Masuk</title>

  <link href="https://fonts.googleapis.com/css2?family=Commissioner:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/pelanggan/masuk.css') }}">
</head>

<body>
  <div class="phone">
    <!-- STATUS BAR -->
    <div class="status-bar">
      <div class="status-left">
        <img src="{{ asset('asset/pelanggan/masuk/jam.png') }}" alt="Jam" class="status-clock">
      </div>
      <div class="status-icons">
        <img src="{{ asset('asset/pelanggan/masuk/icons.png') }}" alt="Status icons" class="status-img">
      </div>
    </div>

    <!-- KONTEN UTAMA -->
    <div class="screen">

      <!-- ILUSTRASI -->
      <div class="illustration">
        <img src="{{ asset('asset/pelanggan/masuk/logo1.png') }}" alt="Ilustrasi" class="illustration-img">
      </div>

      <h1 class="title">Masuk</h1>
      <p class="subtitle">
        Selamat datang kembali! Silakan masukkan detail Anda.
      </p>

      <!-- FORM LOGIN -->
      <form action="{{ route('masuk.aksi') }}" method="POST" class="login-form">
        @csrf
        <div class="input-group">
          <input type="email" name="email" class="input-field" placeholder="Alamat Email" required />
        </div>

        <!-- PASSWORD -->
        <div class="input-group">
          <div class="input-with-icon">
            <input type="password" name="password" id="password" placeholder="Kata Sandi" required />
            <button type="button" class="eye-icon" onclick="togglePassword('password', this)">
              <img src="{{ asset('asset/pelanggan/masuk/eye-closed.png') }}" alt="">
            </button>
          </div>
        </div>

        <!-- LUPA KATA SANDI -->
        <div class="forgot-row">
          <a href="{{ url('/lupaPW') }}">Lupa Kata Sandi?</a>
        </div>

        <button type="submit" class="btn-primary" disabled>Masuk</button>
      </form>

      <!-- GOOGLE LOGIN -->
      <div class="google-section">
        <button type="button" class="google-btn" id="btnGoogleLogin">
          <img src="{{ asset('asset/pelanggan/masuk/google.png') }}" alt="Google" class="google-logo">
        </button>
      </div>

      <p class="bottom-text">
        Belum punya akun? <a href="{{ url('/daftar') }}">Daftar</a>
      </p>

    </div>

    <!-- MODAL GOOGLE LOGIN -->
    <div class="google-modal-backdrop" id="googleModalStep0">
      <div class="google-modal">
        <h2 class="google-modal-title">
          “Photoholic” ingin masuk menggunakan "google.com"
        </h2>
        <p class="google-modal-text">
          Hal ini memungkinkan aplikasi dan situs web untuk berbagi informasi Anda.
        </p>
        <div class="google-modal-actions">
          <button class="btn-outline" id="btnBatalStep0">Batal</button>
          <button class="btn-filled" id="btnLanjutStep0">Lanjut</button>
        </div>
      </div>
    </div>

    <div class="google-modal-backdrop" id="googleModalStep1">
      <div class="google-modal google-modal-large">
        <div class="google-modal-header-bar">
          <img src="{{ asset('asset/pelanggan/masuk/google.png') }}" alt="Google" class="google-header-logo">
          <span>Masuk dengan Google</span>
        </div>

        <div class="google-modal-body">
          <h2 class="google-modal-title center">Pilih Akun</h2>
          <p class="google-modal-subtitle">untuk melanjutkan ke Photoholic</p>

          <div class="google-account-list">
            <!-- akun 1 -->
            <button type="button" class="google-account-item account-select">
              <img src="{{ asset('asset/pelanggan/masuk/user1.png') }}" alt="Foto profil" class="google-account-avatar">
              <div class="google-account-text">
                <p class="google-account-name">23081010056 BERLIAN IKA ISABELA</p>
                <p class="google-account-email">23081010056@student.upnjatim.ac.id</p>
              </div>
            </button>

            <!-- akun 2 -->
            <button type="button" class="google-account-item account-select">
              <img src="{{ asset('asset/pelanggan/masuk/user2.png') }}" alt="Foto profil" class="google-account-avatar">
              <div class="google-account-text">
                <p class="google-account-name">beerlnkaaIsabella</p>
                <p class="google-account-email">beerlnkaaIsabella@gmail.com</p>
              </div>
            </button>

            <!-- gunakan akun lain -->
            <button type="button" class="google-account-item account-select no-border" id="btnUseAnother">
              <div class="google-account-icon">
                <span class="google-user-icon-circle"></span>
              </div>
              <div class="google-account-text">
                <p class="google-account-name">Gunakan akun lain</p>
              </div>
            </button>
          </div>

          <p class="google-modal-footer-note">
            Untuk melanjutkan, Google akan membagikan nama Anda, alamat email, dan foto profil dengan Photoholic.
          </p>
        </div>
      </div>
    </div>

    <div class="google-modal-backdrop" id="googleModalStep2">
      <div class="google-modal google-modal-confirm">
        <div class="google-modal-header-bar">
          <img src="{{ asset('asset/pelanggan/masuk/google.png') }}" alt="Google" class="google-header-logo">
          <span>Masuk dengan Google</span>
        </div>
        <div class="google-modal-body">
          <h2 class="google-modal-title">Masuk ke Photoholic</h2>
          <button type="button" class="google-selected-account">
            <div class="selected-account-left">
              <img src="{{ asset('asset/pelanggan/masuk/user2.png') }}" alt="Foto profil" class="google-account-avatar">
              <span class="selected-account-email">beerlnkaaIsabella@gmail.com</span>
            </div>
            <span class="selected-account-chevron">▾</span>
          </button>
          <p class="google-modal-text detail">
            Dengan melanjutkan, Google akan membagikan nama Anda, alamat email,
            preferensi bahasa, dan foto profil Anda dengan Photoholic.
            Silakan merujuk ke Kebijakan Privasi dan Syarat Layanan Photoholic.
          </p>
          <p class="google-modal-text link-note">
            Anda dapat mengelola masuk Google di <span class="text-link">Akun Google</span> Anda.
          </p>
          <div class="google-modal-actions bottom">
            <button class="btn-outline" id="btnBatalStep2">Batal</button>
            <button class="btn-filled" id="btnLanjutStep2">Lanjut</button>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- JS -->
  <script>
    // show/hide password
    function togglePassword(inputId, btn) {
      const input = document.getElementById(inputId);
      const img = btn.querySelector("img");

      if (input.type === "password") {
        input.type = "text";
        img.src = "{{ asset('asset/pelanggan/masuk/eye-open.png') }}";
      } else {
        input.type = "password";
        img.src = "{{ asset('asset/pelanggan/masuk/eye-closed.png') }}";
      }
    }

    // tombol submit aktif/nonaktif
    const loginForm = document.querySelector('.login-form');
    const loginInputs = loginForm.querySelectorAll('input[type="email"], input[type="password"]');
    const loginBtn = loginForm.querySelector('.btn-primary');

    loginBtn.disabled = true;

    function updateLoginButton() {
      const allFilled = Array.from(loginInputs).every(input => input.value.trim() !== "");
      loginBtn.disabled = !allFilled;
    }

    loginInputs.forEach(input => input.addEventListener('input', updateLoginButton));
    updateLoginButton();

    // Google login modal
    const btnGoogleLogin = document.getElementById('btnGoogleLogin');
    const modal0 = document.getElementById('googleModalStep0');
    const btnBatal0 = document.getElementById('btnBatalStep0');
    const btnLanjut0 = document.getElementById('btnLanjutStep0');

    const modal1 = document.getElementById('googleModalStep1');
    const accountButtons = document.querySelectorAll('.account-select');
    const btnUseAnother = document.getElementById('btnUseAnother');

    const modal2 = document.getElementById('googleModalStep2');
    const btnBatal2 = document.getElementById('btnBatalStep2');
    const btnLanjut2 = document.getElementById('btnLanjutStep2');

    btnGoogleLogin.addEventListener('click', () => modal0.classList.add('show'));
    btnBatal0.addEventListener('click', () => modal0.classList.remove('show'));
    btnLanjut0.addEventListener('click', () => {
      modal0.classList.remove('show');
      modal1.classList.add('show');
    });

    accountButtons.forEach(btn => {
      btn.addEventListener('click', () => {
        modal1.classList.remove('show');
        modal2.classList.add('show');
      });
    });

    btnUseAnother.addEventListener('click', e => {
      e.stopPropagation();
      modal1.classList.remove('show');
      window.location.href = "https://accounts.google.com/signin";
    });

    btnBatal2.addEventListener('click', () => modal2.classList.remove('show'));
    btnLanjut2.addEventListener('click', () => window.location.href = "{{ url('/beranda') }}");

    [modal0, modal1, modal2].forEach(modal => {
      modal.addEventListener('click', e => {
        if (e.target === modal) modal.classList.remove('show');
      });
    });
  </script>
</body>
</html>
