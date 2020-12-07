<?php 
    session_start();
?>
<?php include('includes/head.php');?>
<?php include('includes/header.php');?>
<Link rel="stylesheet" href="css/companys.css">
<div class="container" style="text-align: center; margin-top: 40px;color:#5a4e4e;">
    <h1>These are the companies we work with</h1>
    <h3>Looking forward to see your company here</h3>
</div>
<div class="modal fade" id="signInPrompt" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="align-items:center">
                <h4 class="modal-title" id="myModalLabel">Alert</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">Since you haven't signed in, Market Place won't be able to
                track your activities while you are in <span id="modalCompanyName"></span> site.
                You can still proceed to visit, or login to have the enable complete features</div>
            <div class="modal-footer" style="justify-content: space-between">
                <button type="button" id="prompt-visit" class="btn btn-default" data-dismiss="modal">Still
                    Visit</button>
                <button type="button" id="prompt-login" class="btn btn-primary">Login</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>
<div class="card-container mb-3 text-center row" style="padding: 50px 80px 0px;">
    <div class="card mb-4 col-xl-3 col-md-6">
        <div>
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
                <form action="https://reneechen108.website/indivialProject/home.php" method="POST">
                    <input type='hidden' name='userId' value='<?php echo $_SESSION['user'][0]?>'>
                    <input class="btn btn-primary" type="submit" name="market-redirect" value="Go to FindH">
                </form>
                <?php else: ?>
                <span class="hiddenURL">https://reneechen108.website/indivialProject/home.php</span>
                <button class="btn btn-primary nonlog-cmpy-visit">Go to FindH</button>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="card mb-4 col-xl-3 col-md-6">
        <div>
            <div class="card-header">
                <h4 class="my-0 font-weight-normal">IT CONSULTING</h4>
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
                    <input class="btn btn-primary" type="submit" name="market-redirect" value="Go to Webify">
                </form>
                <?php else: ?>
                <span class="hiddenURL">http://haoyangliu.com/272CompanyDemo/</span>
                <button class="btn btn-primary nonlog-cmpy-visit">Go to Webify</button>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="card mb-4 col-xl-3 col-md-6">
        <div>
            <div class="card-header">
                <h4 class="my-0 font-weight-normal">CATERING</h4>
            </div>
            <div class="card-body" id="card-body-3">
                <h1 class="card-title pricing-card-title">JiuBar</h1>
                <ul class="list-unstyled mt-3 mb-4">
                    <li>Developed by: <b>Runchen Tao</b></li>
                    <li>High Standard Food and Beverages</li>
                    <li>The world's best bar</li>
                </ul>
                <?php if(isset($_SESSION['user'])):?>
                <form action="https://jiu-bar.herokuapp.com/" method="POST">
                    <input type='hidden' name='userId' value='<?php echo $_SESSION['user'][0]?>'>
                    <input class="btn btn-primary" type="submit" name="market-redirect" value="Go to JiuBar">
                </form>
                <?php else: ?>
                <span class="hiddenURL">https://jiu-bar.herokuapp.com/</span>
                <button class="btn btn-primary nonlog-cmpy-visit">Go to JiuBar</button>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="card mb-4 col-xl-3 col-md-6">
        <div>
            <div class="card-header">
                <h4 class="my-0 font-weight-normal">PET FOOD</h4>
            </div>
            <div class="card-body" id="card-body-4">
                <h1 class="card-title pricing-card-title" style="font-size: 33px;">Pancake Yang</h1>
                <ul class="list-unstyled mt-3 mb-4">
                    <li>Developed by: <b>Xueli Yang</b></li>
                    <li>Pet food services and more</li>
                    <li>Home made fresh birthday cakes for dogs</li>
                </ul>
                <?php if(isset($_SESSION['user'])):?>
                <form action="https://pancakeyang.net/individualProject/home.php" method="POST">
                    <input type='hidden' name='userId' value='<?php echo $_SESSION['user'][0]?>'>
                    <input class="btn btn-primary" type="submit" name="market-redirect" value="Go to Pancake Yang">
                </form>
                <?php else: ?>
                <span class="hiddenURL">https://pancakeyang.net/individualProject/home.php</span>
                <button class="btn btn-primary nonlog-cmpy-visit">Go to Pancake Yang</button>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
</div>
<?php include('includes/footer.php');?>