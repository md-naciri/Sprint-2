/**
 * In this file app.js you will find all CRUD functions name.
 * 
 */

let title = document.getElementById("title");
let radio1 = document.getElementById("radio1");
let radio2 = document.getElementById("radio2");
let selection1 = document.getElementById("selection1");
let selection2 = document.getElementById("selection2");
let date = document.getElementById("date");
let description = document.getElementById("description");
let toDo = document.getElementById("to-do");
let InProgress = document.getElementById("in-progress");
let done = document.getElementById("done");
let save = document.getElementById("save");

let carte = {};

let stock = () => {
    carte["title"] = title.value;

    if (radio1.checked == true) {
        carte["type"] = "Feature";
    }
    else {
        carte["type"] = "Bug";
    }

    if (selection1.value == 1) {
        carte["Priority"] = "Low";
    }
    else if (selection1.value == 2) {
        carte["Priority"] = "Medium";
    } else if (selection1.value == 3) {
        carte["Priority"] = "High";
    } else if (selection1.value == 4) {
        carte["Priority"] = "Critical";
    }

    if (selection2.value == 1) {
        carte["Status"] = "To Do";
    }
    else if (selection2.value == 2) {
        carte["Status"] = "In Progress";
    } else if (selection2.value == 3) {
        carte["Status"] = "Done";
    }

    carte["date"] = date.value;

    carte["description"] = description.value;
}


function affichage() {
    toDo.innerHTML = "";
    InProgress.innerHTML = "";
    done.innerHTML = "";
    for(let task of tasks){
        console.log(task.title);
    }
    for (let i = 0; i < tasks.length; i++) {
        console.log("in loop");
        if (tasks[i].status == "To Do") {
            console.log("in to do");
            toDo.innerHTML +=
            `<button class="w-100 d-flex bg-white py-2">
        <div class="">
            <i class="fa-regular fa-circle-question text-green"></i>
        </div>
        <div class="text-start ps-2">
            <div class="fw-bolder">${tasks[i]["title"]}</div>
            <div class="">
                <div class="text-secondary">#1 created in ${tasks[i]["date"]}</div>
                <div class="" title="${tasks[i]["description"]}">${tasks[i]["description"]}}</div>
            </div>
            <div class="">
                <span class="btn btn-primary py-1 px-2">${tasks[i]["Priority"]}</span>
                <span class="btnG btn py-1 px-2" style="background-color: var(--buttonGray)">${tasks[i]["type"]}</span>
            </div>
        </div>
        </button>`; 
        } else if (tasks.status == "In Progress"){
            InProgress.innerHTML +=
            `<button class="w-100 d-flex bg-white py-2">
        <div class="">
            <i class="fa-regular fa-circle-question text-green"></i>
        </div>
        <div class="text-start ps-2">
            <div class="fw-bolder">${tasks[i]["title"]}</div>
            <div class="">
                <div class="text-secondary">#1 created in ${tasks[i]["date"]}</div>
                <div class="" title="${tasks[i]["description"]}">${shortDesc}</div>
            </div>
            <div class="">
                <span class="btn btn-primary py-1 px-2">${tasks[i]["Priority"]}</span>
                <span class="btnG btn py-1 px-2" style="background-color: var(--buttonGray)">${tasks[i]["type"]}</span>
            </div>
        </div>
        </button>`
        } else if (tasks.status == "Done"){
            done.innerHTML +=
            `<button class="w-100 d-flex bg-white py-2">
        <div class="">
            <i class="fa-regular fa-circle-question text-green"></i>
        </div>
        <div class="text-start ps-2">
            <div class="fw-bolder">${tasks[i]["title"]}</div>
            <div class="">
                <div class="text-secondary">#1 created in ${tasks[i]["date"]}</div>
                <div class="" title="${ctasks[i]["description"]}">${shortDesc}</div>
            </div>
            <div class="">
                <span class="btn btn-primary py-1 px-2">${tasks[i]["Priority"]}</span>
                <span class="btnG btn py-1 px-2" style="background-color: var(--buttonGray)">${tasks[i]["type"]}</span>
            </div>
        </div>
        </button>`
        }
    } 
    console.log("ghty")
}

affichage();

function createTask() {
    // initialiser task form

    // Afficher le boutton save

    // Ouvrir modal form

}

function saveTask() {
    stock();
    tasks[tasks.length] = carte;
    let shortDesc = carte["description"];
    if (shortDesc.length > 50) {
        shortDesc = `${shortDesc.substring(0, 50)}...`;
    }
    if (carte["Status"] == "To Do") {
        toDo.innerHTML +=
            `<button class="w-100 d-flex bg-white py-2">
        <div class="">
            <i class="fa-regular fa-circle-question text-green"></i>
        </div>
        <div class="text-start ps-2">
            <div class="fw-bolder">${carte["title"]}</div>
            <div class="">
                <div class="text-secondary">#1 created in ${carte["date"]}</div>
                <div class="" title="${carte["description"]}">${shortDesc}</div>
            </div>
            <div class="">
                <span class="btn btn-primary py-1 px-2">${carte["Priority"]}</span>
                <span class="btnG btn py-1 px-2" style="background-color: var(--buttonGray)">${carte["type"]}</span>
            </div>
        </div>
        </button>`
    }
    else if (carte["Status"] == "In Progress") {
        InProgress.innerHTML +=
            `<button class="w-100 d-flex bg-white py-2">
        <div class="">
            <i class="fa-regular fa-circle-question text-green"></i>
        </div>
        <div class="text-start ps-2">
            <div class="fw-bolder">${carte["title"]}</div>
            <div class="">
                <div class="text-secondary">#1 created in ${carte["date"]}</div>
                <div class="" title="${carte["description"]}">${shortDesc}</div>
            </div>
            <div class="">
                <span class="btn btn-primary py-1 px-2">${carte["Priority"]}</span>
                <span class="btnG btn py-1 px-2" style="background-color: var(--buttonGray)">${carte["type"]}</span>
            </div>
        </div>
        </button>`
    }
    else if (carte["Status"] == "Done") {
        done.innerHTML +=
            `<button class="w-100 d-flex bg-white py-2">
        <div class="">
            <i class="fa-regular fa-circle-question text-green"></i>
        </div>
        <div class="text-start ps-2">
            <div class="fw-bolder">${carte["title"]}</div>
            <div class="">
                <div class="text-secondary">#1 created in ${carte["date"]}</div>
                <div class="" title="${carte["description"]}">${shortDesc}</div>
            </div>
            <div class="">
                <span class="btn btn-primary py-1 px-2">${carte["Priority"]}</span>
                <span class="btnG btn py-1 px-2" style="background-color: var(--buttonGray)">${carte["type"]}</span>
            </div>
        </div>
        </button>`
    }
    reloadTasks();
}

function editTask(index) {
    // Initialisez task form

    // Affichez updates

    // Delete Button

    // Définir l’index en entrée cachée pour l’utiliser en Update et Delete

    // Definir FORM INPUTS

    // Ouvrir Modal form
}

function updateTask() {
    // GET TASK ATTRIBUTES FROM INPUTS

    // Créez task object

    // Remplacer ancienne task par nouvelle task

    // Fermer Modal form

    // Refresh tasks

}

function deleteTask() {
    // Get index of task in the array

    // Remove task from array by index splice function

    // close modal form

    // refresh tasks
}

function initTaskForm() {
    // Clear task form from data

    // Hide all action buttons
}

function reloadTasks() {
    title.value = "";
    radio1.checked;
    selection1.value = 3;
    selection2.value = 0;
    date.value = "";
    description.value = "";
}