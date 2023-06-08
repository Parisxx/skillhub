<?php
require('initialize.php');
require('auth.php'); 

$query1=mysqli_query($db,"SELECT * FROM user WHERE email = '".$_SESSION['email']."'")or die(mysqli_error());
$row2=mysqli_fetch_array($query1);

$query2=mysqli_query($db,"SELECT * FROM work WHERE email = '".$_SESSION['email']."'")or die(mysqli_error());

// profile picture edit

// $sql = "SELECT id FROM user";
// $result = mysqli_query($db, $sql);

// if ($result) {
//     // Iterate through each user
//     while ($row = mysqli_fetch_assoc($result)) {
//         $userId = $row2['id'];
//         $newProfilePicturePath = "picture.png";

//         // Update the profile picture path for the current user
//         $updateSql = "UPDATE user SET pfp = '$newProfilePicturePath' WHERE id = $userId";
//         $updateResult = mysqli_query($db, $updateSql);

//         if ($updateResult) {
//             echo "Profile picture updated successfully for user with ID: $userId<br>";
//         } else {
//             echo "Failed to update the profile picture for user with ID: $userId<br>";
//         }
//     }
// } else {
//     echo "Error retrieving user IDs from the database.";
// }

// // Close the database connection
// mysqli_close($db);
// ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skillhub | Profile edit</title>
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


<form action="upload.php" method="post" enctype="multipart/form-data">
                <div class="container-image">
                <div class="middle">
                        <label class="change-pfp">
                            <input type="file" name="image" onchange="readURL(this);" hidden/>
                            <i class="fa-light fa-pen-to-square"></i>
                        </label>
                    </div>
                    <img style="border-radius: 100%;" src="assets/pfp/<?= $row2['pfp']; ?>" id="image-change" class="image2">
                </div>
                <input type="submit" value="Save" name="upload" class="btn btn-primary">
                </form>


<!-- <img src="assets/pfp/<?php echo $row2['pfp'];?>" class="profile_image"> -->
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
<?php while ($row3 = mysqli_fetch_array($query2)) { ?>
<p class="skill"> <?php echo $row3['skills'];?> </p>
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
<?php while ($row3 = mysqli_fetch_array($query2)) { ?>
<img class="work_logo" src="assets/pfp/<?php echo $row3['work_pf'];?>">
<h5> <?php echo $row3['work_info'];?> </h5>
<h6> <?php echo $row3['work_co'];?> </h6>
<p> <?php echo $row3['work_xp'];?> year(s) </p>
<?php } ?>
</div>





</body>
<script>
function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#image-change')
                        .attr('src', e.target.result)
                        .width(130)
                        .height(130);
                };

                reader.readAsDataURL(input.files[0]);
            }
}</script>
</html>