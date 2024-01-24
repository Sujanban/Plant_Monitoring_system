let hamburgerButton = document.querySelector(".hamburger");
let ul = document.querySelector(".navlink");

hamburgerButton.addEventListener("click", function () {
  if (ul.classList.contains("hidden")) {
    ul.classList.remove("hidden");
  } else {
    ul.classList.add("hidden");
  }
});
