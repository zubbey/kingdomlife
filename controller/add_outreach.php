<?php
require ('../config/db.php');
session_start();
//ADD BANNERS
/* Getting file name */
if (isset($_FILES['file'])) {
    $filename = $_FILES['file']['name'];
    $oName = mysqli_real_escape_string($conn, $_POST['outreachname']);
    $oInfo = mysqli_real_escape_string($conn, $_POST['outreachinfo']);
    /* Location */
    $location = "../images/uploads/outreach/" . $filename;
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
        if (!empty($oName)){
            if (move_uploaded_file($_FILES['file']['tmp_name'], $location)) {
                $query = mysqli_query($conn,  "INSERT INTO outreaches (image, heading, body, postDate) VALUES('$filename', '$oName', '$oInfo', NOW())");
                if ($query){
                    echo "<p id='msg' class='text-success'>New Outreach Has been Added Successfully</p>";
                    $_SESSION['outreach_added'] = true;
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
