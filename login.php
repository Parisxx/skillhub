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
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <input type="submit" value="Submit" name="submit">
    </form>

    <div class="screen-1"><svg class="logo" xmlns="assets/img/logo.png"  version="1.1" width="300" height="300" viewbox="0 0 640 480" xml:space="preserve">
        <g transform="matrix(3.31 0 0 3.31 320.4 240.4)">
            <circle style="stroke: rgb(0,0,0); stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(61,71,133); fill-rule: nonzero; opacity: 1;" cx="0" cy="0" r="40"></circle>
        </g>
        <g transform="matrix(0.98 0 0 0.98 268.7 213.7)">
            <circle style="stroke: rgb(0,0,0); stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" cx="0" cy="0" r="40"></circle>
        </g>
        <g transform="matrix(1.01 0 0 1.01 362.9 210.9)">
            <circle style="stroke: rgb(0,0,0); stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" cx="0" cy="0" r="40"></circle>
        </g>
        <g transform="matrix(0.92 0 0 0.92 318.5 286.5)">
            <circle style="stroke: rgb(0,0,0); stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" cx="0" cy="0" r="40"></circle>
        </g>
        <g transform="matrix(0.16 -0.12 0.49 0.66 290.57 243.57)">
            <polygon style="stroke: rgb(0,0,0); stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" points="-50,-50 -50,50 50,50 50,-50 "></polygon>
        </g>
        <g transform="matrix(0.16 0.1 -0.44 0.69 342.03 248.34)">
            <polygon style="stroke: rgb(0,0,0); stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" vector-effect="non-scaling-stroke" points="-50,-50 -50,50 50,50 50,-50 "></polygon>
        </g>
    </svg>
    <div class="email"><label for="email">Email Address</label>
        <div class="sec-2">
            <ion-icon name="mail-outline"></ion-icon><input type="email" name="email" placeholder="Username@gmail.com" />
        </div>
    </div>
    <div class="password"><label for="password">Password</label>
        <div class="sec-2">
            <ion-icon name="lock-closed-outline"></ion-icon><input class="pas" type="password" name="password" placeholder="············" />
            <ion-icon class="show-hide" name="eye-outline"></ion-icon>
        </div>
    </div><button class="login">Login </button>
    <div class="footer"><span>Sign up</span><span>Forgot Password?</span></div>
</div>


</body>
</html>


