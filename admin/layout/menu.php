<div class="menu">
    <div><a href="category.php">Category</a></div>
    <div><a href="product.php">Product</a></div>
    <div style="border:none"><a href="order.php">Order</a></div>
    <div><i class="fas fa-user"></i>
        <a href="/as2/profile.php"><?php echo $_SESSION["fullname"] ?></a>
        <span style="border-left:1px solid white; padding-left: 20px; margin-left: 10px"><a href="/as2/model/logout.php">Logout</a></span>
    </div>
</div>