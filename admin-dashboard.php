<?php
require_once("./controller/auth_controller.php");
require ("./components/menu.php");
?>
<div class="container mt-5">
    <form   class="md-form" action="audio-upload.php" method='post' enctype="multipart/form-data">
        <div class="file-field">
        <label for="inputDescription">Title: </label>
        <input name="description_entered" type="text" id="inputDescription" class="form-control mb-2" aria-describedby="passwordHelpBlock">
            <input name="file" type="file" id="customFile" class="w-100 font-weight-bold">
        <input type="submit" name="submit" value="Upload" class="btn btn-lg btn-primary rounded"/>
        </div>
    </form>

    <hr>
    <div class="row mt-3">
        <div class="col">
            <?php
            $result= mysqli_query($conn, "SELECT description, filename FROM audio ORDER BY ID desc" )
            or die("SELECT Error: ".mysqli_error());

            echo "<ul class='list-group-item'>";
            while ($row = mysqli_fetch_array($result)){
                $files_field= $row['filename'];
                $files_show= "audio/$files_field";
                $descriptionvalue= $row['description'];
                echo "<li class='d-flex align-items-center justify-content-between'>";
                echo "<a href='".$files_show."'>$descriptionvalue</a> <span class='badge badge-success'>Uploaded:</span>";
                echo "</li>";
            }
            echo "</ul>";

            ?>
        </div>
    </div>
</div>
<?php
require ("./components/footer.php");
?>