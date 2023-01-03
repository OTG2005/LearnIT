<?php
include_once 'dbh.php';
?>

<!DOCTYPE html>

<script type="text/javascript">
function googleTranslateElementInit() {
new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>
<script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit" type="text/javascript"></script>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <title>Login / Sign Up Form</title>
  <link rel="stylesheet" type="text/css" href="../css/usersignup.css">
  <link rel="stylesheet" type="text/css"  href="../css/background.css">
  <link rel="stylesheet" type="text/css"  href="../css/navbar.css">
</head>

<body>
  <div class="nav">
      <nav class="navBar" id="navbar">
        <t style="background-color:rgb(148, 48, 48); padding: 1.6rem 1rem; margin-left: -0.8rem">Learn It</t>
        <a id="home" class="navBar" href="../index.php">Home</a>
        <a id="courses" class="navBar" href="../courses.php">Courses</a>
        <a id="schedule" class="navBar" href="../schedule.php">Schedule</a>
        <a id="shopping_cart" class="navBar" href="../shoppingcart.php">Shopping Cart</a>
        <a id="contact_us" class="navBar" href="../contact-us.php">Contact Us</a>
        <?php
          if(isset($_SESSION['userId'])){
            echo '<a id="user_profile" class="navBar" href="../userProfile.php">'. ucfirst($_SESSION['firstname']) ." ". ucfirst( $_SESSION['lastname']).'</a>';
          }
          else{
            echo '<a id="user_profile" class="navBar" href="userSignUp.php">User Profile</a>';
          }
        ?>
        <div style="float: right; letter-spacing: 1px">
        <div id="google_translate_element" style="float: right;" class="form"></div>            
        </div>
      </nav>
  </div>
  <div class="container">
      <form action="login.php" method="post" class="form" id="signIn">
          <h1 class="form__title">Log In</h1>
          <div class="errormessages">
            <?php
              if (isset($_GET["error"])) {
                if ($_GET["error"] == "nouser"){
                  echo 'User not found';
                }
                else if ($_GET["error"] == "wrong_password"){
                  echo "Wrong password";
                }
                else if ($_GET["error"] == "wrongpwd"){
                  echo "Wrong password";
                }
                else if ($_GET["error"] == "emptyfields"){
                  echo 'Please fill in all the fields';
                }
              }
              else if (isset($_GET["signup"])){
                if ($_GET["signup"] == "success") {
                  echo '<div class="successmessage">Sign up successfully, please Log in</div>';
                }
              }
            ?>
          </div>
          <div class="form__input-group">
              <input class="form__input" type="text" placeholder="Enter your Email" name="email" value="<?php
              if (isset($_GET["error"])){
                if ($_GET["error"] == "wrong_password"){
                  echo $_GET["mailuid"];
                }
                else if ($_GET["error"] == "wrongpwd"){
                  echo $_GET["mailuid"];
                }
                else {
                  echo"";
                }  
              }
              ?>">
          </div> 
          <div class="form__input-group">
              <input class="form__input" type="password" placeholder="Enter your password" name="psw">
          </div>
          <div class="form__input-group">
              <button class="form__button" type="submit" name="login-button">Login</button>               
          </div>
          <div class="form__input-group">
              <p class="form__text">
                  <a class="form__link" href="userSignUp.php">Do not have an account? Sign Up</a>
              </p>
          </div>
      </form>
  </div>
</body>
