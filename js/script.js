// ************ //
// TOGGLE MENU //
// ********** //

const deNav = document.querySelector("nav");
const navButton = document.querySelector("nav button");
const firstNavLink = deNav.querySelector("a"); // Selecteer de eerste link binnen de nav
const navLinks = document.querySelectorAll("nav a");

function toggleNav() {
    deNav.classList.toggle("open");
}

function openNav() {
    deNav.classList.add("open");
}

navButton.onclick = toggleNav;
firstNavLink.onfocus = openNav; // Voeg de openNav functie toe als event listener voor de focus op de eerste link

navLinks.forEach(link => {
	link.addEventListener("click", () => {
		deNav.classList.remove("open"); 
	});
});

function updateTransforms(propRoomBox, scrollPosition) {
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

  const propRoomBox = document.querySelectorAll(".prop-room__box");
  
  function runIfShopHash() {
    if (window.location.hash === '#shop') {
      let scrollPosition = 0;
  
      // Functie om scroll positie te updaten en transforms toe te passen
      function onScroll(event) {
        scrollPosition += event.deltaY * -1;
        updateTransforms(propRoomBox, scrollPosition);
      }
  
      // Functie om transforms te updaten bij hover
      function onHover() {
        updateTransforms(propRoomBox, scrollPosition);
      }
  
      // Event listeners toevoegen
      window.addEventListener("wheel", onScroll);
      propRoomBox.forEach((box) => {
        box.addEventListener("mouseenter", onHover);
        box.addEventListener("mouseleave", onHover);
      });
  
      // Verwijder event listeners als de hash verandert
      window.addEventListener("hashchange", () => {
        if (window.location.hash !== '#shop') {
          window.removeEventListener("wheel", onScroll);
          propRoomBox.forEach((box) => {
            box.removeEventListener("mouseenter", onHover);
            box.removeEventListener("mouseleave", onHover);
          });
        }
      }, { once: true });
    }
  }
  
  // Controleer de hash bij het laden van de pagina
  document.addEventListener("DOMContentLoaded", runIfShopHash);
  
  // Luister naar wijzigingen in de hash
  window.addEventListener("hashchange", runIfShopHash);

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

const knopLinks = document.querySelector(".links-omdat-het-van-eva-is");
const knopRechts = document.querySelector(".rechts-omdat-het-van-eva-is");

const deList = document.querySelector(".list");

function toTheLinks() {
  const deListWidth = document.documentElement.clientWidth;
  deList.scrollTop = deList.scrollTop - (deListWidth / 5);
}

function toTheRechts() {
  const deListWidth = document.documentElement.clientWidth;
  deList.scrollTop = deList.scrollTop + (deListWidth / 5);
}

knopLinks.onclick = toTheLinks;
knopRechts.onclick = toTheRechts;

// redirect

if (window.location.pathname === "/") {
  window.location.replace("/#home");
}