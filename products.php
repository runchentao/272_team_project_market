<?php
session_start();
$header = array(
    'Accept: application/json',
);
$curl = curl_init();
//  $url = "https://reneechen108.website/indivialProject/user.php";
$url = "https://reneechen108.website/indivialProject/productJSON.php";
// get url
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_HEADER, 0);
curl_setopt($curl, CURLOPT_TIMEOUT, 50);
curl_setopt($curl, CURLOPT_HTTPHEADER, $header);


curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

$data = curl_exec($curl);   
if (curl_error($curl)) {
    print "Error: " . curl_error($curl);
}else {
    $product = json_decode($data);
    //var_dump($product);
    $_SESSION['products'] = $product;
}
?>
<?php include('includes/head.php');?>
<?php include('includes/header.php');?>
<div class="row mb-2" style="padding-top:50px; margin: auto; width: 90%;">
    <?php for($idx = 0; $idx < sizeof($product); $idx++){ ?>
    <div class="col-md-6">
        <!-- product -->
        <div
            class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="row">
                <div class="col-auto d-none d-lg-block">
                    <svg class="bd-placeholder-img" width="170" height="170" xmlns="http://www.w3.org/2000/svg"
                        preserveAspectRatio="xMidYMid slice" focusable="false" role="img"
                        aria-label="Placeholder: Thumbnail">
                        <?php echo '<image width="300" height="250" xlink:href="'.$product[$idx]->{"PImage"}.'"/>'; ?>
                    </svg>
                </div>
                <div class="col-md-7 col-sm-12 col-xs-12">
                    <div class="product-deatil">
                        <h5 class="name">
                            <a href="#">
                                <?php echo $product[$idx]->{"PName"} ?>
                            </a>
                        </h5>
                        <p class="price-container">
                            <span>$<?php echo $product[$idx]->{"Price"} ?></span>
                        </p>
                        <span class="tag1"></span>
                    </div>
                    <div class="description">
                        <p><?php echo $product[$idx]->{"PTime"}?></p>
                    </div>
                    <div class="product-info smart-form">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <?php echo '<a href="product.php?id='.$product[$idx]->{"PID"}.'" class="btn btn-success">Read More</a>'; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
</div>
<?php include('includes/footer.php');?>