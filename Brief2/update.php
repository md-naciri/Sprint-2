<?php
    include('scripts.php');
?>
<!DOCTYPE html>
<html lang="en" >
<head>
	<meta charset="utf-8" />
	<title>YouCode | Update Task</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN core-css ================== -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="assets/css/vendor.min.css" rel="stylesheet" />
	<link href="assets/css/default/app.min.css" rel="stylesheet" />
	<!-- ================== END core-css ================== -->
</head>
<body>
    <?php 
    $Id = $_POST["identity"];
    $sql = "SELECT * FROM tasks WHERE Id='$Id'";
    $result = mysqli_query(connect(), $sql);  
    $tasks = mysqli_fetch_assoc($result); 
    ?>
	<!-- TASK MODAL -->
            <form method="post">
                <div class="row">
                    <div class="col-3"></div>
                    <div class="col-6 ">
					<div class="modal-body">
							<!-- This Input Allows Storing Task Index  -->
							<input type="hidden" id="task-id" name="Id" value=<?php echo $Id ?>>
							<div class="mb-3">
								<label class="form-label">Title</label>
								<input type="text" name="title" class="form-control" id="task-title" value="<?php echo $tasks['Title'] ?>"/>
							</div>
							<div class="mb-3">
								<label class="form-label">Type</label>
								<div class="ms-3">
									<div class="form-check mb-1">
										<input class="form-check-input" name="type" type="radio" value="1" id="task-type-feature" <?php echo $tasks['Type_id']==1 ? 'checked':''; ?>/>
										<label class="form-check-label" for="task-type-feature">Feature</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" name="type" type="radio" value="2" id="task-type-bug" <?php echo $tasks['Type_id']==2 ? 'checked':''; ?>/>
										<label class="form-check-label" for="task-type-bug">Bug</label>
									</div>
								</div>
								
							</div>
							<div class="mb-3">
								<label class="form-label">Priority</label>
								<select class="form-select" name="priority" id="task-priority">
									<option value="">Please select</option>
									<option value="1" <?php echo $tasks['Priority_id']==1 ? 'selected':''; ?>>Low</option>
									<option value="2" <?php echo $tasks['Priority_id']==2 ? 'selected':''; ?>>Medium</option>
									<option value="3" <?php echo $tasks['Priority_id']==3 ? 'selected':''; ?>>High</option>
									<option value="4" <?php echo $tasks['Priority_id']==4 ? 'selected':''; ?>>Critical</option>
								</select>
							</div>
							<div class="mb-3">
								<label class="form-label">Status</label>
								<select class="form-select" name="status" id="task-status">
									<option value="">Please select</option>
									<option value="1" <?php echo $tasks['Status_id']==1 ? 'selected':''; ?>>To Do</option>
									<option value="2" <?php echo $tasks['Status_id']==2 ? 'selected':''; ?>>In Progress</option>
									<option value="3" <?php echo $tasks['Status_id']==3 ? 'selected':''; ?>>Done</option>
								</select>
							</div>
							<div class="mb-3">
								<label class="form-label">Date</label>
								<input type="datetime-local" name="date" class="form-control" id="task-date" value="<?php echo $tasks['Task_datetime']; ?>"/>
							</div>
							<div class="mb-0">
								<label class="form-label">Description</label>
								<textarea class="form-control" rows="10" name="description" id="task-description"><?php echo $tasks['Description'] ?></textarea>
							</div>
						
					</div>
					<div class="modal-footer">
						<a href="index.php" class="btn btn-white" >Cancel</a>
						<button onclick = "return confirm('Are you sure you want to delete this task?')" type="submit" name="delete" class="btn btn-danger task-action-btn" id="task-delete-btn">Delete</a>
						<button type="submit" name="update" class="btn btn-warning task-action-btn" id="task-update-btn">Update</a>
					</div>
                    </div>
                    <div class="col-3"></div>
                </div>
            </form>
	
	<!-- ================== BEGIN core-js ================== -->
	<script src="assets/js/vendor.min.js"></script>
	<script src="assets/js/app.min.js"></script>
	<!-- ================== END core-js ================== -->
	<script src="scripts.js"></script>
</body>
</html>