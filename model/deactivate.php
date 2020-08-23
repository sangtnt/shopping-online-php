<?php
    require "connect_database.php";
    $id = $_GET["proId"];
    $sql = "UPDATE product SET status=false WHERE id=$id";
    $conn->query($sql);
    header("location: /as2/admin/product.php");
?>