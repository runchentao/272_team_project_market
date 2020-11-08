<?php
    session_start();
    $username=$_POST['inputUser'];
    $password=$_POST['inputPassword'];
    $firstName=$_POST['inputFirstName']; 
    $lastName=$_POST['inputLastName']; 
    $email=$_POST['inputEmail']; 
    $cellPhone=$_POST['inputCellphone'];
    //echo $username. " ". $password. " ". $firstName. " ". $lastName. " ". $email. " ". $cellPhone;

    $host = "us-cdbr-east-02.cleardb.com";
    $db_username = "b0d767ef5f5387";
    $db_password = "ac3d97ea";
    $db_name = "heroku_f56e864c8482ef5";

    //Create connection
    $mysqli = new mysqli($host, $db_username, $db_password, $db_name);

    if ($mysqli->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
   
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

    $sql = "INSERT INTO users (Username, Passwd, FirstName, LastName, EmailAddress, CellPhone)
    VALUES ('$username', '$password', '$firstName', '$lastName', '$email', '$cellPhone')";

    if ($mysqli->query($sql) === TRUE) {
        echo "successful";
        $_SESSION['add_user'] = true;
        $_SESSION['username'] = $username;
        header("location: signin.php");
    } else {
        $_SESSION['add_user'] = false;
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    
    $conn->close();
?>