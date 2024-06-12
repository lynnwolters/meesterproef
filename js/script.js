const menu = document.querySelector(".scene__menu");

menu.addEventListener("click", toggleMenu);

function toggleMenu() {
    const submenu = document.querySelector(".scene__menu__plane__front__submenu");
    const leftPlaneExtension = document.querySelector(".scene__menu__plane__left__extension");
    submenu.classList.toggle("toggle-menu");
    leftPlaneExtension.classList.toggle("toggle-menu");
}

document.addEventListener('DOMContentLoaded', function() {
    // Get the current URL hash (e.g., #home, #over-ons)
    var hash = window.location.hash;

    if (hash) {
        // Remove the # character from the hash
        var className = hash.substring(1);

        // Check if the class exists before adding it to the body
        if (document.body.classList.contains(className)) {
            document.body.classList.add(className);
        }
    }
});