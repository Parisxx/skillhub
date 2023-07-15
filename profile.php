<?php
require('initialize.php');
require('auth.php'); 

session_start();

$emailtest = $_SESSION['email'];
$username = $_GET['username'];
$email = $_GET['email'];

$query2=mysqli_query($db,"SELECT * FROM user WHERE username = '$username'")or die(mysqli_error());
$row2=mysqli_fetch_array($query2);

$query3=mysqli_query($db,"SELECT * FROM user WHERE email = '".$_SESSION['email']."'")or die(mysqli_error());
$row3=mysqli_fetch_array($query3);

$query4=mysqli_query($db,"SELECT * FROM work WHERE email = '".$row['email']."'")or die(mysqli_error());
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
<?php require "include/navbar.php" ?>

<?php
if (mysqli_num_rows($query2) > 0) {
?>

<!-- profile -->
  <div class="profile_container">
    <img src="assets/pfp/<?php echo $row2['pfp'];?>" class="profile_image">
    <h1 class="profile_text_big"> <?php echo $row2['firstname'];?> <?php echo $row2['lastname'];?> </h1>
    <p class="profile_text_small"> <?php echo $row2['work'];?> - <?php echo $row2['year_xp'];?> year(s) of experience </p>
    <?php if($emailtest == $row2['email']) {?>
    <a href="profile_edit.php"><button id="edit" class="btn btn-primary">Edit Profile</button></a>
    <?php } else { ?>
      <a href="profile_edit.php"><button id="edit" class="btn btn-primary">Andere knop</button></a>
    <?php };?>

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
    <?php while ($row = mysqli_fetch_array($query2)) { 
      ?>
    <p class="skill"> <?php echo $row4['skills'];?> </p>
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
    <?php mysqli_data_seek($query2, 0); ?>
    <?php while ($row = mysqli_fetch_array($query2)) { ?>
    <img class="work_logo" src="assets/pfp/<?php echo $row['work_pf'];?>">
    <h5> <?php echo $row['work_info'];?> </h5>
    <h6> <?php echo $row['work_co'];?> </h6>
    <p> <?php echo $row['work_xp'];?> year(s) </p>
    <?php } ?>
  </div>
<?php
} else {
  header('location: 404.php');
}
?>
</body>
<script src="assets/js/usermenu.js"></script>
</html>