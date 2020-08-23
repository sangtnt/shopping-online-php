<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shelmark</title>
    <link href="img/logo.png" rel="icon">
    <link href="css/mystyle.css" rel="stylesheet">
    <link href="fontawesome/css/all.min.css" rel="stylesheet">
</head>

<body class="login-body">
    <form action="model/login.php" method="post">
        <div class="login-box">
            <?php
                if (isset($_GET["message"])){
                    echo"<h3 style=\"color:red\">".$_GET["message"]."</h3>";
                }
            ?>
            <img class="logo" src="img/logo.png">
            <div class="form-group">
                <input name="username" class="form-input" type="text" placeholder="Username">
            </div>
            <div class="form-group">
                <input name="password" class="form-input" type="password" placeholder="Password">
            </div>
            <div class="hr"></div>
            <button class="btn">Login</button>
            <div class="register">
                <a href="register.php">You haven't had account! Register</a>
            </div>
        </div>
    </form>
</body>

</html>