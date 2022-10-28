<?php
    include('database.php');
    
$id = $_GET['id'];

$sql = "SELECT * FROM tasks WHERE id = $id";
$result = mysqli_query(connect(), $sql);
$icon = 'far fa-question-circle';
if (mysqli_num_rows($result) > 0) {
        $result = mysqli_fetch_assoc($result);
        echo $result['title'];
    }
 else {
    echo "0 results";
}

?>
<input type="text" name="" id="" value="<?php echo$result["title"] ?>" class="form-control">