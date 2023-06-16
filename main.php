<?php
require('initialize.php');
require('auth.php'); 

$query3=mysqli_query($db,"SELECT * FROM user WHERE email = '".$_SESSION['email']."'")or die(mysqli_error());
$row3=mysqli_fetch_array($query3);

if(isset($_POST['submit'])){

    $email = $_SESSION['email'];
    $title = stripslashes($_REQUEST['title']);
	$title = mysqli_real_escape_string($db,$title);
    $descr = stripslashes($_REQUEST['descr']);
	$descr = mysqli_real_escape_string($db,$descr); 
    $sort_job = $_POST['sort_job'];
    $min_salary = $_POST['minimum'];
    $max_salary = $_POST['maximum'];
    $created = date("Y-m-d H:i:s");

    $run = "INSERT INTO `project_post` (email, title, descr, sort_job, min_salary, max_salary, created)
    VALUES ('$email', '$title', '$descr', '$sort_job', '$min_salary', '$max_salary', '$created')";

    $result = mysqli_query($db, $run) or die(mysqli_error($db));
    
    if($result) {
        header('Location: main.php'); 
    }
}
$search = $_POST['search'];
// if(isset($_POST['search'])){
//     header("Location: ?search=$search");
// }

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

$page_num = 1;
$page_limit = 5;

if(isset($_GET['page'])){
    $page_num = filter_var($_GET['page'], FILTER_VALIDATE_INT,[
        'options' => [
            'default' => 1,
            'min_range' => 1
        ]
    ]);
}

$page_offset = $page_limit * ($page_num - 1);
$total_posts = mysqli_num_rows(mysqli_query($db,"SELECT * FROM `project_post`"));
$total_page = ceil($total_posts / $page_limit);
$next_page = $page_num+1; 
$prev_page = $page_num-1; 

if($total_page < $page_num){
    header('Location: '.$_SERVER['PHP_SELF']);
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
<?php require "include/navbar.php" ?>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" is-active>
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
            <label for="select_job" class="col-form-label">Sort job:</label>
            <select class="form-select" name="sort_job" aria-label="Default select example" id="select_job" required>
                <option value="">Select...</option>
                <option value="Parttime">Parttime</option>
                <option value="Fulltime">Fulltime</option>
                <option value="Remote">Remote</option>
            </select>
            <div class="priceSlider">
                <label for="min" class="col-form-label">Estimated monthly income:</label>
                <div class="min-max-range">
                    <input style="border-radius: 5px 0px 0px 5px;" type="range" min="500" max="5000" value="2000" class="range" id="min" name="minimum">
                    <input style="border-radius: 0px 5px 5px 0px;" type="range" min="3000" max="10000" value="3000" class="range" id="max" name="maximum">     
                </div>    
                <div class="min-max">
                    <div class="min">
                        <label>Min</label><span id="min-value"></span>
                    </div>
                    <div class="max">
                        <label>Max</label><span id="max-value"></span>
                    </div>     
                </div> 
            </div>
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
                <div class="filter-header">
                    <h1>Filter</h1>
                    <p>Clear all</p>
                </div>
                <div class="location-section">
                    <h1>Locations</h1>
                    <select class="form-select" name="sort_job" aria-label="Default select example" id="select_job" required>
                    <option value="">Select...</option>
                    </select>
                </div>
                <div class="time-section">
                    <h1>Latest - Oldest</h1>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                        <label class="form-check-label" for="flexRadioDefault1">
                            Latest
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Oldest
                        </label>
                    </div>
                </div>
                <div class="job-section">
                    <h1>Job Type</h1>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" checked>
                        <label class="form-check-label" for="defaultCheck1">
                            Fulltime Job
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" checked>
                        <label class="form-check-label" for="defaultCheck1">
                            Part-time Job
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" checked>
                        <label class="form-check-label" for="defaultCheck1">
                            Remote
                        </label>
                    </div>
                </div>
                <div class="salary-section">
                    <h1>Expected Salary</h1>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Under $1000
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                        <label class="form-check-label" for="flexRadioDefault1">
                            $1000 - $10,000
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-5">
            <div class="project-tab">
                <div class="project-container">
                    <h1>Are you looking for a dream job?</h1>
                    <h2>Skillhub is a place where you can find your dream job in various skills. More than 10.000 jobs are available here.</h2>
                    <div class="search">
                        <form method="post">
                            <input type="text" class="form-control" name="search" placeholder="Search your dream job here">
                            <i class="fa-light fa-magnifying-glass"></i>
                        </form>
                    </div>
                </div>
            </div>
            <?php
            $sql = "SELECT * FROM project_post WHERE title LIKE '%$search%' OR descr LIKE '%$search%' ORDER BY created DESC LIMIT $page_limit OFFSET $page_offset";
            $result = mysqli_query($db, $sql);
            if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
            $query6=mysqli_query($db,"SELECT * FROM user WHERE email = '".$row['email']."'")or die(mysqli_error());
            $row2=mysqli_fetch_array($query6);
            ?>
    <div class="project-tab" style="background-color: white;">
        <div class="project-container2">
            <div class="project-info">
                <a href="<?php echo $row2['username']; ?>"><img src="assets/pfp/<?php echo $row2['pfp'];?>" class="image-post"></a>
                <a href="<?php echo $row2['username']; ?>"><h1><?php echo $row['title']; echo "<br />";?></a>
                <p><?php  echo $row['sort_job']; echo" • $"; echo  $row['min_salary']; echo" - $"; echo  $row['max_salary']; ?> </p>
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
    } else {
    echo "No results found.";
    }
    mysqli_close($db);
            ?>
                <ul class="pagination">
        <?php
            if($page_num > 1):
                echo '<li><a href="?page='.$prev_page.'" class="page_link"><i class="fa-solid fa-angle-left"></i></a></li>';
            endif;

            for($i = 1; $i <= $total_page; $i++):
                if($i == $page_num){
                    echo '<li><span>'.$i.'</span></li>';
                }else{
                    echo '<li><a href="?page='.$i.'">'.$i.'</a></li>';
                }
            endfor;

            if($total_page+1 != $next_page):
                echo '<li><a href="?page='.$next_page.'" class="page_link"><i class="fa-solid fa-angle-right"></i></a></li>';
            endif;
        ?>
    </ul>
        </div>
        <div class="col-sm-3">
            <div class="user-tab">
                <a href="profile.php"><img src="assets/pfp/<?php echo $row3['pfp'];?>" class="image2"></a>
                <h1><?php echo $row3['firstname'];?> <?php echo $row3['lastname'];?></h1>
                <p><?php echo $row3['work'];?> - <?php echo "" . $row3['year_xp'] . " year(s) of experience";?></p>
                <a href="profile_edit.php"><button class="btn btn-primary">Edit Profile</button></a>
            </div>
            
        </div>
    </div>
</body>
<script src="assets/js/slider.js"></script>
<script src="assets/js/usermenu.js"></script>
</html>