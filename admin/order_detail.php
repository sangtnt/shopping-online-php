<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shelmark</title>
    <link href="../img/logo.png" rel="icon">
    <link rel="stylesheet" href="../css/admin.css">
    <link href="../fontawesome/css/all.min.css" rel="stylesheet">
</head>

<body>
    <?php
        require "../model/check_login_admin.php";
        require "layout/menu.php";
        require "../model/order.php";
    ?>
    <div class="order-detail">
        <?php
            $order = findOrderById($_GET["orderId"]);
            while ($row = $order->fetch_assoc()){
                $date=date_create($row["date"]);
                $total = $row["total"];
                $subtotal = $row["subtotal"];
                $shipping = $row["shipping"];
                $status = $row["status"];
                $text="";
                if ($status==0){
                    $text= "
                        <span class=\"pending\">Pending...</span> 
                        <a class='accept-btn' href=\"../model/acceptOrder.php?id=".$row["id"]."\"><button>Accept</button></a> 
                        <a href=\"../model/cancelOrder.php?id=".$row["id"]."\"><button>Cancel</button></a>
                    ";
                }
                else if($status==1){
                    $text="
                        <span class=\"accept\">Accepted</span> 
                    ";
                }
                else{
                    $text="
                        <span class=\"canceled\">Canceled</span> 
                    ";
                }
                echo"
                    <h1>Order No: #".$row["id"]." - (".date_format($date,"d/m/Y").")</h1>
                    <div>
                        <div>Name: <span>".$row["fullname"]."</span></div>
                        <div>Address: <span>".$row["address"]."</span></div>
                        <div>Phone number: <span>".$row["phone"]."</span></div>
                        <div>Status: ".$text."</div>
                    </div>
                ";
            }
        ?>
        <div class="table">
            <table>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                </tr>
                <?php
                    $orderDetails = findOrderDetails($_GET["orderId"]); 
                    while($row = $orderDetails->fetch_assoc()){
                        echo"
                            <tr class='tr'>
                                <td>".$row["name"]."</td>
                                <td>".number_format($row["price"],0,",",".")."đ</td>
                                <td class=\"qty-detail\">".number_format($row["quantity"],0,",",".")."
                                    <input type=\"hidden\" value=\"".findQtyPro($row["id"])."\">
                                </td>
                                <td>".number_format($row["subtotal"],0,",",".")."đ</td>
                            </tr>
                        ";
                    }
                ?>
                <tfoot>
                    <td colspan="4">
                        Subtotal: <span><?php echo number_format($subtotal,0,",",".") ?>đ</span><br>
                        Shipping: <span><?php echo number_format($shipping,0,",",".") ?>đ</span> <br>
                        Total: <span class="total"><?php echo number_format($total,0,",",".") ?>đ</span>
                    </td>
                </tfoot>
            </table>
        </div>
    </div>
    <script src="../js/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function(){
            var proList = $(".tr");
            var check =false;
            for (var i = 0 ;i< proList.length; i++){
                var qty = parseInt($(proList[i]).find(".qty-detail").text());
                var qty2 = parseInt($(proList[i]).find(".qty-detail").find("input").val());
                if (qty>qty2){
                    $(proList[i]).find(".qty-detail").append("<span style='color: red'>Not enough quantity! "+qty2+" available!</span>");
                    check=true;
                }
            }
            if (check==true){
                $(".accept-btn").addClass("un-selected");
            }
        })
    </script>
</body>

</html>