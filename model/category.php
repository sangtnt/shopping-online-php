<?php
    require "connect_database.php";

    function findAllCategory(){
        global $conn;
        $sql = "SELECT * FROM category";
        $result = $conn->query($sql);
        return $result;
    }
    function findCatById($id){
        global $conn;
        $sql = "SELECT * FROM category WHERE id=$id";
        $result = $conn->query($sql);
        if($row = $result->fetch_assoc()){
            return $row;
        }
        else{
            header("location: 404.html");
        }
    }
?>