<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Kelola Tentang Kami</title>

<link href="https://fonts.googleapis.com/css2?family=Commissioner:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/admin/admin-kelola-tentang-kami.css') }}">
</head>

<body>
  <div class="phone">

    <!-- STATUS BAR -->
    <div class="status-bar">
      <img src="{{ asset('asset/pelanggan/beranda/jam.png') }}" class="status-clock">
      <img src="{{ asset('asset/pelanggan/beranda/icons.png') }}" class="status-icons">
    </div>

    <!-- HEADER -->
    <header class="topbar">
      <div class="topbar-inner">
        <img src="{{ asset('asset/pelanggan/beranda/logo-header.png') }}" class="logo" alt="Photoholic">
        <h1 class="page-title">Kelola Tentang Kami</h1>
      </div>
    </header>

    <!-- CONTENT -->
    <form class="about-admin-wrapper"
        method="POST"
        action="{{ route('admin.about.update') }}">
        @csrf

      <!-- INTRO CARD -->
      <section class="about-admin-intro-card">
        <div class="about-admin-intro-icon">ℹ️</div>
        <div class="about-admin-intro-text">
          <h2>Pengaturan Halaman</h2>
          <p>
            Ubah teks yang muncul pada halaman <strong>Tentang Kami</strong>
            di aplikasi pengguna.
          </p>
        </div>
      </section>

      <!-- FORM: INFO SINGKAT -->
      <section class="about-admin-section">
        <h3 class="about-admin-title">Info Singkat</h3>

        <label class="about-admin-label">Judul Halaman</label>
        <input type="text"
            name="judul"
            class="about-admin-input"
            value="{{ old('title', $about_pages->title ?? '') }}"
            placeholder="Masukkan judul utama..."
        >

        <label class="about-admin-label">Subjudul / Tagline</label>
        <input type="text"
            name="subjudul"
            class="about-admin-input"
            value="{{ old('subtitle', $about_pages->subtitle ?? '') }}"
            placeholder="Masukkan subjudul..."
        >
      </section>

      <!-- FORM: DESKRIPSI -->
      <section class="about-admin-section">
        <h3 class="about-admin-title">Deskripsi Singkat</h3>
        <textarea name="description"
        class="about-admin-textarea" placeholder="Tulis deskripsi singkat tentang Photoholic...">{{ old('description', $about_pages->description ?? '') }}</textarea>
      </section>

      <!-- FORM: VISI & MISI -->
      <section class="about-admin-section">
        <h3 class="about-admin-title">Visi</h3>
        <textarea name="visi"
        class="about-admin-textarea" placeholder="Tulis visi Photoholic...">{{ old('vision', $about_pages->vision ?? '') }}</textarea>
      </section>

      <section class="about-admin-section">
        <h3 class="about-admin-title">Misi</h3>
        <textarea name="misi"
        class="about-admin-textarea" placeholder="Tulis misi Photoholic (boleh poin per baris)...">{{ old('mission', $about_pages->mission ?? '') }}</textarea>
      </section>

      <!-- FORM: KONTAK -->
      <section class="about-admin-section">
        <h3 class="about-admin-title">Kontak yang Ditampilkan</h3>
        <textarea name="kontak"
        class="about-admin-textarea" placeholder="Tulis informasi kontak...">{{ old('contact', $about_pages->contact ?? '') }}</textarea>
      </section>

      <!-- BUTTONS -->
      <div class="about-admin-actions">
        <button class="btn-save-about" type="submit">
            Simpan Perubahan
        </button>
        <button type="button" class="btn-cancel-about" onclick="history.back()">Batal</button>
      </div>

    </form>
  </div>
</body>
</html>
