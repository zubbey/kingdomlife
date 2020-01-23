<?php
require_once("./controller/auth_controller.php");
require("./components/menu.php");
?>
<style>
    .event-content-wrap{
        width: 100% !important;
    }
</style>

    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Events</h1>
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .page-header -->

    <div class="home-page-events">
        <div class="container">
            <div class="upcoming-events">
                <div class="section-heading">
                    <h2 class="entry-title">Upcoming Events</h2>
                </div><!-- .section-heading -->
            </div>
            <div class="row">
                <div class="col-12">
                        <div class="event-wrap d-flex flex-wrap justify-content-between">
                            <a href="https://i.imgur.com/pxWMKj4.jpg" class="row" download="Inter-Denominational Breakthrough Service Event" target="_blank">
                                <div id="event-img" class="col-4">
                                    <figure class="" style="width: 100%">
                                        <img src="https://i.imgur.com/pxWMKj4.jpg" alt="">
                                    </figure>
                                </div>
                                <div id="event-details" class="col-8">
                                    <div class="event-content-wrap">
                                        <header class="entry-header">
                                            <h3 class="entry-title w-100 m-0">Inter-Denominational Breakthrough Service</h3>
                                            <h5>Supernatural Intervention Hour</h5>
                                            <p>With <span class="highlight-color">Pastor Esther Uzosike</span></p>
                                            <p>Healing, Deliverance!
                                                Breaking of Family Ancient Barriers!
                                                Supernatural Conception and Delivery!
                                                Winning all Battles by the Power of God!
                                            </p>

                                            <h6 class="posted-date mt-3"><span>Every Wed:</span> 10:00 AM
                                            </h6><!-- .posted-date -->
                                            <!--                                    <h6 class="posted-date"><span>Date:</span> 15th Dec</h6>-->

                                            <h6 class="posted-date"><span>Venue:</span> Jesus Cathedral Off Market junction Oroazi Road, Mile 4 Rumueme, Port Harcourt.
                                            </h6><!-- .cats-links -->
                                        </header><!-- .entry-header -->

                                        <div class="entry-content">
                                            <p class="m-0">OUR GOD ANSWERS PRAYERS... Come Let’s Join Our Faith Together for an Outstanding Breakthrough</p>
                                        </div><!-- .entry-content -->
                                    </div><!-- .event-content-wrap -->
                                </div>
                            </a>
                        </div><!-- .event-wrap -->
                    </div><!-- .col -->

            </div>

            </div>
        </div>
    </div>

<?php
require("./components/footer.php");
?>