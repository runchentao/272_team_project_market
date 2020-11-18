<?php
    require_once('utils/dbConn.php');
    session_start();
    if(isset($_POST["company-post"])){
        $userId = $_POST["userId"];
        $activity = $_POST["browseActivies"];
        $company = $_POST["company"];
        // setcookie("browseActivies", $activity, time()+3600*24*30, '/');
    }
    // print_r($activity);
    // echo $userId;
    // $arr = json_decode($activity);

    $sql = "SELECT * FROM users WHERE id='$userId'";
    
    $result = mysqli_query($mysqli, $sql); 
    $rows = mysqli_num_rows($result);
    if($rows==1){
        $row = mysqli_fetch_array($result);
        if($row['ViewHistory'] == null){
            $sql = "UPDATE users SET ViewHistory='$activity' WHERE id='$userId'";
            $result = mysqli_query($mysqli, $sql); 
        }else{
            $arr = json_decode($row['ViewHistory']);
            array_push($arr, $activity);    
            $sql = "UPDATE users SET ViewHistory='$activity' WHERE id='$userId'";
            $result = mysqli_query($mysqli, $sql); 
        }
        header("location: history.php");
    }else{
        echo "cannot find this record";
    }
    $conn->close();
?>
