<?php
    require "connect_database.php";
    global $conn;
    $id = $_POST["id"];
    $name = $_POST["name"];
    $price = $_POST["price"];
    $qty = $_POST["qty"];
    $des = $_POST["des"];
    $dis = $_POST["dis"];
    $cat = $_POST["cat"];
    if (basename($_FILES["file"]["name"])==""){
        $sql = "UPDATE product SET name='$name', price=$price, quantity=$qty, description='$des', discount=$dis, cat_id=$cat, modify_date=NOW() WHERE id=$id";
        $result = $conn->query($sql);
        header("location:/as2/admin/product.php");
    }
    else{
        $target_dir = "../img/product/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["file"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
        
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            $file_dir = "img/product/".$_FILES["file"]["name"];
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                $sql = "UPDATE product SET name='$name', price=$price, quantity=$qty, description='$des', discount=$dis, cat_id=$cat, image='$file_dir', modify_date=NOW() WHERE id=$id";
                $result = $conn->query($sql);
                echo "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";
                header("location:/as2/admin/product.php");
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }   
    }
?>