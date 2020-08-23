<?php
    require "connect_database.php";
    $id = $_GET["proId"];
    $sql = "UPDATE product SET status=true WHERE id=$id";
    $conn->query($sql);
    header("location: /as2/admin/product.php");
?>