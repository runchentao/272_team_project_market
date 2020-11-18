<?php
session_start();
require_once('utils/dbConn.php');
?>
<?php include('includes/head.php');?>
<?php include('includes/header.php');?>
<div class="row mb-2" style="padding-top:50px; margin: auto; width: 90%;">
    <?php 
    $sql = "SELECT * FROM Product ORDER BY rating DESC";
    if($result = mysqli_query($mysqli, $sql)){
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){ 
                ?>
    <div class="col-md-6">
        <!-- product -->
        <div
            class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="row">
                <div class="col-auto d-none d-lg-block">
                    <svg class="bd-placeholder-img" width="170" height="170" xmlns="http://www.w3.org/2000/svg"
                        preserveAspectRatio="xMidYMid slice" focusable="false" role="img"
                        aria-label="Placeholder: Thumbnail">
                        <?php echo '<image width="300" height="250" xlink:href="'.$row["productImg"].'"/>'; ?>
                    </svg>
                </div>
                <div class="col-md-7 col-sm-12 col-xs-12">
                    <div class="product-deatil">
                        <h5 class="name">
                            <a href="#">
                                <?php echo $row["productName"] ?>
                            </a>
                        </h5>
                        <p class="price-container">
                            <span>$<?php echo $row["price"] ?></span>
                        </p>
                        <span class="tag1"></span>
                    </div>
                    <div class="rating-counter-container">
                    <div class="rating mb-0"> 
                        <ul class="rating mb-0">
                            <?php 
                            $idx = 0;
                            for($idx = 0; $idx < $row['rating'];$idx++) { ?>
                                <i class="fa fa-star fa-sm text-primary"></i>
                            <?php } 
                            $missing = 5 - $idx;
                            for($idx = 0; $idx < $missing; $idx++) { ?>
                                <i class="fa fa-star-o fa-sm text-primary"></i>
                            <?php } 
                            ?>
                        </ul>
                    </div>
                    </div>
                    <div class="product-info smart-form">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <?php echo '<a href="product.php?id='.$row['id'].'" class="btn btn-success">Read More</a>'; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
        } 
    }?>
</div>
<?php include('includes/footer.php');?>
<?php }?>
