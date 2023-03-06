const taskOpen = document.getElementById('task-open');
const taskClose = document.getElementById('task-close');
const taskBody = document.getElementById('task-body');

taskOpen.addEventListener('click', modalOpen);
function modalOpen() {
    taskBody.style.display = "block";
}

taskClose.addEventListener('click', modalClose);
function modalClose() {
    taskBody.style.display = "none";
    title.value = '';
    description.value = '';
}

function store() {
    event.preventDefault();
    const project_id = document.task_form.project_id.value;
    const title = document.task_form.title.value;
    const description = document.task_form.description.value;

    const data = new FormData();
    data.append('project_id', project_id);
    data.append('title', title);
    data.append('description', description);

    const xml = new XMLHttpRequest();
    xml.open('POST', '../project/tasks/store.php', true);
    xml.send(data);

    xml.onreadystatechange = function () {
        if (xml.readyState == 4 && xml.status == 200) {
            console.log(xml.responseText);
            modalClose()
        }
    }
}

function show() {

}