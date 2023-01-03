<?php
include_once 'dbh.php';
if (isset($_POST["course1bttn"])) {
    $result = mysqli_query($conn, "SELECT * FROM courses WHERE id = '1'");
    $row = mysqli_fetch_row($result);
}
elseif (isset($_POST["course2bttn"])) {
    $result = mysqli_query($conn, "SELECT * FROM courses WHERE id = '2'");
    $row = mysqli_fetch_row($result);
}
elseif (isset($_POST["course3bttn"])) {
    $result = mysqli_query($conn, "SELECT * FROM courses WHERE id = '3'");
    $row = mysqli_fetch_row($result);
}
elseif (isset($_POST["course4bttn"])) {
    $result = mysqli_query($conn, "SELECT * FROM courses WHERE id = '4'");
    $row = mysqli_fetch_row($result);
}
elseif (isset($_POST["course5bttn"])) {
    $result = mysqli_query($conn, "SELECT * FROM courses WHERE id = '5'");
    $row = mysqli_fetch_row($result);
}
