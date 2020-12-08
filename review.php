<?php
    require_once('utils/dbConn.php');
    session_start();
    $userID=$_SESSION['user'][0];
    $userName=$_SESSION['user']['Username'];
    $review=$_POST['review'];
    $productID=$_GET['id'];
    $rating=$_POST['score'];
    $time = date('Y-d-m H:i:s',time());
    echo '<p>'.$userID.'</p>';
    echo '<p>'.$review.'</p>';
    echo '<p>'.$productID.'</p>';
    echo '<p>'.$rating.'</p>';
    echo '<p>'.$time.'</p>';
    
    $getReviewCount = "select * from Review where productId = '$productID'";
    $reviews = mysqli_query($mysqli, $getReviewCount);
    $reviewCount = mysqli_num_rows($reviews);
    $getScore = "select rating from Product where id='$productID'";
    $score_result = mysqli_query($mysqli, $getScore);
    $score = mysqli_fetch_array($score_result)[0];
    if ($score == NULL) {
        $score = 0;
    }
    $updatedScore = ($score * $reviewCount + $rating) / ($reviewCount + 1);
    echo $updatedScore;
    $sql = "INSERT INTO Review (userId, productId, score, content, username, CreatedAt)
    VALUES ('$userID', '$productID', '$rating', '$review','$userName',NOW())";
    if ($mysqli->query($sql) === TRUE) {   
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }
    $updateProduct = "update Product set rating='$updatedScore' where id='$productID'";
    $mysqli->query($updateProduct);
    header("location: product.php?id=".$productID.".php");
    $mysqli->close();
?>