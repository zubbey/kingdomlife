<?php
require_once("./controller/auth_controller.php");
require ("./components/menu.php");
?>
<div class="container mt-5" xmlns="http://www.w3.org/1999/html">

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method='post' enctype="multipart/form-data">
        <label>Title: </label> <input class="form-control mb-2" type="text" name="description_entered"/>
        <input class="w-100 font-weight-bold" type="file" name="file"/>
        <input class="btn btn-lg btn-primary rounded" type="submit" name="submit" value="Upload"/>
    </form>

    <hr>
    <div class="row mt-3">
        <div class="col">
            <?php
            $result= mysqli_query($conn, "SELECT description, filename FROM audio ORDER BY ID desc" );

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