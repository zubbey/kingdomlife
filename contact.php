<?php
require_once("./controller/auth_controller.php");
require("./components/menu.php");
?>

    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Contact Us</h1>
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .page-header -->

    <div class="contact-page-wrap">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-5">
                    <div class="entry-content">
                        <h2> Kingdom Life Gospel Outreach Ministries Jesus Cathedral</h2>

                        <div class="row">
                            <div class="col">
                                <h6 class="highlight-color"><strong><i class="fa fa-map-marker"></i> LOCATIONS:</strong></h6>
                                    <p>Jesus Cathedral No 6 Akwaka Avenue, Off Market Junction,  Orazi Road, Mile 4, Rumueme, Port Harcourt.
                                </p>
                                <p><span>OUR BRANCHES:</span>
                                    <div class="">
                                        <p class="list-group-item">Kingdom Life Gospel Outreach Ministry (Bayelsa Branch) @  No 22 Hon. Ofoni Crescent, off old assembly quarters, Azikoro road, Ekeki, Yenegoa.</p>
                                        <p class="list-group-item">Kingdom Life Gospel Outreach Ministry (Owerri Branch) @ No 1 Tetlow road behind UBA bank road, Owerri, Imo state.</p>
                                        <p class="list-group-item">Kingdom Life Gospel Outreach Ministry (Akpajo Branch) @ Caywood Brown Foundation, Plot B9 Close B, IPIC Estate, Off Green Village Estate, Akpajo, Port Harcourt).</p>
                                    </div>
                                </p>
                            </div>
                        </div>

                        <ul class="contact-info p-0">
                            <li><i class="fa fa-phone"></i>
                                <a href="tel://+2348072992247">+234 807 299 2247 </a><span class="px-2">  |  </span>
                                <a href="tel://+2348072992247">+234 807 299 2248 </a><span class="px-2">  |  </span>
                                <a href="tel://+2348072992247">+234 803 309 6872</a>
                            </li>
                            <li><i class="fa fa-envelope"></i><span>
                                    <a href="mailto:kingdomlifegospelchurch@gmail.com">kingdomlifegospelchurch@gmail.com </a>
                                    <span class="px-2">  |  </span>
                                    <a href="mailto:vuzosike@yahoo.com">vuzosike@yahoo.com</a>
                                </span>
                            </li>
                        </ul>
                        <ul class="contact-social d-flex flex-wrap align-items-center">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div><!-- .col -->

                <div class="col-12 col-lg-7">
                    <?php
                        if (isset($_SESSION['user_session'])){
                            echo '<form class="contact-form" action="'.htmlspecialchars($_SERVER['PHP_SELF']).'" method="GET">
                                    <input class="form-control" name="fullname" type="text" placeholder="Full Name" value="'.$_SESSION['username'].'" required>
                                    <input class="form-control" name="email" type="email" placeholder="Email Address" value="'.$_SESSION['email'].'" required>
                                    <input class="form-control" name="phone" type="tel" placeholder="Phone Number" value="'.$_SESSION['phone'].'" required>
                                    <textarea class="form-control" name="message" rows="10" cols="6" placeholder="Messages" required></textarea>
            
                                    <span>
                                        <input id="btn" class="btn gradient-bg" type="submit" name="contact" value="Send">
                                    </span>
                                </form>';
                        } else {
                            echo '<form class="contact-form" action="'.htmlspecialchars($_SERVER['PHP_SELF']).'" method="GET">
                                    <input class="form-control form-control-lg" name="fullname" type="text" placeholder="Full Name" required>
                                    <input class="form-control" name="email" type="email" placeholder="Email Address" required>
                                    <input class="form-control" name="phone" type="tel" placeholder="Phone Number" required>
                                    <textarea class="form-control" name="message" rows="10" cols="6" placeholder="Messages" required></textarea>
            
                                    <span>
                                        <input id="btn" class="btn gradient-bg" type="submit" name="contact" value="Send">
                                    </span>
                                </form>';
                        }
                    ?>

                </div><!-- .col -->

                <div class="col-12">
                    <div class="contact-gmap my-lg-5">
                        <div id="googleMap"></div>
                    </div>
                </div>
            </div><!-- .row -->
        </div><!-- .container -->
    </div>

<?php
require("./components/footer.php");
?>
<script>
    // APIKEYS
    const google_key = config.GOOGLE_KEY;
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key={google_key}&callback=googleMap" type="text/javascript"></script>
