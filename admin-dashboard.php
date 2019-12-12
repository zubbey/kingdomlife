<?php
require_once("./controller/auth_controller.php");
require ("./components/menu.php");
?>
<div class="container mt-5" xmlns="http://www.w3.org/1999/html">

    <?php
    if (isset($_GET['success']) && $_GET['success'] === 'true'){
        echo '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Audio Added</strong> Thanks Peter my man!.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        ';
    }else if (isset($_GET['error']) && $_GET['error'] === 'empty'){
        echo '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Mad Ohh!</strong> One field they empty Peter.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        ';
    }
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method='post' enctype="multipart/form-data">
        <label>Title: </label>
        <input class="form-control mb-2" type="text" name="description_entered"/>

        <label>Audio Name: </label>
        <input class="form-control mb-2" type="text" name="fileName"/>
        <button class="btn btn-lg btn-primary rounded" type="submit" name="audio-btn"><i class="fas fa-plus"></i> Add Audio</button>
    </form>

    <hr>
    <div class="row mt-3">
        <div class="col">
            <?php
            require ('config/db.php');
            $result = mysqli_query($conn, "SELECT description, filename FROM audio ORDER BY id desc" );
                echo "<ul class='list-group-item'>";
                while ($row = mysqli_fetch_array($result)){
                    $files_field= $row['filename'];
                    $files_show= "audio/$files_field";
                    $description= $row['description'];
                    echo "<li class='d-flex align-items-center justify-content-between'>";
                    echo "<a href='".$files_show.".mp3'>$description</a> <span class='badge badge-success'>Added</span>";
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