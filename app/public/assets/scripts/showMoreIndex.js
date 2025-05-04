console.log("showMoreIndex.js loaded");
const showMoreButton = document.querySelector("#showMoreBtn");
const showMoreContent = document.querySelector(".hidden-container");

showMoreButton.addEventListener("click", () => {
  showMoreContent.classList.toggle("hidden");
  if (showMoreContent.classList.contains("hidden")) {
    showMoreButton.textContent = "Voir plus";
  } else {
    showMoreButton.textContent = "Voir moins";
  }
});