<?php
require_once("./controller/auth_controller.php");
require ("./components/menu.php");
?>

<form name="audio_form" id="form1" action="audio-upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="file1" accept=".ogg,.flac,.mp3" required="required"/>
    <input type="submit" name="audio-btn"/>
</form>

<?php
require ("./components/footer.php");
?>