<?php 
function conn(){

    require_once 'vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    $db_server=$_ENV['D_SERVER'];
    $db_username=$_ENV['D_USERNAME'];
    $db_password=$_ENV['D_PASSWORD'];
    $db_name=$_ENV['D_NAME'];
    $con = mysqli_connect($db_server,$db_username,$db_password,$db_name);

    // Check connection
    if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
    }
    return $con;
}
?>