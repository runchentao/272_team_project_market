<?php session_start();?>
<?php include('includes/head.php');?>
<?php include('includes/header.php');?>
<link rel="stylesheet" href="css/main.css">
<main role="main">
    <div class="jumbotron" id="home-jumbo">
        <div class="col-sm-8 mx-auto">
            <h1>Welcome to Market Place!</h1>
            <div style="margin: 30px 0px;">
                <img src="img/greeting.jpg" alt="greeting" width="280" />
            </div>
            <div style="font-size: 16px;">
                <p>At Market place, you can visit a collection of company websites and view their products.</p>
                <p>As you browse other company sites, Market Place keeps track of where you are and records the company
                    products
                    you visit. Market Place uses these data to build trending features</p>
                <p>You can also review any company products on Market Place!</p>
                <div id="browse-btn">
                    <a class="btn btn-primary" href="/docs/4.5/components/navbar/" role="button">Start Browsing »</a>
                </div>
            </div>
        </div>
    </div>
</main>
</div>
<?php include('includes/footer.php');?>