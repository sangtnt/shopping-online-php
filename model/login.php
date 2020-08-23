<?php
    session_start();
    require "user_model.php";
    $username = $_POST["username"];
    $password = $_POST["password"];
    $result= checkUser($username, $password);
    if ($result==false){
        header("location:../login.php?message=User or password is incorrect!");
    }
    else{
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $roles = checkAdmin($row["id"]);
                if ($roles==true) {
                    if (checkUserRole($row["id"])){
                        $orders = getOrder($row["id"]);
                        $_SESSION["orders"]=$orders->num_rows;
                    }
                    header("location:/as2/admin");
                }
                else{
                    $orders = getOrder($row["id"]);
                    $_SESSION["orders"]=$orders->num_rows;
                    header("location:/as2");
                }
                $_SESSION["user_id"]=$row["id"];
                $_SESSION["fullname"]=$row["fullname"];
            }
            $_SESSION["user"]=true;
        }
    }
?>