<?php
if(isset($_POST['login-button'])) {
    require 'dbh.php';
    $mailuid = $_POST['email'];
    $password = $_POST['psw'];
    if (empty($mailuid) || empty($password)) {
        header("Location: loginpage.php?error=emptyfields");
        exit();
    }
    else {
        $sql = "SELECT * FROM users WHERE email=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: loginpage.php?error=sqlerror");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "s", $mailuid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result)) {
                $pwdCheck = password_verify($password, $row['user_password']);
            if ($pwdCheck == false) {
                header("Location: loginpage.php?error=wrongpwd&mailuid=".$mailuid);
                exit();
            }
            else if ($pwdCheck == true) {
                session_start();
                $_SESSION['userId'] = $row['id'];
                $_SESSION['firstname'] = $row['first_name'];
                $_SESSION['lastname'] = $row['last_name'];
                $_SESSION['birthdate'] = $row['birthdate'];
                $_SESSION['gender'] = $row['gender'];
                $_SESSION['nationality'] = $row['nationality'];
                $_SESSION['phonenumber'] = $row['phone_number'];
                header("Location: ../index.php?login=success");
                exit();
            }
            else {
                header("Location: loginpage.php?error=wrong_password");
            }
            }
            else {
                header("Location: loginpage.php?error=nouser");
                exit();
            }
        }
    }
}
else {
    header("Location: ../index.php?error=unauthorized_access");
    exit();
}