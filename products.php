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
<Link rel="stylesheet" href="css/products.css">
<div class="row mb-2" style="padding-top:50px; margin: auto; width: 90%;">
    <?php 
    $sql = "SELECT * FROM Product";
    if($result = mysqli_query($mysqli, $sql)){
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){ 
                ?>
    <div class="col-md-6" >
        <!-- product -->
        <div id="product-card" class="row no-gutters border rounded flex-md-row mb-4 shadow-sm h-md-250"
             style="margin: 0px auto">
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
                    <?php if($row['rating'] == NULL): ?>
                        <div style="color: #989898; margin-bottom: 7px;"><i>No reviews yet</i></div>
                    <?php else: ?>
                    <h6>
                        <?php for($idx = 0; $idx < floor($row['rating']);$idx++):?>
                            <i class="fa fa-star fa-sm text-primary"></i>
                        <?php endfor;?>
                        <?php $half = $row['rating'] - floor($row['rating']); ?>
                        <?php if($half > 0 && $half < 0.5):?>
                            <i class="fa fa-star-o fa-sm text-primary"></i>
                        <?php else: ?>
                            <i class="fa fa-star-half-o fa-sm text-primary"></i>
                        <?php endif; ?>
                        <?php $missing = 5 - ceil($row['rating']); ?>
                        <?php for($idx = 0; $idx < $missing; $idx++): ?>
                            <i class="fa fa-star-o fa-sm text-primary"></i>
                        <?php endfor; ?>
                        <span><?php echo round($row['rating'],1); ?></span>
                    </h6>
                    <?php endif;?>
                </div>
                <div class="product-info smart-form">
                    <?php echo '<a href="product.php?id='.$row['id'].'" class="btn btn-success">Read More</a>'; ?>
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