<?php

require('initialize.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $error = [];
    
    $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($db, $_POST['lastname']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    
    if (empty($firstname)) {
        $error[] = "First name is required.";
    }
    if (empty($lastname)) {
        $error[] = "Last name is required.";
    }
    if (empty($email)) {
        $error[] = "Email is required.";
    }
    if (empty($password)) {
        $error[] = "Password is required.";
    }
    
    if (empty($error)) {
        $query = "SELECT id FROM user WHERE email = '$email'";
        $result = mysqli_query($db, $query);
        
        if (mysqli_num_rows($result) > 0) {
            $error[] = "Email already taken.";
        } else {
            $hashedPassword = md5($password);
            $insertUserQuery = "INSERT INTO user (firstname, lastname, email, password) VALUES ('$firstname', '$lastname', '$email', '$hashedPassword')";
            $insertWorkQuery = "INSERT INTO work (email) VALUES ('$email')";
            
            if (mysqli_query($db, $insertUserQuery) && mysqli_query($db, $insertWorkQuery)) {
                $_SESSION['id'] = mysqli_insert_id($db);
                $_SESSION['email'] = $email;
                header("Location: login.php");
                exit();
            } else {
                $error[] = "Could not sign you up. Please try again.";
            }
        }
    }
    
    if (!empty($error)) {
        echo "<b>There were error(s) in your form:</b><br>";
        foreach ($error as $errorMessage) {
            echo $errorMessage . "<br>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skillhub | Register</title>
    <link rel="stylesheet" href="assets/css/login-register.css">
</head>
<body>
     <section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card form-main text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
            <div class="mb-md-5 mt-md-4 pb-5">
              <h2 class="fw-bold mb-2 text-uppercase">Register</h2>
              <p class="text-white-50 mb-5">Please enter your fullname and Email!</p>

              <form method="post">
                <div class="form-row">
                <div class="form-group col-md-12 mb-4">
                 <input name="firstname"type="firstname" class="form-control" id="firstname" placeholder="firstname">
                 </div>
                 <div class="form-group col-md-12 mb-4  ">
                 <input name="lastname" type="lastname" class="form-control" id="lastname" placeholder="lastname">
                 </div>
                 <div class="form-group col-md-12 mb-4">
                 <input name="email"type="email" class="form-control" id="email" placeholder="Email">
                 </div>
                 <div class="form-group col-md-12 mb-4  ">
                 <input name="password" type="password" class="form-control" id="password" placeholder="Password">
                 </div>
                </div>
                <input id="button" class="btn btn-primary" name="submit" type="submit" value="Register" name="submit">

              </form>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>






    </form>
</html>