const starsContainer = document.querySelector(".stars");
const stars = document.querySelectorAll(".star");

stars.forEach(star => {
  star.addEventListener("click", () => {
    const value = parseInt(star.getAttribute("data-value"), 10);

    // simpan nilai ke attribute container (kalau nanti mau dikirim ke backend)
    starsContainer.setAttribute("data-selected", value);

    // update tampilan bintang
    stars.forEach(s => {
      const sValue = parseInt(s.getAttribute("data-value"), 10);
      if (sValue <= value) {
        s.classList.add("active");
      } else {
        s.classList.remove("active");
      }
    });
  });
});
