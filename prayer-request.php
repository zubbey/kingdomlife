<?php
require_once("./controller/auth_controller.php");
require("./components/menu.php");

//for Prayer Request validation
if (isset($_GET['error']) && $_GET['error'] === 'fullnameempty'){
    $invalid_username = "is-invalid";
    $invalid_username_Msg = "<div class=\"invalid-feedback d-block\">".$_GET['errorMsg']."</div>";
}
if (isset($_GET['error']) && $_GET['error'] === 'prayerempty'){
    $invalid_post_textarea = "style = 'border: 2px solid #f95503 !important;'";
    $invalid_post_Msg = "<div class=\"invalid-feedback d-block\">".$_GET['errorMsg']."</div>";
}
?>

    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Prayer Request</h1>
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .page-header -->

    <div class="contact-page-wrap">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-5">
                    <div class="entry-content">
                        <h2>Do you have a prayer request?</h2>

                        <p>God promises us in His Word that He hears every word that we pray to Him. Like a good parent, He is waiting, ready, and willing to listen to our worries, concerns, and needs. Whether we are seeking forgiveness, strength, or healing, prayer provides the channel to communicate with God and receive supernatural strength and power! </p>
                    </div>
                    <img src="" alt="">
                </div><!-- .col -->

                <div class="col-12 col-lg-7">
                    <?php
                        if (isset($_SESSION['user_session'])){
                            $sql = "SELECT * FROM prayerRequest WHERE userid='$id' order by id DESC;";
                            $prayercheckResult = mysqli_query($conn, $sql);
                            $prayerRow = mysqli_fetch_assoc($prayercheckResult);
                            if ($prayerRow > 0){
                                echo '
                                                <form class="contact-form m-0" action="'. htmlspecialchars($_SERVER["PHP_SELF"]) .'" method="POST">
                                                    <label for="fullname">Enter your full Name: </label>
                                                     <input type="text" name="fullname" id="fullname" class="form-control '. $invalid_username .'" value="'.$prayerRow['fullname'].'">
                                                    '. $invalid_username_Msg .'
                                                    <label for="Email">Email Address: </label>
                                                    <input type="email" name="email" id="Email" placeholder="Email Address" value="'. $_SESSION['email'] .'">
                                                    <label for="Phone">Phone Number: </label>
                                                    <input type="text" id="Phone" name="phone" placeholder="Phone Number" value="'. $_SESSION['phone'] .'">
                                                    <label for="Country">Country: </label>
                                                    <input type="text" id="Country" name="country" value="'.$prayerRow['country'].'">
                                                    <label for="Prayer">Focus Prayer: </label>
                                                    '. $invalid_post_Msg .'
                                                    <textarea '. $invalid_post_textarea .' id="Prayer" rows="8" cols="6" name="prayer" placeholder="Prayer Request"></textarea>
                                                    <span>
                                                        <input class="btn gradient-bg" type="submit" name="prayer-btn" value="Submit">
                                                    </span>
                                                </form>
                                            ';
                            } else {
                                echo '
                                                <form class="contact-form m-0" action="'. htmlspecialchars($_SERVER["PHP_SELF"]) .'" method="POST">
                                                    <label for="fullname">Enter your full Name: </label>
                                                     <input type="text" name="fullname" id="fullname" class="form-control '. $invalid_username .'" placeholder="fullname">
                                                    '. $invalid_username_Msg .'
                                                    <label for="Email">Email Address: </label>
                                                    <input type="email" name="email" id="Email" placeholder="Email Address" value="'. $_SESSION['email'] .'">
                                                    <label for="Phone">Phone Number: </label>
                                                    <input type="text" id="Phone" name="phone" placeholder="Phone Number" value="'. $_SESSION['phone'] .'">
                                                    <label for="Country">Country: </label>
                                                    <input type="text" id="Country" name="country" placeholder="country">
                                                    <label for="Prayer">Focus Prayer: </label>
                                                    '. $invalid_post_Msg .'
                                                    <textarea '. $invalid_post_textarea .' id="Prayer" rows="8" cols="6" name="prayer" placeholder="Prayer Request"></textarea>
                                                    <span>
                                                        <input class="btn gradient-bg" type="submit" name="prayer-btn" value="Submit">
                                                    </span>
                                                </form>
                                            ';
                            }
                        } else{
                            echo '
                                <form class="contact-form m-0" action="'. htmlspecialchars($_SERVER["PHP_SELF"]) .'" method="POST">
                                    <label for="fullname">Enter your full Name: </label>
                                     <input type="text" name="fullname" id="fullname" class="form-control '. $invalid_username .'" placeholder="Full Name" value="'. $_GET['fullname'] .'">
                                    '. $invalid_username_Msg .'
                                    <label for="Email">Email Address: </label>
                                    <input type="email" name="email" id="Email" placeholder="Email Address" value="'. $_GET['email'] .'">
                                    <label for="Phone">Phone Number: </label>
                                    <input type="text" id="Phone" name="phone" placeholder="Phone Number" value="'. $_GET['phone'] .'">
                                    <label for="Country">Country: </label>
                                    <input type="text" id="Country" name="country" placeholder="Country" value="'. $_GET['country'] .'">
                                    <label for="Prayer">Focus Prayer: </label>
                                    '. $invalid_post_Msg .'
                                    <textarea '. $invalid_post_textarea .' id="Prayer" rows="8" cols="6" name="prayer" placeholder="Prayer Request">'.$_GET['prayer'].'</textarea>
                                    <span>
                                        <input class="btn gradient-bg" type="submit" name="visitor-prayer-btn" value="Submit">
                                    </span>
                                </form>
                            ';
                        }
                    ?>
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div>

<?php
require("./components/footer.php");
?>