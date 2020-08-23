<?php
    require "connect_database.php";

    function findUserById($id){
        global $conn;
        $sql = "SELECT * FROM user WHERE id='$id'";
        $result = $conn->query($sql);
        if ($row = $result->fetch_assoc()){
            return $row;
        }
    }

    function insertUser($username, $fullname, $address, $phone, $password){
        global $conn;
        $id = md5(time().mt_rand(1,100000000));
        $sql = "INSERT INTO user (id, username, fullname, address, phone, password) values ('$id','$username', '$fullname', '$address', '$phone', '$password')";
        $conn->query($sql);
        $sql = "INSERT INTO user_role (user_id, role_id) values ('$id', 2)";
        $conn->query($sql);
    }

    function findUserByUsername($username){
        global $conn;
        $sql = "SELECT * FROM user WHERE username='$username'";
        $result = $conn->query($sql);
        return $result;
    }
    function checkUser($username, $password){
        global $conn;
        $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
        $result = $conn->query($sql);
        if ($result->num_rows>0){
            return $result;
        }
        else{
            return false;
        }
    }
    function checkAdmin($user_id){
        global $conn;
        $sql = "SELECT * FROM user_role WHERE user_id='$user_id' AND role_id=1";
        $result = $conn->query($sql);
        if ($result->num_rows>0){
            return true;
        }
        else{
            return false; 
        }
    }
    function checkUserRole($user_id){
        global $conn;
        $sql = "SELECT * FROM user_role WHERE user_id='$user_id' AND role_id=2";
        $result = $conn->query($sql);
        if ($result->num_rows>0){
            return true;
        }
        else{
            return false; 
        }
    }
    function getOrder($user_id){
        global $conn;
        $sql = "SELECT user.fullname, user.address, user.phone,cus_order.date, cus_order.id as orderId, product.name as proName, product.image ,product.price as proPrice, order_detail.quantity, order_detail.subtotal,cus_order.status ,cus_order.subtotal as orderSubtotal, cus_order.total as orderTotal, cus_order.shipping FROM cus_order join user on cus_order.user_id=user.id join order_detail on cus_order.id=order_detail.order_id join product on order_detail.pro_id=product.id WHERE user_id='$user_id' ORDER BY cus_order.date DESC";
        $result = $conn->query($sql);
        return $result;
    }
?>