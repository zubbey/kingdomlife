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
        <div class="swiper-slide hero-content-wrap">
            <img src="https://i.imgur.com/Hynlr0f.jpg" alt="choir">

            <div class="position-absolute w-100">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-8 d-flex flex-column justify-content-center align-items-start">
<!--                            <header class="entry-header">-->
<!--                                <h1>Welcome to</h1>-->
<!--                                <h4>Kingdom Life Gospel Outreach Ministries!</h4>-->
<!--                            </header>-->
                            <footer class="entry-footer d-flex flex-wrap align-items-center mt-5">
                            <?php
                                if (!isset($_SESSION['user_session'])){
                                    echo '<a href="?register=true" class="btn gradient-bg mr-2">Get Involved</a>';
                                }
                            ?>
<!--                                <a href="about" class="btn orange-border">Read More</a>-->
                            </footer>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="swiper-slide hero-content-wrap">
            <img src="https://i.imgur.com/PD10OAQ.jpg" alt="">

            <div class="position-absolute w-100">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-8 d-flex flex-column justify-content-center align-items-start">
<!--                            <header class="entry-header">-->
<!--                                <h1>Discover your Destiny</h1>-->
<!--                                <h4>as you worship with us today</h4>-->
<!--                            </header>-->
                            <footer class="entry-footer d-flex flex-wrap align-items-center mt-5">
                                <?php
                                if (!isset($_SESSION['user_session'])){
                                    echo '<a href="?register=true" class="btn gradient-bg mr-2">Get Involved</a>';
                                }
                                ?>
<!--                                <a href="about" class="btn orange-border">Read More</a>-->
                            </footer>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="swiper-slide hero-content-wrap">
            <img src="https://i.imgur.com/4C7PSzd.jpg" alt="">

            <div class="position-absolute w-100">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-8 d-flex flex-column justify-content-center align-items-start">
<!--                            <header class="entry-header">-->
<!--                                <h1>Join us,</h1>-->
<!--                                <h4>Jesus lords you</h4>-->
<!--                            </header>-->
                            <footer class="entry-footer d-flex flex-wrap align-items-center mt-5">
                                <?php
                                if (!isset($_SESSION['user_session'])){
                                    echo '<a href="?register=true" class="btn gradient-bg mr-2">Get Involved</a>';
                                }
                                ?>
<!--                                <a href="about" class="btn orange-border">Read More</a>-->
                            </footer><!-- .entry-footer -->
                        </div><!-- .col -->
                    </div><!-- .row -->
                </div><!-- .container -->
            </div><!-- .hero-content-overlay -->
        </div><!-- .hero-content-wrap -->
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