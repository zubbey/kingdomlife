<?php
//GET VISTORS
$user_ip = $_SERVER['REMOTE_ADDR'];
$check_ip = mysqli_query($conn, "SELECT visitorip FROM visitors WHERE page ='home' and visitorip ='$user_ip'");
if(mysqli_num_rows($check_ip) >=1)
{
    //not unique user
}
else
{
    $insertQuery = mysqli_query($conn, "INSERT INTO visitors (page, visitorip) VALUE ('home','$user_ip')");
}

if (isset($_GET['accountcomfirm']) && $_GET['accountcomfirm'] === 'true'){
    $token = $_GET['token'];
    verifyusernewEmail($token);
}

if (isset($_GET['resetpassword']) && $_GET['resetpassword'] === 'true'){
    $token = $_GET['token'];
    $_SESSION['token'] = $token;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home | Kingdom Life Church</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" integrity="sha384-KA6wR/X5RY4zFAHpv/CnoG2UW1uogYfdnP67Uv7eULvTveboZJg0qUpmJZb5VqzN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- ElegantFonts CSS -->
    <link rel="stylesheet" href="css/elegant-fonts.css">

    <!-- themify-icons CSS -->
    <link rel="stylesheet" href="css/themify-icons.css">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="css/swiper.min.css">

    <!--  flickity CSS-->
    <link rel="stylesheet" href="css/flickity.min.css">

<!--    Audio messages-->
    <link rel="stylesheet" href="css/audio.css">
    <!-- Styles -->
    <link rel="stylesheet" href="style.css">

<!--    favicon-->
    <link href="https://i.imgur.com/Kp37muV.png?1" rel="shortcut icon" type="image/x-icon">
    <link href="https://i.imgur.com/Kp37muV.png?1" rel="apple-touch-icon">
    <script src="https://js.paystack.co/v1/inline.js"></script>
</head>
<body class="single-page">
<div class="d-none" id="preloader">
    <div id="status">&nbsp;</div>
</div>
<!--check if email Address is verified-->
<?php
if (isset($_SESSION['user_session']) && $_SESSION['verified'] < 1){
    echo '
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Hello '.$_SESSION['username'].',</strong> please check your email to verify your account or <strong><a href="?resendmail=true">click here to resend verification link</a></strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        ';
}
?>
<div class="nav-bar">
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex flex-wrap justify-content-between align-items-center">
                <div class="site-branding d-flex align-items-center">
                    <a class="d-block" href="index" rel="home"><img class="d-block" src="https://i.imgur.com/GW24SvT.png" height="40" alt="Kingdomlife Gospel"></a>
                </div><!-- .site-branding -->

                <nav class="site-navigation d-flex justify-content-end align-items-center">
                    <ul class="d-flex flex-column flex-lg-row justify-content-lg-end align-content-center">
                        <li class="dropdown about">
                            <a class="navbarDropdown nav-link dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                About</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="about">About Kingdomlife</a>
                                <a class="dropdown-item" href="bishop?bishop=victor">Victor C. Uzosike</a>
                                <a class="dropdown-item" href="pastoral">Pastoral Team</a>
                                <a class="dropdown-item" href="outreaches">Outreaches</a>
                            </div>
                        </li>
                        <li class="media"><a href="media">Media</a></li>
                        <li class="give"><a href="give">Give</a></li>
                        <li class="store"><a href="store" target="_blank">E Store</a></li>
                        <li class="events"><a href="events">Events</a></li>
                        <li class="dropdown connect">
                            <a class="navbarDropdown nav-link dropdown-toggle" role="button" id="dropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Connect</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink2">
                                <a class="dropdown-item" href="prayer-request">Prayer Request</a>
                                <a class="dropdown-item" href="testimonies">Testimonies</a>
                                <a class="dropdown-item" href="bulletins">Bulletins</a>
                                <a class="dropdown-item" href="units">Units & their descriptions</a>
                            </div>
                        </li>
                        <li class="contact"><a href="contact">Contact</a></li>
                        <?php
                        #### IF LOGIN ######################
                        if (isset($_SESSION['user_session'])){
                            $sql = "SELECT * FROM members LIMIT 1;";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                if ($user = mysqli_fetch_assoc($result)) {
                                    $id = $_SESSION['user_id'];

                                    $sqlImg = "SELECT * FROM profileimg WHERE userid='$id' LIMIT 1;";
                                    $resultImg = mysqli_query($conn, $sqlImg);
                                    while ($imgRow = mysqli_fetch_assoc($resultImg)) {
                                        if ($imgRow['status'] == 1) {
                                            $profileImageNav = '<img style="vertical-align: middle;" src="./images/uploads/profile' . $id . '.jpg?' . mt_rand() . '" id="profile-image1" width="35" class="rounded-circle img-thumbnail" alt="Profile Image">';
                                        } else {
                                            $profileImageNav = '<img style="vertical-align: middle;" src="https://i.imgur.com/gaJNXRO.png" width="30" class="rounded-circle" alt="Profile Image">';
                                        }
                                    }
                                }
                            }

                            echo '
                                
                                <li class="dropdown profile ">
                                <a class="navbarDropdown nav-link dropdown-toggle" role="button" id="dropdownMenuLink3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    '.$profileImageNav.' '.ucwords($_SESSION['username']).'
                                </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink3">
                                        <a class="dropdown-item" href="users/profile">My Account</a>
                                        <a class="dropdown-item" href="users/profile?mystory=true">My Story</a>
                                        <a class="dropdown-item" href="users/profile?offerings=true">My Offerings</a>
                                        <a class="dropdown-item" href="profile?orders=true">My Orders</a>
                                        <a class="dropdown-item" href="users/profile?accountsetting=true">Account Settings</a>
                                        <a class="dropdown-item" href="?logout=true">Signout</a>
                                    </div>
                                </li>
                            ';
                        } else {

                            echo '
                                <li class="sign-in"><a href="?login=true">Sign in</a></li>
                                <li class=""><span><a href="?register=true" class="btn gradient-bg">Get Involved</a></span></li>
                            ';
                        }
                        ?>
                        <li class="stream-live" ><span><a href="http://live.kingdomlifegospel.org/" class="btn btn default"><span>Stream Live</span> <img class="signal" src="./images/signal.svg"/></a></span></li>
                    </ul>
                </nav><!-- .site-navigation -->

                <div class="hamburger-menu d-lg-none">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div><!-- .hamburger-menu -->
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- .nav-bar -->


