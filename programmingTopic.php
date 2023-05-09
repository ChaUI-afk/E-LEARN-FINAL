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
            <h2>What is Computer Programming and How to Become a Computer Programmer? </h2>
            <p>Computer programming is the process of writing code to facilitate specific actions in a computer, application or software program, and instructs them on how to perform. Computer programmers are professionals that create instructions for a computer to execute by writing and testing code that enables applications and software programs to operate successfully. </p>
            <p>Computers can do amazing things, from basic laptops capable of simple word processing and spreadsheet functions to incredibly complex supercomputers completing millions of financial transactions a day and controlling the infrastructure that makes modern life possible. But no computer can do anything until a computer programmer tells it to behave in specific ways. That’s what computer programming is all about. </p>
            <p>At its most basic, computer programming is little more than a set of instructions to facilitate specific actions. Based on the requirements or purposes of these instructions, computer programming can be as simple as adding two numbers. It can also be as complex as reading data from temperature sensors to adjust a thermostat, sorting data to complete intricate scheduling or critical reports or taking players through multi-layered worlds and challenges in games. </p>
            <p><b>Dr. Cheryl Frederick</b>, executive director of STEM programs at Southern New Hampshire University (SNHU), said computer programming is a collaborative process, with a variety of programmers contributing during the development of a piece of software. Some of that development can last decades. For software like Microsoft Word released in 1983, for instance, programmers have been tweaking and improving it for years.</p>
            <p class="quote">"The hope is that the computer program will become such a widely adopted system that it needs long-term support, particularly to extend its current functionality," Frederick said. "The terms computer software and computer programming are used interchangeably except software can get rather large."</p>
            <h2>WHAT DO PROGRAMMERS DO ALL DAY?</h2>
            <div class="programming-img">

            </div>
            <p>Computer programmers create instructions for a computer to execute by writing and testing code that enables applications and software programs to operate successfully. Computer programmers use specialized languages to communicate with computers, applications and other systems to get computers and computer networks to perform a set of specific tasks. Languages like C++, Java, Python and more allow programmers – often working closely with software developers and engineers to build programs that allow “search, surfing and selfies,” according to ComputerScience.org.</p>
            <p>There are many programming languages but some have emerged as the most popular. CareerKarma listed the most common programming languages in 2021 based on job openings.</p>
            <p>Some of the common tasks a computer programmer is required to master were compiled by O*Net online and include: </p>
            <ul>
                <li>Collaborating with others to resolve information technology issues. </li>
                <li>Modifying software programs to improve performance. </li>
                <li>Resolving computer software problems. </li>
                <li>Testing software performance. </li>
                <li>Writing computer programming code. </li>
            </ul>
            <h2>How Do You Become a Computer Programmer? </h2>
            <p>Computer programmers begin as self-taught enthusiasts, and a persistent interest in programming can be an asset in your career because continued learning is vital to a computer programmer. </p>
            <p>In 2021 the median salary for computer programmers was $93,000 according, to the U.S. Bureau of Labor Statistics (BLS) and to enter the field, a bachelor's degree is typically required. </p>
            <p>Beyond classroom and experiential learning, however, computer programmers must understand that when writing a program, it never works the first time.  </p>
            <p>“This field requires patience, and the ability to troubleshoot and get at errors. You need to be a learning worker, be self-disciplined, have the motivation to learn on your own, be able to brainstorm with others, and have a lot of hands-on practice,” Frederick said. “You must be a practitioner and adapt to what’s trending.” </p>
            <p>While working to complete a computer science degree, students are encouraged to create a portfolio of their software work. “Though this portfolio isn’t graded, students can share it with potential employers as proof of coding capabilities,” Frederick said. “The entire degree program gives students broad exposure and proficiencies in traditional and trending technologies, including such specialties as computation graphics, software testing and writing code for commonly used programs, as well as deeper, more specific skills.” </p>
        </article>
    </main>
</body>
</html>