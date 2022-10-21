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
     carte["id"] = tasks.length+1;
     carte["title"] = title.value;
 
     if (radio1.checked == true) {
         carte["type"] = "Feature";
     }
     else {
         carte["type"] = "Bug";
     }
 
     if (selection1.value == "Low") {
         carte["Priority"] = "Low";
     }
     else if (selection1.value == "Medium") {
         carte["Priority"] = "Medium";
     } else if (selection1.value == "High") {
         carte["Priority"] = "High";
     } else if (selection1.value == "Critical") {
         carte["Priority"] = "Critical";
     }
 
     if (selection2.value =="To Do") {
         carte["Status"] = "To Do";
     }
     else if (selection2.value == "In Progress") {
         carte["Status"] = "In Progress";
     } else if (selection2.value =="Done") {
         carte["Status"] = "Done";
     }
 
     carte["date"] = date.value;
 
     carte["description"] = description.value;
 }
 
 
 function affichage() {
     toDo.innerHTML = "";
     InProgress.innerHTML = "";
     done.innerHTML = "";
     
     for (let task of tasks) {
         let shortDesc = task.description;
         if (shortDesc.length > 65) {
         shortDesc = `${shortDesc.substring(0, 65)}...`;
         }
         if (task.status === "To Do") {
             toDo.innerHTML +=
        ` 
        <button class="w-100 d-flex bg-white py-2">
         <div class="">
             <i class="fa-regular fa-circle-question text-green"></i>
         </div>
         <div class="text-start ps-2">
             <div class="fw-bolder">${task.title}</div>
             <div class="">
                 <div class="text-secondary">#${task.id} Created in ${task.date}</div>
                 <div class="" title="${task.description}">${shortDesc}</div>
             </div>
             <div class="">
                 <span class="btn btn-primary py-1 px-2">${task.priority}</span>
                 <span class="btnG btn py-1 px-2" style="background-color: var(--buttonGray)">${task.type}</span>
             </div>
         </div>
         <div>
             <div class = "" style="flex-direction: column;display: flex;justify-content: flex-start;">
                 <i onclick="deleteTask(this);" class="fa-solid fa-trash fs-4"></i>
                 <i onclick="editTask(${task.id});" data-bs-target="#modal-task" data-bs-toggle="modal" class="fa-solid fa-pen-to-square fs-4"></i>
             </div>
         </div>
         </button>`; 
         } else if (task.status === "In Progress"){
             InProgress.innerHTML +=
             `<button class="w-100 d-flex bg-white py-2">
         <div class="">
             <i class="fa-regular fa-circle-question text-green"></i>
         </div>
         <div class="text-start ps-2">
             <div class="fw-bolder">${task.title}</div>
             <div class="">
                 <div class="text-secondary">#${task.id} Created in ${task.date}</div>
                 <div class="" title="${task.description}">${shortDesc}</div>
             </div>
             <div class="">
                 <span onclick="deleteTask(this);" class="btn btn-primary py-1 px-2">${task.priority}</span>
                 <span onclick="editTask(this);" class="btnG btn py-1 px-2" style="background-color: var(--buttonGray)">${task.type}</span>
             </div>
         </div>
         </button>`
         } else if (task.status === "Done"){
             done.innerHTML +=
             `<button class="w-100 d-flex bg-white py-2">
         <div class="">
             <i class="fa-regular fa-circle-question text-green"></i>
         </div>
         <div class="text-start ps-2">
             <div class="fw-bolder">${task.title}</div>
             <div class="">
                 <div class="text-secondary">$#${task.id} Created in ${task.date}</div>
                 <div class="" title="${task.description}">${shortDesc}</div>
             </div>
             <div class="">
                 <span   onclick="deleteTask(this);" class="btn btn-primary py-1 px-2">${task.priority}</span>
                 <span   onclick="editTask(${task.id});"  class="btnG btn py-1 px-2" style="background-color: var(--buttonGray)">${task.type}</span>
             </div>
         </div>
         </button>`
         }
     } 
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
     if (shortDesc.length > 65) {
         shortDesc = `${shortDesc.substring(0, 65)}...`;
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
                 <div class="text-secondary">#${carte.id} Created in ${carte["date"]}</div>
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
                 <div class="text-secondary">#${carte.id} Created in ${carte["date"]}</div>
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
                 <div class="text-secondary">#${carte.id} Created in ${carte["date"]}</div>
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
     // let selectedtask=index.parentElement.parentElement.parentElement;
     
     if (tasks[index-1].type == "Feature") {
         radio1.checked = true;
     }
     else {
         radio2.checked = true;
     }
     // title.value=selectedtask.children[1].children[0].innerHTML;
     // description.value=tasks[index].description.innerHTML;
     title.value=tasks[index-1].title;
     description.value=tasks[index-1].description;
     // console.log(index);
     // console.log(tasks[index-1].title);
     // console.log(tasks[index-1].description);
     // selection1.value=tasks[index-1].selection1;
     // selection2.value=tasks[index-1].selection2;
 
 }
 
 function updateTask() {
 
     // GET TASK ATTRIBUTES FROM INPUTS
 
     // Créez task object
 
     // Remplacer ancienne task par nouvelle task
 
     // Fermer Modal form
 
     // Refresh tasks
 
 }
 
 function deleteTask(del) {
     del.parentElement.parentElement.parentElement.remove();
     
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