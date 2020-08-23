<?php
    require "product.php";
    require "user_model.php";
    session_start();
    $userId = $_SESSION["user_id"];
    $sql = "INSERT INTO cus_order (user_id) values('$userId')";
    $conn->query($sql);
    $orderId = mysqli_insert_id($conn);
    $total = 30000;
    for ($i=0; $i<count($_SESSION["cart"]); $i++){
        $subtotal =0;
        if ($_SESSION["status"][$i]){
            $pro = findByProId($_SESSION["cart"][$i]);
            $subtotal += $pro["price"]*$_SESSION["qty"][$i]; 
            $pro_id=$pro["id"];
            $quantity = $_SESSION["qty"][$i];
            $sql = "INSERT INTO order_detail (pro_id, order_id, quantity, subtotal) values($pro_id, $orderId, $quantity, $subtotal)";
            $total +=$subtotal;
            $conn->query($sql);
        }
    }
    $newpros =$_SESSION["cart"];
    $newQty =$_SESSION["qty"];
    $newStatus = $_SESSION["status"];
    $_SESSION["cart"] =array();
    $_SESSION["qty"] =array();
    $_SESSION["status"] =array();
    for ($i=0; $i<count($newStatus); $i++){
        if (!$newStatus[$i]){
            array_push($_SESSION["cart"],$newpros[$i]);
            array_push($_SESSION["qty"],$newQty[$i]);
            array_push($_SESSION["status"], true);
        }
    }
    $sql = "UPDATE cus_order SET total=$total, subtotal=$total-30000 WHERE id = $orderId";
    $conn->query($sql);
    $orders = getOrder($_SESSION["user_id"]);
    $_SESSION["orders"]=$orders->num_rows;
    header("location:/as2/order_list.php");
?>