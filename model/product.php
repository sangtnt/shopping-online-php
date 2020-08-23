<?php
    require "connect_database.php";
    function findAllPro(){
        global $conn;
        $sql = "SELECT * FROM product";
        $result = $conn->query($sql);
        return $result;
    }
    function findLatestPros(){
        global $conn;
        $sql = "SELECT * FROM product WHERE status=true ORDER BY modify_date desc LIMIT 8";
        $result = $conn->query($sql);
        return $result;
    }
    function findBestSeller(){
        global $conn;
        $sql = "SELECT * FROM product WHERE status=true ORDER BY pro_sold desc LIMIT 8";
        $result = $conn->query($sql);
        return $result;
    }

    function findByCatId($catId){
        global $conn;
        $sql = "SELECT * FROM product  WHERE cat_id=$catId AND status=true ORDER BY modify_date desc";
        $result = $conn->query($sql);
        return $result;
    }
    function findByProId($id){
        global $conn;
        $sql = "SELECT * FROM product WHERE id=$id";
        $result = $conn->query($sql);
        if($row = $result->fetch_assoc()){
            return $row;
        }
        else{
            header("location: 404.html");
        }
    }
?>