<?php
    $servername = "localhost";
    $username="root";
    $password="";
    $database="as2";
    $conn = new mysqli($servername, $username, $password, $database);
    // Check connection
    if ($conn->connect_errno) {
        header("location:/as2/error_database.html");
        exit();
    }
?>