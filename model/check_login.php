<?php
    session_start();
    require "user_model.php";
    if (isset($_SESSION["user"])){
        $login = $_SESSION["user"];
        if ($login!=true){
            header("location:/as2/login.php");
            exit();
        }
    }
    else{
        header("location:/as2/login.php");
    }
?>