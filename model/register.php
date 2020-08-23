<?php
    require "user_model.php";
    $username = $_POST["username"];
    $user = findUserByUsername($username);
    if ($user->num_rows>0){
        header("location: /as2/register.php?message=Username is used");
        exit();
    }
    else if (strlen($_POST["password"])<8){
        header("location: /as2/register.php?message=Password must be above 7 characters");
        exit();
    }
    else{
        insertUser($username, $_POST["fullname"], $_POST["address"], $_POST["phone"], $_POST["password"]);
    }
    header("location: /as2/login.php");
?>