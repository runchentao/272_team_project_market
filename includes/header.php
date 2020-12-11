<link rel="stylesheet" href="css/navbar.css">

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="site-nav" style="height:40px">
        <div class="container" id="nav-container">
            <a class="navbar-brand" href="home.php">
                <img id="logo-png" src="img/market.png" alt="logo" />
                Market Place
            </a>
            <div style="display: flex; align-items: center">
                <?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true): ?>
                <a class="navbar-brand" class="nav-link" href="success.php">
                    <i class="fa fa-user-circle" aria-hidden="true" style="margin-right: 5px"></i>
                    <?php echo $_SESSION['user'][1]; ?> | Logout
                </a>
                <?php else: ?>
                <a class="navbar-brand" href="signin.php">Sign in</a>
                <a class="navbar-brand" href="signup.php"> <span style="position:relative; left:-7.5px;"> | </span> Sign
                    up</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>
    <?php
          // add condition
          
          // print'<div style="float:right">';
          // if($_SESSION['loggedin'] == true){
          //   $divStyle='style="visibility:visible;"'; //hide div
          // }else{
          //   print'<a class="navbar-brand" href="signin.php" '.$divStyle.'>sign in</a>';
          //   $divStyle='style="display:none;"';
          // }
          // print'<li class="nav-item" name="logout" '.$divStyle.'><a class="navbar-brand" class="nav-link" href="success.php">'.$_SESSION['user'][1].' | Logout</a>
          // </li>';
          // print'</div>'
?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample10"
                aria-controls="navbarsExample10" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExample10">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="companys.php">Company</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="products.php">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="history.php?his=true">History</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="popular.php">Popular</a>
                    </li>
                </ul>
            </div>
            <form id="sort" class="form-inline my-2 my-md-0" method="post" action="popularByComp.php">
                <i class="fa fa-sort" aria-hidden="true" style="margin-right:7px;"></i>
                <select name="companyName" style="margin-right:7px;">
                    <optgroup label="Best Review by Company">
                        <option value="" disabled selected>select</option>
                        <option value="findH">FindH</option>
                        <option value="Webify">Webify</option>
                        <option value="jiuBar">JiuBar</option>
                        <option value="Pancake Yang">Pancake Yang</option>
                    </optgroup>
                </select>
                <input type="submit" name="send" value="sort" />
            </form>
        </div>
    </nav>