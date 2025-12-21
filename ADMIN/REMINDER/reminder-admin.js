// ===============================
// KUY - Admin Reminder Sesi (UI Demo)
// ===============================

function nowLocal() {
  return new Date();
}

function pad2(n){ return String(n).padStart(2, "0"); }

function fmtDate(d){
  const opt = { weekday:"long", day:"2-digit", month:"short", year:"numeric" };
  return d.toLocaleDateString("id-ID", opt);
}

function fmtTime(d){
  return `${pad2(d.getHours())}:${pad2(d.getMinutes())}`;
}

function fmtDateTime(d){
  return `${fmtDate(d)} • ${fmtTime(d)}`;
}

function diffMs(a, b){ return a.getTime() - b.getTime(); }

function humanizeDelta(ms){
  const abs = Math.max(ms, 0);
  const totalMin = Math.floor(abs / 60000);
  const h = Math.floor(totalMin / 60);
  const m = totalMin % 60;
  if (h <= 0) return `${m}m`;
  return `${h}j ${m}m`;
}

function withinWindowMs(ms, windowKey){
  if (windowKey === "all") return true;
  if (windowKey === "2h") return ms <= 2 * 60 * 60 * 1000;
  if (windowKey === "6h") return ms <= 6 * 60 * 60 * 1000;
  if (windowKey === "24h") return ms <= 24 * 60 * 60 * 1000;
  return true;
}

function dayBucket(dateObj, bucket){
  const n = nowLocal();
  const startToday = new Date(n.getFullYear(), n.getMonth(), n.getDate(), 0,0,0,0);
  const startTomorrow = new Date(n.getFullYear(), n.getMonth(), n.getDate() + 1, 0,0,0,0);
  const startAfterTomorrow = new Date(n.getFullYear(), n.getMonth(), n.getDate() + 2, 0,0,0,0);
  const start7d = new Date(n.getFullYear(), n.getMonth(), n.getDate() + 7, 0,0,0,0);

  const t = dateObj.getTime();
  if (bucket === "today") return t >= startToday.getTime() && t < startTomorrow.getTime();
  if (bucket === "tomorrow") return t >= startTomorrow.getTime() && t < startAfterTomorrow.getTime();
  if (bucket === "7d") return t >= startToday.getTime() && t < start7d.getTime();
  return true;
}

// ===== Demo Data =====
let bookings = [
  {
    id: "BKG-2025-1021",
    name: "Nadia Aulia",
    package: "Paket Studio Basic",
    channelPref: "wa",
    contact: "0851-2400-0950",
    startAt: new Date(new Date().getTime() + 70 * 60000),
    sentAt: null
  },
  {
    id: "BKG-2025-1022",
    name: "Raka Pratama",
    package: "Paket Outdoor",
    channelPref: "email",
    contact: "raka@email.com",
    startAt: new Date(new Date().getTime() + (4 * 60 + 10) * 60000),
    sentAt: null
  },
  {
    id: "BKG-2025-1023",
    name: "Salsa Fitria",
    package: "Paket Graduation",
    channelPref: "wa",
    contact: "0812-xxxx-xxxx",
    startAt: new Date(new Date().getTime() + 26 * 60 * 60000),
    sentAt: null
  },
  {
    id: "BKG-2025-1024",
    name: "Dimas Arya",
    package: "Paket Couple",
    channelPref: "wa",
    contact: "0821-xxxx-xxxx",
    startAt: new Date(new Date().getTime() + 90 * 60000),
    sentAt: new Date(new Date().getTime() - 3 * 60 * 60000)
  }
];

// ===== State =====
const state = {
  day: "today",
  window: "2h",
  status: "unsent",
  q: "",
  selectedId: null,
  channel: "wa",
};

// DOM
const listEl = document.getElementById("listBookings");
const emptyEl = document.getElementById("emptyState");
const summaryCountEl = document.getElementById("summaryCount");

const overlay = document.getElementById("overlay");
const sheet = document.getElementById("sheet");

const pvName = document.getElementById("pvName");
const pvTime = document.getElementById("pvTime");
const pvPackage = document.getElementById("pvPackage");
const pvContact = document.getElementById("pvContact");
const pvMessage = document.getElementById("pvMessage");

