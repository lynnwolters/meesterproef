document.addEventListener('DOMContentLoaded', function() {
    const dialog = document.querySelector('.dialog-propshop');
    const dialogImage = dialog.querySelector('.dialog-propshop-img');
    const dialogTitle = dialog.querySelector('.title');
    const dialogPrijs = dialog.querySelector('.additional-info-prop');
    const closeButton = dialog.querySelector('.close-btn-propshop');

    document.querySelectorAll('.prop-btn').forEach(button => {
        button.addEventListener('click', function() {
            const title = button.getAttribute('data-title');
            const prijs = button.getAttribute('data-prijs');
            const thumbnail = button.getAttribute('data-thumbnail');

            dialogTitle.textContent = title;
            dialogPrijs.textContent = prijs;
            dialogImage.src = thumbnail;

            dialog.showModal();
        });
    });

    closeButton.addEventListener('click', function() {
        dialog.close();
    });
});
