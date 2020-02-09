<?php
require_once("./controller/auth_controller.php");
require("./components/menu.php");

?>
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>About Us</h1>
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .page-header -->

    <div class="welcome-wrap">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8 order-2 order-lg-1">
                    <div class="welcome-content">
                        <?php
//                        $sql = "SELECT * FROM pageContents WHERE id = 1 LIMIT 1";
//                        $result = mysqli_query($conn, $sql);
//                        while ($contentRow = mysqli_fetch_assoc($result)){
//                            $heading = $contentRow['heading'];
//                            $heading = str_replace("'","''",$heading);
//                            $body = mysqli_real_escape_string($conn, stripslashes(nl2br($contentRow['body'])));
//                        }
                        ?>

                        <header class="entry-header">
                            <h2 class="entry-title">Welcome to Kingdom Life Gospel Outreach Ministries</h2>
                        </header>

                        <div class="entry-content mt-5">
                            <p>
                                Kingdom Life Gospel Outreach Ministries is a dynamic commission through which God has reached and transformed the destinies of people in Nigeria, Africa and beyond since it was birthed in November 1994.  Our Headquarter Church, Jesus Cathedral, has a beautiful and inviting auditorium that sits over 4000 adults.
                            </p>
                            <p>
                                It also has a Children’s Church and a Teens/Youth Center to ensure that the spiritual needs of your entire family are met.  Presided over by the anointed and dynamic Apostle of Destiny and God’s Battle Axe, Bishop Victor Uzosike, Jesus Cathedral is also supervises branches of the Church in major cities of Nigeria, Europe and the United States of America.  Kingdom Life Gospel Outreach Ministries is giving light to our generation with the message of salvation, healing and deliverance with the mandate of spreading the gospel all over the world through crusades, revivals and outreaches (Matthew 24:14, Mark 1:15). 
                            </p>
                            <p>
                                This message is woven into the four pillars of the church. These pillars, which constitute our core mandate are: Discovering of Destiny, Recovering of Destiny, Fulfillment of Destiny, and Leaving a Legacy on earth (Daniel 7:27).
                            </p>
                        </div>

                    </div>
                </div>

                <div class="col-12 col-lg-4 order-1 order-lg-2">
                    <img src="https://i.imgur.com/mV1ZMC9.jpg" alt="welcome">
                    <div class="card my-4">
                        <h5 class="card-header">Outreaches</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <ul class="list-unstyled mb-0">
                                        <?php
                                        $sql = "SELECT * FROM `outreaches`";

                                        if ($result = mysqli_query($conn, $sql)) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<li><a href='outreaches.php#".$row["id"]."' class='list-group-item'>" . sanitize($row['heading']) . "</a></li>";
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .home-page-icon-boxes -->
    <div class="help-us">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex flex-wrap justify-content-between align-items-center">
                    <h2>Worship with us today</h2>

                    <a class="btn orange-border" href="contact?direction=true"><i class="icon_pin"></i> Get Direction</a>
                </div>
            </div>
        </div>
    </div>
<div class="about-testimonial">
    <div class="container">
        <div class="row mt-5">
            <div class="coL-12 col-lg-6">
                <div class="section-heading">
                    <h2 class="entry-title">Testimonies</h2>
                </div><!-- .section-heading -->
            </div><!-- .col -->
        </div><!-- .row -->
        <div style="height: 100% !important;" class="carousel" data-flickity='{ "wrapAround": true, "autoPlay": 5000, "groupCells": 1, "freeScroll": true }'>
            <?php

            $Query = "SELECT * FROM `testimonies` WHERE `status` = 1";

            if ($result = $conn->query($Query)) {
                /* fetch associative array */
                while ($row = $result->fetch_assoc()) {
                    $id = $row['userid'];
                    $UserQuery = "SELECT * FROM `members` WHERE `id` = '$id'";
                    if ($userResult = $conn->query($UserQuery)){
                        $userRow = $userResult->fetch_assoc();
                        $username = $userRow["username"];
                        $userid = $userRow["id"];
                    }

                    echo '

                    <div class="carousel-cell">
                        <div class="row">
                            <div id="testimony-content-box" class="col col-6 col-4 m-auto">
                                <div class=" text-center">
                                    <div class="entry-footer align-items-center mt-5">
                                        <img src="./images/uploads/profile' . $userid . '.jpg?' . mt_rand() . '" class="rounded-circle" height="150px" alt="'.$username.'">
                                        <h6>@'.$username.'</h6>
                                    </div>
                                    <div class="">
                                        <p class="comment more">'.sanitize($row['testimony']).'</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                ';
                }
            }
            ?>
        </div>
        <div class="row mt-5">
            <div class="coL-12 m-auto">
                <div class="entry-footer">
                    <?php
                    if (isset($_SESSION['user_session'])){
                        echo '<a href="users/profile?mystory=true" class="btn gradient-bg mr-2">Share your Testimony</a>';
                    } else{
                        echo '<a href="?register=true" class="btn gradient-bg mr-2">Share your Testimony</a>';
                    }
                    ?>
                </div><!-- .entry-footer -->
            </div>
        </div>
    </div>
</div>
<?php
require("./components/footer.php");
?>