const toast = document.getElementById("toast");
const toastText = document.getElementById("toastText");

const searchInput = document.getElementById("searchInput");
const btnClearSearch = document.getElementById("btnClearSearch");
const btnResetFilters = document.getElementById("btnResetFilters");
const btnSendAll = document.getElementById("btnSendAll");
const btnRefresh = document.getElementById("btnRefresh");

const btnCloseSheet = document.getElementById("btnCloseSheet");
const btnSendNow = document.getElementById("btnSendNow");
const btnCopy = document.getElementById("btnCopy");
const channelSegment = document.getElementById("channelSegment");

// Templates
function buildMessage(b){
  const dateStr = fmtDate(b.startAt);
  const timeStr = fmtTime(b.startAt);
  return `Hai ${b.name}, ini pengingat sesi kamu di Photoholic pada ${dateStr}, pukul ${timeStr}.\n\nMohon datang 10 menit lebih awal ya 😊\n\nTerima kasih!`;
}

// Render
function getFiltered(){
  const n = nowLocal();
  return bookings
    .filter(b => {
      if (state.day !== "any" && !dayBucket(b.startAt, state.day)) return false;

      const msToStart = diffMs(b.startAt, n);
      if (msToStart < 0) return false;
      if (!withinWindowMs(msToStart, state.window)) return false;

      if (state.status === "unsent" && b.sentAt) return false;
      if (state.status === "sent" && !b.sentAt) return false;

      const q = state.q.trim().toLowerCase();
      if (q.length > 0){
        const hay = `${b.name} ${b.package} ${b.id} ${fmtTime(b.startAt)} ${fmtDate(b.startAt)}`.toLowerCase();
        if (!hay.includes(q)) return false;
      }

      return true;
    })
    .sort((a,b) => a.startAt.getTime() - b.startAt.getTime());
}

function cardHTML(b){
  const n = nowLocal();
  const msToStart = diffMs(b.startAt, n);
  const countdown = humanizeDelta(msToStart);

  const badge = b.sentAt
    ? `<span class="badge badge-sent">TERKIRIM</span>`
    : `<span class="badge badge-unsent">BELUM</span>`;

  const sentNote = b.sentAt
    ? `<span class="pill">Terakhir: ${fmtTime(b.sentAt)}</span>`
    : `<span class="pill">Belum pernah</span>`;

  const primaryLabel = b.sentAt ? "Kirim ulang" : "Kirim pengingat";
  const primaryClass = b.sentAt ? "btn-secondary" : "btn-primary";

  return `
    <div class="card" data-id="${b.id}">
      <div class="card-top">
        <div>
          <div class="name">${b.name}</div>
          <div class="info">
            <span class="pill">${b.id}</span>
            <span class="pill">${fmtDate(b.startAt)}</span>
            <span class="pill">${fmtTime(b.startAt)}</span>
            <span class="pill">${b.package}</span>
            ${sentNote}
          </div>
        </div>

        <div class="badges">
          ${badge}
          <button class="more-btn" type="button" aria-label="Menu" data-action="more">⋯</button>
        </div>
      </div>

      <div class="countdown">
        <img class="clock-mini" src="assets/clock-mini.png" alt="">
        <span>Mulai dalam <b>${countdown}</b></span>
      </div>

      <div class="actions">
        <button class="${primaryClass}" type="button" data-action="open">${primaryLabel}</button>
        <button class="btn-secondary" type="button" data-action="preview">Preview</button>
      </div>
    </div>
  `;
}

function render(){
  const items = getFiltered();
  summaryCountEl.textContent = items.length;

  if (items.length === 0){
    listEl.innerHTML = "";
    emptyEl.hidden = false;
    btnSendAll.classList.add("btn-disabled");
  } else {
    emptyEl.hidden = true;
    listEl.innerHTML = items.map(cardHTML).join("");
    btnSendAll.classList.remove("btn-disabled");
  }
}

// Chips
function setActiveChip(group, value){
  const all = document.querySelectorAll(`.chip[data-group="${group}"]`);
  all.forEach(btn => btn.classList.toggle("active", btn.dataset.value === value));
}

