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
        $orders = getOrder($_SESSION["user_id"]);
    ?>
    <div class="cart-block">
        <?php
            while($order = $orders->fetch_assoc()){
                $date=date_create($order["date"]);
                $status ="";
                if ($order["status"]==0){
                    $status="
                        <span style=\"color:blue\">Pendding...</span> 
                        <a href=\"model/cancelOrderUser.php?id=".$order["orderId"]."\"><button>Cancel</button></a>
                    ";
                }
                else if($order["status"]==1){
                    $status="
                        <span style=\"color: green\">Accepted</span>
                    ";
                }
                else{
                    $status="
                        <span style=\"color: red\">Canceled</span>
                    ";
                }
                echo "
                    <div class=\"order-container\">
                        <div class=\"cart-info\">
                            <div class=\"order-info\">
                                <div>Order No: <span>#".$order["orderId"]."</span></div>
                                <div>Date: <span>".date_format($date,"d/m/Y H:i:s")."</span></div>
                            </div>
                            <div class=\"status\">Status: <span>".$status."</span></div>
                        </div>
                        <div class=\"cart-info\">
                            <div>
                                <div class=\"address\"><i class=\"fas fa-map-marker-alt\"></i>Address</div>
                                <div class=\"user-name\">".$order["fullname"]." (".$order["phone"].")</div>
                            </div>
                            <div>
                                ".$order["address"]."
                            </div>
                        </div>
                        <div class=\"cart-header\">
                            <span class=\"product\">Product</span>
                            <span class=\"price\">Price</span>
                            <span class=\"quantity\">Quantity</span>
                            <span class=\"total-price\">Total</span>
                        </div>
                        <div class=\"cart-item\">
                            <span class=\"product\">
                                <img src=\"".$order["image"]."\" width=\"100px\"> ".$order["proName"]."
                            </span>
                            <span class=\"price\">".number_format($order["proPrice"], 0, ",", ".")."đ</span>
                            <span class=\"quantity\">
                                <div class=\"qty-2 qty-block\">
                                    ".$order["quantity"]."
                                </div>
                            </span>
                            <span class=\"total-price\">".number_format($order["subtotal"],0,",", ".")."đ</span>
                        </div>
                        <div class=\"cart-total-order\">
                            <table>
                                <tr>
                                    <td>Subtotal:</td>
                                    <td class=\"total-all-pro\">".number_format($order["orderSubtotal"],0,",",".")."đ</td>
                                </tr>
                                <tr>
                                    <td>Delivery fee:</td>
                                    <td class=\"shipping\">".number_format($order["shipping"],0,",",".")."đ</td>
                                </tr>
                                <tr>
                                    <td>Total:</td>
                                    <td class=\"total-order\">".number_format($order["orderTotal"],0,",",".")."đ</td>
                                </tr>
                            </table>
                            <div class=\"hr-dot\"></div>
                        </div>
                    </div>
            ";
            }
        ?>
    </div>
    <?php
        require "layout/footer.php";
    ?>
</body>

</html>