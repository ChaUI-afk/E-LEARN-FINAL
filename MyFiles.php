<?php 
 include 'config.php';
 session_start();
 $user_id = $_SESSION['user_id'];

 if(!isset($user_id)){
    header('location: index.php');
 }

 $sql = "SELECT * FROM files";

 $result = mysqli_query($conn, $sql);

 $files = mysqli_fetch_all($result, MYSQLI_ASSOC);

 if(isset($_POST['save'])){
    $filename = $_FILES['myfile']['name'];

    $destination = 'uploads/'.$filename;

    $extension = pathinfo($filename,PATHINFO_EXTENSION);

    $file = $_FILES['myfile']['tmp_name'];

    $size = $_FILES['myfile']['size'];

    if(!in_array($extension,['zip','pdf','jpg','png'])){
        $message[] = 'Your file extension must be .zip, .pdf or .png';
    } elseif($_FILES['myfile']['size'] > 2000000){
        $message[] = 'file too large!';
    } else {
        if(move_uploaded_file($file,$destination)){
            $sql = "INSERT into files (name, size, downloads) VALUES ('$filename', '$size', 0)";
        
            if(mysqli_query($conn, $sql)){
                $_SESSION['message'] = 'file uploaded';
                header('Location: MyFiles.php');
                exit;
            } else {
                $message[] = 'file not uploaded';
            }
        }
    }
 }

if(isset($_GET['file_id'])){
    $id = $_GET['file_id'];

    $sql = "SELECT * FROM files WHERE id = $id";

    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);

    $filepath = 'uploads/' . $file['name'];

    $message = array();

    if(file_exists($filepath)){
        $extension = strtolower(pathinfo($filepath, PATHINFO_EXTENSION));
        $content_type = 'application/octet-stream';
        if($extension === 'pdf'){
            $content_type = 'application/pdf';
        }
    
        header('Content-Type: ' . $content_type);
        header('Content-Description: FIle Transfer');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length:' . filesize($filepath));
    
        ob_clean();
        flush();
        readfile($filepath);
        exit;
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
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="css/MyFiles.css">
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
        <main class="MyFiles">

        <div class="left_side">
            <?php 
                if(isset($message)){
                    foreach($message as $message)
                    {
                        echo '<div class="message">'.$message.'</div>';
                    }
                }
            ?>
            <h3>My FILES</h3>
            <form action="MyFiles.php" method="post" enctype="multipart/form-data">
                <h3>Files accepted: [.zip, .pdf, .jpg, .png]</h3>
                
                <div class="file_upload_container">
                    <label class="add-computer-button" for="fileupload">Select from computer</label>
                    <input id="fileupload" type="file" name="myfile">
                    <button class="add-computer-button" type="submit" name="save" class="submit_btn">UPLOAD</button>
                </div>
            </form>

        </div>
        <div class="right_side">
                <table class=table>
                    <thead>
                        <th>Id</th>
                        <th>Filename</th>
                        <th>Size (in Kb)</th>
                        <th>Download</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                    <?php foreach($files as $file): ?>
                        <tr>
                            <td data-label="Id"><?php echo $file['id']; ?></td>
                            <td data-label="Filename"><?php echo $file['name']; ?></td>
                            <td data-label="Size (in Kb)"><?php echo $file['size']/1000 . 'KB';?></td>
                            <td data-label="Download">
                                <a href="MyFiles.php?file_id=<?php echo $file['id']?>">Download</a>
                            </td>
                            <td data-label="Delete">
                                <a href="delete.php?id=<?php echo $file['id']; ?>" class="delete" onclick="return confirm('Are you sure you want to delete this file?')">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
        </div> 
                    
        </main>
    </body>
</html>