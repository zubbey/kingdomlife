<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
require ('../config/db.php');

date_default_timezone_set("Africa/Lagos");

// last request was more than 30 minutes ago
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    $id = $_SESSION['id'];
    $updateQuery = mysqli_query($conn,"UPDATE `admin` SET `lastAction` = NULL WHERE `lastAction` = NOW() - 1800");
    session_unset();     // unset $_SESSION variable for the run-time
    session_destroy();   // destroy session data in storage
    header("Location: ?login=true&time=inactive");
    exit();
}$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp

// initializing variables
$errors =  array();
$successMsg = "";
$errorMsg = "";

//ADMIN PORTAL ACCESS
if (isset($_POST['login-btn'])) {
    $username = $_POST['username'];
    $password = sha1($_POST['password']);
    if (empty($username)) {
        $errors['empty_username'] = "Enter your admin username";
        header("Location: ?login=0&username_error=".$errors['empty_username']."&username=".$username);
    }else if (empty($password)) {
        $errors['empty_password'] = "Enter the correct admin password";
        header("Location: ?login=0&password_error=".$errors['empty_password']."&username=".$username);
    }
    if (count($errors) == 0) {
        $sql = "SELECT * FROM admin WHERE username = ? ";
        if($query = $conn->prepare($sql)) { // assuming $mysqli is the connection
            $query->bind_param('s', $username);
            $query->execute();
            // any additional code you need would go here.
            $result = $query->get_result();
            $user = $result->fetch_assoc();
            $query->close();
            if ($password === $user['password'] || password_verify($_POST['password'], $user['password'])) {
                $id = $user['id'];
                if ($user[`lastaction`] == 0) {
                    $updateQuery = mysqli_query($conn, "UPDATE `admin` SET lastAction = NOW() WHERE `id` = '$id'");
                } else {
                    $updateQuery = mysqli_query($conn, "UPDATE `admin` SET lastAction = NOW() WHERE `id` = '$id'");
                }
                $_SESSION['admin_session'] = TRUE;
                $_SESSION['adminid'] = $user['id'];
                $_SESSION['username'] = $username;
                $_SESSION['adminEmail'] = $user['email'];
                $_SESSION['adminFname'] = $user['fname'];
                $_SESSION['adminLname'] = $user['lname'];
                $_SESSION['adminAbout'] = $user['about'];
                $_SESSION['adminRole'] = $user['role'];
                //SESSION VARIABLE WITH NULL VALUE
                // flash messages

                $_SESSION['loginlog'] = "you last logged in at " . date("h:i a");
                $_SESSION['newLogin'] = $username. "last logged in at ". date("h:i a");
            } else {
                $errors['no_account'] = "You do not have access to this portal!";
                header("Location: ?login=0&no_account=" . $errors['no_account'] . "&username=" . $username);
            }
        } else {
            $error = $conn->errno . ' ' . $conn->error;
            echo $error; // 1054 Unknown column 'username' in 'field list'
        }
    }
}

//update members testimony status
if (isset($_GET['q'])){
    if ($_GET['q'] == 0){
        goLive($_GET['memberid']);
    }
    else if ($_GET['q'] == 1){
        pendingTesti($_GET['memberid']);
    } else{
        $successMsg = "";
    }
}

function goLive($memberid){
    global $conn;
    global $successMsg;
    $status = 1;
    $updateQuery = mysqli_query($conn, "UPDATE `testimonies` SET `status` = '$status' WHERE `id` = '$memberid'");
    if ($updateQuery){
        $successMsg = "
            <div class=\"alert alert-primary alert-dismissible fade show\">
                <strong>Success!</strong>Your Update was successful!;
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
            </div>
        ";
    }
}

function pendingTesti($memberid){
    global $conn;
    global $successMsg;
    $status = 0;
    $updateQuery = mysqli_query($conn, "UPDATE `testimonies` SET `status` = '$status' WHERE `id` = '$memberid'");

    if ($updateQuery){
        $successMsg = "
            <div class=\"alert alert-primary alert-dismissible fade show\">
                <strong>Success!</strong>Your Update was successful!;
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
            </div>
        ";
    }
}


//DELETE FILE
if (isset($_GET['delbid']))
{
    deleteSelected($conn, $_GET['file'], $_GET['table'], $_GET['delbid']);
}
elseif (isset($_GET['delbtid'])) //delete Bulletins
{
    deleteSelected($conn, $_GET['file'], $_GET['table'], $_GET['delbtid']);
}
elseif (isset($_GET['deleid'])) //delete Events
{
    deleteSelected($conn, $_GET['file'], $_GET['table'], $_GET['deleid']);
}
elseif (isset($_GET['deloid'])) //delete Outreaches
{
    deleteSelected($conn, $_GET['file'], $_GET['table'], $_GET['deloid']);
}
elseif (isset($_GET['delsid'])) //delete Stock
{
    deleteSelected($conn, $_GET['file'], $_GET['table'], $_GET['delsid']);
}


function deleteSelected($conn, $file, $table, $id){
    $del_selected = mysqli_query($conn, "DELETE FROM $table WHERE id = '$id'");
    if ($del_selected){
        global $errorMsg;
        $delfile = "../".$file;
        if(is_file($delfile) && @unlink($delfile)){
            // delete success
            unlink("../".$file);
        } else if (is_file ($delfile)) {
            $errorMsg = "
                <div class=\"alert alert-danger alert-dismissible fade show\">
                    <strong>Ops!</strong>Deleting Failed;
                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
                </div>
            ";
        } else {
            // file doesn't exist
            $errorMsg = "
                <div class=\"alert alert-danger alert-dismissible fade show\">
                    <strong>Ops!</strong>The file you're trying to delete does not exist;
                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
                </div>
            ";
        }
        mysqli_query($conn,"ALTER TABLE $table AUTO_INCREMENT = 1");
        header("Location: ?success=deleted");
        exit();
    }
}


//assign value to admins
switch (isset($_SESSION['admin_session'])) {
    case $_SESSION['adminRole'] = 1:
        $_SESSION['adminRole'] = 'Read/Write';
        break;
    case $_SESSION['adminRole'] = 2:
        $_SESSION['adminRole'] = 'Write';
        break;
    case $_SESSION['adminRole'] = 3:
        $_SESSION['adminRole'] = 'Read';
        break;

    default:
        $_SESSION['adminRole'] = 'Denied';
}


//LOGOUT ADMIN
if (isset($_GET['logout'])) {
    $id = $_SESSION['id'];
    $updateQuery = mysqli_query($conn,"UPDATE `admin` SET lastAction = NULL WHERE `id` = '$id'");
    session_destroy();
    $_SESSION['admin_session'] = FALSE;
    unset($_SESSION['id']);
    unset($_SESSION['username']);
    unset($_SESSION['adminEmail']);
    unset($_SESSION['adminRole']);
    // UNSET SESSION VAIRABLE WITH NULL
    header('location: index');
    exit();
}