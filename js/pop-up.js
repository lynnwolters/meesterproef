const closeButton = document.querySelector(".dialog button");
const dialog = document.querySelector(".dialog");

// const dialogImage = document.querySelector(".dialog img");
const dialogTitle = document.querySelector(".dialog .title");
const dialogUrl = document.querySelector(".dialog .url");
const dialogUrlTitle = document.querySelector(".dialog .url .title");
const additionalInfoContainer = document.querySelector(".dialog .additional-info");
const additionalImagesContainer = document.querySelector(".dialog .additional-images");

const slides2 = document.querySelectorAll(".scene__slide");

slides2.forEach(slide => {
    const image = slide.querySelector(".scene__slide__plane__front img");
    const dataPopUp = slide.querySelector(".data_pop-up");

    image.addEventListener("click", event => {
        dialog.showModal();
        // dialogImage.setAttribute("src", image.src);
        dialogTitle.textContent = dataPopUp.getAttribute("data-title");
        dialogUrl.setAttribute("href", dataPopUp.getAttribute("data-url"));
        dialogUrlTitle.textContent = dataPopUp.getAttribute("data-title");

        // Clear existing content in additional info and images containers
        additionalInfoContainer.innerHTML = '';
        additionalImagesContainer.innerHTML = '';

        // Create and append new content for info
        const year = document.createElement('p');
        year.textContent = `Year: ${dataPopUp.getAttribute("data-year")}`;
        additionalInfoContainer.appendChild(year);

        const photographer = document.createElement('p');
        photographer.textContent = `Photographer: ${dataPopUp.getAttribute("data-photographer")}`;
        additionalInfoContainer.appendChild(photographer);

        const ontwerper = document.createElement('p');
        ontwerper.textContent = `Ontwerper: ${dataPopUp.getAttribute("data-ontwerper")}`;
        additionalInfoContainer.appendChild(ontwerper);

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
    // dialogImage.setAttribute("src", "");
    dialogUrl.setAttribute("href", "");
    dialogTitle.textContent = "";
    dialogUrlTitle.textContent = "";
    additionalInfoContainer.innerHTML = '';
    additionalImagesContainer.innerHTML = '';
});