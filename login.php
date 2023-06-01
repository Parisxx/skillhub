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
    <form method="post">
        <input type="email" name="email" placeholder="Email" class="password">
        <input type="password" name="password" placeholder="Password" class="password">
        <input type="submit" value="Submit" name="submit" class="submit">
    </form>

    <div class="screen-1"><svg class="logo" xmlns="assets/img/logo.png"  version="1.1" width="300" height="300" viewbox="0 0 640 480" xml:space="preserve">
    <div namespace="email"><label for="email">Email Address</label>
        <div class="sec-2">
            <ion-icon name="mail"></ion-icon><input type="email" name="email" placeholder="Username@gmail.com" />
        </div>
    </div>
    <div class="password"><label for="password">Password</label>
        <div class="sec-2">
            <ion-icon name="lock-closed-outline"></ion-icon><input class="password" type="password" name="password" placeholder="············" />
            <ion-icon class="show-hide" name="eye-outline"></ion-icon>
        </div>
    </div><button class="submit">Login </button>
    <div class="footer"><span>Sign up</span><span>Forgot Password?</span></div>
</div>


</body>
</html>


