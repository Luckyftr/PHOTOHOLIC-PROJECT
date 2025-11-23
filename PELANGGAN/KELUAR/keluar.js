//super simple (kalau mau pakai)
document.querySelector(".btn-secondary").onclick = () => {
  window.history.back(); // balik ke halaman sebelumnya
};

document.querySelector(".btn-primary").onclick = () => {
  // redirect ke halaman login / landing
  window.location.href = "login.html"; // ganti sesuai file kamu
};
