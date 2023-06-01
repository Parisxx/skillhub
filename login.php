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
	    header("Location: main.php");
         }else{
	echo "Email/password is incorrect.";
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/Login.css">
    <title>Document</title>
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
              <p class="text-white-50 mb-5">Please enter your login and password!</p>
           
              <form>
                <div class="form-row">
                 <div class="form-group col-md-12 mb-4">
                 <input type="email" class="form-control" id="email" placeholder="Email">
                 </div>
                 <div class="form-group col-md-12 mb-4  ">
                 <input type="password" class="form-control" id="password" placeholder="Password">
                 </div>
                </div>

              <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a></p>
              <button type="submit" class="submit">Login</button>
              </form>
            </div>
            <div>
              <p class="mb-0">Don't have an account? <a href="#!" class="text-white-50 fw-bold">Sign Up</a>
              </p>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</body>
</html>


