<?php
require ('../config/db.php');
session_start();
//ADD BANNERS
/* Getting file name */
if (isset($_FILES['file'])) {
    $filename = $_FILES['file']['name'];
    /* Location */
    $location = "../images/uploads/banner/" . $filename;
    $uploadOk = 1;
    $imageFileType = pathinfo($location, PATHINFO_EXTENSION);

    /* Valid Extensions */
    $valid_extensions = array("jpg", "jpeg", "png");
    /* Check file extension */
    if (!in_array(strtolower($imageFileType), $valid_extensions)) {
        $uploadOk = 0;
        echo "<p class='text-danger'>Please only Upload the following Image format (JPG, JPEG, PNG)</p>";
    }

    if ($uploadOk == 0) {
        echo 0;
    } else {
        /* Upload file */
        if (move_uploaded_file($_FILES['file']['tmp_name'], $location)) {
            $query = mysqli_query($conn,  "INSERT INTO banner (image, createdate) VALUES('$filename', NOW())");
            if ($query){
                echo "Image Was Uploaded Successfully!, Please Continue";
            }
        } else {
            echo 0;
        }
    }
}
