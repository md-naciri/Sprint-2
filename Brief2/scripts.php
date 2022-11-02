<?php
    //INCLUDE DATABASE FILE
    include('database.php');
    //SESSSION IS A WAY TO STORE DATA TO BE USED ACROSS MULTIPLE PAGES
    session_start();

    //ROUTING
    if(isset($_POST['save']))        saveTask();
    if(isset($_POST['update']))      updateTask();
    if(isset($_POST['delete']))      deleteTask();
    

    function getTasks($stat)
    {
        $sql = "SELECT * FROM tasks JOIN priorities ON tasks.Priority_id=priorities.P_id JOIN types ON tasks.Type_id=types.T_id ";
        $result = mysqli_query(connect(), $sql);
        if ($stat==1){
            $icon = 'far fa-question-circle';
        }
        else if ($stat==2){
            $icon = 'fas fa-circle-notch fa-spin';
        }
        else {
            $icon = 'far fa-circle-check';
        }
        if (mysqli_num_rows($result) > 0) {
            while ($tasks = mysqli_fetch_assoc($result)) {
                if ($tasks["Status_id"]==$stat){
        echo'
        <form action="Update.php" method="post">
        <button type="submit" class="list-group-item list-group-item-action d-flex">
            <div class="me-3 fs-16px">
                <i class="'.$icon.' text-green fa-fw"></i> 
            </div>
            <div class="flex-fill">
                <input type="hidden" name="identity" value="'.$tasks['Id'].'">
                <div class="fs-14px lh-12 mb-2px fw-bold text-dark">'.$tasks['Title'].'</div>
                <div class="mb-1 fs-12px">
                    <div class="text-gray-600 flex-1">#'.$tasks['Id'].' created in '.$tasks['Task_datetime'].'</div>
                    <div class="text-gray-900 flex-1" title="'.$tasks['Description'].'">'.$tasks['Description'].'</div>
                </div>
                <div class="mb-1">
                    <span class="badge bg-primary">'.$tasks['P_name'].'</span>
                    <span class="badge bg-gray-300 text-gray-900">'.$tasks['T_name'].'</span>
                </div>
            </div>
        </button></form>';}
        }
        } else {
            echo "0 results";
        }

        mysqli_close(connect());
    }


    function saveTask()
    {
        $title=$_POST['title'];
        $type=$_POST['type'];
        $priority=$_POST['priority'];
        $status=$_POST['status'];
        $date=$_POST['date'];
        $description=$_POST['description'];
        $sql = "INSERT INTO tasks (Title, Type_id, Priority_id, Status_id, Task_datetime, Description) VALUES ('$title', '$type', '$priority','$status','$date','$description')";
        
        mysqli_query(connect(), $sql);
 
        // Close connection
        mysqli_close(connect());
        $_SESSION['message'] = "Task has been added successfully !";
		header('location: index.php');
    }

    function updateTask()
    {
        $Id=$_POST['Id'];
        $title=$_POST['title'];
        $type=$_POST['type'];
        $priority=$_POST['priority'];
        $status=$_POST['status'];
        $date=$_POST['date'];
        $description=$_POST['description'];
        $sql = "UPDATE tasks SET Title='$title',Type_id='$type',Priority_id='$priority',Status_id='$status',Task_datetime='$date',Description='$description' WHERE Id='$Id'";
        mysqli_query(connect(), $sql);
        $_SESSION['message'] = "Task has been updated successfully !";
		header('location: index.php');
    }

    function deleteTask()
    {
        $Id=$_POST['Id'];
        $sql = "DELETE FROM tasks WHERE Id='$Id'";
        mysqli_query(connect(), $sql);
        $_SESSION['message'] = "Task has been deleted successfully !";
		header('location: index.php');
    }

    function counter($index){
        $sql= "SELECT COUNT(Id) as IdCounter FROM tasks WHERE Status_id='$index'";
        $result= mysqli_query(connect(),$sql);
        $tasks= mysqli_fetch_assoc($result);
        echo $tasks['IdCounter'];
    }

?>