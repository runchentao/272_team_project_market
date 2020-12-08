<script src="https://apis.google.com/js/platform.js" async defer></script>
<meta name="google-signin-client_id" content="343939675754-mito5glsefguavihrbarr4r7td7fko24.apps.googleusercontent.com">
<?php
    require_once('utils/dbConn.php');
    session_start();
    
    $profile = googleUser.getBasicProfile();
    $username = profile.getId();
    $password = googleUser.getAuthResponse().id_token;
    $firstName = profile.getGivenName();
    $lastName = profile.getFamilyName();
    $email = profile.getEmail();

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