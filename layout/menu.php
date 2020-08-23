<div style="height: 41px;"></div>
<div class="menu">
    <div><a href="index.php">Home</a></div>
    <div><a href="#footer">Contact</a></div>
    <?php
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION["user"])){
            if (!$_SESSION["user"]){
                echo"
                    <div><a href=\"register.php\">Register</a></div>
                    <div><a href=\"login.php\">Login</a></div>
                ";
            }
            else{
                echo"
                    <div class=\"user\">
                        <div class=\"user-header\"><i class=\"fas fa-user\"></i>".$_SESSION["fullname"]."</div>
                        <div class=\"user-box\">
                            <div><a href=\"profile.php\">Profile</a></div>
                            <div><a href=\"change_password.php\">Change password</a></div>
                            <div><a href=\"model/logout.php\">Logout</a></div>
                        </div>
                    </div>
                ";
            }
        }
        else{
            echo"
                <div><a href=\"register.php\">Register</a></div>
                <div><a href=\"login.php\">Login</a></div>
            ";
        }
    ?>
</div>