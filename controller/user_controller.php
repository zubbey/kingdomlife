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


$name= $_FILES['file']['name'];

$tmp_name= $_FILES['file']['tmp_name'];

$submitbutton= $_POST['submit'];

$position= strpos($name, ".");

$fileextension= substr($name, $position + 1);

$fileextension= strtolower($fileextension);

$description= $_POST['description_entered'];

if (isset($name)) {

    $path= '../upload/';

    if (!empty($name)){
        if (move_uploaded_file($tmp_name, $path.$name)) {
            echo 'Uploaded!';
        }
    }
}
if(!empty($description)){
    mysqli_query($conn, "INSERT INTO audio (description, filename)
VALUES ('$description', '$name')");
}

mysqli_close($conn);

if(isset($_POST['upload_audio']))
{
    $file_name = $_FILES['audio_file']['name'];

    if($_FILES['audio_file']['type']=='audio/mpeg' || $_FILES['audio_file']['type']=='audio/mpeg3' || $_FILES['audio_file']['type']=='audio/x-mpeg3' || $_FILES['audio_file']['type']=='audio/mp3' || $_FILES['audio_file']['type']=='audio/x-wav' || $_FILES['audio_file']['type']=='audio/wav')
    {
        $new_file_name=$_FILES['audio_file']['name'];

        // Where the file is going to be placed
        $target_path = "../upload/".$new_file_name;

        //target path where u want to store file.

        //following function will move uploaded file to audios folder.
        if(move_uploaded_file($_FILES['audio_file']['tmp_name'], $target_path)) {

            //insert query if u want to insert file
        }
    }
}