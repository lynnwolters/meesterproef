const closeButton = document.querySelector(".dialog button");
const dialog = document.querySelector(".dialog");

const dialogTitle = document.querySelector(".dialog .title");
const dialogUrl = document.querySelector(".dialog .url");
const dialogUrlTitle = document.querySelector(".dialog .url .title");
const additionalInfoContainer = document.querySelector(".dialog .additional-info");
const additionalImagesContainer = document.querySelector(".dialog .additional-images");

const slides2 = document.querySelectorAll(".item");

slides2.forEach(slide => {
    const image = slide.querySelector(".item img");
    const dataPopUp = slide.querySelector(".data_pop-up");

    image.addEventListener("click", event => {
        dialog.showModal();
        dialogTitle.textContent = dataPopUp.getAttribute("data-title");
        dialogUrl.setAttribute("href", dataPopUp.getAttribute("data-url"));
        dialogUrlTitle.textContent = dataPopUp.getAttribute("data-title");

        // Clear existing content in additional info and images containers
        additionalInfoContainer.innerHTML = '';
        additionalImagesContainer.innerHTML = '';

        // Create and append new content for info if available
        const year = dataPopUp.getAttribute("data-year");
        if (year) {
            const yearElement = document.createElement('p');
            yearElement.textContent = `Jaar: ${year}`;
            additionalInfoContainer.appendChild(yearElement);
        }

        const photographer = dataPopUp.getAttribute("data-photographer");
        if (photographer) {
            const photographerElement = document.createElement('p');
            photographerElement.textContent = `Fotograaf: ${photographer}`;
            additionalInfoContainer.appendChild(photographerElement);
        }

        const ontwerper = dataPopUp.getAttribute("data-ontwerper");
        if (ontwerper) {
            const ontwerperElement = document.createElement('p');
            ontwerperElement.textContent = `Ontwerper: ${ontwerper}`;
            additionalInfoContainer.appendChild(ontwerperElement);
        }

        // Create and append new content for images
        const imageUrls = JSON.parse(dataPopUp.getAttribute("data-images"));
        imageUrls.forEach(url => {
            if (url) {
                const img = document.createElement('img');
                img.src = url;
                additionalImagesContainer.appendChild(img);
            }
        });
    });
});

closeButton.addEventListener("click", event => {
    dialog.close();
    dialogUrl.setAttribute("href", "");
    dialogTitle.textContent = "";
    dialogUrlTitle.textContent = "";
    additionalInfoContainer.innerHTML = '';
    additionalImagesContainer.innerHTML = '';
});
