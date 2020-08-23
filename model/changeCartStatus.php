<?php
    session_start();
    $i = $_GET["index"];
    if ($i=="tAll"){
        for ($j = 0; $j < count($_SESSION["status"]); $j++){
            $_SESSION["status"][$j]=true;
            $_SESSION["allStatus"]= true;
        }
    }
    else if ($i=="fAll"){
        for ($j = 0; $j<count($_SESSION["status"]); $j++){
            $_SESSION["status"][$j]=false;
            $_SESSION["allStatus"]= false;
        }
    }
    else{
        $_SESSION["status"][$i]=!$_SESSION["status"][$i];
    }
    header("location: /as2/cart.php");
?>