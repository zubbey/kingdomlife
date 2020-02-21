<?php
require ('../config/db.php');
session_start();
//ADD BULLETINS
if ($_FILES['file']['type'] == "application/pdf") {
    $source_file = $_FILES['file']['tmp_name'];
    $dest_file = "../images/uploads/bulletin/".$_FILES['file']['name'];

    if (file_exists($dest_file)) {
        print "<p class='text-danger'>The file name already exists!!</p>";
    }
    else {
        move_uploaded_file( $source_file, $dest_file )
        or die ("Error!!");
        if($_FILES['file']['error'] == 0) {
            print "Pdf file uploaded successfully!";
            $filesql = "INSERT INTO bulletins (file, createDate) VALUES('".$_FILES['file']['name']."', NOW())";
            $fileresult = mysqli_query($conn, $filesql);
            if ($fileresult){
                print "<b><u>Details : </u></b><br/>";
                print "File Name : ".$_FILES['file']['name']."<br.>"."<br/>";
                print "File Size : ".$_FILES['file']['size']." bytes"."<br/>";
                print "File location : upload/".$_FILES['file']['name']."<br/>";
            }
        }
    }
}
else {
    if ( $_FILES['file']['type'] != "application/pdf") {
        print "<p class='text-danger'>Error occured while uploading file : ".$_FILES['file']['name']."<br/></p>";
        print "<p class='text-danger'>Invalid  file extension, should be pdf !!"."<br/> </p>";
        print "<p class='text-danger'>Error Code : ".$_FILES['file']['error']."<br/> </p>";
    }
}
