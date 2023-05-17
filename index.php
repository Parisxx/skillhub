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
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Document</title>
</head>
<body>
    <div class="nav">
        <div class="nav-logo">
            <a href="index.php"><img src="assets/img/Skillhub.svg"></a>
        </div>
        <div class="nav-links">
            <a href="" class="btn btn-link text-decoration-none"><div class="active">Find Projects</div></a>
            <a href="" class="btn btn-link text-decoration-none">Find Freelancers</a>
        </div>
        <div class="nav-info">
            <i class="fa-light fa-bell"></i>
            <img style="border-radius: 100%;" src="assets/pfp/<?php echo $row['pfp'];?>" class="image">
        </div>
    </div>
    <div class="maincontainer">
        <div class="col-sm-4">
            <div class="filter-tab">
                dqwd
            </div>
        </div>
        <div class="col-sm-5">
            <div class="project-tab">
                hefuui
            </div>
        </div>
        <div class="col-sm-3">
            <div class="user-tab">
                <img src="assets/pfp/<?php echo $row['pfp'];?>" class="image2">
                <h1>Joseph Kareem</h1>
                <p>Software Developer - 2 years experience</p>
                <a href="profile.php"><button class="btn btn-primary">Edit Profile</button></a>
            </div>
            <div class="experience-tab">
                hwui
            </div>
        </div>
    </div>
    <!-- <h1>Murge <?php echo $row['firstname'];  ?></h1>
    <a href="logout.php">Log out</a> -->
</body>
</html>