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

    const formData = new FormData();
    formData.append('project_id', project_id);
    formData.append('title', title);
    formData.append('description', description);

    const req = new XMLHttpRequest();
    req.open('POST', '../project/tasks/store.php', true);
    req.send(formData);

    req.onreadystatechange = function () {
        if (req.readyState == 4 && req.status == 200) {
            console.log(req.responseText);
        } else {console.log('通信中です')}
    }
}