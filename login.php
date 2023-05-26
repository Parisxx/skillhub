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
    <title>Document</title>
</head>
<body>
    <form method="post">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <input type="submit" value="Submit" name="submit">
    </form>
</body>
</html>