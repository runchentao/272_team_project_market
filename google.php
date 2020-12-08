<script src="https://apis.google.com/js/platform.js" async defer></script>
<meta name="google-signin-client_id" content="343939675754-mito5glsefguavihrbarr4r7td7fko24.apps.googleusercontent.com">
<div class="g-signin2" data-onsuccess="onSignIn"></div>
<script>
function onSignIn(googleUser) {
    window.location.replace("https://market-place-272.herokuapp.com/googleSuccess.php");
}
</script>