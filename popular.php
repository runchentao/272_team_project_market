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
        $results = array(); 
     if($result = mysqli_query($mysqli, $sql)){
        if(mysqli_num_rows($result) > 0){
            $total = mysqli_num_rows($result);
            while($row = mysqli_fetch_array($result)){ 
                $results[] = $row;
            }
        }
    }
    ?>
    
    <?php for($i = 0; $i < min(count($results), 5);$i++): ?>
    <?php $row = $results[$i]; ?>
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

                    <?php for($idx = 0; $idx < floor($row['rating']);$idx++):?>
                            <i class="fa fa-star fa-sm text-primary"></i>
                        <?php endfor;?>
                        <?php $half = $row['rating'] - floor($row['rating']); 
                        ?>
                        <?php if($half > 0 && $half < 0.5):?>
                            <i class="fa fa-star-o fa-sm text-primary"></i>
                        <?php else: ?>
                            <?php if($half != 0):?>
                            <i class="fa fa-star-half-o fa-sm text-primary"></i>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php $missing = 5 - ceil($row['rating']); ?>
                        <?php for($idx = 0; $idx < $missing; $idx++): ?>
                            <i class="fa fa-star-o fa-sm text-primary"></i>
                        <?php endfor; ?>
                        <span><?php echo round($row['rating'],1); ?></span>


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
    <?php endfor; ?>
</div>
<?php include('includes/footer.php');?>
