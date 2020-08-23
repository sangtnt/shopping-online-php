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
        require "model/category.php";
        $latestPros = findLatestPros();
        $cats = findAllCategory();
        $bestSeller = findBestSeller();
    ?>
    <div class="banner">
        <div class="categories">
            <div class="header-cat">Categories<i class="fas fa-caret-down"></i></div>
            <div class="body-cat">
                <?php
                    while($cat = $cats->fetch_assoc()){
                        echo "
                            <div><a href=\"proByCat.php?catId=".$cat["id"]."\">".$cat["name"]."</a></div>
                        ";
                    }
                ?>
            </div>
        </div>
        <div class="banner-image">
            <img class="sale1" src="img/Sale-Transparent-Images-PNG.png">
            <img class="sale2" src="img/Sale-PNG-Transparent-HD-Photo.png">
            <div class="text"><span>BIG SALES</span> today<span><i class="fas fa-exclamation"></i></span></div>
            <div class="btn">Shop now</div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="products-block">
            <h2 class="title-products">
                <img height="50px" src="img/c338c3_a71d72719cdb46f1adfbdd414f524d8f_mv2.gif">
                Latest Products
                <img height="50px" src="img/c338c3_a71d72719cdb46f1adfbdd414f524d8f_mv2.gif">
            </h2>
            <div class="row">
                <?php
                    while($pro=$latestPros->fetch_assoc()){
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
        <div class="products-block">
            <h2 class="title-products">
                Best Sellers
            </h2>
            <div class="row">
                <?php
                    while($pro=$bestSeller->fetch_assoc()){
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
</body>

</html>