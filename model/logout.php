<?php
    session_start();
    session_unset();
    header("location: /as2/login.php");
?>