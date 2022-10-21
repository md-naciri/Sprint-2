
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
    for (let card of tasks) {
        let shortDesc = card.description;
        if (shortDesc.length > 65) {
        shortDesc = `${shortDesc.substring(0, 65)}...`;
        }
        if (card.status === "To Do") {
            tod++;
            toDo.innerHTML +=
       ` 
       <button class="w-100 d-flex bg-white py-2">
            <div class="">
                <i class="fa-regular fa-circle-question text-green"></i>
            </div>
            <div class="text-start ps-2">
                <div class="fw-bolder">${card.title}</div>
                <div class="">
                    <div class="text-secondary">#${card.id+1} Created in ${card.date}</div>
                    <div class="" title="${card.description}">${shortDesc}</div>
                </div>
                <div class="">
                    <span class="btn btn-primary py-1 px-2">${card.priority}</span>
                    <span class="btnG btn py-1 px-2" style="background-color: var(--buttonGray)">${card.type}</span>
                </div>
            </div>
            <i onclick="deleteTask(${card.id});" class="fa-regular fa-x text-red deleteX"></i>
            <i onclick="editTask(${card.id});" class="fa-solid fa-pencil"></i>
        </button>`; 
        } else if (card.status === "In Progress"){
            inp++;
            inProgress.innerHTML +=
            `<button class="w-100 d-flex bg-white py-2">
        <div class="">
            <i class="fa-regular fa-circle-question text-green"></i>
        </div>
        <div class="text-start ps-2">
            <div class="fw-bolder">${card.title}</div>
            <div class="">
                <div class="text-secondary">#${card.id+1} Created in ${card.date}</div>
                <div class="" title="${card.description}">${shortDesc}</div>
            </div>
            <div class="">
                <span class="btn btn-primary py-1 px-2">${card.priority}</span>
                <span class="btnG btn py-1 px-2" style="background-color: var(--buttonGray)">${card.type}</span>
            </div>
        </div>
        <i onclick="deleteTask(${card.id});" class="fa-regular fa-x text-red deleteX"></i>
        </button>`
        } else if (card.status === "Done"){
            doe++;
            done.innerHTML +=
            `<button class="w-100 d-flex bg-white py-2">
        <div class="">
            <i class="fa-regular fa-circle-question text-green"></i>
        </div>
        <div class="text-start ps-2">
            <div class="fw-bolder">${card.title}</div>
            <div class="">
                <div class="text-secondary">#${card.id+1} Created in ${card.date}</div>
                <div class="" title="${card.description}">${shortDesc}</div>
            </div>
            <div class="">
                <span class="btn btn-primary py-1 px-2">${card.priority}</span>
                <span class="btnG btn py-1 px-2" style="background-color: var(--buttonGray)">${card.type}</span>
            </div>
        </div>
        <i onclick="deleteTask(${card.id});" class="fa-regular fa-x text-red deleteX"></i>
        </button>`
        }
    }
    toDoCount.innerHTML = tod;
    inProgressCount.innerHTML = inp;
    doneCount.innerHTML = doe;
}
initTaskForm();

function createTask() {
    $("#modal-task").modal("show");
}


function saveTask() {
 
    card = {
        'id'            :   tasks.length,
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
    reloadTasks();

}


function deleteTask(delCard) {
    tasks = tasks.filter(function(card){
        return card.id != delCard;
    })
    initTaskForm();
}

function editTask(index) {
    
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
    createTask();
    save.addEventListener("click", ()=> {
       let card = {
            'id'            :   index+1,
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
    });
}

function updateTask() {
    // GET TASK ATTRIBUTES FROM INPUTS

    // Créez task object

    // Remplacer ancienne task par nouvelle task

    // Fermer Modal form

    // Refresh tasks
    
}



function reloadTasks() {
    form.reset();
}