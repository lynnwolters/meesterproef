const menu = document.querySelector(".scene__menu");

menu.addEventListener("click", toggleMenu);

function toggleMenu() {
    const submenu = document.querySelector(".scene__menu__plane__front__submenu");
    const leftPlaneExtension = document.querySelector(".scene__menu__plane__left__extension");
    submenu.classList.toggle("toggle-menu");
    leftPlaneExtension.classList.toggle("toggle-menu");
}


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

const knopLinks = document.querySelector(".links-omdat-het-van-eva-is");
const knopRechts = document.querySelector(".rechts-omdat-het-van-eva-is");

const deList = document.querySelector(".list");

function toTheLinks() {
  const deListWidth = document.documentElement.clientWidth;
  deList.scrollTop = deList.scrollTop - (deListWidth / 8);
}

function toTheRechts() {
  const deListWidth = document.documentElement.clientWidth;
  deList.scrollTop = deList.scrollTop + (deListWidth / 8);
}

knopLinks.onclick = toTheLinks;
knopRechts.onclick = toTheRechts;

document.addEventListener('DOMContentLoaded', function() {
    setTimeout(function() {
        const scroller = document.querySelector('.scheve-scroller');
        if (scroller) {
            scroller.classList.add('shown');
        }
    }, 3000);
});