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
                <?php
                $eSql = "SELECT * FROM `events` order by id DESC";
                $eResult = mysqli_query($conn, $eSql);
                if (mysqli_num_rows($eResult) > 0){
                    while ($erow = mysqli_fetch_assoc($eResult)){
                        echo '
                            <div class="col-12">
                                <div class="event-wrap d-flex flex-wrap justify-content-between">
                                    <a href="./images/uploads/events/'.$erow['eimage'].'" class="row" download="Inter-Denominational Breakthrough Service Event" target="_blank">
                                        <div id="event-img" class="col-4">
                                            <figure class="" style="width: 100%">
                                                <img src="./images/uploads/events/'.$erow['eimage'].'" alt="">
                                            </figure>
                                        </div>
                                        <div id="event-details" class="col-8">
                                            <div class="event-content-wrap">
                                                <header class="entry-header">
                                                    <h3 class="entry-title w-100 mt-4">'.$erow['ename'].'</h3>
                                                    <p>'.$erow['einfo'].'</p>
                                                    <footer class="blockquote-footer">
                                                        <h6 class="posted-date mt-3"><span>Time: </span> '.$erow['etime'].'</h6>
                                                        <h6 class="posted-date mt-3"><span>Date: </span> '.$erow['edate'].'</h6>
                                                        <h6 class="posted-date"><span>Venue: </span> '.$erow['evenue'].'</h6>
                                                    </footer>
                                                </header>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        ';
                    }
                } else {

                }
                ?>
            </div>
        </div>
    </div>

<?php
require("./components/footer.php");
?>