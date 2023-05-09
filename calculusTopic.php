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
    <link rel="stylesheet" href="css/articles.css">
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
    <main class="article-container">
        <article class="article-start">
            <h2>Calculus</h2>
            <p>Calculus is a branch of mathematics that involves the study of rates of change. Before calculus was invented, all math was static: It could only help calculate objects that were perfectly still. But the universe is constantly moving and changing. No objects—from the stars in space to subatomic particles or cells in the body—are always at rest. Indeed, just about everything in the universe is constantly moving. Calculus helped to determine how particles, stars, and matter actually move and change in real time. </p>
            <p>Calculus is used in a multitude of fields that you wouldn't ordinarily think would make use of its concepts. Among them are physics, engineering, economics, statistics, and medicine. Calculus is also used in such disparate areas as space travel, as well as determining how medications interact with the body, and even how to build safer structures. You'll understand why calculus is useful in so many areas if you know a bit about its history as well as what it is designed to do and measure. </p>
            <div class="calculus-img">

            </div>
            <p>Key Takeaways: Fundamental Theorem of the Calculus</p>
            <ul>
                <li>Calculus is the study of rates of change. </li>
                <li>Gottfried Leibniz and Isaac Newton, 17th-century mathematicians, both invented calculus independently. Newton invented it first, but Leibniz created the notations that mathematicians use today. /li>
                <li>There are two types of calculus: Differential calculus determines the rate of change of a quantity, while integral calculus finds the quantity where the rate of change is known. </li>
            </ul>
            <h2>Who Invented Calculus? </h2>
            <p>Calculus was developed in the latter half of the 17th century by two mathematicians, <b>Gottfried Leibniz and Isaac Newton</b>. Newton first developed calculus and applied it directly to the understanding of physical systems. Independently, Leibniz developed the notations used in calculus. Put simply, while basic math uses operations such as plus, minus, times, and division (+, -, x, and ÷), calculus uses operations that employ functions and integrals to calculate rates of change. </p>
            <p>Those tools allowed Newton, Leibniz, and other mathematicians who followed to calculate things like the exact slope of a curve at any point. The Story of Mathematics explains the importance of Newton's fundamental theorem of the calculus: </p>
            <p>"Unlike the static geometry of the Greeks, calculus allowed mathematicians and engineers to make sense of the motion and dynamic change in the changing world around us, such as the orbits of planets, the motion of fluids, etc"</p>
            <p>Using calculus, scientists, astronomers, physicists, mathematicians, and chemists could now chart the orbit of the planets and stars, as well as the path of electrons and protons at the atomic level. </p>
            <h2>Differential vs. Integral Calculus</h2>
            <p>There are two branches of calculus: differential and integral calculus. "Differential calculus studies the derivative and integral calculus studies...the integral," notes the Massachusetts Institute of Technology. But there is more to it than that. Differential calculus determines the rate of change of a quantity. It examines the rates of change of slopes and curves</p>
            <p>This branch is concerned with the study of the rate of change of functions with respect to their variables, especially through the use of derivatives and differentials. The derivative is the slope of a line on a graph. You find the slope of a line by calculating the rise over the run. </p>
            <p>Integral calculus, by contrast, seeks to find the quantity where the rate of change is known. This branch focuses on such concepts as slopes of tangent lines and velocities. While differential calculus focuses on the curve itself, integral calculus concerns itself with the space or area under the curve. Integral calculus is used to figure the total size or value, such as lengths, areas, and volumes. </p>
            <p>Calculus played an integral role in the development of navigation in the 17th and 18th centuries because it allowed sailors to use the position of the moon to accurately determine the local time. To chart their position at sea, navigators needed to be able to measure both time and angles with accuracy. Before the development of calculus, ship navigators and captains could do neither. </p>
            <p>Calculus — both derivative and integral — helped to improve the understanding of this important concept in terms of the curve of the Earth, the distance ships had to travel around a curve to get to a specific location, and even the alignment of the Earth, seas, and ships in relation to the stars. </p>
            <h2>Practical Applications </h2>
            <p>Calculus has many practical applications in real life. Some of the concepts that use calculus include motion, electricity, heat, light, harmonics, acoustics, and astronomy. Calculus is used in geography, computer vision (such as for autonomous driving of cars), photography, artificial intelligence, robotics, video games, and even movies. Calculus is also used to calculate the rates of radioactive decay in chemistry, and even to predict birth and death rates, as well as in the study of gravity and planetary motion, fluid flow, ship design, geometric curves, and bridge engineering. </p>
            <p>In physics, for example, calculus is used to help define, explain, and calculate motion, electricity, heat, light, harmonics, acoustics, astronomy, and dynamics. Einstein's theory of relativity relies on calculus, a field of mathematics that also helps economists predict how much profit a company or industry can make. And in shipbuilding, calculus has been used for many years to determine both the curve of the hull of the ship (using differential calculus), as well as the area under the hull (using integral calculus), and even in the general design of ships. </p>
            <p>In addition, calculus is used to check answers for different mathematical disciplines such as statistics, analytical geometry, and algebra.</p>
        </article>
    </main>
</body>
</html>