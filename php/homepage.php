<?php
if (isset($_GET['coursesbttn'])) {
    header("Location: ../courses.php");
}

else if (isset($_GET['schedulebttn'])) {
    header("Location: ../schedule.php");
}

else if (isset($_GET['contactbttn'])) {
    header("Location: ../contact-us.php");
}

else if (isset($_GET['userbttn'])) {
    header("Location: ../userProfile.php");
}

else if (isset($_GET['signbttn'])) {
    header("Location: loginpage.php");
}