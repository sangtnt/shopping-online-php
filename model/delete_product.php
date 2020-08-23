<?php
    require "connect_database.php";
    $id = $_GET["proId"];
    $sql = "SELECT * FROM order_detail WHERE pro_id =$id";
    $result = $conn->query($sql);
    while ($row=$result->fetch_assoc()){
        $orderId=$row["order_id"];
        $sql = "DELETE * FROM order_detail WHERE order_id =$orderId";
        $conn->query($sql);
        $sql = "DELETE FROM cus_order WHERE id =$orderId";
        $conn->query($sql);
    }
    $sql = "DELETE FROM product WHERE id =$id";
    $result = $conn->query($sql);
    header("location:../admin/product.php");
?>