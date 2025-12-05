<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Edit Profil</title>

  <link href="https://fonts.googleapis.com/css2?family=Commissioner:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/pelanggan/edit-profile.css') }}">
</head>

<body>
  <div class="phone">
    <!-- STATUS BAR -->
    <div class="status-bar">
      <div class="status-left">
        <img src="{{ asset('asset/pelanggan/edit-profile/jam.png') }}" alt="Jam" class="status-clock">
      </div>
      <div class="status-icons">
        <img src="{{ asset('asset/pelanggan/edit-profile/icons.png') }}" alt="Status icons" class="status-img">
      </div>
    </div>

    <!-- HEADER -->
    <header class="app-header">
      <button class="back-btn" onclick="window.history.back()">
        <img src="{{ asset('asset/pelanggan/edit-profile/back.png') }}" alt="Kembali">
      </button>
      <h1 class="header-title">Edit Profil</h1>
      <div class="header-spacer"></div>
    </header>

    <!-- KONTEN UTAMA -->
    <main class="edit-screen">
      <!-- KARTU PROFIL -->
      <section class="profile-card">
        <div class="photo-wrapper">
          <img src="{{ asset('storage/profil/' . ($user->foto_profil ?? 'default.png')) }}" 
               alt="Foto Profil" class="profile-photo" id="profilePreview">
          <button type="button" class="change-photo-btn" id="changePhotoBtn">Ganti Foto</button>
          <input type="file" name="foto_profil" id="photoInput" accept="image/*" hidden>
        </div>
        <p class="profile-email-info">
          Foto dan data ini akan digunakan untuk akun Photoholic Anda.
        </p>
      </section>

      <!-- FORM EDIT DATA -->
      <section class="form-section">
        <form method="POST" action="{{ url('/edit-profile') }}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="name">Nama Lengkap</label>
            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required>
          </div>

          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" value="{{ old('username', $user->username ?? $user->name) }}" required>
          </div>

          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required>
          </div>

          <div class="form-group">
            <label for="phone">Nomor Telepon</label>
            <input type="tel" id="phone" name="phone" value="{{ old('phone', $user->phone) }}">
          </div>

          <div class="form-actions">
            <button type="submit" class="btn-primary">Simpan</button>
          </div>
        </form>
      </section>
    </main>

    <!-- POPUP BERHASIL -->
    @if(session('success'))
      <div class="success-modal-backdrop show" id="successModal">
        <div class="success-modal">
          <div class="success-icon">✓</div>
          <h2 class="success-title">Profil berhasil disimpan</h2>
          <p class="success-text">
            {{ session('success') }}
          </p>
          <button type="button" class="success-btn" id="successOkBtn">Oke</button>
        </div>
      </div>
    @endif
  </div>

  <script>
    const changePhotoBtn = document.getElementById('changePhotoBtn');
    const photoInput = document.getElementById('photoInput');
    const profilePreview = document.getElementById('profilePreview');

    changePhotoBtn.addEventListener('click', () => {
      photoInput.click();
    });

    photoInput.addEventListener('change', (e) => {
      const file = e.target.files[0];
      if (!file) return;
      const reader = new FileReader();
      reader.onload = (ev) => {
        profilePreview.src = ev.target.result;
      };
      reader.readAsDataURL(file);
    });

    // Popup OK button
    const successOkBtn = document.getElementById('successOkBtn');
    if(successOkBtn){
      successOkBtn.addEventListener('click', () => {
        document.getElementById('successModal').classList.remove('show');
        window.location.href = '{{ url("/profil") }}';
      });
    }
  </script>
</body>
</html>
