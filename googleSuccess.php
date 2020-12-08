<?php 
    session_start();
    $_SESSION['loggedin'] = true;
    header("location: home.php");
?>