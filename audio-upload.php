<?php
require ('config/db.php');
//UPLOAD AUDIO FILE
$name= $_FILES['file']['name'];

$tmp_name= $_FILES['file']['tmp_name'];

$submitbutton= $_POST['submit'];

$position= strpos($name, ".");

$fileextension= substr($name, $position + 1);

$fileextension= strtolower($fileextension);

$description= $_POST['description_entered'];

if (isset($name)) {

    $path= 'Uploads/';

    if (!empty($name)){
        if (move_uploaded_file($tmp_name, $path.$name)) {
            echo 'Uploaded!';

        } else{
            echo 'Could not upload';
        }
    }
}

if(!empty($description)){
    mysqli_query($conn, "INSERT INTO audio (description, filename)
VALUES ('$description', '$name')");
}


mysqli_close($conn);