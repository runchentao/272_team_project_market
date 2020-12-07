<?php
session_start();
require_once('utils/dbConn.php');
?>
<?php include('includes/head.php');?>
<?php include('includes/header.php');?>
<Link rel="stylesheet" href="css/popular.css">
<div class="row mb-2" style="padding-top:50px; margin: auto; width: 90%;">
    <?php 
    $sql = "SELECT * FROM Product ORDER BY rating DESC";
    if($result = mysqli_query($mysqli, $sql)){
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){ 
                ?>
    <div class="col">
        <!-- product -->
        <div id="product-card" class="row no-gutters border rounded flex-md-row mb-4 shadow-sm h-md-250">

            <div class="col-auto d-none d-lg-block">
                <div class="bd-placeholder-img">
                    <?php echo '<img id="productImg" src="'.$row["productImg"].'"/>'; ?>
                </div>
            </div>
            <div class="col-md-7 col-sm-12 col-xs-12">
                <div class="product-deatil">
                    <h5 class="name">
                        <?php echo $row["productName"] ?>
                    </h5>
                    <p class="price-container">
                    <h6>Price: $<?php echo $row["price"] ?></h6>
                    </p>
                </div>

                <div class="rating-counter-container">
                    <h6>Ratings:

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

                    </h6>
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
    <?php 
        } 
    }?>
</div>
<?php include('includes/footer.php');?>
<?php }?>