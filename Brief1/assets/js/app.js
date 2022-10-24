
const title = document.querySelector("#title");
const radio1 = document.querySelector("#radio1");
const radio2 = document.querySelector("#radio2");
const selection1 = document.querySelector("#selection1");
const selection2 = document.querySelector("#selection2");
const date = document.querySelector("#date");
const description = document.querySelector("#description");
const toDo = document.querySelector("#to-do");
const inProgress = document.querySelector("#in-progress");
const done = document.querySelector("#done");
const modalFooter=document.querySelector(".modal-footer")
let toDoCount = document.querySelector("#toDoCount");
let inProgressCount = document.querySelector("#inProgressCount");
let doneCount = document.querySelector("#doneCount");
const form = document.querySelector("#form");
const save = document.querySelector("#save");

function initTaskForm() {
    toDo.innerHTML = "";
    inProgress.innerHTML = "";
    done.innerHTML = "";
    let tod = 0;
    let inp = 0;
    let doe = 0;
    let c=0;
    for (let card of tasks) {
        let shortDesc = card.description;
        if (shortDesc.length > 70) {
        shortDesc = `${shortDesc.substring(0, 70)}...`;
        }
        if (card.status === "To Do") {
            tod++;
            toDo.innerHTML +=
       ` 
        <button class="w-100 d-flex bg-white py-2 justify-content-between">
            <div class="d-flex">
                <div class="">
                    <i class="fa-regular fa-circle-question text-green"></i>
                </div>
                <div class="text-start ps-2">
                    <div class="fw-bolder">${card.title}</div>
                    <div class="">
                        <div class="text-secondary">#${c+1} Created in ${card.date}</div>
                        <div class="" title="${card.description}">${shortDesc}</div>
                    </div>
                    <div class="">
                        <span class="btn btn-primary py-1 px-2">${card.priority}</span>
                        <span class="btnG btn py-1 px-2" style="background-color: var(--buttonGray)">${card.type}</span>
                    </div>
                </div>
            </div>
            <div class="">
                <i onclick="deleteTask(${c});" class="mb-2 d-block fa-regular fa-x text-red deleteX"></i>
                <i onclick="updateTask(${c});" class="fa-solid fa-pencil"></i>
            </div>
        </button>`; 
        } else if (card.status === "In Progress"){
            inp++;
            inProgress.innerHTML +=
            ` 
            <button class="w-100 d-flex bg-white py-2 justify-content-between">
                <div class="d-flex">
                    <div class="">
                        <i class="fa fa-circle-notch text-green"></i>
                    </div>
                    <div class="text-start ps-2">
                        <div class="fw-bolder">${card.title}</div>
                        <div class="">
                            <div class="text-secondary">#${c+1} Created in ${card.date}</div>
                            <div class="" title="${card.description}">${shortDesc}</div>
                        </div>
                        <div class="">
                            <span class="btn btn-primary py-1 px-2">${card.priority}</span>
                            <span class="btnG btn py-1 px-2" style="background-color: var(--buttonGray)">${card.type}</span>
                        </div>
                    </div>
                </div>
                <div class="">
                    <i onclick="deleteTask(${c});" class="mb-2 d-block fa-regular fa-x text-red deleteX"></i>
                    <i onclick="updateTask(${c});" class="fa-solid fa-pencil"></i>
                </div>
            </button>`; 
        } else if (card.status === "Done"){
            doe++;
            done.innerHTML +=
            ` 
            <button class="w-100 d-flex bg-white py-2 justify-content-between">
                <div class="d-flex">
                    <div class="">
                        <i class="fa-regular fa-circle-check text-green"></i>
                    </div>
                    <div class="text-start ps-2">
                        <div class="fw-bolder">${card.title}</div>
                        <div class="">
                            <div class="text-secondary">#${c+1} Created in ${card.date}</div>
                            <div class="" title="${card.description}">${shortDesc}</div>
                        </div>
                        <div class="">
                            <span class="btn btn-primary py-1 px-2">${card.priority}</span>
                            <span class="btnG btn py-1 px-2" style="background-color: var(--buttonGray)">${card.type}</span>
                        </div>
                    </div>
                </div>
                <div class="">
                    <i onclick="deleteTask(${c});" class="mb-2 d-block fa-regular fa-x text-red deleteX"></i>
                    <i onclick="updateTask(${c});" class="fa-solid fa-pencil"></i>
                </div>
            </button>`; 
        }
        c++;
    }
    toDoCount.innerHTML = tod;
    inProgressCount.innerHTML = inp;
    doneCount.innerHTML = doe;
}
initTaskForm();

function createTask() {
    $("#modal-task").modal("show");
    reloadTasks();
    modalFooter.innerHTML=` <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
    <button id="save" onclick="saveTask();" type="button" class="btn btn-primary" data-bs-dismiss="modal">Save</button>`
}

function saveTask() {
    card = {
        'title'         :   title.value,
        'type'          :   '',
        'priority'      :   selection1.value,
        'status'        :   selection2.value,
        'date'          :   date.value,
        'description'   :   description.value,
    }
    if (radio1.checked == true) {
        card["type"] = "Feature";
    }
    else {
        card["type"] = "Bug";
    }
    tasks.push(card);
    initTaskForm();
}

function deleteTask(delCard) {
    tasks.splice(delCard,1)
    initTaskForm();
}

function editTask(index) {
    let card = {
        'title'         :   title.value,
        'type'          :   '',
        'priority'      :   selection1.value,
        'status'        :   selection2.value,
        'date'          :   date.value,
        'description'   :   description.value,
    }
    if (radio1.checked == true) {
        card["type"] = "Feature";
    }
    else {
        card["type"] = "Bug";
    }
    tasks[index] = card;
    initTaskForm();
}

function updateTask(index) {
    $("#modal-task").modal("show");
    title.value = tasks[index].title;
    description.value = tasks[index].description;
    date.value = tasks[index].date;
    if (tasks[index].type == "Feature") {
        radio1.checked = true;
    }
    else {
        radio2.checked = true;
    }
    selection1.value = tasks[index].priority;
    selection2.value = tasks[index].status;
    modalFooter.innerHTML=` <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
    <button id="save" onclick="editTask(${index});" type="button" class="btn btn-primary" data-bs-dismiss="modal">Update</button>`
}

function reloadTasks() {
    form.reset();
}