<?php
    require_once('utils/dbConn.php');
    session_start();
    if(isset($_SESSION['user'])){
        $id = $_SESSION['user'][0];
    }
    $sql = "SELECT * FROM users WHERE id='$id'";
    $result = mysqli_query($mysqli, $sql); 
    $rows = mysqli_num_rows($result);
    if($rows==1){
        $row = mysqli_fetch_array($result);
        // print_r($row['ViewHistory']);
    }else{
        echo "need to login first";
    }
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
            $his1=$_GET['his'];
            if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
                $arr = json_decode($row['ViewHistory']);
            }else{
                $arr = [];
            }
            if($his || $his1){
                if(sizeof($arr) > 5){
                    $data = array_slice($arr, -5);
                }else{
                    $data = $arr;
                }
                $dataset = [];
                for($idx = 0; $idx < sizeof($data); $idx++){
                    $type = $data[$idx]->{"company"};
                    $product = $data[$idx]->{"product"};
                    $replaced = str_replace('+', ' ', $product);
                    $sql = "SELECT * from Product WHERE productName='$replaced' AND company='$type'";
                    $result = mysqli_query($mysqli, $sql); 
                    $row = mysqli_fetch_array($result);
                    $dataset[] = $row;
                }
                echo '<h6 class="border-bottom border-gray pb-2 mb-0">Recent visit</h6>';
            }else{
                $arrID = [];
                for($idx = 0; $idx < sizeof($arr); $idx++){
                    $type = $arr[$idx]->{"company"};
                    $product = $arr[$idx]->{"product"};
                    $replaced = str_replace('+', ' ', $product);
                    $sql = "SELECT * from Product WHERE productName='$replaced' AND company='$type'";
                    $result = mysqli_query($mysqli, $sql); 
                    $row = mysqli_fetch_array($result);
                    $arrID[] = $row['id'];
                }
                $cou = array_count_values($arrID);
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
                // $dataset = $arr;
                $dataset = [];
                for($idx = 0; $idx < sizeof($arr); $idx++){
                    $id =$arr[$idx];
                    // echo $id;
                    $sql = "SELECT * from Product WHERE id='$id'";
                    $result = mysqli_query($mysqli, $sql); 
                    $row = mysqli_fetch_array($result);
                    $dataset[] = $row;
                }
                echo '<h6 class="border-bottom border-gray pb-2 mb-0">Most visit</h6>';
            }
            //$dataset = [];
            // print_r($dataset);
            for($idx = 0; $idx < sizeof($dataset); $idx++){
                $type = $dataset[$idx]['company'];
                if($type=="findH"){
                    $color = "#007bff";
                }else if($type = "Town House"){
                    $color = "#453e21";
                }else if($type = "Apartment"){
                    $color = "#6f42c1";
                }else{
                    $color = "#e83e8c";
                }
        ?>
        <div class="media text-muted pt-3">
            <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="<?php echo $color ?>"></rect><text x="50%" y="50%" fill="#007bff" dy=".3em"></text></svg>
            <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                <strong class="d-block text-gray-dark"><?php echo $dataset[$idx]['company']; ?></strong>
                <?php echo '<a href="'.$num.'">visit...'.$dataset[$idx]['productLink'].'</a>'; ?>
            </p>
        </div>
        <?php } ?>
    </div>
</div>
<?php include('includes/footer.php');?>