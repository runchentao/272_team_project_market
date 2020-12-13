<?php

use function PHPSTORM_META\type;

require_once('utils/dbConn.php');
    session_start();
    $row = array();
    if(isset($_SESSION['user'])){
        $id = $_SESSION['user'][0];
        $sql = "SELECT * FROM users WHERE id='$id'";
        $result = mysqli_query($mysqli, $sql); 
        $rows = mysqli_num_rows($result);
        if($rows==1){
            $row = mysqli_fetch_array($result);
        }
    }
?>
<?php include('includes/head.php');?>
<?php include('includes/header.php');?>
<div class="pageBody">
    <?php if(!isset($_SESSION['user'])): ?>
    <div class="jumbotron" style="text-align:center">
        <h3> Please Login </h3>
    </div>
    <?php endif; ?>
    <!-- <form action="history.php" method="post" style="margin-left: 50px">
    <button name="history" type="submit" class="btn btn-secondary my-2 my-sm-0" value="history">History</button>
    <button name="most" type="submit" class="btn btn-secondary my-2 my-sm-0" value="most">Most Visit</button>
    </form> -->
    <div class="container">
        <div class="my-3 p-3 bg-white rounded shadow-sm">

            <?php
            $hisPost = isset($_POST['history']) ? $_POST['history'] : NULL; 
            $most= isset($_POST['most']) ? $_POST['most']: NULL;
            $hisTab= isset($_GET['his']) ? $_GET['his'] : NULL;
            $arr = array();
            if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
                $arr = json_decode($row['ViewHistory']);
                if ($arr == NULL) {
                    $arr = array();
                }
            }
            if($hisPost || $hisTab){
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
                echo 
                '<div style="display:flex;flex-direction:row;justify-content: flex-start;align-items: center">
                    <h6 style="margin-right: 4px;" class="border-bottom border-gray pb-2 mb-0">Recent visit</h6>
                    <span style="padding-bottom: .5rem!important; margin-right: 4px; "> | </span>
                    <a href="history.php"><h6 class="border-bottom border-gray pb-2 mb-0">Most visit</h6></a>
                 </div>';
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
                asort($cou);
                
                // $dataset = $arr;
                $dataset = [];
                foreach($cou as $key=>$value){
                    $id = $key;
                    // echo $id;
                    $sql = "SELECT * from Product WHERE id='$id'";
                    $result = mysqli_query($mysqli, $sql); 
                    $row = mysqli_fetch_array($result);
                    $dataset[] = $row;
                    $dataset[count($dataset) - 1]["visited"] = $value;
                }
                echo 
            '<div style="display:flex;flex-direction:row;justify-content: flex-start;align-items: center">
                <h6 style="margin-right: 4px;" class="border-bottom border-gray pb-2 mb-0">Most visit</h6>
                <span style="padding-bottom: .5rem!important; margin-right: 4px; "> | </span>
                <a href="history.php?his=true"><h6  class="border-bottom border-gray pb-2 mb-0">Recent visit</h6></a>
             </div>';
            }
            //$dataset = [];
            // print_r($dataset);
            for($idx = sizeof($dataset) - 1; $idx>=0; $idx--){
                $type = $dataset[$idx]['company'];
                if($type=="findH"){
                    $color = "#007bff";
                }else if($type == "Webify"){
                    $color = "#453e21";
                }else if($type == "jiuBar"){
                    $color = "#6f42c1";
                }else{
                    $color = "#e83e8c";
                }
        ?>
            
            <div class="media text-muted pt-3">
                <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg"
                    preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="<?php echo $color ?>"></rect><text x="50%" y="50%"
                        fill="#007bff" dy=".3em"></text>
                </svg>
                <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                    <strong class="d-block text-gray-dark"><?php echo $dataset[$idx]['company']; ?></strong>
                        <a href="<?php echo $dataset[$idx]['productLink']?>">
                            <?php echo $dataset[$idx][2]; ?>
                        </a>
                        <?php if(!isset($_GET['his']) && !isset($_POST['history'])): ?>
                            - <?php echo $dataset[$idx]["visited"]; ?> Visits
                        <?php endif; ?>
                </p>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php include('includes/footer.php');?>