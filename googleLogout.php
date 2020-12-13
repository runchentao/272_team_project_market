<?php 
    session_start();
    $_SESSION['loggedin'] = false;
    $_SESSION['googleLoggedin'] = false;
    
    session_destroy();
    header("location: home.php");
?>