document.querySelectorAll(".chip").forEach(btn => {
  btn.addEventListener("click", () => {
    const group = btn.dataset.group;
    const value = btn.dataset.value;
    state[group] = value;

    // khusus status "any"
    if (group === "status" && value === "any") state.status = "any";

    setActiveChip(group, value);
    render();
  });
});

// Search
searchInput.addEventListener("input", () => {
  state.q = searchInput.value;
  render();
});

btnClearSearch.addEventListener("click", () => {
  searchInput.value = "";
  state.q = "";
  render();
});

btnResetFilters?.addEventListener("click", () => {
  state.day = "today";
  state.window = "2h";
  state.status = "unsent";
  state.q = "";
  searchInput.value = "";

  setActiveChip("day", state.day);
  setActiveChip("window", state.window);
  setActiveChip("status", state.status);
  render();
});

// Bottom sheet
function openSheetFor(id){
  const b = bookings.find(x => x.id === id);
  if (!b) return;

  state.selectedId = id;
  state.channel = b.channelPref || "wa";

  pvName.textContent = b.name;
  pvTime.textContent = fmtDateTime(b.startAt);
  pvPackage.textContent = b.package;
  pvContact.textContent = b.contact;

  [...channelSegment.querySelectorAll(".seg")].forEach(seg => {
    seg.classList.toggle("active", seg.dataset.channel === state.channel);
  });

  pvMessage.value = buildMessage(b);

  overlay.hidden = false;
  sheet.classList.add("open");
  sheet.setAttribute("aria-hidden", "false");
}

function closeSheet(){
  overlay.hidden = true;
  sheet.classList.remove("open");
  sheet.setAttribute("aria-hidden", "true");
  state.selectedId = null;
}

overlay.addEventListener("click", closeSheet);
btnCloseSheet.addEventListener("click", closeSheet);

// Channel
channelSegment.addEventListener("click", (e) => {
  const btn = e.target.closest(".seg");
  if (!btn) return;

  state.channel = btn.dataset.channel;
  [...channelSegment.querySelectorAll(".seg")].forEach(seg => {
    seg.classList.toggle("active", seg.dataset.channel === state.channel);
  });
});

// Toast
let toastTimer = null;
function showToast(msg){
  toastText.textContent = msg;
  toast.hidden = false;
  clearTimeout(toastTimer);
  toastTimer = setTimeout(() => { toast.hidden = true; }, 1800);
}

// List actions
listEl.addEventListener("click", (e) => {
  const card = e.target.closest(".card");
  if (!card) return;

  const id = card.dataset.id;
  const actionBtn = e.target.closest("[data-action]");
  const action = actionBtn ? actionBtn.dataset.action : null;

  if (action === "open" || action === "preview"){
    openSheetFor(id);
  }

  if (action === "more"){
    const b = bookings.find(x => x.id === id);
    if (!b) return;

    b.sentAt = b.sentAt ? null : new Date();
    showToast(b.sentAt ? "Status diubah: terkirim" : "Status diubah: belum dikirim");
    render();
  }
});

// Copy
btnCopy.addEventListener("click", async () => {
  try {
    await navigator.clipboard.writeText(pvMessage.value || "");
    showToast("Teks disalin");
  } catch {
    showToast("Gagal menyalin");
  }
});

// Send now
btnSendNow.addEventListener("click", () => {
  if (!state.selectedId) return;
  const b = bookings.find(x => x.id === state.selectedId);
  if (!b) return;

  b.sentAt = new Date();
  b.channelPref = state.channel;

  closeSheet();
  showToast(`Pengingat terkirim via ${state.channel === "wa" ? "WhatsApp" : "Email"}`);
  render();
});

// Send all
btnSendAll.addEventListener("click", () => {
  if (btnSendAll.classList.contains("btn-disabled")) return;

  const items = getFiltered();
  if (items.length === 0) return;

  items.forEach(it => {
    const b = bookings.find(x => x.id === it.id);
    if (b) b.sentAt = new Date();
  });

  showToast(`Berhasil kirim ${items.length} pengingat`);
  render();
});

// Refresh
btnRefresh.addEventListener("click", () => {
  showToast("Diperbarui");
  render();
});

// Init
render();
setInterval(render, 30000);
