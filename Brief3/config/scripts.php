<?php 
include('database.php');
if(isset($_POST['save']))   saveUser();
if(isset($_POST['log-in']))   compareUser();


function saveUser(){
    $connect= conn();
    $full_name= $_POST['name'];
    $email= $_POST['email'];
    $password= $_POST['password'];

    $sql = "INSERT INTO admin (Name, Email, Password) VALUES ('$full_name', '$email', '$password')";
    if(mysqli_query($connect, $sql)){
        header("Location: logIn.php");
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($connect);
    }
    
    // Close connection
    mysqli_close($connect);
}

function compareUser(){
    $connect= conn();
    $email= $_POST['email'];
    $password= $_POST['password'];

    $sql = "SELECT * FROM admin WHERE Email = '$email' AND Password = '$password'";
    if($result = mysqli_query($connect, $sql)){
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                $id=$row['Id'];
            }
            header("Location: dashboard.php");
        } else{
            echo "No records matching your query were found.";
        }
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($connect);
    }
     
    // Close connection
    mysqli_close($connect);
}

?>