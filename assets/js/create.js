const detailOpen = document.getElementById('detail-open');
const detailBody = document.getElementById('detail-body');

detailOpen.addEventListener('click', modalOpen);
function modalOpen() {
    if (detailBody.style.display === "none") {
        detailBody.style.display = "block";
    } else {
        detailBody.style.display = "none";
    }
}

function colors(col) {
    switch (col) {
        case 'white': document.bgColor = "white";
            break;
        case 'red': document.bgColor = "red";
            break;
        case 'blue': document.bgColor = "blue";
            break;
    }
}