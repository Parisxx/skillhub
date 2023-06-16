<?php
require('initialize.php');
require('auth.php'); 

$username = $_GET['username'];
$skills = $_GET['skills'];

$query2=mysqli_query($db,"SELECT * FROM user WHERE username = '$username'")or die(mysqli_error());
$row2=mysqli_fetch_array($query2);

$query3=mysqli_query($db,"SELECT * FROM user WHERE email = '".$_SESSION['email']."'")or die(mysqli_error());
$row3=mysqli_fetch_array($query3);

$query4=mysqli_query($db,"SELECT * FROM work WHERE skills = '$skills'")or die(mysqli_error());
$row4=mysqli_fetch_array($query4);

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
            <img src="assets/pfp/<?php echo $row3['pfp'];?>" class="image" onclick="toggleMenu()">
        </div>
        <div class="sub-menu-wrap" id="subMenu">
            <div class="sub-menu">
               <a href="profile.php" class="sub-menu-link" id="first-link">
                  <p><i class="fa-light fa-user"></i> Profile</p>
               </a>
               <a href="" class="sub-menu-link">
                  <p><i class="fa-light fa-bookmark"></i> Saved</p>
               </a>
               <a href="" class="sub-menu-link">
                  <p><i class="fa-light fa-gear"></i> Settings</p>
               </a>
               <hr>
               <a href="" class="sub-menu-link">
                  <p><i class="fa-light fa-circle-question"></i> Help Center</p>
               </a>
               <hr>
               <a href="logout.php" class="sub-menu-link">
                  <p><i class="fa-light fa-right-from-bracket"></i> Logout</p>
               </a>
            </div>
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
<?php while ($row = mysqli_fetch_array($query4)) { ?>
<p class="skill"> <?php echo $row['skills'];?> </p>
<?php } ?>
<h4>Location</h4>
<p> <?php echo $row2['location'];?> </p>
<h4>Website</h4>
<a href="https://<?php echo $row2['website'];?>" target="_blank"><?php echo $row2['website'];?></a>
<h4>E-mail adress</h4>
<p> <?php echo $row2['email'];?> </p>
</div>

<div class="skill_container_two">
<h3> Work experience </h3>


<?php mysqli_data_seek($query4, 0); ?>
<?php while ($row = mysqli_fetch_array($query4)) { ?>
<img class="work_logo" src="assets/pfp/<?php echo $row['work_pf'];?>">
<h5> <?php echo $row['work_info'];?> </h5>
<h6> <?php echo $row['work_co'];?> </h6>
<p> <?php echo $row['work_xp'];?> year(s) </p>
<?php } ?>
</div>





</body>
<script src="assets/js/usermenu.js"></script>
</html>