<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="height:30px">
  <div class="container">
    <a class="navbar-brand" href="home.php">272 Team | Market Place</a>
    <?php
          // add condition
          session_start();
          print'<div style="float:right">';
          if($_SESSION['loggedin'] == true){
            $divStyle='style="visibility:visible;"'; //hide div
          }else{
            print'<a class="navbar-brand" href="signin.php" '.$divStyle.'>sign in</a>';
            $divStyle='style="display:none;"';
          }
          print'<li class="nav-item" name="logout" '.$divStyle.'><a class="navbar-brand" class="nav-link" href="success.php">'.$_SESSION['user'][1].' | Logout</a>
          </li>';
          print'</div>'
        ?>
    </div>
  </div>
</nav>
<nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample10" aria-controls="navbarsExample10" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample10">
    <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="companys.php">Company</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="products.php">Products</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="history.php">History</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="popular.php">Popular</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="review.php">Review</a>
    </li>
    <form class="form-inline my-2 my-md-0">
      <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
        <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
      </svg>
      <input class="form-control" type="text" placeholder="Search" aria-label="Search">
    </form>
  </div>
</nav>