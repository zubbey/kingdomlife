<?php
require_once("./controller/auth_controller.php");
require("./components/menu.php");
?>

    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Weekly Bulletin</h1>
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .page-header -->

<div class="container">
    <div class="row my-lg-5">
        <?php
        $btSql = "SELECT * FROM `bulletins` order by id DESC ";
        $btResult = mysqli_query($conn, $btSql);
        if (mysqli_num_rows($btResult) > 0){
            while ($btrow = mysqli_fetch_assoc($btResult)){
                echo '<div id="bulletin" class="col-8">';
                echo '<iframe src="./images/uploads/bulletin/'.$btrow['file'].'" class="card-img-top" width="100%" height="500px"></iframe>';
                echo '</div>';
                echo '<div class="col-4">';
                echo '<h5 class="mt-0">BULLETIN FOR THE WEEK</h5>';
                echo '<a href="./images/uploads/bulletin/'.$btrow['file'].'" class="btn gradient-bg mr-2" download="weekly_bulletin"><i class="icon_download"></i> Download</a>';
                echo '</div>';
            }
        }
        ?>
    </div>
</div>

<?php
require("./components/footer.php");
?>