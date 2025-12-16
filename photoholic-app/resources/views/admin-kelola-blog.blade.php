<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Kelola Blog</title>

  <link href="https://fonts.googleapis.com/css2?family=Commissioner:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/admin/admin-kelola-blog.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body>
  <div class="phone">

    <!-- STATUS BAR -->
    <div class="status-bar">
      <img src="{{ asset('asset/pelanggan/beranda/jam.png') }}" class="status-clock" alt="Jam">
      <img src="{{ asset('asset/pelanggan/beranda/icons.png') }}" class="status-icons" alt="Icons">
    </div>

    <!-- HEADER -->
    <header class="topbar topbar-center">
      <h1 class="page-title page-title-big">Kelola Blog</h1>
    </header>

    <!-- CONTENT -->
    <div class="blog-wrapper">

      <!-- INTRO CARD -->
      <section class="blog-intro-card blog-intro-simple">
        <p class="blog-intro-desc">Buat dan kelola artikel blog untuk informasi & promo Photoholic.</p>
      </section>


      <!-- ACTION ROW -->
      <section class="blog-action-row">
        <button class="btn-add-blog" id="btnAdd">+ Tambah Blog</button>
      </section>

      <!-- SEARCH -->
      <section class="blog-search-section">
        <input type="text" class="blog-search-input" placeholder="Cari judul atau penulis...">
      </section>

      <!-- FILTER -->
      <section class="blog-filter-row">
        <button class="filter-chip filter-chip-active">Semua</button>
        <button class="filter-chip">Dipublikasikan</button>
        <button class="filter-chip">Draft</button>
      </section>

      <h3 class="blog-list-title">Daftar Artikel</h3>

      <!-- BLOG LIST -->
      <section class="blog-list" id="blogList">
      @foreach ($blogs as $blog)
        @php
          $platform = str_contains($blog->instagram_url, 'instagram')
              ? 'Instagram'
              : (str_contains($blog->instagram_url, 'tiktok') ? 'TikTok' : 'Link');

          $thumb = $platform === 'Instagram' ? 'IG' : ($platform === 'TikTok' ? 'TT' : 'PH');
        @endphp

        <article class="blog-card"
          data-id="{{ $blog->id }}"
          data-status="{{ $blog->status }}"
          data-title="{{ $blog->title }}"
          data-date="{{ $blog->created_at->format('d M Y') }}"
          data-author="Admin"
          data-content="{{ $blog->excerpt }}"
          data-link="{{ $blog->instagram_url }}"
          data-platform="{{ $platform }}">

          <div class="blog-main">
            <div class="blog-thumbnail">{{ $thumb }}</div>

            <div class="blog-info">
              <h4 class="blog-title">{{ $blog->title }}</h4>

              <p class="blog-meta">
                {{ $blog->status === 'published' ? 'Dipublikasikan' : 'Draft' }}
                • {{ $blog->created_at->format('d M Y') }}
              </p>

              <p class="blog-meta">Penulis: Admin</p>

              <span class="blog-status
                {{ $blog->status === 'published'
                    ? 'blog-status-published'
                    : 'blog-status-draft' }}">
                {{ ucfirst($blog->status) }}
              </span>
            </div>
          </div>

          <div class="blog-actions">
            <button class="blog-btn-outline" data-action="edit">Edit</button>

            @if ($blog->status === 'published')
              <button class="blog-btn-outline" data-action="view">Lihat</button>
            @else
              <button class="blog-btn-outline" data-action="preview">Preview</button>
            @endif

            <button class="btn-more" data-action="more" type="button">⋮</button>
          </div>

        </article>
      @endforeach
      </section>


    </div>

    <!-- OVERLAY -->
    <div class="overlay" id="overlay"></div>

    <!-- MODAL: EDIT / ADD -->
    <div class="modal" id="modalEdit" aria-hidden="true">
      <div class="modal-sheet">
        <div class="modal-header">
          <div>
            <h3 class="modal-title" id="editTitle">Edit Blog</h3>
            <p class="modal-sub" id="editSub">Perbarui konten artikel.</p>
          </div>
          <button class="icon-close" data-close="modalEdit" aria-label="Tutup">✕</button>
        </div>

        <form class="modal-body" id="formEdit">
          <input type="hidden" id="editId">

          <!-- LINK -->
          <div class="field">
            <label>Link Konten (Instagram / TikTok)</label>

            <div class="import-row">
              <input type="url" id="editInputLink" placeholder="Tempel link reels/post/tiktok..." required>
              <button type="button" class="btn-mini" id="btnFetchContent">Ambil</button>
            </div>

            <small class="helper">
              Tempel link postingan dari IG atau TikTok, lalu klik <b>Ambil</b>.
            </small>
          </div>

          <!-- PREVIEW -->
          <div class="import-preview" id="importPreview" style="display:none;">
            <div class="preview-thumb" id="previewThumb">PH</div>
            <div class="preview-info">
              <p class="preview-title" id="previewTitle">Caption/judul akan muncul di sini</p>
              <p class="preview-meta" id="previewMeta">Sumber: -</p>
            </div>
          </div>

          <!-- AUTOFILL -->
          <div class="field">
            <label>Judul (auto dari caption, bisa diedit)</label>
            <input type="text" id="editInputTitle" placeholder="Judul otomatis..." required>
          </div>

          <div class="field-row">
            <div class="field">
              <label>Penulis</label>
              <input type="text" id="editInputAuthor" value="Admin" required>
            </div>

            <div class="field">
              <label>Tanggal</label>
              <input type="text" id="editInputDate" placeholder="20 Nov 2025" required>
            </div>
          </div>

          <div class="field">
            <label>Status</label>
            <select id="editInputStatus">
              <option value="draft">Draft</option>
              <option value="published">Published</option>
            </select>
          </div>

          <div class="field">
            <label>Caption / Konten (auto dari platform, bisa diedit)</label>
            <textarea rows="7" id="editInputContent" placeholder="Konten otomatis..." required></textarea>
          </div>

          <div class="modal-actions">
            <button type="button" class="btn-secondary" data-close="modalEdit">Batal</button>
            <button type="submit" class="btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>

    <!-- MODAL: VIEW / PREVIEW -->
    <div class="modal" id="modalView" aria-hidden="true">
      <div class="modal-sheet">
        <div class="modal-header">
          <div>
            <h3 class="modal-title" id="viewTitle">Judul</h3>
            <p class="modal-sub" id="viewMeta">Meta</p>
          </div>
          <button class="icon-close" data-close="modalView" aria-label="Tutup">✕</button>
        </div>

        <div class="modal-body">
          <div class="read-card">
            <div class="read-badge" id="viewBadge">Published</div>

            <div class="read-source" id="viewSourceWrap" style="display:none;">
              <span class="read-source-pill" id="viewPlatform">Platform</span>
              <a class="read-source-link" id="viewLink" href="#" target="_blank" rel="noopener">Buka Link</a>
            </div>

            <p class="read-content" id="viewContent"></p>
          </div>

          <div class="modal-actions">
            <button type="button" class="btn-secondary" data-close="modalView">Tutup</button>
            <button type="button" class="btn-primary" id="btnQuickEdit">Edit</button>
          </div>
        </div>
      </div>
    </div>

    <!-- BOTTOMSHEET: MORE -->
    <div class="sheet" id="sheetMore" aria-hidden="true">
      <div class="sheet-box">
        <div class="sheet-handle"></div>
        <button class="sheet-item" id="sheetEdit">Edit</button>
        <button class="sheet-item" id="sheetView">Lihat / Preview</button>
        <button class="sheet-item danger" id="sheetDelete">Hapus</button>
        <button class="sheet-cancel" data-close="sheetMore">Batal</button>
      </div>
    </div>

    <!-- TOAST -->
    <div class="toast" id="toast">Tersimpan ✅</div>

  </div>

  <script>
    const overlay = document.getElementById("overlay");
    const modalEdit = document.getElementById("modalEdit");
    const modalView = document.getElementById("modalView");
    const sheetMore = document.getElementById("sheetMore");
    const toast = document.getElementById("toast");

    const blogList = document.getElementById("blogList");

    let currentCard = null;

    function openLayer(el){
      overlay.classList.add("show");
      el.classList.add("show");
      el.setAttribute("aria-hidden", "false");
    }

    function closeLayer(el){
      el.classList.remove("show");
      el.setAttribute("aria-hidden", "true");
      if(!modalEdit.classList.contains("show") &&
         !modalView.classList.contains("show") &&
         !sheetMore.classList.contains("show")){
        overlay.classList.remove("show");
      }
    }

    function showToast(text){
      toast.textContent = text;
      toast.classList.add("show");
      setTimeout(() => toast.classList.remove("show"), 1600);
    }

    function detectSource(url){
      const u = (url || "").toLowerCase();
      if(u.includes("instagram.com")) return "Instagram";
      if(u.includes("tiktok.com")) return "TikTok";
      return "Link";
    }

    function initialsFromPlatform(platform){
      if(platform === "Instagram") return "IG";
      if(platform === "TikTok") return "TT";
      return "PH";
    }

    function cardData(card){
      return {
        id: card.dataset.id,
        status: card.dataset.status,
        title: card.dataset.title,
        date: card.dataset.date,
        author: card.dataset.author,
        content: card.dataset.content,
        link: card.dataset.link || "",
        platform: card.dataset.platform || ""
      };
    }

    function setBadge(el, status){
      el.textContent = (status === "published") ? "Published" : "Draft";
      el.classList.toggle("badge-published", status === "published");
      el.classList.toggle("badge-draft", status !== "published");
    }

    // ===== Import UI elements (Modal Add/Edit) =====
    const btnFetchContent = document.getElementById("btnFetchContent");
    const editInputLink = document.getElementById("editInputLink");
    const importPreview = document.getElementById("importPreview");
    const previewThumb = document.getElementById("previewThumb");
    const previewTitle = document.getElementById("previewTitle");
    const previewMeta = document.getElementById("previewMeta");

    function setImportPreview({platform, caption, link}){
      importPreview.style.display = "flex";
      previewThumb.textContent = initialsFromPlatform(platform);
      previewTitle.textContent = caption || "-";
      previewMeta.textContent = "Sumber: " + platform;
      // link disimpan di input aja, cardnya nanti
    }

    function resetImportPreview(){
      importPreview.style.display = "none";
      previewThumb.textContent = "PH";
      previewTitle.textContent = "Caption/judul akan muncul di sini";
      previewMeta.textContent = "Sumber: -";
    }

    // Dummy fetch konten (UI-only)
    btnFetchContent.addEventListener("click", () => {
      const link = (editInputLink.value || "").trim();
      if(!link){
        showToast("Tempel link dulu ya 🙂");
        return;
      }

      const platform = detectSource(link);

      // simulasi caption dari platform
      const caption = (platform === "Instagram")
        ? "Promo Photobooth Photoholic minggu ini! Diskon spesial buat event kamu 🎉📸"
        : (platform === "TikTok")
          ? "Behind the scene setup photobooth di venue! Lihat prosesnya sampai ready ✨"
          : "Konten dari link berhasil diambil (dummy).";

      // isi otomatis
      document.getElementById("editInputTitle").value = caption;
      document.getElementById("editInputContent").value = caption;

      setImportPreview({platform, caption, link});
      showToast("Konten berhasil diambil ✅");
    });

    // ===== Delegation: tombol di card =====
    document.addEventListener("click", (e) => {
      const btn = e.target.closest("[data-action]");
      if(!btn) return;

      const action = btn.dataset.action;
      const card = btn.closest(".blog-card");
      if(!card) return;

      currentCard = card;
      const data = cardData(card);

      if(action === "edit"){
        document.getElementById("editTitle").textContent = "Edit Blog";
        document.getElementById("editSub").textContent = "Ambil konten dari link IG/TikTok lalu simpan.";

        document.getElementById("editId").value = data.id;
        document.getElementById("editInputLink").value = data.link || "";
        document.getElementById("editInputTitle").value = data.title;
        document.getElementById("editInputAuthor").value = data.author;
        document.getElementById("editInputDate").value = data.date;
        document.getElementById("editInputStatus").value = data.status;
        document.getElementById("editInputContent").value = data.content;

        if(data.link){
          const platform = data.platform || detectSource(data.link);
          setImportPreview({platform, caption: data.title, link: data.link});
        } else {
          resetImportPreview();
        }

        openLayer(modalEdit);
      }

      if(action === "view" || action === "preview"){
        document.getElementById("viewTitle").textContent = data.title;
        document.getElementById("viewMeta").textContent = `Penulis: ${data.author} • ${data.date}`;
        document.getElementById("viewContent").textContent = data.content;

        const badge = document.getElementById("viewBadge");
        badge.className = "read-badge";
        setBadge(badge, data.status);

        // tampilkan platform + link kalau ada
        const wrap = document.getElementById("viewSourceWrap");
        const plat = document.getElementById("viewPlatform");
        const linkEl = document.getElementById("viewLink");

        if(data.link){
          wrap.style.display = "flex";
          plat.textContent = data.platform || detectSource(data.link);
          linkEl.href = data.link;
        } else {
          wrap.style.display = "none";
          linkEl.href = "#";
        }

        openLayer(modalView);
      }

      if(action === "more"){
        openLayer(sheetMore);
      }
    });

    // Close buttons
    document.addEventListener("click", (e) => {
      const closeBtn = e.target.closest("[data-close]");
      if(!closeBtn) return;
      const id = closeBtn.dataset.close;
      closeLayer(document.getElementById(id));
    });

    // Click overlay to close all
    overlay.addEventListener("click", () => {
      closeLayer(modalEdit);
      closeLayer(modalView);
      closeLayer(sheetMore);
    });

    // Quick edit from view modal
    document.getElementById("btnQuickEdit").addEventListener("click", () => {
      if(!currentCard) return;
      closeLayer(modalView);
      currentCard.querySelector('[data-action="edit"]').click();
    });

    // Add button -> open modal as "Tambah"
    document.getElementById("btnAdd").addEventListener("click", () => {
      currentCard = null;

      document.getElementById("editTitle").textContent = "Tambah Blog";
      document.getElementById("editSub").textContent = "Tempel link IG/TikTok lalu ambil konten.";

      document.getElementById("editId").value = "";
      document.getElementById("editInputLink").value = "";
      document.getElementById("editInputTitle").value = "";
      document.getElementById("editInputAuthor").value = "Admin";
      document.getElementById("editInputDate").value = "";
      document.getElementById("editInputStatus").value = "draft";
      document.getElementById("editInputContent").value = "";

      resetImportPreview();
      openLayer(modalEdit);
    });

    // Sheet actions
    document.getElementById("sheetEdit").addEventListener("click", () => {
      closeLayer(sheetMore);
      if(currentCard) currentCard.querySelector('[data-action="edit"]').click();
    });

    document.getElementById("sheetView").addEventListener("click", () => {
      closeLayer(sheetMore);
      if(!currentCard) return;
      const status = currentCard.dataset.status;
      const btn = currentCard.querySelector(status === "draft" ? '[data-action="preview"]' : '[data-action="view"]');
      btn.click();
    });

    document.getElementById("sheetDelete").addEventListener("click", async () => {
        if (!currentCard) return;

        const id = currentCard.dataset.id;

        if (!confirm("Yakin ingin menghapus artikel ini?")) return;

        const res = await fetch(`/admin/blog/${id}`, {
          method: "DELETE",
          headers: {
            "X-CSRF-TOKEN": document
              .querySelector('meta[name="csrf-token"]')
              .getAttribute("content"),
            "Accept": "application/json"
          }
        });

        if (!res.ok) {
          alert("Gagal menghapus artikel");
          return;
        }

        currentCard.remove(); // hapus dari UI
        closeLayer(sheetMore);
        showToast("Artikel berhasil dihapus 🗑️");
      });

    // Save edit/add
    document.getElementById("formEdit").addEventListener("submit", async (e) => {
      e.preventDefault();

      const id = document.getElementById("editId").value;
      const link = document.getElementById("editInputLink").value.trim();

      const payload = {
        title: document.getElementById("editInputTitle").value.trim(),
        excerpt: document.getElementById("editInputContent").value.trim(),
        instagram_url: link,
        status: document.getElementById("editInputStatus").value,
      };

      const url = id
        ? `/admin/blog/${id}`
        : `/admin/blog`;

      const method = id ? "PUT" : "POST";

      const res = await fetch(url, {
        method,
        headers: {
          "Content-Type": "application/json",
          "X-CSRF-TOKEN": document
            .querySelector('meta[name="csrf-token"]')
            .getAttribute("content"),
        },
        body: JSON.stringify(payload),
      });

      if (!res.ok) {
        alert("Gagal menyimpan ke database");
        return;
      }

      showToast("Tersimpan ke database ✅");
      location.reload(); // simplest & safest
    });

  </script>
</body>
</html>
