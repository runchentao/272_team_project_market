<?php
    require_once('utils/dbConn.php');
    session_start();
    $userID=$_SESSION['user'][0];
    $review=$_POST['review'];
    $productID=$_GET['id'];
    $rating=4;
    $time = date('Y-d-m H:i:s',time());
    echo '<p>'.$userID.'</p>';
    echo '<p>'.$review.'</p>';
    echo '<p>'.$productID.'</p>';
    echo '<p>'.$rating.'</p>';
    echo '<p>'.$time.'</p>';
    
    $sql = "INSERT INTO Review (userId, productId, score, content, CreatedAt)
    VALUES ('$userID', '$productID', '$rating', '$review', NOW())";

    if ($mysqli->query($sql) === TRUE) {
        echo "successful";
        header("location: product.php?id=".$productID.".php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    
    $conn->close();
?>