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
    <form action="model/register.php" method="post">
        <div class="login-box">
            <?php
                if (isset($_GET["message"])){
                    echo"
                        <h3 style=\"color: red\">".$_GET["message"]."</h3>
                    ";
                }
            ?>
            <img class="logo" src="img/logo.png">
            <div class="form-group">
                <input name="username" class="form-input" type="text" placeholder="Username" required>
            </div>
            <div class="form-group">
                <input name="password" class="form-input" type="password" placeholder="Password" required>
            </div>
            <div class="form-group">
                <input name="address" class="form-input" type="text" placeholder="Address" required>
            </div>
            <div class="form-group">
                <input name="phone" class="form-input" type="text" placeholder="Phone" required>
            </div>
            <div class="form-group">
                <input name="fullname" class="form-input" type="text" placeholder="Fullname" required>
            </div>
            <div class="hr"></div>
            <button class="btn">Register</button>
            <div class="register">
                <a href="login.php">You already have account? Login</a>
            </div>
        </div>
    </form>
</body>
</html>