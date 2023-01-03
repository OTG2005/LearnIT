<?php
if (isset($_POST['signup-submit'])){
    require 'dbh.php' ;
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['psw'];
    $passwordRepeat = $_POST['pwd-repeat'];
    $birthdate = $_POST['birthdate'];
    $gender = $_POST['gender'];
    $nationality = $_POST['nationality'];
    $phonenumber = $_POST['phonenumber'];
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number = preg_match('@[0-9]@', $password);

    if (empty($firstname) || empty($lastname) || empty($email) || empty($password) || empty($passwordRepeat)) {
        header("Location: userSignUp.php?error=emptyfields&uid=".$firstname."&lastname=".$lastname."&mailuid=".$email."&birthdate=".$birthdate."&gender=".$gender."&phonenumber=".$phonenumber);
        exit();
    }
    else if(!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
        header("Location: userSignUp.php?error=passworderror&uid=".$firstname."&lastname=".$lastname."&mailuid=".$email."&birthdate=".$birthdate."&gender=".$gender."&phonenumber=".$phonenumber);
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z]*$/", $firstname.$lastname)) {
        header("Location: userSignUp.php?error=invalidmailuid&uid=".$firstname."&lastname=".$lastname."&birthdate=".$birthdate."&gender=".$gender."&phonenumber=".$phonenumber);
        exit();
    }

    else if (preg_match("/^[0-9]*$/", $phonenumber) || preg_match("/^[+]*$/", $phonenumber)) {
        header("Location: userSignUp.php?error=invalid_phonenumber&uid=".$firstname."&lastname=".$lastname."&mailuid=".$email."&birthdate=".$birthdate."&gender=".$gender."&phonenumber=".$phonenumber);
        exit();
    }

    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: userSignUp.php?error=invalidmail&&uid=".$firstname."&lastname=".$lastname."&birthdate=".$birthdate."&gender=".$gender."&phonenumber=".$phonenumber);
        exit();
    }

    else if ($password !== $passwordRepeat) {
        header("Location: userSignUp.php?error=passwordcheck&uid=".$firstname."&lastname=".$lastname."&mailuid=".$email."&birthdate=".$birthdate."&gender=".$gender."&phonenumber=".$phonenumber);
        echo "passwords don't match";
        exit();
    }
    else {
        $sql = "SELECT email FROM users WHERE email=?";
        $stmt_email = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt_email, $sql)) {
            header("Location: userSignUp?error=sqlerror");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt_email, "s" , $email);
            mysqli_stmt_execute($stmt_email);
            mysqli_stmt_store_result($stmt_email);
            $resultCheck_email = mysqli_stmt_num_rows($stmt_email);
            if ($resultCheck_email > 0) {
                header("Location: userSignUp.php?error=mailtaken&&uid=".$firstname."&lastname=".$lastname."&birthdate=".$birthdate."&gender=".$gender."&phonenumber=".$phonenumber);
                exit();
                }    
            else {
                $sql = "INSERT INTO users (first_name, last_name, email, user_password, gender, birthdate, nationality, phone_number) 
                VALUES ('$firstname', '$lastname', ?, ?, '$gender', '$birthdate', '$nationality', '$phonenumber');";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: userSignUp?error=sqlerror");
                    exit();
                }
                else {
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "ss", $email, $hashedPwd);
                    mysqli_stmt_execute($stmt);
                    header("Location: loginpage.php?signup=success");
                exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
else {
    header("Location: ../index.php");
}