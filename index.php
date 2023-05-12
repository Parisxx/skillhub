<?php
require('initialize.php');
require('auth.php'); 

$query=mysqli_query($db,"SELECT * FROM user WHERE email = '".$_SESSION['email']."'")or die(mysqli_error());
$row=mysqli_fetch_array($query);
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
    <div class="nav">
        <img src="assets/img/Skillhub.svg">
        <a href="">Find Projects</a>
        <a href="">Find Freelancers</a>
        <i class="fa-light fa-bell"></i>
        <img style="border-radius: 100%;" src="uploads/<?= $row['file_name']; ?>" alt="" class="image">
    </div>
    <h1>Murge <?php echo $row['firstname'];  ?></h1>
    <a href="logout.php">Log out</a>
</body>
</html>