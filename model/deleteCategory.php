<?php
    require "connect_database.php";
    $id = $_GET["catId"];
    global $conn;
    $sql = "SELECT * FROM product WHERE cat_id =$id";
    $pros = $conn->query($sql);
    while ($pro = $pros->fetch_assoc()){
        $proId= $pro["id"];
        $sql = "SELECT * FROM order_detail WHERE pro_id =$proId";
        $result = $conn->query($sql);
        while ($row=$result->fetch_assoc()){
            $orderId=$row["order_id"];
            $sql = "DELETE * FROM order_detail WHERE order_id =$orderId";
            $conn->query($sql);
            $sql = "DELETE FROM cus_order WHERE id =$orderId";
            $conn->query($sql);
        }
    }
    $sql = "DELETE FROM product WHERE cat_id =$id";
    $conn->query($sql);
    $sql = "DELETE FROM category WHERE id =$id";
    $conn->query($sql);
    header("location:../admin/category.php");
?>