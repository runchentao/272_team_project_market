<?php 
    global $mysqli;
    $host = "us-cdbr-east-02.cleardb.com";
    $db_username = "b0d767ef5f5387";
    $db_password = "ac3d97ea";
    $db_name = "heroku_f56e864c8482ef5";

    //Create connection
    $mysqli = mysqli_connect($host, $db_username, $db_password, $db_name);

    if ($mysqli->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
   
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
?>