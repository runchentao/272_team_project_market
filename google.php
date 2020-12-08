<script src="https://apis.google.com/js/platform.js" async defer></script>
<meta name="google-signin-client_id" content="343939675754-mito5glsefguavihrbarr4r7td7fko24.apps.googleusercontent.com">
<div class="g-signin2" data-onsuccess="onSignIn"></div>
<button onclick="signOut()">Google Sign out</button>
<a href="https://market-place-272.herokuapp.com/googleSuccess.php">Back to Home Page</a>

<script>
function onSignIn(googleUser) {
    var profile = googleUser.getBasicProfile();
    console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
    console.log('Name: ' + profile.getName());
    console.log('Image URL: ' + profile.getImageUrl());
    console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
}

function signOut() {
    gapi.auth2.getAuthInstance().signOut().then(function() {
        console.log('user signed out')
    })
}
</script>