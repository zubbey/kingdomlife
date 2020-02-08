<?php
require_once("./controller/auth_controller.php");
require("./components/menu.php");
?>

    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Units Their Descriptions</h1>
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .page-header -->
<div class="container">
        <div class="row">
            <div id="units" class="col-12 my-lg-5">
                <div class="swiper-container causes-slider">
                    <div class="swiper-wrapper">
                        <?php

                        $sql = "SELECT * FROM `churchUnits`";

                        if ($result = mysqli_query($conn, $sql)) {
                            /* fetch associative array */
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<div class='swiper-slide'>";
                                echo "<div class='cause-wrap'>";
                                echo "<figure class='m-0'>";
                                echo "<img src='".$row["image"]."' alt='".$row["heading"]."'>";
                                echo "</figure>";
                                echo "<div class='cause-content-wrap'>";
                                echo "<header class='entry-header d-flex flex-wrap align-items-center'>";
                                echo "<h3 class='entry-title w-100 m-0'><a href='#'>".$row["heading"]."</a></h3>";
                                echo "</header>";
                                echo "<div class='entry-content'>";
                                echo "<a class='m-0 comment more'>".sanitize($row["body"])."</a>";
                                echo "</div>";

                                echo "</div>";
                                echo "</div>";
                                echo "</div>";//end of Swiper
                            }
                        }
                        ?>
                    </div>
                </div><!-- .swiper-container -->

                <!-- Add Arrows -->
                <div class="swiper-button-next flex justify-content-center align-items-center">
                    <span><svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"></svg></span>
                </div>

                <div class="swiper-button-prev flex justify-content-center align-items-center">
                    <span><svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"></svg></span>
                </div>
            </div><!-- .col -->
        </div><!-- .row -->
</div>
<?php
require("./components/footer.php");
?>