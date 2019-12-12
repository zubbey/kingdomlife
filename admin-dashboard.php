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

<?php
require ("./components/footer.php");
?>