<!--
----------------------------------
USERS AUTHENTICATION
----------------------------------
-->
<!--LOGIN MODAL-->
<?php
if (isset($_GET['username_error']) && $_GET['username_error'] === 'you forgot to fill your username'){
    $invalid_username = "is-invalid";
    $invalid_username_Msg = "<div class=\"invalid-feedback\">".$_GET['username_error']."</div>";
}
if (isset($_GET['password_error']) && $_GET['password_error'] === 'you forgot to fill your password'){
    $invalid_password = "is-invalid";
    $invalid_password_Msg = "<div class=\"invalid-feedback\">".$_GET['password_error']."</div>";
}
if (isset($_GET['no_account']) && $_GET['no_account'] === 'No user found with this credentials'){
    $invalid_username = "is-invalid";
    $invalid_password = "is-invalid";
    $invalid_entry_Msg = "<small class=\"invalid-feedback d-block\">".$_GET['no_account']."</small>";
}
?>

<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content bg-transparent border-0">
            <div class="modal-body">
                <!-- Default form login -->
                <button type="button" class="close text-right p-3" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="icon_close_alt"></i></span>
                </button>

                <form style="border-radius: 20px;" class="contact-form text-center m-0" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">

                    <p class="h4 mb-3">Sign in<br><?php echo $invalid_entry_Msg;?></p>
                    <!--Username or Email -->
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">@</span>
                        </div>
                        <input style="width: auto;" name="username-email" type="text" class="form-control m-0 p-4 <?php echo $invalid_username;?>" placeholder="Username or Email Address" aria-label="Username" aria-describedby="basic-addon1" value="<?php echo $_GET['username'];?>">
                        <?php echo $invalid_username_Msg;?>
                    </div>

                    <!-- Password -->
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                        </div>
                        <input name="password" type="password" id="defaultLoginFormPassword" class="form-control m-0 p-4 <?php echo $invalid_password;?>" placeholder="Password">
                        <?php echo $invalid_password_Msg;?>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div>
                            <!-- Forgot password -->
                            <a href="?forgotten=true">Forgot password?</a>
                        </div>
                    </div>

                    <!-- Sign in button -->
                    <button name="login-btn" id="btn" class="btn gradient-bg btn-block my-2" type="submit">Sign in</button>

                    <!-- Register -->
                    <p>Not a member?
                        <a href="?register=true" class="highlight-color">Register</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>



<!--FOR NEW USERS | REGISTER-->
<!--REGISTER FORM MODAL-->

