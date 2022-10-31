
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Document</title>
</head>
<body>
<?php 
    include('scripts.php');
    @$idf=$_POST["identify"];
    @$sql = "SELECT * FROM tasks WHERE id = '$idf' ";
    @$result=mysqli_query(connect(), $sql);
    @$row = mysqli_fetch_assoc($result);
?>

    <div class="row">
        <div class="col-4"></div>
        <form method="POST" class="col-4" >
					
            <div class="modal-body">
                <!-- This Input Allows Storing Task Index  -->
                <input type="hidden" name="id" id="task-id" value="<?php echo $idf ?>">
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input name="title" type="text" class="form-control" id="task-title" value="<?php echo @$row["title"] ?>"/>
                </div>
                <div class="mb-3">
                    <label class="form-label">Type</label>
                    <div class="ms-3">
                        <div class="form-check mb-1">
                            <input class="form-check-input" name="task-type" type="radio" value="1" <?php echo @$row["type_id"]==1 ? 'checked': ''; ?> id="task-type-feature"/>
                            <label class="form-check-label" for="task-type-feature">Feature</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="task-type" type="radio" value="2" <?php echo @$row["type_id"]==2 ? 'checked': ''; ?> id="task-type-bug"/>
                            <label class="form-check-label" for="task-type-bug">Bug</label>
                        </div>
                    </div>
                    
                </div>
                <div class="mb-3">
                    <label class="form-label">Priority</label>
                    <select name= "priority" class="form-select" id="task-priority">
                        <option value="">Please select</option>
                        <option value="1" <?php echo $row["priority_id"]==1 ? 'selected': ''; ?>>Low</option>
                        <option value="2" <?php echo $row["priority_id"]==2 ? 'selected': ''; ?>>Medium</option>
                        <option value="3" <?php echo $row["priority_id"]==3 ? 'selected': ''; ?>>High</option>
                        <option value="4" <?php echo $row["priority_id"]==4 ? 'selected': ''; ?>>Critical</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name = "status" class="form-select" id="task-status">
                        <option value="">Please select</option>
                        <option value="1" <?php echo $row["status_id"]==1 ? 'selected': ''; ?>>To Do</option>
                        <option value="2" <?php echo $row["status_id"]==2 ? 'selected': ''; ?>>In Progress</option>
                        <option value="3" <?php echo $row["status_id"]==3 ? 'selected': ''; ?>>Done</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Date</label>
                    <input name = "date" type="datetime-local" class="form-control" id="task-date" value="<?php echo @$row["task_datetime"] ?>"/>
                </div>
                <div class="mb-0">
                    <label class="form-label">Description</label>
                    <textarea name = "description" class="form-control" rows="10" id="task-description"><?php echo @$row["description"] ?></textarea>
                </div>
                
            </div>
            <div class="modal-footer">
                <a href="index.php" class="btn btn-white">Cancel</a>
                <button type="submit" name="delete" class="btn btn-danger task-action-btn" id="task-delete-btn">Delete</a>
                <button type="submit" name="update" class="btn btn-warning task-action-btn" id="task-update-btn">Update</a>
            </div>
		</form> 
        <div class="col-4"></div>  
	</div>
	<?php 
        // @$id= $_POST["id"];
        // @$title= $_POST["title"];
        // @$description= $_POST["description"];
        // @$date= $_POST["date"];
        // @$priority= $_POST["priority"];
        // @$status= $_POST["status"];
        // @$type=$_POST["task-type"];

        // if(isset($_POST['update'])) {

        // }
    ?>
</body>
</html>