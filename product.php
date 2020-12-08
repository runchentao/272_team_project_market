<?php
session_start();
require_once('utils/dbConn.php');
$id = $_GET['id'];
$sql = "SELECT * FROM Product WHERE id='$id'";
$result = mysqli_query($mysqli, $sql);
$rows = mysqli_num_rows($result);
if ($rows == 1) {
  $row = mysqli_fetch_array($result);
  $time = Time();
  $company = $row["company"];
  $product = $row["productName"];
  $productInfo = array('time' => $time, "company" => $company, "product" => $product);
  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $userID = $_SESSION['user'][0];
    $other_sql = "SELECT * FROM users WHERE id='$userID'";
    $other_result = mysqli_query($mysqli, $other_sql);
    $other_row = mysqli_fetch_array($other_result);
    $his = json_decode($other_row["ViewHistory"]);

    if ($his != null) {
      array_push($his, $productInfo);
      $browser = json_encode($his);
      $update_sql = "UPDATE users SET ViewHistory='$browser' WHERE id='$userID'";
      $update_result = mysqli_query($mysqli, $update_sql);
    } else {
      $hisArray = array();
      $hisArray[] = $productInfo;
      $viewJson = json_encode($hisArray);
      $update_sql = "UPDATE users SET ViewHistory='$viewJson' WHERE id='$userID'";
      $update_result = mysqli_query($mysqli, $update_sql);
    }
  }
}
?>
<?php include('includes/head.php'); ?>
<?php include('includes/header.php'); ?>
<Link rel="stylesheet" href="css/product.css">
<div class="container row mb-2" style="padding-top:100px; margin: auto;">

  <div class="col-md-6 col-sm-12" style="background: url('<?php echo $row['productImg']; ?>'); padding: 10px; 
                     width: 30vw; height: 22.5vw; min-width: 304px; min-height: 258px;
                     background-size: cover; background-position: center center;">
  </div>
  <div class="col-md-6" style="padding-left: 20px;">

    <h5><?php echo $row['productName']; ?></h5>
    <p class="mb-2 text-muted text-uppercase small"><?php echo $row['company']; ?></p>

    <?php
    $productID = $_GET['id'];
    $getReviewCount = "select * from Review where productId = '$productID'";
    $reviews = mysqli_query($mysqli, $getReviewCount);
    $reviewCount = mysqli_num_rows($reviews);
    ?>
    <?php if ($reviewCount == 0) : ?>
      <div style="color: #989898; margin-bottom: 7px;"><i>No reviews yet</i></div>
    <?php else : ?>
      <div style="display: flex; flex-direction: row; align-items: center; margin-bottom: 7px;">
        <ul class="rating" style="padding-left: 0px;">
          <?php for ($idx = 0; $idx < floor($row['rating']); $idx++) : ?>
            <li>
              <i class="fa fa-star fa-sm text-primary"></i>
            </li>
          <?php endfor; ?>
          <?php if ($row['rating'] - floor($row['rating']) >= 0.5) : ?>
            <li>
              <i class="fa fa-star-half-o fa-sm text-primary"></i>
            </li>
          <?php else : ?>
            <?php if ($row['rating'] - floor($row['rating']) > 0) : ?>
              <li>
                <i class="fa fa-star-o fa-sm text-primary"></i>
              </li>
            <?php endif; ?>
          <?php endif; ?>
          <?php for ($idx = 0; $idx < 5 - ceil($row['rating']); $idx++) : ?>
            <li>
              <i class="fa fa-star-o fa-sm text-primary"></i>
            </li>
          <?php endfor; ?>
        </ul>
        <span style="margin-left: 5px;"><?php echo round($row['rating'], 1) ?> </span>
      </div>
    <?php endif; ?>
    <p><span class="mr-1"><strong>$
          <?php
          $priceArr = str_split($row['price']);
          $count = 0;
          $formattedPrice = "";
          for ($i = count($priceArr) - 1; $i >= 0; $i--) {
            if ($count == 3) {
              $formattedPrice = "," . $formattedPrice;
              $count = 0;
            }
            $formattedPrice = $priceArr[$i] . $formattedPrice;
            $count++;
          }
          echo $formattedPrice;
          ?></strong></span></p>
    <hr>
    <div style="margin-top: 30px;">
      <button type="button" class="btn btn-primary btn-md mr-1 mb-2 waves-effect waves-light">Buy now</button>
      <button type="button" class="btn btn-light btn-md mr-1 mb-2 waves-effect waves-light">
        <i class="fa fa-font-awesome"></i>
        Save as Favorite
      </button>
    </div>
  </div>

  <!--Section: Block Content-->
  <!-- Classic tabs -->
  <?php
  $proId = $row['id'];
  // echo $proId;
  $review_sql = "SELECT * FROM Review WHERE productId='$proId'";
  $review_result = mysqli_query($mysqli, $review_sql);
  $review_rows = mysqli_num_rows($review_result);
  ?>
  <div class="classic-tabs" style="width: 100%; margin: 30px auto;">
    <ul class="nav tabs-primary nav-justified" id="descReview" role="tablist">
      <li class="nav-item">
        <a class="nav-link active show" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews (<?php echo $review_rows; ?>)</a>
      </li>
    </ul>
    <div class="tab-content" id="descReviewContent">
      <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
        <h5>Product Description</h5>
        <p class="small text-muted text-uppercase mb-2">
          <?php echo $row['additionalInfo']; ?>
        </p>
        <?php
        $priceArr = str_split($row['price']);
        $count = 0;
        $formattedPrice = "";
        for ($i = count($priceArr) - 1; $i >= 0; $i--) {
          if ($count == 3) {
            $formattedPrice = "," . $formattedPrice;
            $count = 0;
          }
          $formattedPrice = $priceArr[$i] . $formattedPrice;
          $count++;
        }
        ?>
        <h6>$<?php echo $formattedPrice; ?></h6>
        <p class="pt-1"><?php echo $row['productDescription']; ?></p>
      </div>
      <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
        <?php
        $proId = $row['id'];
        // echo $proId;
        $review_sql = "SELECT * FROM Review WHERE productId='$proId'";
        if ($review_result = mysqli_query($mysqli, $review_sql)) {
          $review_rows = mysqli_num_rows($review_result);
          if ($review_rows > 0) {
        ?>
            <h5><span><?php echo $review_rows ?></span> review for <span><?php echo $row['productName'] ?></span></h5>
            <?php while ($review_row = mysqli_fetch_array($review_result)) { ?>
              <div class="media mt-3 mb-4 reviews-box">
                <img class="d-flex mr-3 z-depth-1" src="https://mdbootstrap.com/img/Photos/Others/placeholder1.jpg" width="62" alt="Generic placeholder image">
                <div class="media-body">
                  <div style="display: flex;flex-direction: row;justify-content: flex-start; align-items: center;">
                    
                      <strong><?php echo $review_row['username'] ?> </strong>
                      <span style="margin-left: 7px;"> – </span>
                      <span style="margin-left: 7px;">
                        <ul class="rating" style="padding-left: 0px" >
                          <?php for ($idx = 0; $idx < floor($review_row['score']); $idx++) : ?>
                            <li>
                              <i class="fa fa-star fa-sm"></i>
                            </li>
                          <?php endfor; ?>
                          <?php if ($review_row['score'] - floor($review_row['score']) >= 0.5) : ?>
                            <li>
                              <i class="fa fa-star-half-o fa-sm"></i>
                            </li>
                          <?php else : ?>
                            <?php if ($review_row['score'] - floor($review_row['score']) > 0) : ?>
                              <li>
                                <i class="fa fa-star-o fa-sm"></i>
                              </li>
                            <?php endif; ?>
                          <?php endif; ?>
                          <?php for ($idx = 0; $idx < 5 - ceil($review_row['score']); $idx++) : ?>
                            <li>
                              <i class="fa fa-star-o fa-sm"></i>
                            </li>
                          <?php endfor; ?>
                        </ul>
                      </span>
                      <span style="margin-left: 7px;"><?php echo $review_row['createdAt'] ?> </span>
                    
                  </div>
                  <p class="mb-0"><?php echo $review_row['content'] ?></p>
                </div>
              </div>
        <?php
            }
          }
        } ?>
        <div>
          <?php if (isset($_SESSION['user'])) : ?>
            <form action="review.php?id=<?php echo $row['id']; ?>" method="post" onsubmit="return validateReview(event)">
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
                <textarea id="review-content" class="md-textarea form-control pr-6" rows="4" placeholder="Your Review" name="review"></textarea>
              </div>
              <input type="hidden" id="score" name="score" value="" />
              <?php if (isset($_SESSION['user'])) : ?>
                <div style="margin: 10px 0px;">
                  <div>Name: <?php print_r($_SESSION['user']['Username']) ?></div>
                  <div>Email: <?php print_r($_SESSION['user']['EmailAddress']) ?></div>
                </div>
              <?php endif; ?>
              <button class="btn btn-primary waves-effect waves-light" type="submit">Add a review</button>
            </form>
          <?php else : ?>
            <div style="background-color: #a6a6a6; padding: 15px; color: white;"> Please <a href="signin.php">Login</a> to leave a review </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  $("#descReview a.nav-link.active").parent().css("background-color", "rgb(245, 245, 245)");
  $("#descReview a.nav-link.active").parent().css("border-bottom", "none");
  $("#descReview a.nav-link").click(function(event) {
    var navtabs = $("#descReview a.nav-link").parent();
    var target = $(event.target).parent();
    for (var tab of navtabs) {
      if (target.is($(tab))) {
        $(tab).css("background-color", "rgb(245, 245, 245)");
        $(tab).css("border-bottom", "none");
      } else {
        $(tab).css("background-color", "rgb(226, 226, 226)");
        $(tab).css("border-bottom", "1px solid rgb(184, 184, 184)");
      }
    }
  });

  function validateReview(e) {
    if ($("#counter").html() == "") {
      alert("Please give a score");
      return false;
    }
    if ($("#review-content").val() == "") {
      alert("Please write some review");
      return false;
    }
    $("#score").val($("#counter").html());
    return true;
  }
</script>
<?php include('includes/footer.php'); ?>
<script src="js/rating.js"></script>