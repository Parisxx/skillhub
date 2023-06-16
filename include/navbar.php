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
            <img src="assets/pfp/<?php echo $row3['pfp'];?>" class="image" onclick="toggleMenu()">
        </div>
            <div class="sub-menu-wrap" id="subMenu">
            <div class="sub-menu">
               <a href="<?php echo $row3['username']; ?>" class="sub-menu-link" id="first-link">
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