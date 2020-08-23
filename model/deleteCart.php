<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $index = $_GET["index"];
    array_splice($_SESSION["cart"], $index, 1);
    array_splice($_SESSION["status"], $index, 1);
    array_splice($_SESSION["qty"], $index, 1);
    header("location:/as2/cart.php");
?>