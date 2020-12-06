<?php 
session_start();
require_once('utils/dbConn.php');
$id = $_GET['id'];
$sql = "SELECT * FROM Product WHERE id='$id'";
$result = mysqli_query($mysqli, $sql);
$rows = mysqli_num_rows($result);
if($rows==1){
  $row = mysqli_fetch_array($result);
  $time = Time();
  $company = $row["company"];
  $product = $row["productName"];
  $productInfo = array('time' => $time, "company" => $company, "product" => $product);
  if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
    $userID = $_SESSION['user'][0];  
    $other_sql = "SELECT * FROM users WHERE id='$userID'";
    $other_result = mysqli_query($mysqli, $other_sql);
    $other_row = mysqli_fetch_array($other_result);
    if($other_row["ViewHistory"]){
      $his = json_decode($other_row["ViewHistory"]);
      array_push($his, $productInfo);    
      $browser = json_encode($his);
      $update_sql = "UPDATE users SET ViewHistory='$browser' WHERE id='$userID'";
      $update_result = mysqli_query($mysqli, $update_sql); 
    }else{
      $update_sql = "UPDATE users SET ViewHistory='$productInfo' WHERE id='$userID'";
      $update_result = mysqli_query($mysqli, $update_sql); 
    }
  }
}
?>
<?php include('includes/head.php');?>
<?php include('includes/header.php');?>
<Link rel="stylesheet" href="css/product.css">
<div class="row mb-2" style="padding-top:100px; margin: auto; width: 90%;">
    <section class="mb-5">
        <div class="row">
            <div class="col-md-6 mb-4 mb-md-0">
                <div class="mdb-lightbox" data-pswp-uid="1">
                    <div class="row product-gallery mx-1">
                        <div class="col-12 mb-0">
                            <figure class="view overlay rounded z-depth-1 main-img" style="max-height: 400px;">
                                <?php echo '<image class="img-fluid z-depth-1" src="'.$row['productImg'].'" style="margin-top: -90px; transform-origin: center center; transform: scale(1);">'; ?>
                            </figure>
                        </div>
                    </div>

                </div>

            </div>
            <div class="col-md-6">

                <h5><?php echo $row['productName']; ?></h5>
                <p class="mb-2 text-muted text-uppercase small"><?php echo $row['company']; ?></p>

                <ul class="rating">
                  <?php 
                  $idx = 0;
                  for($idx = 0; $idx < $row['rating'];$idx++) { ?>
                    <li>
                        <i class="fa fa-star fa-sm text-primary"></i>
                    </li>
                  <?php } 
                  $missing = 5 - $idx;
                  for($idx = 0; $idx < $missing; $idx++) { ?>
                    <li>
                        <i class="fa fa-star-o fa-sm text-primary"></i>
                    </li>
                  <?php } 
                  ?>
                </ul>
                <p><span class="mr-1"><strong>$<?php echo $row['price']; ?></strong></span></p>
                <hr>

                <button type="button" class="btn btn-primary btn-md mr-1 mb-2 waves-effect waves-light">Buy now</button>
                <button type="button" class="btn btn-light btn-md mr-1 mb-2 waves-effect waves-light">
                    <i class="fa fa-font-awesome"></i>
                    Save as Favorite
                </button>
            </div>
        </div>

    </section>
    <!--Section: Block Content-->
    <!-- Classic tabs -->
    <div class="classic-tabs" style="width: 100%;">

        <ul class="nav tabs-primary nav-justified" id="advancedTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active show" id="description-tab" data-toggle="tab" href="#description" role="tab"
                    aria-controls="description" aria-selected="true">Description</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab"
                    aria-controls="reviews" aria-selected="false">Reviews (1)</a>
            </li>
        </ul>
        <div class="tab-content" id="advancedTabContent">
            <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                <h5>Product Description</h5>
                <p class="small text-muted text-uppercase mb-2">
                    <?php echo $row['additionalInfo']; ?>
                </p>
                <h6>$<?php echo $row['price']; ?></h6>
                <p class="pt-1"><?php echo $row['productDescription']; ?></p>
            </div>
            <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
            <?php
              $proId = $row['id']; 
              // echo $proId;
              $review_sql = "SELECT * FROM Review WHERE productId='$proId'";
              if($review_result = mysqli_query($mysqli, $review_sql)){
                $review_rows = mysqli_num_rows($review_result);
                if($review_rows > 0){
                  ?>
                      <h5><span><?php echo $review_rows?></span> review for <span><?php echo $row['productName']?></span></h5>
                    <?php while($review_row = mysqli_fetch_array($review_result)){ ?>  
                          <div class="media mt-3 mb-4 reviews-box">
                              <img class="d-flex mr-3 z-depth-1" src="https://mdbootstrap.com/img/Photos/Others/placeholder1.jpg"
                                  width="62" alt="Generic placeholder image">
                              <div class="media-body">
                                  <div class="d-flex justify-content-between">
                                      <p class="mt-1 mb-2">
                                          <strong><?php echo $review_row['username']?> </strong>
                                          <span>– </span><span><?php echo $review_row['createdAt']?> </span>
                                      </p>
                                  </div>
                                  <p class="mb-0"><?php echo $review_row['content']?></p>
                              </div>
                          </div>
                        <?php 
                        }
                      }
                    }?>
                  <div>
                  <form action="review.php?id=<?php echo $row['id'];?>" method="post">
                    <h5 class="mt-4">Add a review</h5>
                    <div class="rating-counter-container">
                        <div class="rating mb-0">                   
                          <i class="fa fa-star-o fa-sm"></i>                          
                          <i class="fa fa-star-o fa-sm"></i>                          
                          <i class="fa fa-star-o fa-sm"></i>                          
                          <i class="fa fa-star-o fa-sm"></i>                                                    
                          <i class="fa fa-star-o fa-sm"></i>                          
                        </div>
                        <div id="counter"></div>
                    </div>
                    <!-- Your review -->
                    <div class="md-form md-outline">
                        <textarea id="form76" class="md-textarea form-control pr-6" rows="4"
                            placeholder="Your Review" name="review"></textarea>
                    </div>
                    <p>Name: <?php print_r($_SESSION['user']['Username']) ?></p>
                    <p>Email: <?php print_r($_SESSION['user']['EmailAddress']) ?></p>
                    <button class="btn btn-primary waves-effect waves-light" type="submit">Add a review</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php');?>
<script src="js/rating.js"></script>
