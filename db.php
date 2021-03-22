<?php
    $host ='localhost';
    $database = 'lpr7-3';
    $user = 'root';
    $password = 'root';
    $mysql = mysqli_connect($host, $user, $password,$database);
    if(!$mysql){
        die("Connection failed ".mysqli_connect_error());
    }
?>