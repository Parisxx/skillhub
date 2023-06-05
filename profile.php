<?php
require('initialize.php');
require('auth.php'); 

$query=mysqli_query($db,"SELECT * FROM user WHERE email = '".$_SESSION['email']."'")or die(mysqli_error());
$row2=mysqli_fetch_array($query);

$query=mysqli_query($db,"SELECT * FROM work WHERE email = '".$_SESSION['email']."'")or die(mysqli_error());
$row3=mysqli_fetch_array($query);



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
            <a href="main.php" class="btn btn-link text-decoration-none">Find Projects</a>
            <a href="freelancer.php" class="btn btn-link text-decoration-none">Find Freelancers</a>
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
<h1>Experience</h1>
<p> <?php echo $row2['xp'];?> </p>
<hr>
<h1>About me</h1>
<p> <?php echo $row2['aboutme'];?> </p>
</div>



<div class="skill_container_one">
<h4>Skills</h4>
<p> <?php echo $row3['skills'];?> </p>
<h4>Location</h4>
<p> <?php echo $row2['location'];?> </p>
<h4>Website</h4>
<a href="https://<?php echo $row2['website'];?>" target="_blank"><?php echo $row2['website'];?></a>
<h4>E-mail adress</h4>
<p> <?php echo $row2['email'];?> </p>
</div>

<div class="skill_container_two">
<h3> Work experience </h3>

<img class="work_logo" src="assets/img/<?php echo $row3['work_pf'];?>">
<div class="work">
<h5> <?php echo $row3['work_co'];?> </h5>
<p> <?php echo $row3['work_xp'];?> year(s) experience </p>
<p> <?php echo $row3['work_info'];?> </p>
</div>
</div>




</body>
</html>