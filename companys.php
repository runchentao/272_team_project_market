<?php 
    session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Home</title>
    <style>
      .pageBody {
        height: 500px;
      }
    </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <?php include('header.php');?>
        <div class="card-deck mb-3 text-center" style="padding-top: 50px">
            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">REAL ESTATE</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">$1 <small class="text-muted">/ mo</small></h1>
                    <ul class="list-unstyled mt-3 mb-4">
                    <li>Ruichun Chen</li>
                    <li>Real Estate Company</li>
                    <li style="color: red">FindH</li>
                    <li>Come and look for your home</li>
                    </ul>
                    
                    <form action= "http://localhost:8888/site_1/home.php" method= "POST">
                        <?php echo "<input type= 'hidden' name= 'userId' value= '".$_SESSION['user'][0]."'>"; ?>
                        <!-- <input type= "hidden" name= fromMarket value= "true"> -->
                        <?php echo "<input type= 'hidden' name= 'time' value= '".time()."'>"; ?>
                        <!-- <input type= "hidden" name= time value= "current"> -->
                        <input type= "submit" name= "market-redirect" value= "Company A">
                    </form>
                    <!-- <?php echo '<a href = "https://reneechen108.website/indivialProject/home.php?fromMarket=true&&id='. $_SESSION["user"][0].'">Read More...</a>'; ?> -->
                    <!-- <button type="button" class="btn btn-lg btn-block btn-primary" onClick="javascript:clickinner1(this);">MORE</button>
                    <script>
                        function clickinner1(mybtn){
                        // Do your stuff here with the clicked button
                        location.href='https://reneechen108.website/indivialProject/home.php';
                        };
                    </script> -->
                </div>
            </div>
            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">Enterprise 2</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">$2 <small class="text-muted">/ mo</small></h1>
                    <ul class="list-unstyled mt-3 mb-4">
                    <li>30 users included</li>
                    <li>15 GB of storage</li>
                    <li>Phone and email support</li>
                    <li>Help center access</li>
                    </ul>
                    <button type="button" class="btn btn-lg btn-block btn-primary">Contact us</button>
                </div>
            </div>
            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">Enterprise 3</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">$3 <small class="text-muted">/ mo</small></h1>
                    <ul class="list-unstyled mt-3 mb-4">
                    <li>30 users included</li>
                    <li>15 GB of storage</li>
                    <li>Phone and email support</li>
                    <li>Help center access</li>
                    </ul>
                    <button type="button" class="btn btn-lg btn-block btn-primary">Contact us</button>
                </div>
            </div>
            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">Enterprise 4</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">$4 <small class="text-muted">/ mo</small></h1>
                    <ul class="list-unstyled mt-3 mb-4">
                    <li>30 users included</li>
                    <li>15 GB of storage</li>
                    <li>Phone and email support</li>
                    <li>Help center access</li>
                    </ul>
                    <button type="button" class="btn btn-lg btn-block btn-primary">Contact us</button>
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

