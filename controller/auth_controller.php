<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
require ('config/db.php');
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
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $password = $_POST['password'];
    $confirm_password = trim($_POST['confirm_password']);
    // Validate password strength
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);

    if (empty($username) && empty($email) && empty($phone) && empty($password)) {
        $errors['empty'] = "please fill out the form.";
        header("Location: ?register=true&error=".$errors['empty']."&username=".$username."&email=".$email."&phone=".$phone);
    } else if (empty($username)) {
        $errors['empty_username'] = "you forgot to fill your username.";
        header("Location: ?register=true&username_error=".$errors['empty_username']."&username=".$username."&email=".$email."&phone=".$phone);
    } else if(empty($email)){
        $errors['empty_email'] = "you forgot to fill your email address.";
        header("Location: ?register=true&error_email=".$errors['empty_email']."&username=".$username."&email=".$email."&phone=".$phone);
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "invalid Email Address.";
        header("Location: ?register=true&error_email=".$errors['email']."&username=".$username."&email=".$email."&phone=".$phone);
    } else if(empty($phone)){
        $errors['empty_phone'] = "you forgot to fill your phone.";
        header("Location: ?register=true&error_phone=".$errors['empty_phone']."&username=".$username."&email=".$email."&phone=".$phone);
    } else if (!preg_match('/^[0-9]{11}+$/', $phone)) {
        $errors['phone'] = "invalid Phone Number.";
        header("Location: ?register=true&error_phone=".$errors['phone']."&username=".$username."&email=".$email."&phone=".$phone);
    } else if(!$uppercase || !$lowercase || strlen($password) < 6) {
        $invalid_password_Msg = "";
        $errors['password-short'] = "Password should be at least 6 characters & should include at least one uppercase letter";
        header("Location: ?register=true&error_password=".$errors['password-short']."&username=".$username."&email=".$email."&phone=".$phone);
    } else if ($password != $confirm_password){
        $errors['password-confirm'] = "Password did not match.";
        header("Location: ?register=true&error_cpassword=".$errors['password-confirm']."&username=".$username."&email=".$email."&phone=".$phone);
    }

    //CHECK IF EMAIL IS IN THE DATABASE

    $user_check_query = "SELECT * FROM members WHERE username='$username' OR email='$email' LIMIT 1";
    $result = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
        if ($user['username'] === $username) {
            $errors['username-exist'] = "This username is already used by someone else.";
            header("Location: ?register=true&error_username-exist=".$errors['username-exist']."&username=".$username."&email=".$email."&phone=".$phone);
        }

        if ($user['email'] === $email) {
            $errors['email-exist'] = "Email already exist.";
            header("Location: ?register=true&error_email-exist=".$errors['email-exist']."&username=".$username."&email=".$email."&phone=".$phone);
        }
    }
    if (count($errors) == 0) {

        $created_at = date("Y-m-d");
        $password = password_hash($password, PASSWORD_DEFAULT);
        $token = bin2hex(random_bytes(30));
        $verified = 0;

        $query = "INSERT INTO members (username, email, phone, password, verified, token, created_at, lastAction) 
              VALUES('$username', '$email', '$phone', '$password', '$verified', '$token', '$created_at', NOW())";
        $result = mysqli_query($conn, $query);

        if ($result){
            session_regenerate_id();
            $_SESSION['user_session'] = TRUE;
            $userid = $conn->insert_id;
            $_SESSION['user_id'] = $userid;
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            $_SESSION['phone'] = $phone;
            $_SESSION['verified'] = $verified;
            header('location: users/profile.php?success=true');
        }
    }
}


// CODE IF CLICKED ON LOGIN
if (isset($_POST['login-btn'])) {
    $username_email = $_POST['username-email'];
    $password = $_POST['password'];
    if (empty($username_email)) {
        $errors['empty_username'] = "you forgot to fill your username";
        header("Location: ?login=true&username_error=".$errors['empty_username']."&username=".$username_email);
    }else if (empty($password)) {
        $errors['empty_password'] = "you forgot to fill your password";
        header("Location: ?login=true&password_error=".$errors['empty_password']."&username=".$username_email);
    }
    if (count($errors) == 0) {

        $sql = "SELECT * FROM members WHERE username = ? OR email = ?";
        if($query = $conn->prepare($sql)) { // assuming $mysqli is the connection
            $query->bind_param('ss', $username_email, $username_email);
            $query->execute();
            // any additional code you need would go here.
            $result = $query->get_result();
            $user = $result->fetch_assoc();
            $query->close();
            if (password_verify($password, $user['password'])) {
                $id = $user['id'];
                if ($user[`lastAction`] == 0) {
                    $updateQuery = mysqli_query($conn, "UPDATE `members` SET lastAction = NOW() WHERE `id` = '$id'");
                } else {
                    $updateQuery = mysqli_query($conn, "UPDATE `members` SET lastAction = NOW() WHERE `id` = '$id'");
                }
                $_SESSION['user_session'] = TRUE;
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['phone'] = $user['phone'];
                $_SESSION['verified'] = $user['verified'];
                //SESSION VARIABLE WITH NULL VALUE

                // flash messages
                $_SESSION['successlogin'] = "you're logged in.";
                $_SESSION['loginlog'] = "you logged in at " . date("h:i a");
                header('location: users/profile.php?success=true');
            } else {
                $errors['no_account'] = "No user found with this credentials";
                header("Location: ?login=true&no_account=" . $errors['no_account'] . "&username=" . $username_email);
            }
        } else {
            $error = $conn->errno . ' ' . $conn->error;
            echo $error; // 1054 Unknown column 'username' in 'field list'
        }
    }
}

//UPLOAD AUDIO FILE

if (isset($_POST['audio-btn'])) {

    $filename = strtolower($_POST['fileName']);
    $description = mysqli_real_escape_string($conn, $_POST['description_entered']);

    if (!empty($filename) || !empty($description)) {
        mysqli_query($conn, "INSERT INTO `audio` (description, filename)
        VALUES ('$description', '$filename')");
        header("Location: ?success=true");
    } else {
        header("Location: ?error=empty");
    }
}
mysqli_close($conn);