let showOrHide = document.querySelector("#showOrHide");
let accordion = document.querySelector(".accordionCheckout");
let accordionButton = accordion.firstElementChild.firstElementChild.firstElementChild

accordionButton.onclick = function(){if (accordionButton.classList.contains("collapsed")) {
    showOrHide.innerHTML = "Show"
} else {showOrHide.innerHTML = "Hide"}}
