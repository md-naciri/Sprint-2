<?php
session_start();
include('database.php');
if (isset($_POST['save']))   saveUser();
if (isset($_POST['log-in']))   compareUser();
if (isset($_POST['add']))   addProduct();
if (isset($_POST['update']))   updateProduct();
if (isset($_POST['delete']))   deleteProduct();

function input_data($data)
{
    $data = trim($data);
    $data = htmlspecialchars($data);
    return $data;
}

function check($data, $type)
{
    switch ($type) {
        case 'name':
            if (!preg_match("/^[a-zA-Z\s]+$/", $data) || empty($data)) {
                return false;
            } else {
                return $data;
            }
            break;
        case 'email':
            if (!filter_var($data, FILTER_VALIDATE_EMAIL) || empty($data)) {
                return false;
            } else {
                return $data;
            }
            break;
        case 'password':
            if (!preg_match("/^[a-zA-Z0-9]+$/", $data) || empty($data)) {
                return false;
            } else {
                return $data;
            }
            break;
    }
}

function saveUser()
{
    $connect = conn();
    $full_name = check(input_data($_POST['name']), 'name');
    $email = check(input_data($_POST['email']), 'email');
    $password = check(input_data($_POST['password']), 'password');
    if (!$full_name || !$email || !$password) {
        header("Location: ../index.php");
        $_SESSION['message'] = "One or more inputs are invalid";
        die();
    }

    $sql = "SELECT Email FROM admin WHERE Email='$email'";
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) > 0) {
        header("Location: ../index.php");
        $_SESSION['message'] = "This email is already connected to an account";
    } else {
        $sql = "INSERT INTO admin (Name, Email, Password) VALUES ('$full_name', '$email', '$password')";
        mysqli_query($connect, $sql);
        header("Location: ../pages/logIn.php");
    }
    // Close connection
    mysqli_close($connect);
}

function compareUser()
{

    $email = mysqli_real_escape_string(conn(), check(input_data($_POST['email']), 'email'));
    $password = mysqli_real_escape_string(conn(), check(input_data($_POST['password']), 'password'));

    if (!$email || !$password) {
        header('location: ../pages/logIn.php');
        $_SESSION['message'] = "One or more inputs are invalid";
        die();
    }

    $sql = "SELECT * FROM admin WHERE Email = '$email' AND Password = '$password'";
    $result = mysqli_query(conn(), $sql);
    $row = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['user_id'] = $row['Id'];
        header('location: ../pages/dashboard.php');
    } else {
        header('location: ../pages/logIn.php');
        $_SESSION['message'] = "Wrong email or password";
        // echo "No records matching your query were found.";
    }

    // Close connection
    mysqli_close(conn());
}

function addProduct()
{
    $name = mysqli_real_escape_string(conn(), $_POST['name']);
    $pic_name = $_FILES['photo']['name'];
    $photo = $_FILES['photo']['tmp_name'];
    $date = $_POST['date'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];
    $sql = "INSERT INTO product (Name,Photo,Date,Price,Category,Quantity) VALUES ('$name','$pic_name','$date','$price','$category','$quantity')";
    move_uploaded_file($photo, '../assets/img/' . $pic_name);
    mysqli_query(conn(), $sql);
    mysqli_close(conn());
    header('location: ../pages/dashboard.php');
}

function updateProduct()
{
    $id = $_POST['id'];
    $name = $_POST['name'];
    $pic_name = $_FILES['photo']['name'];
    $photo = $_FILES['photo']['tmp_name'];
    $date = $_POST['date'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];
    if (empty($pic_name)) {
        $sql = "UPDATE product SET Name='$name',Date='$date',Price='$price',Category='$category',Quantity='$quantity' WHERE Id='$id'";
    } else {
        $sql = "UPDATE product SET Name='$name',Photo='$pic_name',Date='$date',Price='$price',Category='$category',Quantity='$quantity' WHERE Id='$id'";
        move_uploaded_file($photo, '../assets/img/' . $pic_name);
    }
    mysqli_query(conn(), $sql);
    header('location: ../pages/dashboard.php');
};
function deleteProduct()
{
    $id = $_POST['id'];
    $sql = "DELETE FROM product WHERE Id='$id'";
    mysqli_query(conn(), $sql);
    header('location: ../pages/dashboard.php');
};
