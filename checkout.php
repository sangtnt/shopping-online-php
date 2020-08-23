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
        $user = findUserById($_SESSION["user_id"]);
        $pros = array();
        if (isset($_SESSION["cart"])){
            for ($i=0; $i<count($_SESSION["cart"]); $i++){
                $pro = findByProId($_SESSION["cart"][$i]); 
                array_push($pros, $pro);
            }
        }
    ?>
    <div class="cart-block">
        <div class="cart-info">
           <div>
               <div class="address"><i class="fas fa-map-marker-alt"></i>Address</div>
               <div class="user-name"><?php echo $user["fullname"]." (".$user["phone"].")" ?></div>
           </div>
           <div>
                <?php echo $user["address"] ?>
           </div>
        </div>
        <div class="cart-header">
            <span class="product">Product</span>
            <span class="price">Price</span>
            <span class="quantity">Quantity</span>
            <span class="total-price">Total</span>
        </div>
        <?php 
            for ($i=0; $i<count($pros); $i++){
                if ($_SESSION["status"][$i]){
                    echo"
                        <div class=\"cart-item\">
                            <span class=\"product\">
                                <img src=\"".$pros[$i]["image"]."\" width=\"100px\"> ".$pro["name"]."
                            </span>
                            <span class=\"price\">".number_format($pros[$i]["price"],0,",",".")."đ</span>
                            <span class=\"quantity\">
                                <div class=\"qty-2 qty-block\">".
                                    $_SESSION["qty"][$i]
                                ."<input type=\"hidden\" class=\"qty-input\" value=\"".$_SESSION["qty"][$i]."\">
                                </div>
                            </span>
                            <span class=\"total-price\">100.000đ</span>
                        </div>
                    ";
                }
            }
        ?>
        <div class="cart-total-order">
            <table>
                <tr>
                    <td>Subtotal:</td>
                    <td class="total-all-pro">0đ</td>
                </tr>
                <tr>
                    <td>Delivery fee:</td>
                    <td class="shipping">30.000đ</td>
                </tr>
                <tr>
                    <td>Total:</td>
                    <td class="total-order">0đ</td>
                </tr>
            </table>
            <div class="hr-dot"></div>
            <a href="model/checkout.php"><label class="checkout-btn"><i class="fas fa-shopping-bag"></i>Checkout</label></a>
        </div>
    </div>
    <?php
        require "layout/footer.php";
    ?>
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/myjs.js"></script>
</body>

</html>