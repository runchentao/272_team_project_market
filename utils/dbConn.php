<?php 
    global $mysqli;
    $host = "blonze2d5mrbmcgf.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
    $db_username = "hprl9qbvszejfo36";
    $db_password = "vqc6ayrzx8ibuzb7";
    $db_name = "zjcag0s2vznyd8it";

    //Create connection
    $mysqli = mysqli_connect($host, $db_username, $db_password, $db_name);

    if ($mysqli->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
   
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
?>