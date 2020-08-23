<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shemark</title>
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
        require "model/category.php";
        $prosByCat = findByCatId($_GET["catId"]);
        $cat = findCatById($_GET["catId"]);
    ?>
    <div class="container-fluid">
        <div class="products-block">
            <h2 class="title-products"><?php echo $cat["name"] ?></h2>
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
        require "layout/footer.php";
    ?>
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/myjs.js"></script>
</body>

</html>