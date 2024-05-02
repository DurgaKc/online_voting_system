<?php
    session_start();
    
    $server = "localhost"; 
    $username = "root"; 
    $password = ""; 
    $database = "onlinevoting"; 

    $conn = mysqli_connect($server, $username, $password,$database);

    if (!$conn) {
        die("sorry we are failed to connect ". mysqli_connect_error());
    }
?> 