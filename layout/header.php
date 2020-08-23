<div class="header-custom">
    <img src="img/logo2.png" alt="logo">
    <div class="search-box">
    </div>
    <div class="orders"><a href="order_list.php"><i class="fas fa-file-invoice-dollar"></i> <span>
        <?php
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            if (isset($_SESSION["orders"])){
                echo $_SESSION["orders"];
            }
            else{
                echo "0";
            }
        ?>
    </span></a></div>
    <div class="shopping-cart"><a href="cart.php"><i class="fas fa-cart-plus"></i> <span>
        <?php
            if (isset($_SESSION["cart"])){
                echo count($_SESSION["cart"]);
            }
            else{
                echo "0";
            }
        ?>
    </span></a></div>
</div>