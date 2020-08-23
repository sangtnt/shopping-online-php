<?php
    require "check_login_user.php";
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $proId = $_GET["proId"];
    $qty = $_GET["qty"];
    $status = array();
    if (isset($_SESSION["cart"])&&isset($_SESSION["qty"])&&isset($_SESSION["status"])){
        if (in_array($proId, $_SESSION["cart"])){
            $index = array_search($proId, $_SESSION["cart"]);
            $_SESSION["qty"][$index]+=$qty;
        }
        else{
            array_push($_SESSION["cart"], $proId);
            array_push($_SESSION["qty"], $qty);
            array_push($_SESSION["status"], true);
        }
    }
    else{
        $_SESSION["cart"] =array();
        array_push($_SESSION["cart"], $proId);
        $_SESSION["qty"] =array();
        array_push($_SESSION["qty"], $qty);
        $_SESSION["status"] =array();
        array_push($_SESSION["status"], true);
    }
    header("location: /as2/product_detail.php?proId=$proId");
?>