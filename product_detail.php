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
        require "layout/menu.php";
        require "layout/header.php";
        require "model/product.php";
        $pro = findByProId($_GET["proId"]);
        $prosByCat = findByCatId($pro["cat_id"]);
        if ($pro["quantity"]>0){
            $block="
                <div class=\"qty qty-block\">
                    <span class=\"text\">Quantity: </span>
                    <label class=\"minus minus-none\"><i class=\"fas fa-minus\"></i></label>
                    <input id=\"pro-id\" type=\"hidden\" value=\"".$pro["id"]."\">
                    <input id=\"pro-quantity\" type=\"number\" class=\"qty-input\" value=\"1\">
                    <label class=\"plus plus-none\"><i class=\"fas fa-plus\"></i></label>
                    <span class=\"text\"><span class=\"pro-qty\">".number_format($pro["quantity"],0,",",".")."</span> items available!</span>
                </div>
                <label id=\"addToCart\" class=\"add-cart\"><i class=\"fas fa-cart-plus\"></i>Add to cart</label>    
            ";
        }
        else{
            $block="<h2 style=\"color:red\">Sold out</h2>";
        }
    ?>
    <div class="product-block">
        <img src="<?php echo $pro["image"] ?>">
        <div class="product-detail">
            <h5><?php echo $pro["name"] ?></h5>
            <div class="price"><?php echo number_format($pro["price"],0,",",".") ?>đ</div>
            <?php echo $block ?>
        </div>
    </div>

    <div class="container-fluid">
        <div class="products-block">
            <h2 class="title-products">
                Related products
            </h2>
            <div class="row">
                <?php
                    while($pro=$prosByCat->fetch_assoc()){
                        echo"
                            <div class=\"col-sm-3\">
                                <a href=\"product_detail.php?proId=".$pro["id"]."\">
                                    <div class=\"card\">
                                        <div class=\"card-head\">
                                            <img src=\"".$pro["image"]."\" class=\"card-img-top\" alt=\"...\">
                                        </div>
                                        <h6 class=\"card-title\">".$pro["name"]."</h6>
                                        <p class=\"card-text\">Price: ".number_format($pro["price"],0,",",".")."vnđ</p>
                                    </div>
                                </a>
                            </div>          
                        ";
                    }
                ?>
            </div>
        </div>

    </div>
    <?php
        require "layout/footer.php"
    ?>
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/myjs.js"></script>
    <script>
        $("#addToCart").click(function(){
            window.location.href="model/addToCart.php?proId="+$("#pro-id").val()+"&qty="+$("#pro-quantity").val();
        })
    </script>
</body>

</html>