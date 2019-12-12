<?php
require_once ("config/db.php");
//UPLOAD AUDIO FILE
$name = $_FILES['file']['name'];

$tmp_name = $_FILES['file']['tmp_name'];

$submitbutton = $_POST['submit'];

$position = strpos($name, ".");

$fileextension = substr($name, $position + 1);

$fileextension = strtolower($fileextension);

$description = $_POST['description_entered'];

if (isset($submitbutton)) {
    echo "uploading</br>";
    $path = '../audio/';

    if (!empty($name)) {
        if (move_uploaded_file($tmp_name, $path . $name)) {
            header("Location: /?Uploaded=true");
        } else {
            header("Location: /?error=fail");
        }
    }

    if (!empty($description)) {
        mysqli_query($conn, "INSERT INTO audio (description, filename)
        VALUES ('$description', '$name')");
    } else {
        header("Location: /?error=emptyTitle");
    }
    mysqli_close($conn);
}