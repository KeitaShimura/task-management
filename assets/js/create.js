const detailOpenBtn = document.getElementById('modal-open');
const detailBody = document.getElementById('modal-body');

detailOpenBtn.addEventListener('click', detailOpen);
function detailOpen() {
    if (detailBody.style.display === "none") {
        detailBody.style.display = "block";
    } else {
        detailBody.style.display = "none";
    }
}

let radioButtons = document.querySelectorAll("input[name='color']");
let result = document.getElementById("result");

let findSelected = () => {
    let selected = document.querySelector("input[name='color']:checked").value;
    result.textContent =  `${selected}`;
    console.log(selected);
}

radioButtons.forEach(radioButton => {
    radioButton.addEventListener("change", findSelected);

});
findSelected();
