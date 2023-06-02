<?php
require('initialize.php');
require('auth.php'); 

$query=mysqli_query($db,"SELECT * FROM user WHERE email = '".$_SESSION['email']."'")or die(mysqli_error());
$row2=mysqli_fetch_array($query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skillhub | Profile</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<!-- navbar -->
    <div class="nav">
        <div class="nav-logo">
            <a href="main.php"><img class="logo" src="assets/img/logo.png"></a>
        </div>
        <div class="nav-links">
            <a href="" class="btn btn-link text-decoration-none">Find Projects</a>
            <a href="" class="btn btn-link text-decoration-none">Find Freelancers</a>
        </div>
        <div class="nav-info">
            <i class="fa-light fa-bell"></i>
            <a href="profile.php"><img src="assets/pfp/<?php echo $row2['pfp'];?>" class="image"></a>
        </div>
    </div>

<!-- profile -->
<div class="profile_container">
<img src="assets/pfp/<?php echo $row2['pfp'];?>" class="profile_image">
<h1 class="profile_text_big"> <?php echo $row2['firstname'];?> <?php echo $row2['lastname'];?> </h1>
<p class="profile_text_small"> <?php echo $row2['work'];?> - <?php echo $row2['year_xp'];?> year(s) of experience </p>
<a href="profile_edit.php"><button id="edit" class="btn btn-primary">Edit Profile</button></a>
</div>

<div class="about_container">

</div>

<!-- <div class="skill_container">

</div> -->

</body>
</html>