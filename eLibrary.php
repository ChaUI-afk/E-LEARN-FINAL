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
    <link rel="stylesheet" href="css/eLibrary.css">
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
    <main class="library-container">


        <!-- THIS IS THE LEFT SIDE NAVIGATION SECTION -->
        <section class="main-library-navigation">
            <h5 class="depCategory">DEPARTMENT CATEGORY</h5>
        <!--First Tab to Appear-->
            <section id="departmentNavTab" class="left-nav-container active">
                <a href="#" data-tab-target="#ceatNavTab" class="main-library-item">
                    <h3>College of Engineering Architecture and Technology</h3>
                </a>
                <a href="#" data-tab-target="#cbetNavTab" class="main-library-item">
                    <h3>College of Business and Entrepreneurial Technology</h3>
                </a>
                <a href="#" data-tab-target="#casNavTab" class="main-library-item">
                    <h3>College of Arts and Sciences</h3>
                </a>
                <a href="#" data-tab-target="#coeNavTab" class="main-library-item">
                    <h3>College of Education</h3>
                </a>
                <a href="#" data-tab-target="#ipersNavTab" class="main-library-item">
                    <h3>Institute of Physical Education, Recreation and Sports</h3>
                </a>
            </section>
        <!--Second Tab to Appear after Choosing something in the First Tab-->
            <section id="ceatNavTab" class="left-nav-container" data-tab-content>
                <i onclick="exitTab()" class="fa-solid fa-arrow-left second-nav-"></i>
                <a href="#" class="main-library-item" data-tab-second-target="#BSA">
                    <h3>Bachelor of Science in Architecture</h3>
                </a>
                <a href="#" class="main-library-item" data-tab-second-target="#BSCpE">
                    <h3>Bachelor of Science in Computer Engineering</h3>
                </a>
                <a href="#" class="main-library-item" data-tab-second-target="#BSEE">
                    <h3>Bachelor of Science in Electrical Engineering</h3>
                </a>
                <a href="#" class="main-library-item" data-tab-second-target="#BSECE">
                    <h3>Bachelor of Science in Electronics Engineering</h3>
                </a>
                <a href="#" class="main-library-item" data-tab-second-target="#BSIE">
                    <h3>Bachelor of Science in Industrial Engineering</h3>
                </a>
                <a href="#" class="main-library-item" data-tab-second-target="#BSIT">
                    <h3>Bachelor or Science in Information Technology</h3>
                </a>
                <a href="#" class="main-library-item" data-tab-second-target="#BSICE">
                    <h3>Bachelor of Science in Instrumentation and Control Engineering</h3>
                </a>
                <a href="#" class="main-library-item" data-tab-second-target="#BSME">
                    <h3>Bachelor of Science in Mechanical Engineering</h3>
                </a>
                <a href="#" class="main-library-item" data-tab-second-target="#BSCE">
                    <h3>Bachelor of Science in Civil Engineering</h3>
                </a>
                <a href="#" class="main-library-item" data-tab-second-target="#BSMCE">
                    <h3>Bachelor of Science in Mechatronics Engineering</h3>
                </a>
            </section>
            <section id="cbetNavTab" class="left-nav-container" data-tab-content>
                <i onclick="exitTab()" class="fa-solid fa-arrow-left second-nav-"></i>
                <a href="#" class="main-library-item" data-tab-second-target="#BSAc">
                    <h3>Bachelor of Science in Accountancy</h3>
                </a>
                <a href="#" class="main-library-item" data-tab-second-target="#BSEn">
                    <h3>Bachelor of Science in Entrepreneurship</h3>
                </a>
                <a href="#" class="main-library-item" data-tab-second-target="#BSOA">
                    <h3>Bachelor of Science in Office Administration</h3>
                </a>
                <a href="#" class="main-library-item" data-tab-second-target="#BSBAMOM">
                    <h3>Bachelor of Science in Business Administration Major in Operation Management</h3>
                </a>
                <a href="#" class="main-library-item" data-tab-second-target="#BSBAMMM">
                    <h3>Bachelor of Science in Business Administration Major in Marketing Management</h3>
                </a>
                <a href="#" class="main-library-item" data-tab-second-target="#BSBAMFM">
                    <h3>Bachelor of Science in Business Administration Major in Financial Management</h3>
                </a>
                <a href="#" class="main-library-item" data-tab-second-target="#BSBAMHRDM">
                    <h3>Bachelor or Science in Business Administration Major in Human Resource Development Management</h3>
                </a>
            </section>
            <section id="casNavTab" class="left-nav-container" data-tab-content>
                <i onclick="exitTab()" class="fa-solid fa-arrow-left second-nav-"></i>
                <a href="#" class="main-library-item" data-tab-second-target="#BSP">
                    <h3>Bachelor of Science in Psychology</h3>
                </a>
                <a href="#" class="main-library-item" data-tab-second-target="#BAPS">
                    <h3>Bachelor of Arts in Political Science</h3>
                </a>
                <a href="#" class="main-library-item" data-tab-second-target="#BSS">
                    <h3>Bachelor of Science in Statistics</h3>
                </a>
                <a href="#" class="main-library-item" data-tab-second-target="#BSB">
                    <h3>Bachelor of Science in Biology</h3>
                </a>
                <a href="#" class="main-library-item" data-tab-second-target="#BSAst">
                    <h3>Bachelor of Science in Astronomy</h3>
                </a>
            </section>
            <section id="coeNavTab" class="left-nav-container" data-tab-content>
                <i onclick="exitTab()" class="fa-solid fa-arrow-left second-nav-"></i>
                <a href="#" class="main-library-item" data-tab-second-target="#BSEdME">
                    <h3>Bachelor of Secondary Education Major in English</h3>
                </a>
                <a href="#" class="main-library-item" data-tab-second-target="#BSEdMM">
                    <h3>Bachelor of Secondary Education Major in Math</h3>
                </a>
                <a href="#" class="main-library-item" data-tab-second-target="#BSEdMS">
                    <h3>Bachelor of Secondary Education Major in Sciences</h3>
                </a>
                <a href="#" class="main-library-item" data-tab-second-target="#BSEdMSS">
                    <h3>Bachelor of Secondary Education Major in Social Studies</h3>
                </a>
                <a href="#" class="main-library-item" data-tab-second-target="#BSEdMF">
                    <h3>Bachelor of Secondary Education Major in Filipino</h3>
                </a>
                <a href="#" class="main-library-item" data-tab-second-target="#BTVTEMA">
                    <h3>Bachelor or Technical-Vocational Teacher Education Major in Animation</h3>
                </a>
                <a href="#" class="main-library-item" data-tab-second-target="#BTVTEMCS">
                    <h3>Bachelor or Technical-Vocational Teacher Education Major in Computer System Servicing</h3>
                </a>
                <a href="#" class="main-library-item" data-tab-second-target="#BTVTEMVGD">
                    <h3>Bachelor or Technical-Vocational Teacher Education Major in Visual Graphic Design</h3>
                </a>
                <a href="#" class="main-library-item" data-tab-second-target="#BTVTEMGFD">
                    <h3>Bachelor or Technical-Vocational Teacher Education Major in Garments Fashion and Design</h3>
                </a>
                <a href="#" class="main-library-item" data-tab-second-target="#BTVTEMET">
                    <h3>Bachelor or Technical-Vocational Teacher Education Major in Electronics Technology</h3>
                </a>
                <a href="#" class="main-library-item" data-tab-second-target="#BTVTEMWFT">
                    <h3>Bachelor or Technical-Vocational Teacher Education Major in Welding and Fabrications Technology</h3>
                </a>
            </section>
            <section id="ipersNavTab" class="left-nav-container" data-tab-content>
                <i onclick="exitTab()" class="fa-solid fa-arrow-left second-nav-"></i>
                <a href="#" class="main-library-item" data-tab-second-target="#BSPE">
                    <h3>Bachelor of Science in Physical Education</h3>
                </a>

            </section>
            <!--Third Tab to Appear after Choosing something in the Second Tab of CEAT NAVIGATION-->
            <section id="BSA" class="left-nav-container" data-tab-second-content>
                <i onclick="exitTab()" class="fa-solid fa-arrow-left second-nav-"></i>
                    <a href="#" class="main-library-item">
                        <h3>1st YEAR 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>1st YEAR 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>2nd YEAR 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>2nd YEAR 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>3rd Year 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>3rd Year 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>4th Year 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>4th Year 2nd Semester</h3>
                    </a>
            </section>
            <section id="BSCpE" class="left-nav-container" data-tab-second-content>
                <i onclick="exitTab()" class="fa-solid fa-arrow-left second-nav-"></i>
                    <a href="#" class="main-library-item" data-tab-third-target="#BS-CpE-11">
                        <h3>1st YEAR 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item" data-tab-third-target="#BS-CpE-12">
                        <h3>1st YEAR 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item" data-tab-third-target="#BS-CpE-21">
                        <h3>2nd YEAR 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item" data-tab-third-target="#BS-CpE-22">
                        <h3>2nd YEAR 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item" data-tab-third-target="#BS-CpE-31">
                        <h3>3rd Year 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item" data-tab-third-target="#BS-CpE-32">
                        <h3>3rd Year 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item" data-tab-third-target="#BS-CpE-41">
                        <h3>4th Year 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item" data-tab-third-target="#BS-CpE-42">
                        <h3>4th Year 2nd Semester</h3>
                    </a>
            </section>
            <section id="BSEE" class="left-nav-container" data-tab-second-content>
                <i onclick="exitTab()" class="fa-solid fa-arrow-left second-nav-"></i>
                    <a href="#" class="main-library-item">
                        <h3>1st YEAR 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>1st YEAR 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>2nd YEAR 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>2nd YEAR 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>3rd Year 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>3rd Year 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>4th Year 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>4th Year 2nd Semester</h3>
                    </a>
            </section>
            <section id="BSIE" class="left-nav-container" data-tab-second-content>
                <i onclick="exitTab()" class="fa-solid fa-arrow-left second-nav-"></i>
                    <a href="#" class="main-library-item">
                        <h3>1st YEAR 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>1st YEAR 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>2nd YEAR 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>2nd YEAR 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>3rd Year 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>3rd Year 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>4th Year 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>4th Year 2nd Semester</h3>
                    </a>
            </section>
            <section id="BSIT" class="left-nav-container" data-tab-second-content>
                <i onclick="exitTab()" class="fa-solid fa-arrow-left second-nav-"></i>
                    <a href="#" class="main-library-item">
                        <h3>1st YEAR 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>1st YEAR 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>2nd YEAR 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>2nd YEAR 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>3rd Year 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>3rd Year 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>4th Year 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>4th Year 2nd Semester</h3>
                    </a>
            </section>
            <section id="BSICE" class="left-nav-container" data-tab-second-content>
                <i onclick="exitTab()" class="fa-solid fa-arrow-left second-nav-"></i>
                    <a href="#" class="main-library-item">
                        <h3>1st YEAR 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>1st YEAR 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>2nd YEAR 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>2nd YEAR 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>3rd Year 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>3rd Year 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>4th Year 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>4th Year 2nd Semester</h3>
                    </a>
            </section>
            <section id="BSECE" class="left-nav-container" data-tab-second-content>
                <i onclick="exitTab()" class="fa-solid fa-arrow-left second-nav-"></i>
                    <a href="#" class="main-library-item">
                        <h3>1st YEAR 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>1st YEAR 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>2nd YEAR 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>2nd YEAR 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>3rd Year 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>3rd Year 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>4th Year 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>4th Year 2nd Semester</h3>
                    </a>
            </section>
            <section id="BSME" class="left-nav-container" data-tab-second-content>
                <i onclick="exitTab()" class="fa-solid fa-arrow-left second-nav-"></i>
                    <a href="#" class="main-library-item">
                        <h3>1st YEAR 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>1st YEAR 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>2nd YEAR 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>2nd YEAR 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>3rd Year 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>3rd Year 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>4th Year 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>4th Year 2nd Semester</h3>
                    </a>
            </section>
            <section id="BSCE" class="left-nav-container" data-tab-second-content>
                <i onclick="exitTab()" class="fa-solid fa-arrow-left second-nav-"></i>
                    <a href="#" class="main-library-item">
                        <h3>1st YEAR 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>1st YEAR 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>2nd YEAR 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>2nd YEAR 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>3rd Year 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>3rd Year 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>4th Year 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>4th Year 2nd Semester</h3>
                    </a>
            </section>
            <section id="BSMCE" class="left-nav-container" data-tab-second-content>
                <i onclick="exitTab()" class="fa-solid fa-arrow-left second-nav-"></i>
                    <a href="#" class="main-library-item">
                        <h3>1st YEAR 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>1st YEAR 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>2nd YEAR 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>2nd YEAR 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>3rd Year 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>3rd Year 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>4th Year 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>4th Year 2nd Semester</h3>
                    </a>
            </section>
            <!--Third Tab to Appear after Choosing something in the Second Tab of CBET NAVIGATION-->
            <section id="BSAc" class="left-nav-container" data-tab-second-content>
                <i onclick="exitTab()" class="fa-solid fa-arrow-left second-nav-"></i>
                    <a href="#" class="main-library-item">
                        <h3>1st YEAR 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>1st YEAR 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>2nd YEAR 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>2nd YEAR 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>3rd Year 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>3rd Year 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>4th Year 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>4th Year 2nd Semester</h3>
                    </a>
            </section>
            <section id="BSEn" class="left-nav-container" data-tab-second-content>
                <i onclick="exitTab()" class="fa-solid fa-arrow-left second-nav-"></i>
                    <a href="#" class="main-library-item">
                        <h3>1st YEAR 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>1st YEAR 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>2nd YEAR 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>2nd YEAR 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>3rd Year 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>3rd Year 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>4th Year 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>4th Year 2nd Semester</h3>
                    </a>
            </section>
            <section id="BSOA" class="left-nav-container" data-tab-second-content>
                <i onclick="exitTab()" class="fa-solid fa-arrow-left second-nav-"></i>
                    <a href="#" class="main-library-item">
                        <h3>1st YEAR 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>1st YEAR 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>2nd YEAR 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>2nd YEAR 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>3rd Year 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>3rd Year 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>4th Year 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>4th Year 2nd Semester</h3>
                    </a>
            </section>
            <section id="BSBAMOM" class="left-nav-container" data-tab-second-content>
                <i onclick="exitTab()" class="fa-solid fa-arrow-left second-nav-"></i>
                    <a href="#" class="main-library-item">
                        <h3>1st YEAR 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>1st YEAR 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>2nd YEAR 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>2nd YEAR 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>3rd Year 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>3rd Year 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>4th Year 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>4th Year 2nd Semester</h3>
                    </a>
            </section>
            <section id="BSBAMMM" class="left-nav-container" data-tab-second-content>
                <i onclick="exitTab()" class="fa-solid fa-arrow-left second-nav-"></i>
                    <a href="#" class="main-library-item">
                        <h3>1st YEAR 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>1st YEAR 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>2nd YEAR 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>2nd YEAR 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>3rd Year 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>3rd Year 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>4th Year 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>4th Year 2nd Semester</h3>
                    </a>
            </section>
            <section id="BSBAMFM" class="left-nav-container" data-tab-second-content>
                <i onclick="exitTab()" class="fa-solid fa-arrow-left second-nav-"></i>
                    <a href="#" class="main-library-item">
                        <h3>1st YEAR 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>1st YEAR 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>2nd YEAR 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>2nd YEAR 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>3rd Year 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>3rd Year 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>4th Year 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>4th Year 2nd Semester</h3>
                    </a>
            </section>
            <section id="BSBAMHRDM" class="left-nav-container" data-tab-second-content>
                <i onclick="exitTab()" class="fa-solid fa-arrow-left second-nav-"></i>
                    <a href="#" class="main-library-item">
                        <h3>1st YEAR 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>1st YEAR 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>2nd YEAR 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>2nd YEAR 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>3rd Year 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>3rd Year 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>4th Year 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>4th Year 2nd Semester</h3>
                    </a>
            </section>
            <!--Third Tab to Appear after Choosing something in the Second Tab of CAS NAVIGATION-->
            <section id="BSP" class="left-nav-container" data-tab-second-content>
                <i onclick="exitTab()" class="fa-solid fa-arrow-left second-nav-"></i>
                    <a href="#" class="main-library-item">
                        <h3>1st YEAR 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>1st YEAR 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>2nd YEAR 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>2nd YEAR 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>3rd Year 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>3rd Year 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>4th Year 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>4th Year 2nd Semester</h3>
                    </a>
            </section>
            <section id="BAPS" class="left-nav-container" data-tab-second-content>
                <i onclick="exitTab()" class="fa-solid fa-arrow-left second-nav-"></i>
                    <a href="#" class="main-library-item">
                        <h3>1st YEAR 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>1st YEAR 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>2nd YEAR 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>2nd YEAR 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>3rd Year 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>3rd Year 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>4th Year 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>4th Year 2nd Semester</h3>
                    </a>
            </section>
            <section id="BSS" class="left-nav-container" data-tab-second-content>
                <i onclick="exitTab()" class="fa-solid fa-arrow-left second-nav-"></i>
                    <a href="#" class="main-library-item">
                        <h3>1st YEAR 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>1st YEAR 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>2nd YEAR 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>2nd YEAR 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>3rd Year 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>3rd Year 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>4th Year 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>4th Year 2nd Semester</h3>
                    </a>
            </section>
            <section id="BSB" class="left-nav-container" data-tab-second-content>
                <i onclick="exitTab()" class="fa-solid fa-arrow-left second-nav-"></i>
                    <a href="#" class="main-library-item">
                        <h3>1st YEAR 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>1st YEAR 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>2nd YEAR 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>2nd YEAR 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>3rd Year 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>3rd Year 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>4th Year 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>4th Year 2nd Semester</h3>
                    </a>
            </section>
            <section id="BSAst" class="left-nav-container" data-tab-second-content>
                <i onclick="exitTab()" class="fa-solid fa-arrow-left second-nav-"></i>
                    <a href="#" class="main-library-item">
                        <h3>1st YEAR 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>1st YEAR 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>2nd YEAR 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>2nd YEAR 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>3rd Year 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>3rd Year 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>4th Year 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>4th Year 2nd Semester</h3>
                    </a>
            </section>
            <!--Third Tab to Appear after Choosing something in the Second Tab of COE NAVIGATION-->
            <section id="BSEdME" class="left-nav-container" data-tab-second-content>
                <i onclick="exitTab()" class="fa-solid fa-arrow-left second-nav-"></i>
                    <a href="#" class="main-library-item">
                        <h3>1st YEAR 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>1st YEAR 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>2nd YEAR 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>2nd YEAR 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>3rd Year 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>3rd Year 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>4th Year 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>4th Year 2nd Semester</h3>
                    </a>
            </section>
            <section id="BSEdMM" class="left-nav-container" data-tab-second-content>
                <i onclick="exitTab()" class="fa-solid fa-arrow-left second-nav-"></i>
                    <a href="#" class="main-library-item">
                        <h3>1st YEAR 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>1st YEAR 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>2nd YEAR 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>2nd YEAR 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>3rd Year 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>3rd Year 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>4th Year 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>4th Year 2nd Semester</h3>
                    </a>
            </section>
            <section id="BSEdMS" class="left-nav-container" data-tab-second-content>
                <i onclick="exitTab()" class="fa-solid fa-arrow-left second-nav-"></i>
                    <a href="#" class="main-library-item">
                        <h3>1st YEAR 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>1st YEAR 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>2nd YEAR 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>2nd YEAR 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>3rd Year 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>3rd Year 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>4th Year 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>4th Year 2nd Semester</h3>
                    </a>
            </section>
            <section id="BSEdMSS" class="left-nav-container" data-tab-second-content>
                <i onclick="exitTab()" class="fa-solid fa-arrow-left second-nav-"></i>
                    <a href="#" class="main-library-item">
                        <h3>1st YEAR 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>1st YEAR 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>2nd YEAR 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>2nd YEAR 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>3rd Year 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>3rd Year 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>4th Year 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>4th Year 2nd Semester</h3>
                    </a>
            </section>
            <section id="BSEdMF" class="left-nav-container" data-tab-second-content>
                <i onclick="exitTab()" class="fa-solid fa-arrow-left second-nav-"></i>
                    <a href="#" class="main-library-item">
                        <h3>1st YEAR 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>1st YEAR 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>2nd YEAR 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>2nd YEAR 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>3rd Year 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>3rd Year 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>4th Year 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>4th Year 2nd Semester</h3>
                    </a>
            </section>
            <section id="BTVTEMA" class="left-nav-container" data-tab-second-content>
                <i onclick="exitTab()" class="fa-solid fa-arrow-left second-nav-"></i>
                    <a href="#" class="main-library-item">
                        <h3>1st YEAR 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>1st YEAR 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>2nd YEAR 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>2nd YEAR 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>3rd Year 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>3rd Year 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>4th Year 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>4th Year 2nd Semester</h3>
                    </a>
            </section>
            <section id="BTVTEMCS" class="left-nav-container" data-tab-second-content>
                <i onclick="exitTab()" class="fa-solid fa-arrow-left second-nav-"></i>
                    <a href="#" class="main-library-item">
                        <h3>1st YEAR 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>1st YEAR 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>2nd YEAR 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>2nd YEAR 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>3rd Year 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>3rd Year 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>4th Year 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>4th Year 2nd Semester</h3>
                    </a>
            </section>
            <section id="BTVTEMVGD" class="left-nav-container" data-tab-second-content>
                <i onclick="exitTab()" class="fa-solid fa-arrow-left second-nav-"></i>
                    <a href="#" class="main-library-item">
                        <h3>1st YEAR 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>1st YEAR 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>2nd YEAR 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>2nd YEAR 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>3rd Year 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>3rd Year 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>4th Year 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>4th Year 2nd Semester</h3>
                    </a>
            </section>
            <section id="BTVTEMGFD" class="left-nav-container" data-tab-second-content>
                <i onclick="exitTab()" class="fa-solid fa-arrow-left second-nav-"></i>
                    <a href="#" class="main-library-item">
                        <h3>1st YEAR 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>1st YEAR 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>2nd YEAR 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>2nd YEAR 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>3rd Year 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>3rd Year 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>4th Year 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>4th Year 2nd Semester</h3>
                    </a>
            </section>
            <section id="BTVTEMET" class="left-nav-container" data-tab-second-content>
                <i onclick="exitTab()" class="fa-solid fa-arrow-left second-nav-"></i>
                    <a href="#" class="main-library-item">
                        <h3>1st YEAR 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>1st YEAR 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>2nd YEAR 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>2nd YEAR 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>3rd Year 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>3rd Year 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>4th Year 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>4th Year 2nd Semester</h3>
                    </a>
            </section>
            <section id="BTVTEMWFT" class="left-nav-container" data-tab-second-content>
                <i onclick="exitTab()" class="fa-solid fa-arrow-left second-nav-"></i>
                    <a href="#" class="main-library-item">
                        <h3>1st YEAR 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>1st YEAR 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>2nd YEAR 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>2nd YEAR 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>3rd Year 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>3rd Year 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>4th Year 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>4th Year 2nd Semester</h3>
                    </a>
            </section>
            <!--Third Tab to Appear after Choosing something in the Second Tab of IPERS NAVIGATION-->
            <section id="BSPE" class="left-nav-container" data-tab-second-content>
                <i onclick="exitTab()" class="fa-solid fa-arrow-left second-nav-"></i>
                    <a href="#" class="main-library-item">
                        <h3>1st YEAR 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>1st YEAR 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>2nd YEAR 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>2nd YEAR 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>3rd Year 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>3rd Year 2nd Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>4th Year 1st Semester</h3>
                    </a>
                    <a href="#" class="main-library-item">
                        <h3>4th Year 2nd Semester</h3>
                    </a>
            </section>    
        </section>

        <!-- THIS IS THE LIBRARY CONTENT SECTION -->
        <section class="library-content">
            <section id="libraryContentHolder" class="library-content-wrapper">
                <section class="tabPanel active" id="tabHome">
                    <img class="tab-img" src="img/E-Learn1stBanner.jpg" alt="">
                </section>
                <section class="tabPanel" id="BS-CpE-11" data-tab-third-content>
                    <p>Bachelor of Science in Computer Engineering 1-1</p>
                    <section>
                        <a href="#" class="pdf-placeholder" data-tab-fourth-target="#dropdown-cal01">Differential Calculus [CAL01]</a>
                        <div id="dropdown-cal01" class="dropdown-item" data-tab-fourth-content>
                            <a title="go to Continuity of a Function?" target="_blank" href="Cal01 Pdf/Continuity-of-a-Fxn.pdf" class="pdf-link-style">Continuity of A Function</a>
                            <a title="go to Differentiation of Formulas?" target="_blank" href="Cal01 Pdf/Differentiation-Formulas.pdf" class="pdf-link-style">Differentiation Formulas</a>
                            <a title="go to Solved Problems: Limits?" target="_blank" href="Cal01 Pdf/Solved-Problems-LIMITS.pdf" class="pdf-link-style">Solved Problems: Limits</a>
                        </div>
                        <a href="#" class="pdf-placeholder" data-tab-fourth-target="#dropdown-chem01">Chemistry for Engineers [CHEM01]</a>
                            <div id="dropdown-chem01" class="dropdown-item" data-tab-fourth-content>
                            </div>
                        <a href="#" class="pdf-placeholder" data-tab-fourth-target="#dropdown-chem01l">Chemistry for Engineers Laboratory [CHEM01L]</a>
                            <div id="dropdown-chem01l" class="dropdown-item" data-tab-fourth-content>
                            </div>
                        <a href="#" class="pdf-placeholder" data-tab-fourth-target="#dropdown-cpe101">Computer Engineering as a Disciple [CPE101]</a>
                            <div id="dropdown-cpe101" class="dropdown-item" data-tab-fourth-content>
                            </div>
                        <a href="#" class="pdf-placeholder" data-tab-fourth-target="#dropdown-cpe102">Programming Logic and Design [CPE102]</a>
                            <div id="dropdown-cpe102" class="dropdown-item" data-tab-fourth-content>
                            </div>
                        <a href="#" class="pdf-placeholder" data-tab-fourth-target="#dropdown-cpe103">Computer Concepts [CPE103]</a>
                            <div id="dropdown-cpe103" class="dropdown-item" data-tab-fourth-content>
                            </div>
                        <a href="#" class="pdf-placeholder" data-tab-fourth-target="#dropdown-ge01">Understanding the Self [GE01]</a>
                            <div id="dropdown-ge01" class="dropdown-item" data-tab-fourth-content>
                            </div>
                        <a href="#" class="pdf-placeholder" data-tab-fourth-target="#dropdown-ge04">Mathematics in the Modern World [GE04]</a>
                            <div id="dropdown-ge04" class="dropdown-item" data-tab-fourth-content>
                            </div>
                        <a href="#" class="pdf-placeholder" data-tab-fourth-target="#dropdown-ge07">Science, Technology and Society [GE07]</a>
                            <div id="dropdown-ge07" class="dropdown-item" data-tab-fourth-content>
                            </div>
                        <a href="#" class="pdf-placeholder" data-tab-fourth-target="#dropdown-pe01">Movement Enhancement [PE01]</a>
                            <div id="dropdown-pe01" class="dropdown-item" data-tab-fourth-content>
                            </div>
                    </section>
                </section>

                <section class="tabPanel" id="BS-CpE-12" data-tab-third-content>
                    <p>Bachelor of Science in Computer Engineering 1-2</p>
                </section>
                <section class="tabPanel" id="BS-CpE-21" data-tab-third-content>
                    <p>Bachelor of Science in Computer Engineering 2-1</p>
                </section>
                <section class="tabPanel" id="BS-CpE-22" data-tab-third-content>
                    <p>Bachelor of Science in Computer Engineering 2-2</p>
                </section>
                <section class="tabPanel" id="BS-CpE-31" data-tab-third-content>
                    <p>Bachelor of Science in Computer Engineering 3-1</p>
                </section>
                <section class="tabPanel" id="BS-CpE-32" data-tab-third-content>
                    <p>Bachelor of Science in Computer Engineering 3-2</p>
                </section>
                <section class="tabPanel" id="BS-CpE-41" data-tab-third-content>
                    <p>Bachelor of Science in Computer Engineering 4-1</p>
                </section>
                <section class="tabPanel" id="BS-CpE-42" data-tab-third-content>
                    <p>Bachelor of Science in Computer Engineering 4-2</p>
                </section>
            </section>
        </section>
    </main>
</body>
</html>