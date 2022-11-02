<?php
    function connect(){
        $hostname="localhost";
        $username="root";
        $password="";
        $dbname="ycdsbmine"; 
        $connect = mysqli_connect($hostname,$username,$password,$dbname);
         
        // Check connection
        if($connect === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }
        return $connect;
    }

?>