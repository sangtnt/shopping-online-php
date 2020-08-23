<?php
    require "connect_database.php";
    $id = $_GET["id"];
    $sql = "UPDATE cus_order SET status=2 WHERE id=$id";
        $result = $conn->query($sql);
    header("location:/as2/order_list.php");
?>