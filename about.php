<?php
require_once("./controller/auth_controller.php");
require("./components/menu.php");


$sql = "SELECT * FROM pageContents WHERE id = 1";
$result = mysqli_query($conn, $sql);
$contentRow = mysqli_fetch_assoc($result);
$about_heading = $contentRow['heading'];
$about_body = nl2br($contentRow['body']);
$result->close();

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
                        <header class="entry-header">
                            <h2 class="entry-title"><?php echo $about_heading;?></h2>
                        </header><!-- .entry-header -->

                        <div class="entry-content mt-5">
                            <p><?php echo $about_body;?></p>
                        </div><!-- .entry-content -->
                    </div><!-- .welcome-content -->
                </div><!-- .col -->

                <div class="col-12 col-lg-4 order-1 order-lg-2">
                    <img src="https://i.imgur.com/mV1ZMC9.jpg" alt="welcome">
                    <div class="card my-4">
                        <h5 class="card-header">Outreaches</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <ul class="list-unstyled mb-0">
                                        <?php
                                        $sql = "SELECT * FROM outReaches";

                                        if ($result = $conn->query($sql)) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<li><a href='outreaches.php#".$row["id"]."' class='list-group-item'>" . $row['heading'] . "</a></li>";
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
        <?php

        $Query = "SELECT * FROM `testimonies` WHERE `status` = 1";

        if ($result = $conn->query($Query)) {
            /* fetch associative array */
            while ($row = $result->fetch_assoc()) {
                $id = $row['userid'];
                $UserQuery = "SELECT * FROM `members` WHERE `id` = '$id'";
                if ($result = $conn->query($UserQuery)){
                    $userRow = $result->fetch_assoc();
                    $username = $userRow["username"];
                    $userid = $userRow["id"];
                }

                echo '
                    <div style="height: 100% !important;" class="carousel" data-flickity=\'{ "wrapAround": true, "autoPlay": 5000, "groupCells": 1, "freeScroll": true }\'>
                    <div class="carousel-cell">
                        <div class="row">
                            <div class="col col-6 col-4 m-auto">
                                <div class=" text-center">
                                    <div class="entry-footer align-items-center mt-5">
                                        <img src="./images/uploads/profile' . $userid . '.jpg?' . mt_rand() . '" class="rounded-circle" height="150px" alt="'.$username.'">
                                        <h4>@'.$username.'</h4>
                                    </div>
                                    <div class="">
                                        <p class="comment more">'.$row['testimony'].'</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                ';
            }
        }
        ?>
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
