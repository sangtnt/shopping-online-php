<?php
    session_start();
    $i = $_GET["index"];
    $qty = $_GET["qty"];
    $_SESSION["qty"][$i]=$qty;
    header("location:/as2/cart.php");
?>