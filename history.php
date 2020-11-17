<?php
  session_start();
  //echo $_POST["market-redirect"];
  if(isset($_POST["company-post"])){
    $userId = $_POST["userId"];
    $activity = $_POST["browseActivies"];
    $company = $_POST["company"];
    setcookie("browseActivies", $activity, time()+3600*24*30);
  }
//   echo $activity;
    print_r($activity);
    print_r($_COOKIE["browseActivies"]);
?>
<?php include('includes/head.php');?>
<?php include('includes/header.php');?>
<div class="pageBody">
    <form action="history.php" method="post" style="margin-left: 50px">
    <button name="history" type="submit" class="btn btn-secondary my-2 my-sm-0" value="history">History</button>
    <button name="most" type="submit" class="btn btn-secondary my-2 my-sm-0" value="most">Most Visit</button>
    </form>
    <div class="my-3 p-3 bg-white rounded shadow-sm">
        <?php
            $his=$_POST['history']; 
            $most=$_POST['most'];
            if($_SESSION['loggedin']) 
                $arr = unserialize($_COOKIE["browseActivies"]);
            else
                $arr = [];
            if($his){
                $dataset = array_slice($arr, -5);
                echo '<h6 class="border-bottom border-gray pb-2 mb-0">Recent visit</h6>';
            }else{
                $cou = array_count_values($arr);
                arsort($cou);
                if(sizeof($cou) > 5){
                    $num = 5;
                }else{
                    $num = sizeof($cou);
                }
                $x = 0;
                $arr = array();
                while (++$x <= $num)
                {
                    $key = key($cou);
                    array_push($arr, $key);
                    next($cou);
                }
                $dataset = $arr;
                echo '<h6 class="border-bottom border-gray pb-2 mb-0">Most visit</h6>';
            }
            foreach($dataset as $num){
                if($num <= 5){
                    $type = "Single Family House";
                    $color = "#e83e8c";
                }
                else if($num > 5 && $num < 8){
                    $type = "Town House";
                    $color = "#007bff";
                }else{
                    $type = "Apartment";
                    $color = "#6f42c1";
                }
        ?>
        <div class="media text-muted pt-3">
            <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="<?php echo $color ?>"></rect><text x="50%" y="50%" fill="#007bff" dy=".3em"></text></svg>
            <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                <strong class="d-block text-gray-dark"><?php echo $type; ?></strong>
                <?php echo '<a href="product.php?id='.$num.'">visit...product.php?id='.$num.'</a>'; ?>
            </p>
        </div>
        <?php } ?>
    </div>
</div>
<?php include('includes/footer.php');?>