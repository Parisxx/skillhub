<?php
  require('initialize.php'); 
  require('auth.php'); 

  if (isset($_POST['upload'])) {
  	$image = $_FILES['image']['name'];
	$email = $_SESSION['email'];
	$id = $_GET['id'];
  	$target = "uploads/".basename($image);

	$sql = "UPDATE userinfo SET file_name = '$image' WHERE email = '$email'";
  	mysqli_query($db, $sql);
	 if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
		header('location: profile');
  	}else{
  		echo"Failed to upload image";
  	}
  }
  $result = mysqli_query($db, "SELECT * FROM userinfo");
?>

