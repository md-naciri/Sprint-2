<?php session_start();
if (!isset($_SESSION['user_id'])) {
    header('location: ../pages/logIn.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('../config/database.php');
    include('head.php');
    ?>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<?php
$id = $_POST['id'];
$sql = "SELECT * FROM product WHERE Id='$id'";
$result = mysqli_query(conn(), $sql);
$row = mysqli_fetch_assoc($result);
?>

<body>

    <div class="row mt-3">
        <div class="col-1 col-sm-2"></div>
        <div class="col-10 col-sm-8">
            <div class="modal-content mt-5">
                <form action="../config/scripts.php" method="POST" id="form-task" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input name="id" type="hidden" value="<?php echo $row['Id'] ?>">
                        <div class="mb-3">
                            <label class="form-label">Product Name</label>
                            <input type="text" name="name" class="form-control" id="" value="<?php echo $row['Name'] ?>" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Photo</label>
                            <input type="file" name="photo" class="form-control" id="" accept=".jpg,.png,.jpeg" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Date</label>
                            <input type="date" name="date" class="form-control" id="" value="<?php echo $row['Date'] ?>" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Price</label>
                            <input type="number" step="0.01" name="price" class="form-control" id="" value="<?php echo $row['Price'] ?>" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Category</label>
                            <select class="form-select" name="category" id="">
                                <option value="">Please select</option>
                                <option value="1" <?php echo $row['Category'] == 1 ? 'selected' : ''; ?>>Action-adventure</option>
                                <option value="2" <?php echo $row['Category'] == 2 ? 'selected' : ''; ?>>Survival and horror</option>
                                <option value="3" <?php echo $row['Category'] == 3 ? 'selected' : ''; ?>>Sports</option>
                                <option value="4" <?php echo $row['Category'] == 4 ? 'selected' : ''; ?>>strategy</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Quantity</label>
                            <input type="number" name="quantity" class="form-control" id="" value="<?php echo $row['Quantity'] ?>" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="dashboard2.php" class="btn btn-white">Cancel</a>
                        <button type="submit" name="update" class="btn btn-add-color task-action-btn" id="task-save-btn">Update</button>
                        <button type="submit" name="delete" class="btn btn-delete-color task-action-btn" id="task-save-btn">Delete</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-1 col-sm-2"></div>
    </div>
</body>

</html>