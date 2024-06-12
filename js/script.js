const menu = document.querySelector(".scene__menu");

menu.addEventListener("click", toggleMenu);

function toggleMenu() {
    const submenu = document.querySelector(".scene__menu__plane__front__submenu");
    const leftPlaneExtension = document.querySelector(".scene__menu__plane__left__extension");
    submenu.classList.toggle("toggle-menu");
    leftPlaneExtension.classList.toggle("toggle-menu");
}

// scroll carrousel
// const slides = document.querySelectorAll(".scene__slide");
// let scrollPosition = 0;

// function updateTransforms() {
//   slides.forEach((div) => {
//     const isHovered = div.matches(':hover');
//     const hoverTransform = isHovered ? ' translateY(-5em)' : '';

//     div.style.transform = `
//       rotateX(-90deg) 
//       translateZ(${scrollPosition}px)
//       ${hoverTransform}
//     `;
//   });
// }

// window.addEventListener("wheel", (event) => {
//   scrollPosition += event.deltaY * -1; // Adjust the scroll speed as needed
//   updateTransforms();
// });

// // Ensure hover state is checked continuously
// slides.forEach((div) => {
//   div.addEventListener("mouseenter", updateTransforms);
//   div.addEventListener("mouseleave", updateTransforms);
// });
