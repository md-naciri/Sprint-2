<?php
    //INCLUDE DATABASE FILE
    include('database.php');
    //SESSSION IS A WAY TO STORE DATA TO BE USED ACROSS MULTIPLE PAGES
    session_start();

    //ROUTING
    if(isset($_POST['save']))        saveTask();
    if(isset($_POST['update']))      updateTask();
    if(isset($_POST['delete']))      deleteTask();


    function getTasks($row, $icon)
    {
        echo '
        <form action="update.php" method="post">
        <button  type="submit" class="list-group-item list-group-item-action d-flex">
            <div class="me-3 fs-16px">
                <i class="' . $icon. ' text-green fa-fw"></i> 
            </div>
            <div class="flex-fill">
            <input type="hidden" name="identify" value="' . $row["id"]. '">
                <div  class="fs-14px lh-12 mb-2px fw-bold text-dark" >' . $row["title"]. '</div>
                <div class="mb-1 fs-12px">
                    <div class="text-gray-600 flex-1">#' . $row["id"]. ' created in ' . $row["task_datetime"]. '</div>
                    <div class="text-gray-900 flex-1" title="' . $row["description"]. '">' . $row["description"]. '</div>
                </div>
                <div class="mb-1">
                    <span class="badge bg-primary">' . $row["p_name"]. '</span>
                    <span class="badge bg-gray-300 text-gray-900">' . $row["name"]. '</span>
                </div>
            </div>
        </button></form>
        ';
    }



    function saveTask()
    {
        $title = $_POST['title'];
        $type = $_POST['task-type'];
        $priority = $_POST['priority'];
        $status = $_POST['status'];
        $date = $_POST['date'];
        $description = $_POST['description'];

        $query= "insert into tasks (`title`, `type_id`, `priority_id`, `status_id`, `task_datetime`, `description`) values ('$title','$type','$priority','$status','$date','$description')";
        
        mysqli_query(connect(),$query);

        $_SESSION['message'] = "Task has been added successfully !";
		header('location: index.php');
    }

    function updateTask()
    {
        //CODE HERE
        //SQL UPDATE
        $_SESSION['message'] = "Task has been updated successfully !";
		header('location: index.php');
    }

    function deleteTask()
    {
        //CODE HERE
        //SQL DELETE
        $_SESSION['message'] = "Task has been deleted successfully !";
		header('location: index.php');
    }
    function counting($n)
    {
        $reuqit = "SELECT COUNT(id) as idC FROM `tasks`  where status_id = $n;" ;
        $result = mysqli_query(connect(), $reuqit);
        $row = mysqli_fetch_assoc($result);
        echo $row['idC'];
    }

?>