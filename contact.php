<?php
require_once("./controller/auth_controller.php");
require("./components/menu.php");

//for Contact validation
if (isset($_GET['errorMsg'])){
    $invalid_field = "is-invalid";
    $invalid_field_Msg = "<div class=\"invalid-feedback d-block\">".$_GET['errorMsg']."</div>";
}
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
                            <li><a href="https://facebook.com/klgoministries" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="https://twitter.com/klgoministries" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="https://instagram.com/klgoministries" target="_blank"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="https://www.youtube.com/channel/UC39-qgyOK0Fxj21jW-IFX9Q" target="_blank"><i class="fa fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div><!-- .col -->

                <div id="contactForm" class="col-12 col-lg-7">
                    <?php
                        if (isset($_SESSION['user_session'])){
                            echo '<form class="contact-form" action="'.htmlspecialchars($_SERVER['PHP_SELF']).'" method="POST">
                                    '.$invalid_field_Msg.'
                                    <input class="form-control form-control-lg '.$invalid_field.'" name="fullname" type="text" placeholder="Full Name" value="'.$_SESSION['username'].'" required>
                                    <input class="form-control form-control-lg '.$invalid_field.'" name="email" type="email" placeholder="Email Address" value="'.$_SESSION['email'].'" required>
                                    <input class="form-control mb-2 '.$invalid_field.'" name="phone" type="tel" placeholder="Phone Number" value="'.$_SESSION['phone'].'" required>
                                    <textarea class="form-control form-control-lg '.$invalid_field.'" name="message" rows="10" cols="6" placeholder="Messages" required>'.$_GET['msg'].'</textarea>
            
                                    <span>
                                    <button name="contact-btn" type="submit" class="btn gradient-bg has-spinner" id="btn" >Send Message <i class="fas fa-paper-plane"></i></button>
                                    </span>
                                </form>';
                        } else {
                            echo '<form class="contact-form" action="'.htmlspecialchars($_SERVER['PHP_SELF']).'" method="POST">
                                    '.$invalid_field_Msg.'
                                    <input class="form-control form-control-lg '.$invalid_field.'" name="fullname" type="text" placeholder="Full Name" value="'.$_GET['fullname'].'" required>
                                    <input class="form-control form-control-lg '.$invalid_field.'" name="email" type="email" placeholder="Email Address" value="'.$_GET['email'].'"  required>
                                    <input class="form-control mb-2 '.$invalid_field.'" name="phone" type="tel" placeholder="Phone Number" value="'.$_GET['phone'].'" required>
                                    <textarea class="form-control form-control-lg '.$invalid_field.'" name="message" rows="10" cols="6" placeholder="Messages" required>'.$_GET['msg'].'</textarea>
            
                                    <span>
                                    <button name="contact-btn" type="submit" class="btn gradient-bg has-spinner" id="btn" >Send Message <i class="fas fa-paper-plane"></i></button>
                                    </span>
                                </form>';
                        }
                    ?>

                </div><!-- .col -->

                <div id="get_direction" class="my-5 col-12">
                    <h4>Get Direction</h4>
                    <div class="contact-gmap my-lg-5">
<!--                        <div id="googleMap" style="width:100%;height:400px;"></div>-->
                        <div style="width: 100%"><iframe width="100%" height="600" src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;coord=4.832502,6.990813&amp;q=Jesus%20Cathedral%20No%206%20Akwaka%20Avenue%2C%20Off%20Market%20Junction%2C%20Orazi%20Road%2C%20Mile%204%2C%20Rumueme%2C%20Port%20Harcourt.+(Kingdom%20Life%20Gospel%20Outreach%20Ministries%20Jesus%20Cathedral)&amp;ie=UTF8&amp;t=&amp;z=17&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="https://www.maps.ie/coordinates.html">latitude longitude finder</a></iframe></div><br />
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
    const google_key = config.KINGDOMLIFE_KEY;
    function myMap() {
        var mapProp= {
            center:new google.maps.LatLng(4.832502,6.990813),
            zoom:5,
        };
        var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
    }

</script>
<script src="https://maps.googleapis.com/maps/api/js?key={google_key}&callback=myMap"></script>