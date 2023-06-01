<?php

require('initialize.php');
session_start();

$error = "";
if (isset($_POST['submit'])) { 
    $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($db, $_POST['lastname']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db,  $_POST['password']); 
     
    if (!$_POST['firstname']) {
      echo"Name is required <br>";
     }
    if (!$email) {
        echo"Email is required <br>";
     }
    if (!$password) {
        echo"Password is required <br>";
     } 
     if ($error) {
        echo"<b>There were error(s) in your form!</b> <br>".$error;
     }  else {
       
        $query = "SELECT id FROM user WHERE email = '$email'";
        $result = mysqli_query($db, $query);
        if (mysqli_num_rows($result) > 0) {
            echo"<p>Your email has taken already!</p>";
        } else {
            $query = "INSERT INTO user (firstname, lastname, email, password) VALUES ('$firstname', '$lastname', '$email', '".md5($password)."')";
            if (!mysqli_query($db, $query)){
                echo"<p>Could not sign you up - please try again.</p>";
                } else {
                $_SESSION['id'] = mysqli_insert_id($db);  
                $_SESSION['email'] = $email;
                header("Location: login.php");  
                }
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
    <title>Register</title>
    <link rel="stylesheet" href="assets/css/register.css">
</head>
<body>
    <h1 class="text-center">Register</h1>
    <form method="post">
        <input type="text" class="form-control" name="firstname" placeholder="Firstname" required>
        <input type="text" class="form-control" name="lastname" placeholder="Lastname" required>
        <input type="email" class="form-control" name="email" placeholder="Email" required>
        <input type="password" class="form-control" name="password" placeholder="Password" required>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
</html>