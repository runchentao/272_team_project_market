<?php 
    session_start();
?>
<?php include('includes/head.php');?>
<?php include('includes/header.php');?>
<Link rel="stylesheet" href="css/companys.css">
<div class="modal fade" id="signInPrompt" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="align-items:center">
                <h4 class="modal-title" id="myModalLabel">Alert</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">Since you haven't signed in, Market Place won't be able to keep 
                track of your activities while you are in <span id="modalCompanyName"></span> site</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="button" class="btn btn-primary">提交更改</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>
<div class="card-deck mb-3 text-center" style="padding: 50px 40px 0px;">
    <div class="card mb-4 shadow-sm">
        <div class="card-header">
            <h4 class="my-0 font-weight-normal">REAL ESTATE</h4>
        </div>
        <div class="card-body" id="card-body-1">
            <h1 class="card-title pricing-card-title">FindH</small></h1>
            <ul class="list-unstyled mt-3 mb-4">
                <li>Developed by: <b>Ruichun Chen</b></li>
                <li>Real Estate Company</li>
                <li>Come and look for your home</li>
            </ul>
            <?php if(isset($_SESSION['user'])):?>
            <form action="http://localhost:8888/site_1/home.php" method="POST">
                <input type='hidden' name='userId' value='<?php echo $_SESSION['user'][0]?>'>
                <input type="submit" name="market-redirect" value="Go to FindH">
            </form>
            <?php else: ?>
                <button class="btn btn-primary nonlog-cmpy-visit">Go to FindH</button>
            <?php endif; ?>
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
            <h4 class="my-0 font-weight-normal">Web Development</h4>
        </div>
        <div class="card-body" id="card-body-2">
            <h1 class="card-title pricing-card-title">Webify</h1>
            <ul class="list-unstyled mt-3 mb-4">
                <li>Developed by: <b>Haoyang Liu</b></li>
                <li>Web development Outsourcing</li>
                <li>Get your business launched today</li>
            </ul>
            <?php if(isset($_SESSION['user'])):?>
            <form action="http://haoyangliu.com/272CompanyDemo/" method="POST">
                <input type='hidden' name='userId' value='<?php echo $_SESSION['user'][0]?>'>
                <input type="submit" name="market-redirect" value="Go to Webify">
            </form>
            <?php else: ?>
            <span class="hiddenURL">http://haoyangliu.com/272CompanyDemo/</span>
            <button class="btn btn-primary nonlog-cmpy-visit">Go to Webify</button>
            <?php endif; ?>
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
<?php include('includes/footer.php');?>