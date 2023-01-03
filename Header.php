<?php
session_start();
require './php/dbh.php'
?>
<!DOCTYPE html>
<script type="text/javascript">
function googleTranslateElementInit() {
new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>
<script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit" type="text/javascript"></script>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LearnIt</title>
  <link rel="stylesheet" type="text/css" href="./css/header.css">
  <link rel="stylesheet" type="text/css"  href="./css/background.css">
  <link rel="stylesheet" type="text/css"  href="./css/navbar.css">
</head>
<body>
  <header>
      <div class="nav">
        <nav class="navBar" id="navbar">
          <t style="background-color:rgb(148, 48, 48); padding: 1.6rem 1rem; margin-left: -0.8rem">Learn It</t>
          <a id="home" class="navBar" href="index.php">Home</a>
          <a id="courses" class="navBar" href="courses.php">Courses</a>
          <a id="schedule" class="navBar" href="schedule.php">Schedule</a>
          <a id="shopping_cart" class="navBar" href="shoppingcart.php">Shopping Cart</a>
          <a id="contact_us" class="navBar" href="contact-us.php">Contact Us</a>
          <?php
            if(isset($_SESSION['userId'])){
              echo '<a id="user_profile" class="navBar" href="userProfile.php">'. ucfirst($_SESSION['firstname']) ." ". ucfirst( $_SESSION['lastname']).'</a>';
            }
            else{
              echo '<a id="user_profile" class="navBar" href="./php/userSignUp.php">User Profile</a>';
            }
          ?>
          <div style="float: right; letter-spacing: 1px">
          <div id="google_translate_element" style="float: right;" class="form"></div>            
            <?php
              if (isset($_SESSION['userId'])) {
                echo  '<form method="POST" action="./php/logout.php" class="form" style="float: right;  padding-left: 1rem">
                <button class="button" type="submit" name="logout">Log out</button>   
                </form>';
              }
              else {
                echo '
                <form method="POST" action="./php/userSignUp.php" class="form" style="float: right">
                  <button class="button" type="submit" name="signup">Sign Up</button>   
                </form>
                <form method="POST" action="./php/login.php" class="form" style="float: right">
                  <input class="input" type="text" placeholder="Enter your Email" name="email">
                  <input class="input" type="password" placeholder="Enter your password" name="psw">
                  <button class="button" type="submit" name="login-button">Login</button>   
                </form>';
              }
            ?>
          </div>
        </nav>
      </div>
      <img src="./img/logo.png" class="logoimg">
</header>
</body>
</html>