<?php
require ('../config/db.php');
session_start();
//ADD BANNERS
/* Getting file name */
if (isset($_FILES['file'])) {
    $filename = $_FILES['file']['name'];
    $eName = mysqli_real_escape_string($conn, $_POST['eventname']);
    $eInfo = mysqli_real_escape_string($conn, $_POST['eventinfo']);
    $eTime = mysqli_real_escape_string($conn, $_POST['eventtime']);
    $eDate = mysqli_real_escape_string($conn, $_POST['eventdate']);
    $eVenue = mysqli_real_escape_string($conn, $_POST['eventvenue']);
    /* Location */
    $location = "../images/uploads/events/" . $filename;
    $uploadOk = 1;
    $imageFileType = pathinfo($location, PATHINFO_EXTENSION);

    /* Valid Extensions */
    $valid_extensions = array("jpg", "jpeg", "png");
    /* Check file extension */
    if (!in_array(strtolower($imageFileType), $valid_extensions)) {
        $uploadOk = 0;
        echo "<p class='text-danger'>Please only Upload the following Image format (JPG, JPEG, PNG)</p>";
        exit();
    }

    if ($uploadOk == 0) {
        echo 0;
    } else {
        /* Upload file */
        if (!empty($eName)){
            if (move_uploaded_file($_FILES['file']['tmp_name'], $location)) {
                $query = mysqli_query($conn,  "INSERT INTO events (ename, eimage, einfo, etime, edate, evenue, createDate) VALUES('$eName', '$filename', '$eInfo', '$eTime', '$eDate', '$eVenue', NOW())");
                if ($query){
                    echo "<p id='msg'>New Event Has been Added Successfully</p>";
                    $_SESSION['event_added'] = true;
                }
            } else {
                echo "<p class='text-danger'>This file can not be uploaded!</p>";
                exit();
            }
        } else {
            echo "<p class='text-danger' id='msg'>Please Note: All Text Field is Required!</p>";
            exit();
        }
    }
}
