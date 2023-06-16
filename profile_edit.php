<?php
require('initialize.php');
require('auth.php'); 

$query1=mysqli_query($db,"SELECT * FROM user WHERE email = '".$_SESSION['email']."'")or die(mysqli_error());
$row2=mysqli_fetch_array($query1);

$query3=mysqli_query($db,"SELECT * FROM user WHERE email = '".$_SESSION['email']."'")or die(mysqli_error());
$row3=mysqli_fetch_array($query3);

$query2=mysqli_query($db,"SELECT * FROM work WHERE email = '".$_SESSION['email']."'")or die(mysqli_error());


if (isset($_POST['submit'])) {
    // Retrieve form inputs
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $work = $_POST['work'];
    $year_xp = $_POST['year_xp'];
    $email = $_SESSION['email'];

    // Construct the update query dynamically based on the provided inputs
    $updateFields = array();
    if (!empty($firstname)) {
        $updateFields[] = "firstname = '$firstname'";
    }
    if (!empty($lastname)) {
        $updateFields[] = "lastname = '$lastname'";
    }
    if (!empty($work)) {
        $updateFields[] = "work = '$work'";
    }
    if (!empty($year_xp)) {
        $updateFields[] = "year_xp = '$year_xp'";
    }

    // Check if any input field is updated
    if (empty($updateFields)) {
        echo "Please provide at least one value to update.";
    } else {
        // Construct the update query
        $updateQuery = "UPDATE user SET " . implode(", ", $updateFields) . " WHERE email = '$email'";

        // Execute the update query
        if (mysqli_query($db, $updateQuery)) {
            header("Refresh:0");
        } else {
            echo "Error updating profile: " . mysqli_error($db);
        }
    }

    mysqli_close($db);
}


?>



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
<?php require "include/navbar.php" ?>

<!-- profile -->
<div class="profile_container">


<form action="upload.php" method="post" enctype="multipart/form-data">
    <div class="container-image">
        <div class="middle">
            <label class="change-pfp">
                <input type="file" name="image" onchange="readURL(this);" hidden required/>
                <i class="fa-light fa-pen-to-square"></i>
            </label>
        </div>
        <img src="assets/pfp/<?= $row2['pfp']; ?>" id="image-change" class="profile_image_two">
        <input id="edit_two" type="submit" value="Save picture" name="upload" class="btn btn-primary">
    </div>
</form>

<form action="profile_edit.php" method="post" enctype="multipart/form-data">
    <input class="profile_text_edit" type="text" name="firstname" placeholder=" <?php echo $row2['firstname'];?>">
    <input class="profile_text_edit_two" type="text" name="lastname" placeholder=" <?php echo $row2['lastname'];?>">
    <input class="profile_text_small_edit" type="text" name="work" placeholder=" <?php echo $row2['work'];?>">
    <label class="label">-</label>
    <input class="profile_text_small_edit_two" type="text" name="year_xp" placeholder=" <?php echo $row2['year_xp'];?>">
    <label class="label">year(s) of experience</label>
    <input id="edit" type="submit" value="Save profile" name="submit" class="btn btn-primary">
</form>

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
<script src="assets/js/usermenu.js"></script>
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