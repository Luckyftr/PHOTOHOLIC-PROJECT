<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Kelola Pengguna</title>

  <link href="https://fonts.googleapis.com/css2?family=Commissioner:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/admin/admin-kelola-pengguna.css') }}">
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
  <div class="phone">

    <!-- STATUS BAR -->
    <div class="status-bar">
      <img src="{{ asset('asset/pelanggan/beranda/jam.png') }}" class="status-clock" alt="Jam">
      <img src="{{ asset('asset/pelanggan/beranda/icons.png') }}" class="status-icons" alt="Icons">
    </div>

    <!-- HEADER (tanpa logo, judul center besar) -->
    <header class="topbar topbar-center">
      <h1 class="page-title page-title-big">Kelola Pengguna</h1>
    </header>

    <!-- CONTENT -->
    <div class="users-wrapper">

      <!-- INTRO SIMPLE (tanpa icon & tanpa judul) -->
      <section class="users-intro-card users-intro-simple">
        <p class="users-intro-desc">Tambah, lihat, dan kelola akun pengguna Photoholic.</p>
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
                <article class="user-card"
                        data-id="{{ $user->id }}"
                        data-name="{{ $user->name }}"
                        data-role="{{ $user->role }}"
                        data-email="{{ $user->email }}"
                        data-phone="{{ $user->phone ?? '' }}">

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
                     <button class="btn-chip" data-action="detail">Detail</button>
                     <button class="btn-more" data-action="more" type="button">⋮</button>
                 </div>
                 </article>
             @endforeach
       </section>
 

    </div>

    <!-- OVERLAY -->
    <div class="overlay" id="overlay"></div>

    <!-- MODAL: DETAIL USER -->
    <div class="modal" id="modalUser" aria-hidden="true">
      <div class="modal-sheet">
        <div class="modal-header">
          <div>
            <h3 class="modal-title" id="userModalTitle">Detail Pengguna</h3>
            <p class="modal-sub" id="userModalSub">Lihat atau ubah data pengguna.</p>
          </div>
          <button class="icon-close" data-close="modalUser" aria-label="Tutup">✕</button>
        </div>

        <form class="modal-body" id="formUser">
          <input type="hidden" id="userId">

          <div class="field">
            <label>Nama</label>
            <input type="text" id="userName" required>
          </div>

          <div class="field-row">
            <div class="field">
              <label>Role</label>
              <select id="userRole">
                <option value="admin">admin</option>
                <option value="user">user</option>
              </select>
            </div>
            <div class="field">
              <label>No. HP</label>
              <input type="text" id="userPhone" required>
            </div>
          </div>

          <div class="field">
            <label>Email</label>
            <input type="text" id="userEmail" required>
          </div>

          <div class="modal-actions">
            <button type="button" class="btn-secondary" data-close="modalUser">Tutup</button>
            <button type="submit" class="btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>

    <!-- BOTTOMSHEET: MORE -->
    <div class="sheet" id="sheetMore" aria-hidden="true">
      <div class="sheet-box">
        <div class="sheet-handle"></div>
        <button class="sheet-item" id="sheetDetail">Detail</button>
        <button class="sheet-item danger" id="sheetDelete">Hapus</button>
        <button class="sheet-cancel" data-close="sheetMore">Batal</button>
      </div>
    </div>

    <!-- TOAST -->
    <div class="toast" id="toast">Tersimpan ✅</div>

  </div>

  <script>
    const overlay = document.getElementById("overlay");
    const modalUser = document.getElementById("modalUser");
    const sheetMore = document.getElementById("sheetMore");
    const toast = document.getElementById("toast");

    const usersList = document.getElementById("usersList");

    let currentCard = null;

    function openLayer(el){
      overlay.classList.add("show");
      el.classList.add("show");
      el.setAttribute("aria-hidden", "false");
    }

    function closeLayer(el){
      el.classList.remove("show");
      el.setAttribute("aria-hidden", "true");
      if(!modalUser.classList.contains("show") &&
         !sheetMore.classList.contains("show")){
        overlay.classList.remove("show");
      }
    }

    function showToast(text){
      toast.textContent = text;
      toast.classList.add("show");
      setTimeout(() => toast.classList.remove("show"), 1600);
    }

    function cardData(card){
      return {
        id: card.dataset.id,
        name: card.dataset.name,
        role: card.dataset.role,
        email: card.dataset.email,
        phone: card.dataset.phone
      };
    }

    function avatarFromName(name){
      const t = (name || "").trim();
      return t ? t[0].toUpperCase() : "U";
    }

    function applyRoleBadge(roleEl, role){
      if(role === "admin"){
        roleEl.textContent = "admin";
        roleEl.className = "user-role user-role-admin";
      } else {
        roleEl.textContent = "user";
        roleEl.className = "user-role user-role-cust";
      }
    }

    // Delegation: tombol detail / more
    document.addEventListener("click", (e) => {
      const btn = e.target.closest("[data-action]");
      if(!btn) return;

      const action = btn.dataset.action;
      const card = btn.closest(".user-card");
      if(!card) return;

      currentCard = card;

      if(action === "detail"){
        const data = cardData(card);
        document.getElementById("userId").value = data.id;
        document.getElementById("userName").value = data.name;
        document.getElementById("userRole").value = data.role;
        document.getElementById("userEmail").value = data.email;
        document.getElementById("userPhone").value = data.phone;
        openLayer(modalUser);
      }

      if(action === "more"){
        openLayer(sheetMore);
      }
    });

    // close buttons
    document.addEventListener("click", (e) => {
      const closeBtn = e.target.closest("[data-close]");
      if(!closeBtn) return;
      closeLayer(document.getElementById(closeBtn.dataset.close));
    });

    overlay.addEventListener("click", () => {
      closeLayer(modalUser);
      closeLayer(sheetMore);
    });

    // sheet actions
    document.getElementById("sheetDetail").addEventListener("click", () => {
      closeLayer(sheetMore);
      if(currentCard){
        currentCard.querySelector('[data-action="detail"]').click();
      }
    });

    document.getElementById("sheetDelete").addEventListener("click", async () => {
        if (!currentCard) return;

        const userId = currentCard.dataset.id;

        if (!confirm("Yakin ingin menghapus pengguna ini?")) return;

        const res = await fetch(`/admin/users/${userId}`, {
            method: "DELETE",
            headers: {
                "X-CSRF-TOKEN": document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content"),
                "Accept": "application/json"
            }
        });

        if (!res.ok) {
            alert("Gagal menghapus pengguna");
            return;
        }

        currentCard.remove();
        closeLayer(sheetMore);
        showToast("Pengguna dihapus ✅");
    });

            // Save user
    document.getElementById("formUser").addEventListener("submit", async (e) => {
        e.preventDefault();
        if (!currentCard) return;

        const data = {
            id: document.getElementById("userId").value,
            name: document.getElementById("userName").value.trim(),
            role: document.getElementById("userRole").value,
            email: document.getElementById("userEmail").value.trim(),
            phone: document.getElementById("userPhone").value.trim(),
        };

        const res = await fetch("{{ route('admin.users.update') }}", {
            method: "POST",
            headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
            },
            body: JSON.stringify(data),
        });

        if (!res.ok) {
            alert("Gagal menyimpan perubahan");
            return;
        }

        // UPDATE UI AFTER SUCCESS
        currentCard.dataset.name = data.name;
        currentCard.dataset.role = data.role;
        currentCard.dataset.email = data.email;
        currentCard.dataset.phone = data.phone;

        currentCard.querySelector(".user-name").textContent = data.name;
        currentCard.querySelector(".user-email").textContent = data.email;
        currentCard.querySelector(".user-phone").textContent = data.phone;
        currentCard.querySelector(".user-avatar").textContent =
            avatarFromName(data.name);

        applyRoleBadge(
            currentCard.querySelector(".user-role"),
            data.role
        );

        closeLayer(modalUser);
        showToast("Perubahan tersimpan ✅");
    });

  </script>
</body>
</html>
