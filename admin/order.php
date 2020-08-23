<!DOCTYPE html>
<html lang="en">

<head>
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
    <div class="container">
        <table class="table table-order">
            <tr>
                <th>OrderNo</th>
                <th>Address</th>
                <th>Full name</th>
                <th>Phone number</th>
                <th>Date</th>
                <th>Total</th>
            </tr>

            <?php
                $orders = findAllOrder();
                while ($row = $orders->fetch_assoc()){
                    $date=date_create($row["date"]);
                    echo"
                        <tr class=\"order\">
                            <td class=\"orderId\">#".$row["id"]."</td>
                            <td>".$row["address"]."</td>
                            <td>".$row["fullname"]."</td>
                            <td>".$row["phone"]."</td>
                            <td>".date_format($date,"d/m/Y")."</td>
                            <td>".number_format($row["total"],0, ",", ".")."đ</td>
                        </tr>   
                    ";
                }
            ?>
        </table>
    </div>
    <script src="../js/jquery-3.5.1.min.js"></script>
    <script>
        $(".order").click(function(){
            var orderId = $(this).find(".orderId").text().replace("#","");
            window.location.href = "order_detail.php?orderId="+orderId;
        })
    </script>
</body>

</html>