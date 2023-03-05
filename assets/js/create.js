const detailOpenBtn = document.getElementById('detail-open');
const detailBody = document.getElementById('detail-body');

detailOpenBtn.addEventListener('click', detailOpen);
function detailOpen() {
    if (detailBody.style.display === "none") {
        detailBody.style.display = "block";
    } else {
        detailBody.style.display = "none";
    }
}

function colors(col) {
    switch (col) {
        case 'red': document.bgColor = "#FF0000";
            break;
        case 'green': document.bgColor = "#00FF00";
            break;
        case 'blue': document.bgColor = "#0000FF";
            break;
    }
}