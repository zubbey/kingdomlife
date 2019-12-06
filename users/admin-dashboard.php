<?php
require_once("../config/db.php");
require_once("../controller/user_controller.php");
?>

<form name="audio_form" id="audio_form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
    <fieldset>
        <label>Audio File:</label>
        <input name="audio_file" id="audio_file" type="file"/>
        <input type="submit" name="upload_audio" id="Submit" value="Submit"/>
    </fieldset>
</form>