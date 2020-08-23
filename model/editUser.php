<?php
    session_start();
    require "user_model.php";
    $username = $_POST["username"];
    $user = findUserByUsername($username);
    $fullname = $_POST["fullname"];
    $address =$_POST["address"];
    $phone = $_POST["phone"];
    $userId = $_SESSION["user_id"];
    $sql = "UPDATE user SET username='$username', fullname='$fullname', address='$address', phone='$phone' WHERE id = '$userId'";
    $conn->query($sql);
    header("location: /as2/profile.php");
?>