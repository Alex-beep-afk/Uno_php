console.log("showMoreIndex.js loaded");
const showMoreButton = document.querySelector("#showMoreBtn");
const showMoreContent = document.querySelector(".hidden-container");

showMoreButton.addEventListener("click", () => {

  showMoreContent.classList.toggle("hidden");

  const hiddenPlayers = document.querySelectorAll(".hidden-player");

  hiddenPlayers.forEach((player) => {
    if (player.classList.contains("scale-0")) {
      player.classList.remove("scale-0")
    } else {
      player.classList.remove("scale-100")
      player.classList.add("scale-0")
    }
  })
});