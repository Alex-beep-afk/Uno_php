console.log("showMoreIndex.js loaded");
const showMoreButton = document.querySelector("#showMoreBtn");
const showMoreContent = document.querySelector(".hidden-container");


showMoreButton.addEventListener("click", () => {

  if (showMoreContent.classList.contains("scale-0")) {
    showMoreContent.classList.remove("scale-0");
    showMoreContent.classList.remove("hidden");
    showMoreContent.classList.add("scale-100");
    showMoreButton.innerHTML = "Show less";

  } else {

    showMoreContent.classList.remove("scale-100");

    showMoreContent.classList.add("scale-0");
    showMoreContent.classList.add("hidden");

    showMoreButton.innerHTML = "Show more";
  }

  const hiddenPlayers = document.querySelectorAll(".hidden-player");

  hiddenPlayers.forEach((player, index) => {


    if (player.classList.contains("scale-0")) {
      player.classList.add('animate-[slide-in_0.5s_ease-in-out_forwards]');
      player.style.animationDelay = `${index * 300}ms`;


    } else {

      player.classList.remove(delay);
      player.classList.remove("scale-100");
      player.classList.add("scale-0");
    }
  })
});