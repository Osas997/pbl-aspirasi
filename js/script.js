window.addEventListener("scroll", () => {
   const nav = document.querySelector("nav");
   const navOff = nav.offsetTop;
   window.scrollY > navOff
      ? nav.classList.add("blur")
      : nav.classList.remove("blur");
});
