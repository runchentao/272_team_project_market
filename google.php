<script src="https://apis.google.com/js/platform.js" async defer></script>
<meta name="google-signin-client_id" content="343939675754-mito5glsefguavihrbarr4r7td7fko24.apps.googleusercontent.com">
<div class="g-signin2"></div>
<button onclick="signOut()">Google Sign out</button>
<a href="https://market-place-272.herokuapp.com/googleSuccess.php">Back to Home Page</a>

<script>
function signOut() {
    gapi.auth2.getAuthInstance().signOut().then(function() {
        console.log('user signed out')
    })
}
</script>