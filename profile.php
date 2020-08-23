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

<body>
    <?php
        require "model/check_login.php";
        session_start();
        $user = findUserById($_SESSION["user_id"]);
        if(!isset($_SESSION["back"])){
            $_SESSION["back"]=$_SERVER['HTTP_REFERER'];
        }
    ?>
    <div class="profile-body">
        <div class="profile">
            <div class="image"><img height="300px" width="300px" src="<?php echo $user["image"] ?>"></div>
            <form method="post" action="model/editUser.php">
                <div class="info">
                    <div><span>User name:</span> <input name="username" class="profile-change" type="text"
                            value="<?php echo $user["username"] ?>"></div>
                    <div><span>Full Name:</span> <input name="fullname" class="profile-change" type="text"
                            value="<?php echo $user["fullname"] ?>"></div>
                    <div><span>Phone:</span> <input name="phone" class="profile-change" type="text"
                            value="<?php echo $user["phone"] ?>"></div>
                    <div><span>Address:</span> <textarea name="address" class="profile-change"
                            type="text"><?php echo $user["address"] ?></textarea></div>
                    <div><span></span>
                        <div><button type="submit" class="edit-profile un-selected">Edit</button></div>
                    </div>
                </div>
            </form>
        </div>
        <div class="back-btn"><a href="model/back.php">Back</a></div>
    </div>
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/myjs.js"></script>
</body>

</html>