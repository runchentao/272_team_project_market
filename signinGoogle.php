<?php
    require_once('utils/dbConn.php');
    session_start();
    
    $_SESSION['googleLoggedin'] = true;
    $_SESSION['loggedin'] = true;
    
    header("location: home.php");

    $conn->close();
?>