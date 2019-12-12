<?php
require_once("./controller/auth_controller.php");
require ("./components/menu.php");
?>
<div class="container">
    <?php
    $result= mysqli_query($conn, "SELECT description, filename FROM audio ORDER BY ID desc" )
    or die("SELECT Error: ".mysqli_error());

    print "<table border=1>\n";
    while ($row = mysqli_fetch_array($result)){
        $files_field= $row['filename'];
        $files_show= "uploads/$files_field";
        $descriptionvalue= $row['description'];
        print "<tr>\n";
        print "\t<td>\n";
        echo "<font face=arial size=4/>$descriptionvalue</font>";
        print "</td>\n";
        print "\t<td>\n";
        echo "<div align=center><a href='$files_show'>$files_field</a></div>";
        print "</td>\n";
        print "</tr>\n";
    }
    print "</table>\n";

    ?>
</div>

    <form action="audio-upload.php" method='post' enctype="multipart/form-data">
        Description of File: <input type="text" name="description_entered"/><br><br>
        <input type="file" name="file"/><br><br>

        <input type="submit" name="submit" value="Upload"/>

    </form>

<hr>

<?php
if(session_id() != '') session_destroy();
if(isset($_GET['err'])){
    if($_GET['err'] == 'bf'){
        $errorMsg = 'Please select a video file for upload.';
    }elseif($_GET['err'] == 'ue'){
        $errorMsg = 'Sorry, there was an error uploading your file.';
    }elseif($_GET['err'] == 'fe'){
        $errorMsg = 'Sorry, only MP4, AVI, MPEG, MPG, MOV & WMV files are allowed.';
    }else{
        $errorMsg = 'Some problems occured, please try again.';
    }
}
?>

    <div class="youtube-box">
        <h1>Upload video to YouTube using PHP</h1>
        <form method="post" name="multiple_upload_form" id="multiple_upload_form" enctype="multipart/form-data" action="youtube_upload.php">
            <?php echo (!empty($errorMsg))?'<p class="err-msg">'.$errorMsg.'</p>':''; ?>
            <label for="title">Title:</label><input type="text" name="title" id="title" value="" />
            <label for="description">Description:</label> <textarea name="description" id="description" cols="20" rows="2" ></textarea>
            <label for="tags">Tags:</label> <input type="text" name="tags" id="tags" value="" />
            <label for="video_file">Choose Video File:</label>	<input type="file" name="videoFile" id="videoFile" >
            <input name="videoSubmit" id="submit" type="submit" value="Upload">
        </form>
    </div>
<?php
require ("./components/footer.php");
?>