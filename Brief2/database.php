<?php
    function connect(){
        $server="localhost";
        $username="root";
        $password="";
        $dbname="ycdscrumboard";
        $connect = mysqli_connect($server,$username,$password,$dbname) or die("Connection failed");
        return $connect;
    }
?>