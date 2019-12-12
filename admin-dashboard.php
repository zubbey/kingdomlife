<?php
require_once("./controller/auth_controller.php");
require ("./components/menu.php");
?>
    <form name="audio_form" id="audio_form" action="audio-upload.php" method="post" enctype="multipart/form-data">
        <fieldset>
            <label>Audio File:</label>
            <input name="audio_file" id="audio_file" type="file"/>
            <input type="submit" name="Submit" id="Submit" value="Submit"/>
        </fieldset>
    </form>
<?php
require ("./components/footer.php");
?>