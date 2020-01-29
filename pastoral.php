<?php
require_once("./controller/auth_controller.php");
require("./components/menu.php");
?>
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Pastoral</h1>
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .page-header -->
    <div class="causes-page">
        <div class="our-causes pt-0 highlighted-cause">
            <div class="container">
                <div class="row">
                    <?php
                    $sql = "SELECT * FROM pastoral";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '
                            <div class="col-12 col-md-4">
                                <div class="cause-wrap">
                                    <figure class="m-0">
                                        <img src="'.$row['image'].'" alt="'.$row['heading'].'">
                                    </figure>
        
                                    <div class="cause-content-wrap">
                                        <header class="entry-header d-flex flex-wrap align-items-center">
                                            <h3 class="entry-title text-dark m-0">MEET THE FIRST LADY OF KINGDOM LIFE GOSPEL OUTREACH MINISTRIES INT’L.</h3>
                                        </header><!-- .entry-header -->
        
                                        <div class="entry-content text-dark">
                                            <p class="comment more">
                                            Pastor Mrs. Esther Uzosike is the wife of His Lordship, Bishop Victor Uzosike and First Lady Kingdom Life Gospel Outreach Ministries; A woman of prayer, strong in the word, a sought after international speaker, She is the Vice President of Spirit Filled Network of Gospel Ministers and a lecturer at the Spirit Filled Bible Institute, Port Harcourt. 

                                            A woman of rare grace and unassuming charisma, Pastor Esther actively reaches out to the individual woman through the following ministries : The Widows Outreach, Kingdom Brides (Singles), Family Breakthrough service for healing, deliverance, breaking of family ancient barriers, supernatural conception and delivery which holds at Kingdom Life Gospel Outreach Ministry, every Wednesday by 10:00 am and a co-host, alongside her husband Bishop Victor to the annual Seize the Moment Program targeted to encourage Christian singles to interact with one another and locate their spouses. 
                                             
                                            Pastor Esther, the author of a bestselling book Solution by Revelation, is blessed with seven wonderful children. 
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        ';
                    }
                    ?>

                </div><!-- .row -->
            </div><!-- .container -->
        </div><!-- .highlighted-cause -->

    </div>
<?php
require("./components/footer.php");
?>