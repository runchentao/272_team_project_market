<?php 
session_start();
$id = $_GET['id']-1;
// echo $id;
// echo "this is product page"; 
// echo $_SESSION['products'][$id]->PName;
?>
<!doctype html>
<html lang="en">
  <head>
    <title>About</title>
    <style>
      .pageBody {
        height: 500px;
      }
    </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <?php include('header.php');?>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <div class="row mb-2" style="padding-top:100px; margin: auto; width: 90%;">
      <section class="mb-5">

        <div class="row">
          <div class="col-md-6 mb-4 mb-md-0">
            <div class="mdb-lightbox" data-pswp-uid="1">

              <div class="row product-gallery mx-1">

                <div class="col-12 mb-0">
                  <figure class="view overlay rounded z-depth-1 main-img" style="max-height: 450px;">
                  <?php echo '<image class="img-fluid z-depth-1" src="'.$_SESSION['products'][$id]->PImage.'" style="margin-top: -90px; transform-origin: center center; transform: scale(1);">'; ?>
                    <!-- <a href="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/12a.jpg" data-size="710x823">
                      <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/12a.jpg" class="img-fluid z-depth-1" style="margin-top: -90px; transform-origin: center center; transform: scale(1);">
                    </a> -->
                  </figure>
                </div>
              </div>

            </div>

          </div>
          <div class="col-md-6">

            <h5><?php echo $_SESSION['products'][$id]->PName; ?></h5>
            <p class="mb-2 text-muted text-uppercase small"><?php echo $_SESSION['products'][$id]->Type; ?></p>
            
            <ul class="rating">
              save for rating
            </ul>
            <p><span class="mr-1"><strong>$<?php echo $_SESSION['products'][$id]->Price; ?></strong></span></p>
            <p class="pt-1"><?php echo $_SESSION['products'][$id]->PDescription; ?></p>
            <hr>

            <button type="button" class="btn btn-primary btn-md mr-1 mb-2 waves-effect waves-light">Buy now</button>
            <button type="button" class="btn btn-light btn-md mr-1 mb-2 waves-effect waves-light"><i class="fas fa-shopping-cart pr-2"></i>Add to
              cart</button>
          </div>
        </div>

      </section>
<!--Section: Block Content-->
<!-- Classic tabs -->
<div class="classic-tabs" style="width: 100%;">

<ul class="nav tabs-primary nav-justified" id="advancedTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active show" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="info-tab" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="false">Information</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews (1)</a>
  </li>
</ul>
<div class="tab-content" id="advancedTabContent">
  <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
    <h5>Product Description</h5>
    <p class="small text-muted text-uppercase mb-2"><?php echo $_SESSION['products'][$id]->PBed. " Bed | ". $_SESSION['products'][$id]->PBath. " Bath | ". $_SESSION['products'][$id]->PSq. " Sq" ?></p>
    <h6>$<?php echo $_SESSION['products'][$id]->Price ?></h6>
    <p class="pt-1"><?php echo $_SESSION['products'][$id]->PDescription ?></p>
  </div>
  <div class="tab-pane fade" id="info" role="tabpanel" aria-labelledby="info-tab">
    <h5>Additional Information</h5>
    <table class="table table-striped table-bordered mt-3">
      <thead>
        <tr>
          <th scope="row" class="w-150 dark-grey-text h6">Unit</th>
          <td><em><?php echo $_SESSION['products'][$id]->PUnit ?></em></td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row" class="w-150 dark-grey-text h6">Time</th>
          <td><em><?php echo $_SESSION['products'][$id]->PTime ?></em></td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
    <h5><span>1</span> review for <span>Fantasy T-shirt</span></h5>
    <div class="media mt-3 mb-4">
      <img class="d-flex mr-3 z-depth-1" src="https://mdbootstrap.com/img/Photos/Others/placeholder1.jpg" width="62" alt="Generic placeholder image">
      <div class="media-body">
        <div class="d-flex justify-content-between">
          <p class="mt-1 mb-2">
            <strong>Marthasteward </strong>
            <span>– </span><span>January 28, 2020</span>
          </p>
          <ul class="rating mb-0">
            <li>
              <i class="fas fa-star fa-sm text-primary"></i>
            </li>
            <li>
              <i class="fas fa-star fa-sm text-primary"></i>
            </li>
            <li>
              <i class="fas fa-star fa-sm text-primary"></i>
            </li>
            <li>
              <i class="fas fa-star fa-sm text-primary"></i>
            </li>
            <li>
              <i class="far fa-star fa-sm text-primary"></i>
            </li>
          </ul>
        </div>
        <p class="mb-0">Nice one, love it!</p>
      </div>
    </div>
    <hr>
    <h5 class="mt-4">Add a review</h5>
    <p>Your email address will not be published.</p>
    <div class="my-3">
      <ul class="rating mb-0">
        <script>
          function fav() {
            document.getElementById("favIcon").toggleClass('fa-star-o fa-star');
          }
        </script>
        <li>
          <a href="#!" onclick="toggle()">
            <i class="fas fa-star fa-sm text-primary" id="favIcon1"></i>
          </a>
        </li>
        <li>
          <a href="#!">
            <i class="fas fa-star fa-sm text-primary" id="favIcon2"></i>
          </a>
        </li>
        <li>
          <a href="#!">
            <i class="fas fa-star fa-sm text-primary" id="favIcon3"></i>
          </a>
        </li>
        <li>
          <a href="#!">
            <i class="fas fa-star fa-sm text-primary" id="favIcon4"></i>
          </a>
        </li>
        <li>
          <a href="#!">
            <i class="far fa-star fa-sm text-primary" id="favIcon5"></i>
          </a>
        </li>
      </ul>
    </div>
    <div>
      <!-- Your review -->
      <div class="md-form md-outline">
        <textarea id="form76" class="md-textarea form-control pr-6" rows="4" placeholder="Your Review"></textarea>
      </div>
      <p>Name: <?php print_r($_SESSION['user']['Username']) ?></p>
      <p>Email: <?php print_r($_SESSION['user']['EmailAddress']) ?></p>
      <div class="text-right pb-2">
        <button type="button" class="btn btn-primary waves-effect waves-light">Add a review</button>
      </div>
    </div>
  </div>
</div>

</div>
    </div>
    <?php include('footer.php');?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>