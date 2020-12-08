<?php
session_start();
// $header = array(
//     'Accept: application/json',
// );
// $curl = curl_init();
// //  $url = "https://reneechen108.website/indivialProject/user.php";
// $url = "https://reneechen108.website/indivialProject/productJSON.php";
// // get url
// curl_setopt($curl, CURLOPT_URL, $url);
// curl_setopt($curl, CURLOPT_HEADER, 0);
// curl_setopt($curl, CURLOPT_TIMEOUT, 50);
// curl_setopt($curl, CURLOPT_HTTPHEADER, $header);


// curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
// curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
// curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

// $data = curl_exec($curl);   
// if (curl_error($curl)) {
//     print "Error: " . curl_error($curl);
// }else {
//     $product = json_decode($data);
//     //var_dump($product);
//     $_SESSION['products'] = $product;
// }
require_once('utils/dbConn.php');
?>
<?php include('includes/head.php');?>
<?php include('includes/header.php');?>
<div class="row mb-2" style="padding-top:50px; margin: auto; width: 90%;">
    <?php 
    $sql = "SELECT * FROM Product";
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
                            <?php for($idx = 0; $idx < floor($row['rating']);$idx++): ?>
                                <i class="fa fa-star fa-sm text-primary"></i>
                            <?php endfor; ?> 
                            <?php if ($row['rating'] - floor($row['rating']) >= 0.5): ?>
                                <i class="fa fa-star-half-o fa-sm text-primary"></i>
                            <?php else:?>
                                <?php if($row['rating'] - floor($row['rating']) > 0): ?>
                                    <i class="fa fa-star-o fa-sm text-primary"></i>
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php $missing = 5 - ceil($row['rating']); ?>
                            <?php for($idx = 0; $idx < $missing; $idx++): ?>
                                <i class="fa fa-star-o fa-sm text-primary"></i>
                            <?php endfor; ?>
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
