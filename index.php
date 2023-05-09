<?php 
    include 'config.php';
    session_start();

    if(isset($_POST['submit'])){
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, md5($_POST['password']));

        $select = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' && password = '$password'") or die('query failed');

        if(mysqli_num_rows($select) > 0) {
            $row = mysqli_fetch_assoc($select);
            $_SESSION['user_id'] = $row['id'];
            header("Location: main.php");
        } else {
            $message[] = 'Incorrect email or password';
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
    <script
      src="https://kit.fontawesome.com/088b5af8bf.js"
      crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
        <?php
            if(isset($_SESSION['success_message'])) {
                echo '<div class="success-message">'.$_SESSION['success_message'].'</div>';
                unset($_SESSION['success_message']);
            ?>
            <script>
                setTimeout(function(){
                    document.querySelector('.success-message').style.display = 'none';
                }, 3000);
            </script>
        <?php
            }
        ?>


    <section id="mainContainer" class="main-container">
        <section class="main-welcome">
            <section aria-label="Photos" class="main-slider">
                <div class="carousel" data-carousel>
                    <button class="carousel-button prev" data-carousel-button="prev">&#8656;</button>
                    <button class="carousel-button next" data-carousel-button="next">&#8658;</button>
                    <ul data-slides>
                        <li class="slide" data-active>
                            <img class="first" src="img/E-Learn1stBanner.jpg" alt="">
                        </li>
                        <li class="slide">
                            <img class="second" src="img/FAQs.jpg" alt="">
                        </li>
                        <li class="slide">
                            <img class="third" src="img/ElearnD.jpg" alt="">
                        </li>
                    </ul>    
                </div>
            </section>
        </section>
        <section class="main-logIn">
            <div class="eLearn-logo">
                <div class="logo-holder">
                    <img src="img/E-learn logo.svg" alt="">
                </div>
                <h1>E-LEARN</h1>
            </div>
            <div class="form-box">
                <h1>SIGN IN</h1>
                <form class="sign-form" method="POST">
                <?php 
                        if(isset($message)){
                            foreach($message as $message)
                            {
                                echo '<div class="message">'.$message.'</div>';
                            }
                        }
                    ?>
                    <div class="input-field">
                        <i class="fa-solid fa-envelope"></i>
                        <input class="input-signIn" type="email" name="email" id="Email" placeholder="Email" />
                    </div>
                    <div class="input-field">
                        <i class="fa-solid fa-lock"></i>
                        <input class="input-signIn" type="password" name="password" id="pwd" placeholder="Password" />
                    </div>
                    <button class="signin-Btn log-btn" type="submit" name="submit">Log In</button>
                    <div class="forgot-password">
                        <a href="#"> forgot password? </a>
                    </div>
                    <button onclick="location.href='register.php'" class="signup-Btn log-btn" type="button">Sign Up</button>
                </form>
            </div>
        </section>
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