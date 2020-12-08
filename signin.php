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
        <p class="mt-5 mb-3 text-muted" style="text-align: center">© 2017-2020</p>
    </form>
    <div class="g-signin2" data-onsuccess="onSignIn"></div>
</div>

<script>
function onSignIn(googleUser) {
    console.log("user is: ", JSON.stringify(googleUser.getBasicProfile()));
    var profile = googleUser.getBasicProfile();
    var id_token = googleUser.getAuthResponse().id_token;
    console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
    console.log("id_token", id_token);
    console.log('Name: ' + profile.getName());
    console.log('Image URL: ' + profile.getImageUrl());
    console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
    if (googleUser.getBasicProfile() != null) {
        onSignInSuccess(googleUser);
    }
}

function onSignInSuccess(googleUser) {
    var profile = googleUser.getBasicProfile();
    var id = profile.getId();
    var id_token = googleUser.getAuthResponse().id_token;
    var fn = profile.getGivenName();
    var ln = profile.getFamilyName()
    var em = profile.getEmail();

    <?php
        require_once('utils/dbConn.php');
        session_start();
        $username = id;
        $password = id_token;
        $firstName = fn;
        $lastName = ln;
        $email = em;

        $sql = "INSERT INTO users (Username, Passwd, FirstName, LastName, EmailAddress)
        VALUES ('$username', '$password', '$firstName', '$lastName', '$email')";

        if ($mysqli->query($sql) === TRUE) {
            echo "successful";
            $_SESSION['add_user'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['loggedin'] = true;

            $sql2 = "SELECT * FROM users WHERE Username='$username' AND Passwd='$password'";
            $result = mysqli_query($mysqli, $sql); 
            $rows = mysqli_num_rows($result);

            header("location: home.php");
        } else {
            $_SESSION['add_user'] = false;
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    ?>
}
</script>
<?php include('includes/footer.php');?>