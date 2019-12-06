<?php
require_once("../config/db.php");
require_once("../controller/user_controller.php");
?>

<form action="../controller/youtube_upload.php" method="post" enctype="multipart/form-data">
    <p>
        <input type="file" name="video">
    </p>
    <p>
        <input type="text" name="vtitle">
    </p>
    <p>
        <textarea name="vdesc" id="" cols="30" rows="10"></textarea>
    </p>
    <p>
        <input type="text" name="vtags" placeholder="Comma separated values">
    </p>
    <p>
        <input type="submit" name="submit" value="Submit">
    </p>
</form>