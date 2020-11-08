<!doctype html>
<html lang="en">
  <head>
    <title>About</title>
    <style>
      .pageBody {
        height: 500px;
      }
    </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <?php include('header.php');?>
    <div class="text-center" style="width: 400px; margin: auto; padding-top: 50px">
      <form class="needs-validation" action="signupSuccess.php" method="post">
        <img class="mb-4" src="img/market.png" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Please sign up</h1>
        <label for="inputEmail" class="sr-only">Username</label>
        <input type="text" id="inputUser" name="inputUser" class="form-control" placeholder="Username" required="" autofocus="">
        
        <div style="padding-top: 15px;">
            <label for="inputPassword" class="sr-only">Password</label>
            <input id="password" name="inputPassword" type="password" class="form-control" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Must have at least 6 characters' : ''); if(this.checkValidity()) form.password_two.pattern = this.value;" placeholder="Password" required>
            <label for="inputPassword" class="sr-only">Confirm Password</label>
            <input id="password_two" name="inputConfirmPassword" class="form-control" type="password" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Please enter the same Password as above' : '');" placeholder="Verify Password" required>
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
        <input type="tel" id="inputCellphone" name="inputCellphone" class="form-control" placeholder="Cellphone" required="" autofocus="">
        <label>
            Already a user? <a href="signin.php">Sign in now.</a>
        </label> 
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <p class="mt-5 mb-3 text-muted">© 2017-2020</p>
      </form> 
    </div>
    <?php include('footer.php');?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>