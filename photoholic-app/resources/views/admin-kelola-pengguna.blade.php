<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Kelola Pengguna</title>

<link href="https://fonts.googleapis.com/css2?family=Commissioner:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/admin/admin-kelola-pengguna.css') }}">
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
        <img src="{{ asset('asset/pelanggan/beranda/logo-header.png') }}" class="logo">
        <h1 class="page-title">Kelola Pengguna</h1>
      </div>
    </header>

    <!-- CONTENT -->
    <div class="users-wrapper">

      <!-- INTRO CARD -->
      <section class="users-intro-card">
        <div class="users-intro-icon">
          <span>👥</span>
        </div>
        <div class="users-intro-text">
          <h2>Manajemen Pengguna</h2>
          <p>Tambah, lihat, dan kelola akun pengguna Photoholic.</p>
        </div>
      </section>

      <!-- SEARCH -->
      <section class="users-search-section">
        <input type="text" class="users-search-input" placeholder="Cari nama atau email pengguna...">
      </section>

      <!-- LIST TITLE -->
      <h3 class="users-list-title">Daftar Pengguna</h3>

      <!-- USER LIST -->
      <section class="users-list">
            @foreach ($users as $user)
                <article class="user-card">
                <div class="user-main">
                    <div class="user-avatar">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                    </div>

                    <div class="user-info">
                    <div class="user-name-row">
                        <span class="user-name">{{ $user->name }}</span>

                        <span class="user-role 
                        {{ $user->role === 'admin' ? 'user-role-admin' : 'user-role-cust' }}">
                        {{ ucfirst($user->role) }}
                        </span>
                    </div>

                    <p class="user-email">{{ $user->email }}</p>
                    <p class="user-phone">{{ $user->phone ?? '-' }}</p>
                    </div>
                </div>

                <div class="user-actions">
                    <button class="btn-chip" type="button">Detail</button>
                    <button class="btn-more" type="button">⋮</button>
                </div>
                </article>
            @endforeach
      </section>

    </div>
  </div>
</body>
</html>