<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content bg-transparent border-0">
            <div class="modal-body">
                <button type="button" class="close text-right p-3" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="icon_close_alt"></i></span>
                </button>
                <?php
                if (isset($_GET['error']) && $_GET['error'] === 'please fill out the form.'){
                    $invalid_username = "is-invalid";
                    $invalid_username_Msg = "<div class=\"invalid-feedback\">".$_GET['error']."</div>";
                    $invalid_email = "is-invalid";
                    $invalid_email_Msg = "<div class=\"invalid-feedback\">".$_GET['error']."</div>";
                    $invalid_phone = "is-invalid";
                    $invalid_phone_Msg = "<div class=\"invalid-feedback\">".$_GET['error']."</div>";
                    $invalid_password = "is-invalid";
                    $invalid_password_Msg = "<div class=\"invalid-feedback\">".$_GET['error']."</div>";
                }

                if (isset($_GET['error_username']) && $_GET['error_username'] === 'you forgot to fill your username.'){
                    $invalid_username = "is-invalid";
                    $invalid_username_Msg = "<div class=\"invalid-feedback\">".$_GET['error_username']."</div>";
                }
                if (isset($_GET['error_username-invalid']) && $_GET['error_username-invalid'] === 'please use a valid username without any space.'){
                    $invalid_username = "is-invalid";
                    $invalid_username_Msg = "<div class=\"invalid-feedback\">".$_GET['error_username-invalid']."</div>";
                }
                if (isset($_GET['error_username-exist']) && $_GET['error_username-exist'] === 'This username is already used by someone else.'){
                    $invalid_username = "is-invalid";
                    $invalid_username_Msg = "<div class=\"invalid-feedback\">".$_GET['error_username-exist']."</div>";
                }

                if (isset($_GET['error_email']) && $_GET['error_email'] === 'you forgot to fill your email address.'){
                    $invalid_email = "is-invalid";
                    $invalid_email_Msg = "<div class=\"invalid-feedback\">".$_GET['error_email']."</div>";
                } else if (isset($_GET['error_email_invalid']) && $_GET['error_email_invalid'] === 'invalid Email Address.'){
                    $invalid_email = "is-invalid";
                    $invalid_email_Msg = "<div class=\"invalid-feedback\">".$_GET['error_email_invalid']."</div>";
                } else if (isset($_GET['error_email-exist']) && $_GET['error_email-exist'] === 'Email already exist.'){
                    $invalid_email = "is-invalid";
                    $invalid_email_Msg = "<div class=\"invalid-feedback\">".$_GET['error_email-exist']."</div>";
                }

                if (isset($_GET['error_phone']) && $_GET['error_phone'] === 'you forgot to fill your phone.'){
                    $invalid_phone = "is-invalid";
                    $invalid_phone_Msg = "<div class=\"invalid-feedback\">".$_GET['error_phone']."</div>";
                } else if (isset($_GET['error_phone_invalid']) && $_GET['error_phone_invalid'] === 'invalid Phone Number.'){
                    $invalid_phone = "is-invalid";
                    $invalid_phone_Msg = "<div class=\"invalid-feedback\">".$_GET['error_phone_invalid']."</div>";
                }

                if (isset($_GET['error_password']) && $_GET['error_password'] === 'Password should be at least 6 characters & should include at least one uppercase letter'){
                    $invalid_password = "is-invalid";
                    $invalid_password_Msg = "<div class=\"invalid-feedback\">".$_GET['error_password']."</div>";
                } else {
                    $invalid_password_Msg = "<div class=\"invalid-feedback\">Password must be at least 6 Characters Long</div>";
                }
                if (isset($_GET['error_cpassword']) && $_GET['error_cpassword'] === 'Password did not match.'){
                    $invalid_cpassword = "is-invalid";
                    $invalid_cpassword_Msg = "<div class=\"invalid-feedback\">".$_GET['error_cpassword']."</div>";
                }
                ?>
                <!-- Default form register -->
                <form style="border-radius: 20px;" class="contact-form text-center m-0" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">

                    <p class="h4 mb-3" id="register-heading">Join us</p>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">@</span>
                        </div>
                        <input style="width: auto;" name="username" id="inputUsername" type="text" class="form-control m-0 p-4 <?php echo $invalid_username;?>" value="<?php echo $_GET['username'];?>" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                        <?php echo $invalid_username_Msg;?>
                    </div>
                    <input name="email" type="text" id="inputEmail" class="form-control m-0 p-4 <?php echo $invalid_email;?>" value="<?php echo $_GET['email'];?>" placeholder="Email Address">
                    <?php echo $invalid_email_Msg;?>
                    <input name="phone" type="text" id="inputPhone" class="form-control m-0 p-4 <?php echo $invalid_phone;?>" value="<?php echo $_GET['phone'];?>" placeholder="Phone number" aria-describedby="defaultRegisterFormPhoneHelpBlock">
                    <?php echo $invalid_phone_Msg;?>

                    <!-- Password -->
                    <input name="password" type="password" id="inputPassword" class="form-control m-0 p-4 <?php echo $invalid_password;?>" placeholder="Password" aria-describedby="defaultRegisterFormPasswordHelpBlock">
                    <?php echo $invalid_password_Msg;?>
                    <input name="confirm_password" type="password" id="confirmPassword" class="form-control m-0 p-4 <?php echo $invalid_cpassword;?>" placeholder="Confirm Password" aria-describedby="defaultRegisterFormPasswordHelpBlock">
                    <?php echo $invalid_cpassword_Msg;?>
                    <!-- Sign up button -->
                    <button name="register" id="btn" class="btn gradient-bg btn-block my-2" type="submit">Create Account</button>

                    <p>Already a member?
                        <a href="?login=true" class="highlight-color">Sign in</a>
                    </p>

                    <hr>

                    <!-- Terms of service -->
                    <p class="small">By clicking
                        <em> Register</em> you have become a member of<br>
                        <a href="/about" target="_blank">Kingdom Life Gospel Church</a>
                    </p>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- Default form login -->

