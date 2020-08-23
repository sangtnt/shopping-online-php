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

<body class="index-body">
    <?php
        require "../model/check_login_admin.php";
        require "layout/menu.php";
    ?>
    <div class="notice-container">
        <div class="notice">
            <h1>Warning!<i class="fas fa-exclamation-triangle"></i></h1>
            <p>Now, you are in ADMIN area, all operations must be carried out with caution!</p>
        </div>
    </div>
</body>

</html>