<?php
require ('../config/db.php');
session_start();
//ADD BANNERS
/* Getting file name */
if (isset($_FILES['file'])) {
    $filename = $_FILES['file']['name'];
    $sType = mysqli_real_escape_string($conn, $_POST['producttype']);
    $sName = mysqli_real_escape_string($conn, $_POST['productname']);
    $sPrice = mysqli_real_escape_string($conn, $_POST['productprice']);
    /* Location */
    $location = "../images/uploads/stock/" . $filename;
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
        if (!empty($sName) || !empty($sPrice)){
            if (move_uploaded_file($_FILES['file']['tmp_name'], $location)) {
                $query = mysqli_query($conn,  "INSERT INTO stock (type, thumbnail, name, amount, postDate) VALUES('$sType', '$filename', '$sName', '$sPrice', NOW())");
                if ($query){
                    echo "<p id='msg' class='text-success'>New Stock Has been Added Successfully</p>";
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
