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
            <div class="col-12 my-lg-5">
                <div class="swiper-container causes-slider">
                    <div class="swiper-wrapper">
                        <?php

                        $Query = "SELECT * FROM churchUnits";

                        if ($result = $conn->query($Query)) {

                            /* fetch associative array */
                            while ($row = $result->fetch_assoc()) {
                                echo "<div class='swiper-slide'>";
                                echo "<div class='cause-wrap'>";
                                echo "<figure class='m-0'>";
                                echo "<img src='".$row["image"]."' alt='".$row["heading"]."'>";
                                echo "<div class='figure-overlay d-flex justify-content-center align-items-center position-absolute w-100 h-100'>";
                                echo "<a href='#' class='btn orange-border mr-2'>Read more</a>";
                                echo "</div>";
                                echo "</figure>";
                                echo "<div class='cause-content-wrap'>";
                                echo "<header class='entry-header d-flex flex-wrap align-items-center'>";
                                echo "<h3 class='entry-title w-100 m-0'><a href='#'>".$row["heading"]."</a></h3>";
                                echo "</header>";
                                echo "<div class='entry-content'>";
                                echo "<a class='m-0 comment more'>".$row["body"]."</a>";
                                echo "</div>";

                                echo "</div>";
                                echo "</div>";
                                echo "</div>";//end of Swiper
                            }
                            $result->free();
                        }
                        ?>
                    </div>
                </div><!-- .swiper-container -->

                <!-- Add Arrows -->
                <div class="swiper-button-next flex justify-content-center align-items-center">
                    <span><svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1171 960q0 13-10 23l-466 466q-10 10-23 10t-23-10l-50-50q-10-10-10-23t10-23l393-393-393-393q-10-10-10-23t10-23l50-50q10-10 23-10t23 10l466 466q10 10 10 23z"/></svg></span>
                </div>

                <div class="swiper-button-prev flex justify-content-center align-items-center">
                    <span><svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1203 544q0 13-10 23l-393 393 393 393q10 10 10 23t-10 23l-50 50q-10 10-23 10t-23-10l-466-466q-10-10-10-23t10-23l466-466q10-10 23-10t23 10l50 50q10 10 10 23z"/></svg></span>
                </div>
            </div><!-- .col -->
        </div><!-- .row -->
</div>
<?php
require("./components/footer.php");
?>