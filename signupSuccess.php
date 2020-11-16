<?php
    require_once('utils/dbConn.php');
    session_start();
    $username=$_POST['inputUser'];
    $password=$_POST['inputPassword'];
    $firstName=$_POST['inputFirstName']; 
    $lastName=$_POST['inputLastName']; 
    $email=$_POST['inputEmail']; 
    $cellPhone=$_POST['inputCellphone'];
    //echo $username. " ". $password. " ". $firstName. " ". $lastName. " ". $email. " ". $cellPhone;

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