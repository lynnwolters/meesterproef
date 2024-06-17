// ************ //
// TOGGLE MENU //
// ********** //

const menu = document.querySelector(".scene__menu");

menu.addEventListener("click", toggleMenu);

function toggleMenu() {
    const submenu = document.querySelector(".scene__menu__plane__front__submenu");
    const leftPlaneExtension = document.querySelector(".scene__menu__plane__left__extension");
    submenu.classList.toggle("toggle-menu");
    leftPlaneExtension.classList.toggle("toggle-menu");
<<<<<<< HEAD
};

// ***************** //
// PROP ROOM SCROLL //
// *************** //

const propRoomBox = document.querySelectorAll(".prop-room__box");
let scrollPosition = 0;

function updateTransforms() {
  propRoomBox.forEach((box) => {
    const isHovered = box.matches(':hover');
    const hoverTransform = isHovered ? ' translateY(0em)' : '';

    box.style.transform = `
      rotateX(-90deg) 
      translateZ(${scrollPosition}px)
      ${hoverTransform}
    `;
  });
}

window.addEventListener("wheel", (event) => {
  scrollPosition += event.deltaY * -1; 
  updateTransforms();
});

propRoomBox.forEach((box) => {
  box.addEventListener("mouseenter", updateTransforms);
  box.addEventListener("mouseleave", updateTransforms);
});

// ********* //
// OPEN BOX //
// ******* //

function openBox() {
  propRoomBox.forEach((box) => {
    box.addEventListener("mouseenter", () => {
      const lids = box.querySelectorAll(".prop-room__box__plane__top__lid");
      lids.forEach((lid) => {
        lid.classList.add("open-box");
      });
    });

    box.addEventListener("mouseleave", () => {
      const lids = box.querySelectorAll(".prop-room__box__plane__top__lid");
      lids.forEach((lid) => {
        lid.classList.remove("open-box");
      });
    });
  });
}

openBox()

// ******* //
// CURSOR //
// ***** //

const customCursor = document.querySelector('.custom-cursor');

const moveCursor = (e) => {
  const mouseY = e.clientY;
  const mouseX = e.clientX;

  customCursor.style.transform = `translate3d(${mouseX}px, ${mouseY}px, 0)`;
}

window.addEventListener('mousemove', moveCursor);

propRoomBox.forEach((box) => {
  box.addEventListener('mouseenter', () => {
    customCursor.innerHTML = "item";
  });

  box.addEventListener('mouseleave', () => {
    customCursor.innerHTML = ""; 
  });
});
=======
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
>>>>>>> cf688034aa13ee4c4c4d205da9d0137e06893b87
