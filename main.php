<?php
require('initialize.php');
require('auth.php'); 

$query=mysqli_query($db,"SELECT * FROM user WHERE email = '".$_SESSION['email']."'")or die(mysqli_error());
$row2=mysqli_fetch_array($query);

$query2=mysqli_query($db,"SELECT * FROM project_post")or die(mysqli_error());

if(isset($_POST['submit'])){

    $email = $_SESSION['email'];
    $title = stripslashes($_REQUEST['title']);
	$title = mysqli_real_escape_string($db,$title);
  $descr = stripslashes($_REQUEST['descr']);
	$descr = mysqli_real_escape_string($db,$descr); 

    $created = date("Y-m-d H:i:s");

    $run = "INSERT INTO `project_post` (email, title, descr, created)
    VALUES ('$email', '$title', '$descr', '$created')";

    $result = mysqli_query($db, $run) or die(mysqli_error($db));
    
    if($result) {
        header('Location: main.php'); 
    }
}

function timeElapsedString($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Skillhub | Home</title>
</head>
<body>
    <div class="nav">
        <div class="nav-logo">
            <a href="main.php"><img class="logo" src="assets/img/logo.png"></a>
        </div>
        <div class="nav-links">
            <a href="" class="btn btn-link text-decoration-none"><div class="active">Find Projects</div></a>
            <a href="" class="btn btn-link text-decoration-none">Find Freelancers</a>
        </div>
        <div class="nav-info">
            <a data-bs-toggle="modal" data-bs-target="#exampleModal" class="test"><i class="fa-light fa-plus"></i></a>
            <i class="fa-light fa-bell"></i>
            <a href="profile.php"><img src="assets/pfp/<?php echo $row2['pfp'];?>" class="image"></a>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">New Post</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" enctype="multipart/form-data">
            <label for="recipient-name" class="col-form-label" name="title">Title:</label>
            <input type="text" class="form-control" id="recipient-name" name="title" required>
            <label for="message-text" class="col-form-label" name="descr">Description:</label>
            <textarea class="form-control" id="message-text" name="descr" required></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="submit">Send message</button>
        </form>
      </div>
    </div>
  </div>
</div>
    <div class="maincontainer">
        <div class="col-sm-4">
            <div class="filter-tab">
                Filter
            </div>
        </div>
        <div class="col-sm-5">
            <div class="project-tab">
                <div class="project-container">
                    <h1>Are you looking for a dream job?</h1>
                    <h2>Skillhub is a place where you can find your dream job in various skills.<br>More than 10.000 jobs are available here.</h2>
                    <div class="search">
                        <input type="text" class="form-control" placeholder="Search your dream job here">
                        <i class="fa-light fa-magnifying-glass"></i>
                    </div>
                </div>
            </div>
            <?php
            $i=0;
            while($row = mysqli_fetch_array($query2)) {
        ?>
            <div class="project-tab" style="background-color: white;">
                <div class="project-container2">
                    <div class="project-info">
                        <img src="assets/pfp/<?php echo $row2['pfp'];?>" class="image-post">

                        <h1 style="color: black;"><?php echo $row['title']; echo "<br />";?>
                        <p><?php  echo $row['sort_job']; echo" • $"; echo  $row['min_salary']; echo" - $"; echo  $row['max_salary']; ?> </p>
                        </br>


                    </div>
                    <h2><?php echo $row['descr']; ?></h2>
                    <div class="date_posted">
                        Posted
                        <?php $datetime = $row['created'];
                        echo timeElapsedString($datetime);?>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
        <div class="col-sm-3">
            <div class="user-tab">
                <a href="profile.php"><img src="assets/pfp/<?php echo $row2['pfp'];?>" class="image2"></a>
                <h1><?php echo $row2['firstname'];?> <?php echo $row2['lastname'];?></h1>
                <p><?php echo $row2['work'];?> - <?php echo "" . $row2['year_xp'] . " year(s) of experience";?></p>
                <a href="profile_edit.php"><button class="btn btn-primary">Edit Profile</button></a>
            </div>
            
        </div>
    </div>
</body>
</html>