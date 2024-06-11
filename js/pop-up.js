const dialog = document.querySelector(".dialog");
const dialogImage = document.querySelector(".dialog img");
const images = document.querySelectorAll(".scene__carrousel img");
const closeButton = document.querySelector(".dialog button");

images.forEach(image=>{
    image.addEventListener("click", event=>{
        dialog.showModal()
        dialogImage.setAttribute("src", image.src)
    })
})

closeButton.addEventListener("click", event=>{
    dialog.close()
    dialogImage.setAttribute("src", "")
})