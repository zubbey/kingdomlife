<?php
session_start();
require ('../config/db.php');
//require_once ('./controllers/emailControl.php');
date_default_timezone_set("Africa/Lagos");

// last request was more than 30 minutes ago
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    $id = $_SESSION['userid'];
    $time = time();
    $updateQuery = mysqli_query($conn,"UPDATE `members` SET `lastAction` = '$time' WHERE `lastAction` = NOW() - 1800");
    session_unset();     // unset $_SESSION variable for the run-time
    session_destroy();   // destroy session data in storage
    header("Location: ?login=true&time=inactive");
    exit();
}$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp

// CODE TO LOGOUT A USER
if (isset($_GET['logout'])) {
    $id = $_SESSION['user_id'];
    $time = time();
    $updateQuery = mysqli_query($conn,"UPDATE `members` SET lastAction = '$time' WHERE `id` = '$id'");
    session_destroy();
    $_SESSION['user_session'] = FALSE;
    unset($_SESSION['user_id']);
    unset($_SESSION['username']);
    unset($_SESSION['email']);
    unset($_SESSION['phone']);
    unset($_SESSION['verified']);
    // UNSET SESSION VAIRABLE WITH NULL
    header('location: ../index.php');
    exit();
}