<?php
    require "connect_database.php";
    function minusProduct($id, $qty, $conn){
        $sql = "UPDATE product SET quantity=quantity-$qty, pro_sold=pro_sold+$qty WHERE id=$id";
        $conn->query($sql);
    }
    $id = $_GET["id"];
    $sql = "UPDATE cus_order SET status=1 WHERE id=$id";
    $conn->query($sql);
    $sql = "SELECT order_detail.quantity, pro_id FROM order_detail WHERE order_id = $id";
    $result = $conn->query($sql);
    while($row =$result->fetch_assoc()){
        minusProduct($row["pro_id"], $row["quantity"], $conn);
    }
    header("location:/as2/admin/order_detail.php?orderId=$id");
?>