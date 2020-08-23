<?php
    session_start();
    if (isset($_SESSION["back"])){
        header('Location: ' . $_SESSION["back"]);
        unset($_SESSION["back"]);
    }
    else{
        header('Location:/as2/index.php');
    }
?>