<?php 
 include 'config.php';
 session_start();
 $user_id = $_SESSION['user_id'];

 if(isset($_POST['update_profile'])){
    // Retrieve the user's current password from the database
    $result = mysqli_query($conn, "SELECT password FROM `users` WHERE id = '$user_id'") or die("query failed");
    $row = mysqli_fetch_assoc($result);
    $old_pass = $row['password'];

    $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
    $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);
    
    mysqli_query($conn, "UPDATE `users` SET username = '$update_name', email = '$update_email' WHERE id = '$user_id'") or die("query failed");

    $new_pass = mysqli_real_escape_string($conn, md5($_POST['new_pass']));
    $confirm_pass = mysqli_real_escape_string($conn, md5($_POST['confirm_pass']));

    if(!empty($new_pass) || !empty($confirm_pass)){
        if(md5($_POST['old_pass']) != $old_pass){
            $message[] = 'old password did not match';
        } elseif($new_pass != $confirm_pass){
            $message[] = 'confirm password did not match';
        } else {
            mysqli_query($conn, "UPDATE `users` SET password = '$confirm_pass' WHERE id = '$user_id'") or die("query failed");
            $message[] = 'update success!';
        }
    }
    
    $update_image = $_FILES['update_image']['name'];
    $update_image_size = $_FILES['update_image']['size'];
    $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
    $update_image_folder = 'uploaded_img/'.$update_image;
    
    if(!empty($update_image)){
        if($update_image_size > 2000000){
            $message[] = 'image is too large!';
        } else {
            $image_update_query = mysqli_query($conn, "UPDATE `users` SET image = '$update_image' WHERE id = '$user_id'") or die("query failed");
            if($image_update_query){
                move_uploaded_file($update_image_tmp_name, $update_image_folder);
            }
            $message[] = 'update success!';
        }
    }
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
    <link rel="stylesheet" href="css/updateProfile.css">
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

    <main class="profile-container">
        <div class="profile-wrapper">
            <?php 
            $select = mysqli_query($conn, "SELECT * FROM `users` WHERE id = '$user_id'") or die ('query failed');
            if(mysqli_num_rows($select) > 0) {
                $fetch = mysqli_fetch_assoc($select);
            }
            ?>
            <div class="profile-image">
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
            if(isset($message)){
                foreach($message as $message)
                {
                    echo '<div class="message">'.$message.'</div>';
                }
            }?>
            <form class="updateBox" action="" method="POST" enctype="multipart/form-data">

                <div class="inputBox">
                    <div class="editBox">
                        <span>Name :</span>
                        <input type="text" name="update_name" value="<?php echo $fetch['username'] ?>">
                    </div>
                    <div class="editBox">
                        <span>Email :</span>
                        <input type="email" name="update_email" value="<?php echo $fetch['email'] ?>">
                    </div>
                    <div class="editBox image-btn">
                        <span>Profile Picture :</span>
                        <input type="file" name="update_image"  accept="image/jpg, image/jpeg, image/png" >  
                    </div>  
                </div>
                <div class="inputBox">
                    <input type="hidden" name="old_pass" value="<?php echo $fetch['password'] ?>">
                    <div class="editBox">
                        <span>Old password :</span>
                        <input type="password" name="update_pass" placeholder="enter previous password"> 
                    </div>
                     <div class="editBox">
                        <span>New password :</span>
                        <input type="password" name="new_pass" placeholder="enter new password"> 
                     </div>
                     <div class="editBox">
                        <span>Confirm password :</span>
                        <input type="password" name="confirm_pass" placeholder="confirm password">  
                     </div>
                </div>
                <div class="inputBoxBtn">
                    <input class="miscBtn btn-hover" type="submit" value="update"  name="update_profile">
                </div>
            </form>
        </div>
    </main>

</body>
</html>