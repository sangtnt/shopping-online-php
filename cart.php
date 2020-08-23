<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shelmark</title>
    <link href="img/logo.png" rel="icon">
    <link href="css/mystyle.css" rel="stylesheet">
    <link href="fontawesome/css/all.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php
        require "model/check_login_user.php";
        require "layout/menu.php";
        require "layout/header.php";
        require "model/product.php";
        $pros = array();
        if (isset($_SESSION["cart"])){
            for ($i=0; $i<count($_SESSION["cart"]); $i++){
                $pro = findByProId($_SESSION["cart"][$i]); 
                array_push($pros, $pro);
            }
        }
        function calculateStatus(){
            $t=0;
            for ($i=0; $i<count($_SESSION["status"]); $i++){
                if($_SESSION["status"][$i]){
                    $t++;
                }
            }
            return $t;
        }
    ?>
    <input class="check-order" type="hidden" value="<?php echo calculateStatus() ?>">
    <div class="cart-block">
        <div class="cart-header">
            <?php
                $check ="";
                if (isset($_SESSION["allStatus"])){
                    if ($_SESSION["allStatus"]==true){
                        $check="checked";
                    }
                }
                if (count($pros)==0){
                    echo"You haven't added any product to cart!";
                }
                else{
                    echo"
                        <span><input id=\"check-all\" type=\"checkbox\" <?php echo $check ?></span>
                        <span class=\"product\">Product</span>
                        <span class=\"price\">Price</span>
                        <span class=\"quantity\">Quantity</span>
                        <span class=\"total-price\">Total</span>
                        <span>Action</span>
                    ";
                }
            ?>
        </div>
        <?php 
            for ($i=0; $i<count($pros); $i++){
                $check ="";
                if ($_SESSION["status"][$i]){
                    $check ="checked";
                }
                echo"
                    <div class=\"cart-item\">
                        <span><input class=\"check-item\" value=\"$i\" type=\"checkbox\" $check></span>
                        <span class=\"product\">
                            <img src=\"".$pros[$i]["image"]."\" width=\"100px\"> ".$pro["name"]."
                        </span>
                        <span class=\"price\">".number_format($pros[$i]["price"],0,",",".")."đ</span>
                        <span class=\"quantity\">
                            <div class=\"qty-2 qty-block\">
                                <input class=\"index-pro\" type=\"hidden\" value=\"$i\">
                                <label class=\"minus minus-have\"><i class=\"fas fa-minus\"></i></label>
                                <input type=\"number\" class=\"qty-input qty-input-have\" value=\"".$_SESSION["qty"][$i]."\">
                                <label class=\"plus plus-have\"><i class=\"fas fa-plus\"></i></label>
                                <span class=\"text\"><span class=\"pro-qty\">100</span> sản phẩm có sẵn</span>
                            </div>
                        </span>
                        <span class=\"total-price\">100.000đ</span>
                        <span class=\"action\"><a href=\"model/deleteCart.php?index=$i\"><i class=\"far fa-trash-alt\"></i></a></span>
                    </div>
                ";
            }
        ?>
        <div class="checkout">
            Total (<span class="total-qty">0</span> products): <span class="order-total">0</span>đ
           <label class="let-checkout"><i class="fas fa-shopping-bag"></i>Buy</label>
        </div>
    </div>
    <?php
        require "layout/footer.php"
    ?>
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/myjs.js"></script>
</body>

</html>