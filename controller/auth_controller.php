<?php
session_start();
require ('./config/db.php');
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

// initializing variables
$errors =  array();
$username_email = "";
$email = "";
$phone = "";


if (isset($_POST['register'])) {
    $username = stripslashes($_REQUEST['username']);
    $username = mysqli_real_escape_string($conn,$username);
    $email = stripslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string($conn,$email);
    $phone = stripslashes($_REQUEST['phone']);
    $phone = mysqli_real_escape_string($conn,$phone);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($conn,$password);
    $passwordConfirm = stripslashes($_REQUEST['confirm-password']);

    if (empty($username) || empty($email) || empty($phone)) {
        $errors['empty'] = "please fill all fields.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "invalid Email Address.";
    }
    if (!preg_match('/^[0-9]{11}+$/', $phone)) {
        $errors['phone'] = "invalid Phone Number.";
    }
    if (strlen($password) < 6) {
        $errors['password'] = "Passwords must be at least 6 characters.";
    }
    if ($password !== $passwordConfirm) {
        $errors['password-confirm'] = "Password did not match.";
    }
    //CHECK IF EMAIL IS IN THE DATABASE
    $Query = "SELECT `*` FROM `members` WHERE `username` = ? AND `email` = ? LIMIT 1";
    $stmt = $conn->prepare($Query);
    $stmt->bind_param('ss', $username, $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $userCount = $result->num_rows;
    $stmt->close();
    if ($userCount > 0) {
        $errors['email-exist'] = "Email already exist.";
    }
    if ($userCount > 0) {
        $errors['username-exist'] = "The username is already used by someone else.";
    }

    if (count($errors) === 0) {
        $dateReg = date("Y-m-d");
        $password = password_hash($password, PASSWORD_DEFAULT);
        $token = bin2hex(random_bytes(30));

        $sql = "INSERT into `members` (username, email, phone, password, token, regDate, lastAction) VALUES ('$username', '$email', '$phone', '$password', '$token', '$dateReg', NOW())";
        $result = mysqli_query($conn,$sql);

        if ($result){
            header("Location: user/profile?success=true");
        }
    }
}