<?php
    require "connect_database.php";

    function findAllOrder(){
        global $conn;
        $sql = "SELECT cus_order.id, cus_order.date, cus_order.total, user.fullname, user.address, user.phone FROM cus_order join user on cus_order.user_id=user.id ORDER BY date DESC";
        $result = $conn->query($sql);
        return $result;
    }

    function findOrderById($id){
        global $conn;
        $sql = "SELECT cus_order.status,cus_order.id, cus_order.date, cus_order.total, user.fullname, user.address, user.phone, cus_order.subtotal, cus_order.shipping FROM cus_order join user on cus_order.user_id=user.id WHERE cus_order.id = $id ORDER BY date DESC";
        $result = $conn->query($sql);
        return $result;
    }
    function findQtyPro($id){
        global $conn;
        $sql = "SELECT product.quantity FROM product WHERE id = $id";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()){
            return $row["quantity"];
        }
    }
    function findOrderDetails($id){
        global $conn;
        $sql = "SELECT product.name, product.price, order_detail.quantity, order_detail.subtotal, product.id FROM order_detail join product on pro_id=product.id WHERE order_id = $id";
        $result = $conn->query($sql);
        return $result;
    }
?>