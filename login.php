<?php
require('initialize.php'); 
session_start();
if (isset($_POST['submit'])){
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
        $query = "SELECT * FROM user WHERE email='$email'
and password='".md5($password)."'";
    $result = mysqli_query($db,$query) or die(mysql_error());
    $rows = mysqli_num_rows($result);
        if($rows==1){
        $_SESSION['email'] = $email;
        $_SESSION['loggedIn'] = true;
        header("Location: main.php");
         }else{
    echo "Email/password is incorrect.";
    }
}

if (isset($_SESSION["loggedIn"])) {
  header("location: main.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/login-register.css">
    <title>Skillhub | Login</title>
</head>
<body>


<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card form-main text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
            <div class="mb-md-5 mt-md-4 pb-5">
              <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
              <p class="text-white-50 mb-5">Please enter your Email and Password!</p>

              <form method="post"class="needs-validation" novalidate>
                <div class="form-row">
                 <div class="form-group col-md-12 mb-4" has-validation>
                 <input name="email"type="email" class="form-control" id="email" placeholder="Email" required>
                 <div class="invalid-feedback">
                    Please enter an email.
                </div>
                 </div>
                 <div class="form-group col-md-12 mb-4" has-validation>
                 <input name="password" type="password" class="form-control" id="password" placeholder="Password" required>
                 <div class="invalid-feedback">
                    Please enter a password.
                </div>
                 </div>
                </div>
                <input id="button" class="btn btn-primary" name="submit" type="submit" value="Login" name="submit">

              </form>
              <p>Dont have an account yet? <a href="register.php">Register here!</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script src="assets/js/boot-val.js"></script>
</body>
</html>

