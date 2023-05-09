<?php 
 include 'config.php';
 session_start();
 $user_id = $_SESSION['user_id'];

 if(!isset($user_id)){
    header('location: index.php');
 }

 if(isset($_GET['logout'])){
    unset($user_id);
    session_destroy();
    header('Location: index.php');
 }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LEARN</title>
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
    <script src="main.js" defer></script>
    <script src="https://kit.fontawesome.com/088b5af8bf.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/navigation.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>

    <nav class="main-navigation">
        <div class="menu-bar nav-section">
            <div class="menu-logo-holder">
                <a onclick="openMenu()" class="menu-btn">
                    <i class="fa-solid fa-bars"></i>
                </a>
                <a href="main.php" class="logo-name">E-LEARN</a>
            </div>
        </div>
        <div class="search-bar nav-section">
            <div class="search-container">
                <input class="search-input" type="search" placeholder="Search" name="search-bar" id="search">
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>
        </div>
        <div class="side-menu nav-section">
                <a class="side-nav notification" data-tab-tenth-target="#messages">
                    <i class="fa-regular fa-message"></i>
                    <div id="messages" class="dropDown-menu" data-tab-tenth-content>
                        <h5>No messages yet...</h5>
                    </div>
                </a>
                <a class="side-nav notification" data-tab-tenth-target="#notif">
                    <i class="fa-regular fa-solid fa-bell"></i>
                    <div id="notif" class="dropDown-menu" data-tab-tenth-content>
                        <h5>Nothing in here...</h5>
                    </div>
                </a>

                <a href="user_profile.php" class="profile-box">
                    <div class="profile-box-holder">
                    <?php 
                    $select = mysqli_query($conn, "SELECT * FROM `users` WHERE id = '$user_id'") or die ('query failed');

                    if(mysqli_num_rows($select) > 0) {
                        $fetch = mysqli_fetch_assoc($select);
                    }
                    if($fetch['image']==''){
                        echo '<img src="img/default-avatar.png">';
                    } else {
                        echo '<img src="uploaded_img/'.$fetch['image'].'">';
                    }  
                    ?>
                    </div>
                    <?php 
                    $select = mysqli_query($conn, "SELECT * FROM `users` WHERE id = '$user_id'") or die ('query failed');
                    if(mysqli_num_rows($select) > 0) {
                        $fetch = mysqli_fetch_assoc($select);
                    }
                    ?>
                </a>
                <h3><?php echo $fetch['username']; ?></h3>
        </div>
    </nav>
    <nav id="menu-navigation" class="menu-navigation">
        <div class="top-section">
            <a href="main.php" class="eLearn-logo">
                <div class="logo-holder">
                    <img src="img/E-learn logo.svg" alt="">
                </div>
                <h1>E-LEARN</h1>
            </a>
            <i onclick="exitMenu()" class="fa-solid fa-xmark"></i>
        </div>
        <hr>
        <div class="main-menu-navigation-container">
            <a href="user_profile.php" class="nav-profile nav-item">
                <i class="fa-solid fa-user fa-menu-nav"></i>
                <h2>Profile</h2>
            </a>
            <a href="MyFiles.php" class="nav-myFiles nav-item">
                <i class="fa-solid fa-file fa-menu-nav"></i>
                <h2>Files</h2>
            </a>
            <a href="eLibrary.php" class="nav-eLibrary nav-item">
                <i class="fa-solid fa-book fa-menu-nav"></i>
                <h2>E-Library</h2>
            </a>
            <a href="eVideos.php" class="nav-eVideos nav-item">
                <i class="fa-solid fa-play fa-menu-nav"></i>
                <h2>E-Videos</h2>
            </a>
            <a href="#" class="nav-community nav-item">
                <i class="fa-solid fa-users fa-menu-nav"></i>
                <h2>Community</h2>
            </a>
            <a href="#" class="nav-myFavorites nav-item">
                <i class="fa-solid fa-star fa-menu-nav"></i>
                <h2>My Favorites</h2>
            </a>
            <a href="#" class="nav-preferences nav-item">
                <i class="fa-sharp fa-solid fa-asterisk fa-menu-nav"></i>
                <h2>Preferences</h2>
            </a>
            <hr class="divider">
            <a href="main.php?logout=<?php echo $user_id; ?>" class="nav-logOut nav-item">
                <i class="fa-sharp fa-solid fa-asterisk fa-menu-nav"></i>
                <h2>LogOut</h2>
            </a>
        </div>
    </nav>



    <main class="main-container" id="welcome-container">
        <div class="welcome-section">
            <div class="welcome-image">
            </div>
            <div class="welcome-text">
                <h2>WELCOME TO E-L.E.A.R.N</h2>
                <p class="description">E-L.E.A.R.N (Electronic Library for E-Learner's Academic Research and Needs) is an online learning library platform developed to create a learning environment that gives easy access to various resources for the students. This online library focuses on giving the learners more accessible plans on their learning journey to make sure that they don't struggle with their studies.</p>
                <p class="quote">“The more I read, the more I acquire, the more certain I am that I know nothing.” <br>-VOLTAIRE</p>

            </div>
        </div>
    </main>
    <article class="articles">
        <h2>Something that might interest you!</h2>
        <div class="first-article article-item">
            <a href="calculusTopic.php" class="calculus-img article-img">
                <img src="img/calculus.jpg" alt="">
            </a>
            <p>CALCULUS</p>
        </div>
        <div class="second-article article-item">
            <a href="programmingTopic.php" class="programming-img article-img">
                <img src="img/programming.jpg" alt="">
            </a>
            <p>PROGRAMMING</p>
        </div>
        <div class="third-article article-item">
            <a href="architectureTopic.php" class="architecture-img article-img">
                <img src="img/architecture.jpg" alt="">
            </a>
            <p>ARCHITECTURE</p>
        </div>
        <div class="fourth-article article-item">
            <a href="articles/photographyTopic.php" class="photography-img article-img">
                <img src="img/photography.jpg" alt="">
            </a>
            <p>PHOTOGRAPHY</p>
        </div>
        <div class="fifth-article article-item">
            <a href="sportsTopic.php" class="sports-img article-img">
                <img src="img/sports.jpg" alt="">
            </a>
            <p>SPORTS</p>
        </div>
        <div class="sixth-article article-item">
            <a  href="educationTopic.php" class="education-img article-img">
                <img src="img/education.jpg" alt="">
            </a>
            <p>EDUCATION</p>
        </div>
    </article>
    <section class="shortcuts">
            <button class="shortcut-item" onclick="location.href='MyFiles.php'">
                <i class="fa-solid fa-file shortcut-icon"></i>
                <p>My Files</p>
            </button>
            <button class="shortcut-item" onclick="location.href='eLibrary.php'">
                <i class="fa-solid fa-book shortcut-icon"></i>
                <p>E-Library</p>
            </button>
            <button class="shortcut-item" onclick="location.href='eVideos.php'">
                <i class="fa-solid fa-play shortcut-icon"></i>
                <p>E-Videos</p>
            </button>
            <button class="shortcut-item" href="">
                <i class="fa-solid fa-users shortcut-icon"></i>
                <p>Community</p>
            </button>
    </section>
    <footer class="footer">
        <div class="footer-container">
          <ul class="footer-link-holder" >
            <li class="footer-link"><a href="register.php">Sign Up</a></li>
            <li class="footer-link"><a href="index.php">Sign In</a></li>
            <li class="footer-link"><a href="">Services</a></li>
            <li class="footer-link"><a href="">Privacy Policy</a></li>
            <li class="footer-link"><a href="">About</a></li>
            <li class="footer-link"><a href="">Terms</a></li>
            <li class="footer-link"><a href="">Help</a></li>
            <li class="footer-link"><a href="">Contact</a></li>
          </ul>
          <div class="copyright">
            <p>E-LEARN</p>
            <i class="fa-regular fa-copyright"></i>
            <p>2023</p>
          </div>
        </div>
        
      </footer>
    
</body>
</html>