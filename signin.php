<?php include('includes/head.php'); ?>
<?php include('includes/header.php');?>
<Link rel="stylesheet" href="css/signin.css">
<script src="https://apis.google.com/js/platform.js" async defer></script>
<meta name="google-signin-client_id" content="343939675754-mito5glsefguavihrbarr4r7td7fko24.apps.googleusercontent.com">
<div id="signin-form-container">
    <form class="form-signin" action="signinSuccess.php" method="post">
        <img class="mb-4" src="img/market.png" alt="" width="72" height="72" />
        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
        <div class="form-group">

            <input type="text" id="inputUsername" name="inputUser" class="form-control" placeholder="Username"
                required="" autofocus="">
        </div>
        <div class="form-group">

            <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password"
                required="">
        </div>
        <div class="checkbox mb-3" id="signin-rem-check">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <p style="position: relative;top:-4px;">
            New to our website? <a href="signup.php">Sign up now.</a>
        </p>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <div class="g-signin2" data-onsuccess="onSignIn"></div>
        <p class="mt-5 mb-3 text-muted" style="text-align: center">© 2017-2020</p>
    </form>
</div>

<script>
function onSignIn(googleUser) {
    var profile = googleUser.getBasicProfile();
    var id_token = googleUser.getAuthResponse().id_token;
    var first_name = profile.getGivenName());
var last_name = profile.getFamilyName());
var email = profile.getEmail());

<?php
    require_once('utils/dbConn.php');
    session_start();

    $sql = "INSERT INTO users (Username, FirstName, LastName, EmailAddress)
    VALUES ('$id_token', '$first_name', '$last_name', '$email')";

    if ($mysqli->query($sql) === TRUE) {
        echo "successful";
        $_SESSION['add_user'] = true;
        $_SESSION['username'] = $username;
        header("location: signin.php");
    } else {
        $_SESSION['add_user'] = false;
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
    ?>
}
</script>
<?php include('includes/footer.php');?>