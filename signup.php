<?php include('includes/head.php');?>
<?php include('includes/header.php');?>
    <div class="text-center" style="width: 320px; margin: auto; padding-top: 50px;min-height:664.99px">
      <form class="needs-validation" action="signupSuccess.php" method="post">
        <img class="mb-4" src="img/market.png" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Please sign up</h1>
        <label for="inputEmail" class="sr-only">Username</label>
        <input type="text" id="inputUser" name="inputUser" class="form-control" placeholder="Username" required="" autofocus="">
        
        <div style="padding-top: 15px;">
            <label for="inputPassword" class="sr-only">Password</label>
            <input id="password" name="inputPassword" type="password" class="form-control" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Must have at least 6 characters' : ''); if(this.checkValidity()) form.password_two.pattern = this.value;" placeholder="Password" required>
            <label for="inputPassword" class="sr-only">Confirm Password</label>
            <input style="margin-top:10px" id="password_two" name="inputConfirmPassword" class="form-control" type="password" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Please enter the same Password as above' : '');" placeholder="Verify Password" required>
        </div>

        <div class="row" style="padding-top: 15px;">
            <div class="col-md-6 mb-3">
                <label for="inputEmail" class="sr-only">First Name</label>
                <input type="text" id="inputFirstName" name="inputFirstName" class="form-control" placeholder="First Name" required="" autofocus="">
                <div class="invalid-feedback">
                    Valid first name is required.
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="inputEmail" class="sr-only">Last Name</label>
                <input type="text" id="inputLastName" name="inputLastName" class="form-control" placeholder="Last Name" required="" autofocus="">
                <div class="invalid-feedback">
                    Valid last name is required.
                </div>
            </div>
        </div>

        <label for="inputEmail" class="sr-only">Email Address</label>
        <input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="">
        <label for="inputEmail" class="sr-only">Cellphone</label>
        <input style="margin-top:10px" type="tel" id="inputCellphone" name="inputCellphone" class="form-control" placeholder="Cellphone" required="" autofocus="">
        <label style="margin:10px">
            Already a user? <a href="signin.php">Sign in now.</a>
        </label> 
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign Up</button>
        <p class="text-muted" style="margin-top: 20px;">© 2017-2020</p>
      </form> 
    </div>
    <?php include('includes/footer.php');?>
    