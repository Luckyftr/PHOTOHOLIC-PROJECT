<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blog Photoholic</title>

  <link href="https://fonts.googleapis.com/css2?family=Commissioner:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/pelanggan/blog.css') }}">
</head>

<body>
<div class="phone">

  <!-- STATUS BAR -->
  <div class="status-bar">
    <img src="{{ asset('asset/pelanggan/blog/jam.png') }}" class="status-clock" alt="clock">
    <img src="{{ asset('asset/pelanggan/blog/icons.png') }}" class="status-img" alt="status">
  </div>

  <!-- HEADER -->
  <header class="app-header">
    <img src="{{ asset('asset/pelanggan/blog/logo-header.png') }}" class="header-logo" alt="logo">

    <nav class="header-nav">
      <a href="/beranda" class="nav-link">Beranda</a>
      <a href="/studio" class="nav-link">Studio</a>
      <a href="/blog" class="nav-link active">Blog</a>
      <a href="/pemesanan" class="nav-link">Pemesanan</a>
    </nav>

    <button class="profile-btn" onclick="location.href='/profil'">
      <img src="{{ asset('asset/pelanggan/blog/icon-profil.png') }}" class="profile-icon" alt="profil">
    </button>
  </header>

  <!-- CONTENT -->
  <div class="screen">

    <!-- LIST BLOG (STRUKTUR LAMA, STYLE BARU) -->
    <div class="blog-list">
      @foreach ($blogs as $blog)
        @if ($blog->status === 'published')
          <article class="blog-item">

            <img 
              src="{{ asset('storage/blogs/' . $blog->image) }}" 
              class="blog-thumb"
              alt="{{ $blog->title }}"
            >

            <div class="blog-text-wrap">
              <p class="blog-text">
                {{ Str::limit($blog->excerpt, 120) }}
                <a href="#" class="blog-more">Selengkapnya..</a>
              </p>

              <button
                class="blog-btn"
                onclick="window.open('{{ $blog->instagram_url }}', '_blank')">
                Baca Sekarang
              </button>
            </div>

          </article>
        @endif
      @endforeach
    </div>

  </div><!-- /screen -->

  <!-- FOOTER (VISUAL BARU, STRUKTUR TETAP) -->
  <footer class="footer-bar">
    <div class="footer-inner">
      <span>0851-2400-0950</span>
      <span>@photoholic.indonesia</span>
      <span>minphotoholic@gmail.com</span>
    </div>
  </footer>

</div><!-- /phone -->
</body>
</html>
