<?php ?>
<style>
    .position-absolute.w-100{
        margin-top: 28rem;
        z-index: 1000 !important;
    }
    .btn.orange-border{
        /*color: #fff !important;*/
    }
</style>
<div class="swiper-container hero-slider">
    <div class="swiper-wrapper">
        <?php
        $selQuery = "SELECT * FROM `banner` order by `id` DESC";
        $result = mysqli_query($conn, $selQuery);
        if (mysqli_num_rows($result) > 0){
            while ($row = mysqli_fetch_assoc($result)){
                echo '<div class="swiper-slide hero-content-wrap">';
                echo '<img src="'. $row['image'] .'" alt="'. $row['image'] .'">';
                echo ' <div class="position-absolute w-100">';
                echo '<div class="container">';
                echo '<div class="row">';
                echo '<div class="col-12 col-lg-8 d-flex flex-column justify-content-center align-items-start">';
                echo '<footer class="entry-footer d-flex flex-wrap align-items-center mt-5 get-involved">';
                if (!isset($_SESSION['user_session'])){
                    echo '<a href="?register=true" class="btn gradient-bg mr-2 get-involved">Get Involved</a>';
                }
                echo '</footer>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        } else{

            echo '<div class="swiper-slide hero-content-wrap">';
            echo ' <div class="position-absolute w-100">';
            echo '<div class="container">';
            echo '<h2>Welcome to Church!</h2>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        ?>

    </div><!-- .swiper-wrapper -->

    <div class="pagination-wrap position-absolute w-100">
        <div class="container">
            <div class="swiper-pagination"></div>
        </div><!-- .container -->
    </div><!-- .pagination-wrap -->

    <!-- Add Arrows -->
    <div class="swiper-button-next flex justify-content-center align-items-center">
        <span><svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1171 960q0 13-10 23l-466 466q-10 10-23 10t-23-10l-50-50q-10-10-10-23t10-23l393-393-393-393q-10-10-10-23t10-23l50-50q10-10 23-10t23 10l466 466q10 10 10 23z"/></svg></span>
    </div>

    <div class="swiper-button-prev flex justify-content-center align-items-center">
        <span><svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1203 544q0 13-10 23l-393 393 393 393q10 10 10 23t-10 23l-50 50q-10 10-23 10t-23-10l-466-466q-10-10-10-23t10-23l466-466q10-10 23-10t23 10l50 50q10 10 10 23z"/></svg></span>
    </div>
</div><!-- .hero-slider -->