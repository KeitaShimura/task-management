const buttonOpen = document.getElementById('modal-open');
const modalBody = document.getElementById('modal-body');

buttonOpen.addEventListener('click', modalOpen);
function modalOpen() {
    if (modalBody.style.display === "none") {
        modalBody.style.display = "block";
    } else {
        modalBody.style.display = "none";
    }
}

document.addEventListener('click', modalClose);
function modalClose(e) {
    if (!e.target.closest('#modal-open')) {
        modalBody.style.display = "none";
    }
}
