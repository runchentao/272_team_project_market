<?php
    require_once('utils/dbConn.php');
    session_start();
    $username=$_POST['inputUser']; 
    $password=$_POST['inputPassword']; 
    //echo $username. " ". $password;

    $sql = "SELECT * FROM users WHERE Username='$username' AND Passwd='$password'";
    
    $result = mysqli_query($mysqli, $sql); 
    $rows = mysqli_num_rows($result);
    if($rows==1){
        //echo "successful";
        $row = mysqli_fetch_array($result);
        $_SESSION['loggedin'] = true;
        $_SESSION['user'] = $row;
        header("location: home.php");
    }else{
        echo "<script>
                alert('Username or Password is incorrect!');
                window.location.href='signin.php';
            </script>";
    }
    $conn->close();
?>
   
