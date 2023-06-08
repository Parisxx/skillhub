<?php
  require('initialize.php'); 
  require('auth.php'); 

  if (isset($_POST['upload'])) {
  	$image = $_FILES['image']['name'];
	$email = $_SESSION['email'];
	$id = $_GET['id'];
  	$target = "assets/pfp/".basename($image);

	$sql = "UPDATE user SET pfp = '$image' WHERE email = '$email'";
  	mysqli_query($db, $sql);
	 if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
		header('location: profile_edit.php');
  	}else{
  		echo"Failed to upload image";
  	}
  }
  $result = mysqli_query($db, "SELECT * FROM user");
?>

