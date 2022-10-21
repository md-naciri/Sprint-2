const title=document.querySelector("#title");
const radio1=document.querySelector("#radio1");
const radio12=document.querySelector("#radio2");
const select1=document.querySelector("#select1");
const select2=document.querySelector("#select1");
const date=document.querySelector("#date");
const description=document.querySelector("#description");

const todo=document.querySelector("#todo");
const inprogress=document.querySelector("#inprogress");
const done=document.querySelector("#done");

const donecount=document.querySelector("#donecount");
const inprogresscount=document.querySelector("#inprogresscount");



function initTaskForm() {
    todo.innerHTML="";
    inprogress.innerHTML="";
    done.innerHTML="";
    let t=0;
    let i=0;
    let d=0;
    for(let task of tasks){
    if(task.description.length>50){
        task.description=task.description.substring(0,50)+'...';
    }
       if(task.status=="To Do"){
        t++;
        todo.innerHTML +=`<button class="w-100 py-2 d-flex border-0 border-top">
        <div class="mx-1 fs-3 ">
            <i class="bi bi-question-circle "></i>
        </div>
        <div class="card-text text-start">
            <div class="fw-bolder fs-7 mx-3">${task.title}</div>
            <div class="mx-3">
                <div class="fw-light">#${task.id} created in ${task.date}</div>
                <div class="fst-normal" title="There is hardly anything more frustrating than having to look for current requirements in tens of comments under the actual description or having to decide which commenter is actually authorized to change the requirements. The goal here is to keep all the up-to-date requirements and details in the main/primary description of a task. Even though the information in comments may affect initial criteria, just update this primary description accordingly.">${task.description}</div>
            </div>
            <div class="mx-3 mb-1 mt-1">
                <span class="btn-primary px-2 py-1 rounded-2">${task.priority}</span>
                <span class="btn-light  px-2 py-1 rounded-2" >${task.type}</span>
            </div>
        </div>
    </button>`
       }else if(task.status=="In Progress"){
        i++;
        inprogress.innerHTML +=`<button class="w-100 py-2 d-flex border-0 border-top" >
        <div class="mx-1 my-1">
            <div class="spinner-border " role="status">
                <span class="visually-hidden">Loading...</span>
              </div>
        </div>
        <div class="card-text text-start">
            <div class="mx-3 fw-bolder fs-7">${task.title}</div>
            <div class="mx-3">
                <div class="fw-light">#${task.id} created in ${task.date}</div>
                <div class="" title="including as many details as possible.">${task.description}</div>
            </div>
            <div class="mx-3 mb-1 mt-1">
                <span class="btn-primary px-2 py-1 rounded-2">${task.priority}</span>
                <span class="btn-light px-2 py-1 rounded-2">${task.type}</span>
            </div>
        </div>
    </button>`
       }else{
        d++;
        done.innerHTML +=`<button class="w-100 py-2  d-flex  border-0 border-top" >
        <div class="mx-1 fs-3">
            <i class=" bi bi-check-circle "></i> 
        </div>
        <div class="card-text text-start">
            <div class="mx-3 fw-bolder fs-7">${task.title}</div>
            <div class="mx-3">
                <div class="fw-light">#${task.id} created in ${task.date}</div>
                <div class="" title="as they can be helpful in reproducing the steps that caused the problem in the first place.">${task.description}</div>
            </div>
            <div class="mx-3 mb-1 mt-1">
                <span class="btn-primary px-2 py-1 rounded-2">${task.priority}</span>
                <span class="btn-light px-2 py-1 rounded-2">${task.type}</span>
            </div>
        </div>
    </button>`
       }
    }
}
initTaskForm();




 function createTask() {
    $("#modal-task").modal("show");
}

function saveTask() {
    task={};
    task={
        'id'            :   tasks.length,
        'title'         :   title.value,
        'type'          :   '',
        'priority'      :   select1.value,
        'status'        :   select2.value,
        'date'          :   date.value,
        'description'   :   description.value,
    }
    if(task.type=="Feature"){
        radio1.checked=true;
    }else{
        radio12.checked=true;
    }
    tasks.push(task);
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



function reloadTasks() {
    // Remove tasks elements

    // Set Task count
}