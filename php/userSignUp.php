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

    <form action="signUp.php" method="post" class="form" id="createAccount">

      <h1 class="form__title">Create Account</h1>

      <div class="errormessages">
        <?php
          if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyfields"){
              $emptyfields = true;
              echo "Please fill in all fields";
            }
            else if ($_GET["error"] == "invalidmailuid"){
              $invalidemail = true;
              echo "Invalid Email";
            }
            else if ($_GET["error"] == "invalid_phonenumber"){
              $invalidphone = true;
              echo "Invalid Phone number";
            }
            else if ($_GET["error"] == "passwordcheck"){
              $incorrectpassword = true;
            }
            else if ($_GET["error"] == "mailtaken"){
              $invalidemail = true;
              echo "Email already taken";
            }
            else if ($_GET["error"] == "passworderror"){
              $unstrengthpassrod = true;
            }
          }
        ?>
      </div>

      <div class="form__input-group" style="overflow: hidden;">
        <input type="text" name="firstname" class="form__input" style="width: 49%; float: left; overflow: hidden;" autofocus placeholder="Firstname" required value="<?php 
          if (isset($_GET["error"])) {
              echo $_GET["uid"];
          } 
        ?>">
        <input type="text" name="lastname" class="form__input" style="width: 49%; float: right; overflow: hidden;" autofocus placeholder="lastname" required value="<?php 
          if (isset($_GET["error"])) {
            echo $_GET["lastname"];
          } 
        ?>">
      </div>
      
      <div class="form__input-group">
        <input type="email" name="email" class="form__input" placeholder="Email Address" required value="<?php 
          if (isset($_GET["error"])){
            if (isset($_GET["mailuid"])){
              echo $_GET["mailuid"];
            }
          }
        ?>">
      </div>
      
      <div class="form__input-group">
        <input type="password" name="psw" class="form__input" placeholder="Password" required>
      </div>
      
      <div class="form__input-group">
        <input type="password" name="pwd-repeat" class="form__input" placeholder="Confirm password" required>
        <div class="errormessages" style="font-size: 1rem; text-align: left;">
          <?php
            if (isset($_GET["error"])){
              if ($unstrengthpassrod = true) {
                echo "password must be at least 8 charcaters long<br>must include at least one capital letter<br>must include at least on number";
              }
              else if ($_GET["error" == "passwordcheck"]) {
                echo "Passwords don't match";
              }
            }?>
        </div>
      </div>
      
      <div class="form__input-group form__input" required>
        Gender
        <input type="radio" name="gender" value="male" <?php 
          if (isset($_GET["error"])) {
            if ($_GET["gender"] == "male"){
              echo "checked";
            }
            else {echo"";}
          }         
        ?>>
        <label>Male</label>
        <input type="radio" name="gender" value="female"<?php 
          if (isset($_GET["error"])) {
            if ($_GET["gender"] == "female"){
              echo "checked";
            }
            else {echo"";}
          }         
        ?>>
        <label>Female</label>
      </div>

      <div>
        <select name="nationality" class="form__input-group form__input" required>
          <option value="">Nationality</option>
          <option value="afghan">Afghan</option>
          <option value="albanian">Albanian</option>
          <option value="algerian">Algerian</option>
          <option value="american">American</option>
          <option value="andorran">Andorran</option>
          <option value="angolan">Angolan</option>
          <option value="antiguans">Antiguans</option>
          <option value="argentinean">Argentinean</option>
          <option value="armenian">Armenian</option>
          <option value="australian">Australian</option>
          <option value="austrian">Austrian</option>
          <option value="azerbaijani">Azerbaijani</option>
          <option value="bahamian">Bahamian</option>
          <option value="bahraini">Bahraini</option>
          <option value="bangladeshi">Bangladeshi</option>
          <option value="barbadian">Barbadian</option>
          <option value="barbudans">Barbudans</option>
          <option value="batswana">Batswana</option>
          <option value="belarusian">Belarusian</option>
          <option value="belgian">Belgian</option>
          <option value="belizean">Belizean</option>
          <option value="beninese">Beninese</option>
          <option value="bhutanese">Bhutanese</option>
          <option value="bolivian">Bolivian</option>
          <option value="bosnian">Bosnian</option>
          <option value="brazilian">Brazilian</option>
          <option value="british">British</option>
          <option value="bruneian">Bruneian</option>
          <option value="bulgarian">Bulgarian</option>
          <option value="burkinabe">Burkinabe</option>
          <option value="burmese">Burmese</option>
          <option value="burundian">Burundian</option>
          <option value="cambodian">Cambodian</option>
          <option value="cameroonian">Cameroonian</option>
          <option value="canadian">Canadian</option>
          <option value="cape verdean">Cape Verdean</option>
          <option value="central african">Central African</option>
          <option value="chadian">Chadian</option>
          <option value="chilean">Chilean</option>
          <option value="chinese">Chinese</option>
          <option value="colombian">Colombian</option>
          <option value="comoran">Comoran</option>
          <option value="congolese">Congolese</option>
          <option value="costa rican">Costa Rican</option>
          <option value="croatian">Croatian</option>
          <option value="cuban">Cuban</option>
          <option value="cypriot">Cypriot</option>
          <option value="czech">Czech</option>
          <option value="danish">Danish</option>
          <option value="djibouti">Djibouti</option>
          <option value="dominican">Dominican</option>
          <option value="dutch">Dutch</option>
          <option value="east timorese">East Timorese</option>
          <option value="ecuadorean">Ecuadorean</option>
          <option value="egyptian">Egyptian</option>
          <option value="emirian">Emirian</option>
          <option value="equatorial guinean">Equatorial Guinean</option>
          <option value="eritrean">Eritrean</option>
          <option value="estonian">Estonian</option>
          <option value="ethiopian">Ethiopian</option>
          <option value="fijian">Fijian</option>
          <option value="filipino">Filipino</option>
          <option value="finnish">Finnish</option>
          <option value="french">French</option>
          <option value="gabonese">Gabonese</option>
          <option value="gambian">Gambian</option>
          <option value="georgian">Georgian</option>
          <option value="german">German</option>
          <option value="ghanaian">Ghanaian</option>
          <option value="greek">Greek</option>
          <option value="grenadian">Grenadian</option>
          <option value="guatemalan">Guatemalan</option>
          <option value="guinea-bissauan">Guinea-Bissauan</option>
          <option value="guinean">Guinean</option>
          <option value="guyanese">Guyanese</option>
          <option value="haitian">Haitian</option>
          <option value="herzegovinian">Herzegovinian</option>
          <option value="honduran">Honduran</option>
          <option value="hungarian">Hungarian</option>
          <option value="icelander">Icelander</option>
          <option value="indian">Indian</option>
          <option value="indonesian">Indonesian</option>
          <option value="iranian">Iranian</option>
          <option value="iraqi">Iraqi</option>
          <option value="irish">Irish</option>
          <option value="israeli">Israeli</option>
          <option value="italian">Italian</option>
          <option value="ivorian">Ivorian</option>
          <option value="jamaican">Jamaican</option>
          <option value="japanese">Japanese</option>
          <option value="jordanian">Jordanian</option>
          <option value="kazakhstani">Kazakhstani</option>
          <option value="kenyan">Kenyan</option>
          <option value="kittian and nevisian">Kittian and Nevisian</option>
          <option value="kuwaiti">Kuwaiti</option>
          <option value="kyrgyz">Kyrgyz</option>
          <option value="laotian">Laotian</option>
          <option value="latvian">Latvian</option>
          <option value="lebanese">Lebanese</option>
          <option value="liberian">Liberian</option>
          <option value="libyan">Libyan</option>
          <option value="liechtensteiner">Liechtensteiner</option>
          <option value="lithuanian">Lithuanian</option>
          <option value="luxembourger">Luxembourger</option>
          <option value="macedonian">Macedonian</option>
          <option value="malagasy">Malagasy</option>
          <option value="malawian">Malawian</option>
          <option value="malaysian">Malaysian</option>
          <option value="maldivan">Maldivan</option>
          <option value="malian">Malian</option>
          <option value="maltese">Maltese</option>
          <option value="marshallese">Marshallese</option>
          <option value="mauritanian">Mauritanian</option>
          <option value="mauritian">Mauritian</option>
          <option value="mexican">Mexican</option>
          <option value="micronesian">Micronesian</option>
          <option value="moldovan">Moldovan</option>
          <option value="monacan">Monacan</option>
          <option value="mongolian">Mongolian</option>
          <option value="moroccan">Moroccan</option>
          <option value="mosotho">Mosotho</option>
          <option value="motswana">Motswana</option>
          <option value="mozambican">Mozambican</option>
          <option value="namibian">Namibian</option>
          <option value="nauruan">Nauruan</option>
          <option value="nepalese">Nepalese</option>
          <option value="new zealander">New Zealander</option>
          <option value="ni-vanuatu">Ni-Vanuatu</option>
          <option value="nicaraguan">Nicaraguan</option>
          <option value="nigerien">Nigerien</option>
          <option value="north korean">North Korean</option>
          <option value="northern irish">Northern Irish</option>
          <option value="norwegian">Norwegian</option>
          <option value="omani">Omani</option>
          <option value="pakistani">Pakistani</option>
          <option value="palauan">Palauan</option>
          <option value="panamanian">Panamanian</option>
          <option value="papua new guinean">Papua New Guinean</option>
          <option value="paraguayan">Paraguayan</option>
          <option value="peruvian">Peruvian</option>
          <option value="polish">Polish</option>
          <option value="portuguese">Portuguese</option>
          <option value="qatari">Qatari</option>
          <option value="romanian">Romanian</option>
          <option value="russian">Russian</option>
          <option value="rwandan">Rwandan</option>
          <option value="saint lucian">Saint Lucian</option>
          <option value="salvadoran">Salvadoran</option>
          <option value="samoan">Samoan</option>
          <option value="san marinese">San Marinese</option>
          <option value="sao tomean">Sao Tomean</option>
          <option value="saudi">Saudi</option>
          <option value="scottish">Scottish</option>
          <option value="senegalese">Senegalese</option>
          <option value="serbian">Serbian</option>
          <option value="seychellois">Seychellois</option>
          <option value="sierra leonean">Sierra Leonean</option>
          <option value="singaporean">Singaporean</option>
          <option value="slovakian">Slovakian</option>
          <option value="slovenian">Slovenian</option>
          <option value="solomon islander">Solomon Islander</option>
          <option value="somali">Somali</option>
          <option value="south african">South African</option>
          <option value="south korean">South Korean</option>
          <option value="spanish">Spanish</option>
          <option value="sri lankan">Sri Lankan</option>
          <option value="sudanese">Sudanese</option>
          <option value="surinamer">Surinamer</option>
          <option value="swazi">Swazi</option>
          <option value="swedish">Swedish</option>
          <option value="swiss">Swiss</option>
          <option value="syrian">Syrian</option>
          <option value="taiwanese">Taiwanese</option>
          <option value="tajik">Tajik</option>
          <option value="tanzanian">Tanzanian</option>
          <option value="thai">Thai</option>
          <option value="togolese">Togolese</option>
          <option value="tongan">Tongan</option>
          <option value="trinidadian or tobagonian">Trinidadian or Tobagonian</option>
          <option value="tunisian">Tunisian</option>
          <option value="turkish">Turkish</option>
          <option value="tuvaluan">Tuvaluan</option>
          <option value="ugandan">Ugandan</option>
          <option value="ukrainian">Ukrainian</option>
          <option value="uruguayan">Uruguayan</option>
          <option value="uzbekistani">Uzbekistani</option>
          <option value="venezuelan">Venezuelan</option>
          <option value="vietnamese">Vietnamese</option>
          <option value="welsh">Welsh</option>
          <option value="yemenite">Yemenite</option>
          <option value="zambian">Zambian</option>
          <option value="zimbabwean">Zimbabwean</option>
        </select>
      </div>

      <div class="form__input-group">
        Birthdate
        <input type="date" class="form__input" name="birthdate" value="<?php
          if (isset($_GET["error"])) {
              echo $_GET["birthdate"];
          } 
          ?>">
      </div>

      <div class="form__input-group">
        <input type="text" class="form__input" name="phonenumber" placeholder="Enter you phone number with country code" required value="<?php
          if (isset($_GET["error"])) {
              echo $_GET["phonenumber"];
          } 
        ?>">
      </div>

      <button name="signup-submit" class="form__button" type="submit">Signup</button>
      
      <p class="form__text">
        <a class="form__link" href="loginpage.php">Already have an account? Sign in</a>
      </p>
    </form>
  </div>
</body>