<!--FORGOTTEN PASSWORD MODAL-->
<div class="modal fade" id="forgottenModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <?php
        if (isset($_GET['error']) && $_GET['error'] === 'invalidemail'){
            $invalid_email = "is-invalid";
            $invalid_email_Msg = "<div class=\"invalid-feedback d-block\">".$_GET['errorMsg']."</div>";
        }
        if (isset($_GET['error']) && $_GET['error'] === 'emptychangeemail'){
            $invalid_email = "is-invalid";
            $invalid_email_Msg = "<div class=\"invalid-feedback d-block\">".$_GET['errorMsg']."</div>";
        }
        if (isset($_GET['error']) && $_GET['error'] === 'emailnotfound'){
            $invalid_email = "is-invalid";
            $invalid_email_Msg = "<div class=\"invalid-feedback d-block\">".$_GET['errorMsg']."</div>";
        }
        ?>
        <div class="modal-content bg-transparent border-0">
            <div class="modal-body">
                <!-- Default form login -->
                <button type="button" class="close text-right p-3" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="icon_close_alt"></i></span>
                </button>

                <form style="border-radius: 20px;" class="contact-form text-center m-0" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">

                    <p class="h4 my-3">Forgotten Password? <br><small class="h6">Enter your email address to reset your password.</small></p>
                    <!--Username or Email -->
                    <div class="input-group mb-2">
                        <input style="width: auto;" name="email" type="text" class="form-control m-0 p-4 <?php echo $invalid_email;?>" placeholder="Email Address">
                        <?php echo $invalid_email_Msg;?>
                    </div>
                    <!-- Sign in button -->
                    <button name="forgotten-password-btn" id="btn" class="btn gradient-bg btn-block my-2" type="submit">Reset Password</button>
                    <p>Back to Login?
                        <a href="?login=true" class="highlight-color">Sign in</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>


<!--RESET PASSWORD MODAL-->
<div class="modal fade" id="resetpasswordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <?php
    if (isset($_GET['error']) && $_GET['error'] === 'passwordshort'){
        $invalid_password = "is-invalid";
        $invalid_password_Msg = "<div class=\"invalid-feedback d-block\">".$_GET['errorMsg']."</div>";
    }
    if (isset($_GET['error']) && $_GET['error'] === 'tokennotmatch'){
        $invalid_password = "is-invalid";
        $invalid_password_Msg = "<div class=\"invalid-feedback d-block\">".$_GET['errorMsg']."</div>";
    }
    if (isset($_GET['error']) && $_GET['error'] === 'passwordnotmatch'){
        $invalid_cpassword = "is-invalid";
        $invalid_cpassword_Msg = "<div class=\"invalid-feedback d-block\">".$_GET['errorMsg']."</div>";
    }
    ?>
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content bg-transparent border-0">
            <div class="modal-body">
                <!-- Default form login -->
                <button type="button" class="close text-right p-3" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="icon_close_alt"></i></span>
                </button>

                <form style="border-radius: 20px;" class="contact-form text-center m-0" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">

                    <p class="h4 mb-3">RESET YOUR PASSWORD</p><br/><small class="h6">Enter your new password.</small>
                    <!--Username or Email -->
                    <div class="input-group mb-2">
                        <input style="width: auto;" name="new_password" type="password" class="form-control m-0 p-4 <?php echo $invalid_password;?>" placeholder="New Password">
                        <input style="width: auto;" name="confirm_password" type="password" class="form-control m-0 p-4 <?php echo $invalid_cpassword;?>" placeholder="Confirm Password">
                        <?php echo $invalid_cpassword_Msg;?>
                    </div>
                    <!-- Sign in button -->
                    <button name="reset-password-btn" id="btn" class="btn gradient-bg btn-block my-2" type="submit">Reset</button>
                </form>
            </div>
        </div>
    </div>
</div>