<!doctype html>
<html lang="en">
<head>
    <title>Home | Kingdom Life Church</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Dosis:200,300,400,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Overpass:300,400,400i,600,700" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">


    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" integrity="sha384-KA6wR/X5RY4zFAHpv/CnoG2UW1uogYfdnP67Uv7eULvTveboZJg0qUpmJZb5VqzN" crossorigin="anonymous">
<!--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">-->
    <link rel="stylesheet" href="css/loader.min.css">
    <link rel="stylesheet" href="css/custom.css" />
    <link href="images/favicon-32x32.png" rel="shortcut icon" type="image/x-icon">
    <link href="images/ms-icon-256x256.png" rel="apple-touch-icon">

</head>
<body>
<div class="loader-body" id="loader">
    <div class="loader m-auto"></div>
</div>

<!--check if email Address is verified-->
<?php
if (isset($_SESSION['user_session']) && $_SESSION['verifed'] == 0){
    echo '
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Hello '.$_SESSION['username'].',</strong> please check your email to verify your account or <a href="?resendmail=true">click this link</a>.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
    ';
}
?>

<nav class="navbar navbar-expand-lg py-2 m-0" id="ftco-navbar">
    <div class="container">
        <img onclick="location.assign('/')" src="https://i.imgur.com/1QeMyjh.png" height="40" alt="Kingdomlife Gospel">
        <button id="menuicon" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">About
                    </a>
                    <div class="dropdown-menu dropdown-default dropdown-menu-right text-right " aria-labelledby="navbarDropdownMenuLink-333">
                        <a class="dropdown-item" href="about">About Kingdomlife</a>
                        <a class="dropdown-item" href="ministers?pastor=john">Victor C. Uzosike</a>
                        <a class="dropdown-item" href="connect">Connect with us</a>
                        <a class="dropdown-item" href="ministers">ministers / Team</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">Media
                    </a>
                    <div class="dropdown-menu dropdown-default dropdown-menu-right text-right " aria-labelledby="navbarDropdownMenuLink-333">
                        <a class="dropdown-item" href="media?tab=picture">Pictures</a>
                        <a class="dropdown-item" href="media?tab=video">Videos</a>
                    </div>
                </li>
                <li class="nav-item"><a href="give" class="nav-link">Give</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false"><i class="fas fa-shopping-basket"></i> Store
                    </a>
                    <div class="dropdown-menu dropdown-default dropdown-menu-right text-right " aria-labelledby="navbarDropdownMenuLink-333">
                        <a class="dropdown-item" href="store?tab=audio">Audio Messages</a>
                        <a class="dropdown-item" href="store?tab=ebook">Buy Ebooks</a>
                        <a class="dropdown-item" href="store?tab=other">Others Items</a>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li>
                    <button type="button" class="btn btn-danger rounded mr-3"><small><i class="fas fa-play text-white"></i></small> Live</button>
                </li>
            </ul>
            <?php
            #### IF LOGIN ######################
            if (isset($_SESSION['user_session'])){
                echo '<ul class="navbar-nav ml-3 nav-flex-icons">';
                echo '<li class="nav-item dropdown">';
                echo '
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user"></i>
                    </a>
                ';
                echo '
                    <div class="dropdown-menu dropdown-menu-right text-right dropdown-default"
                         aria-labelledby="navbarDropdownMenuLink-333">
                        <a class="dropdown-item" href="#">Profile <small><i class="fas fa-user text-muted"></i></small></a>
                        <a class="dropdown-item" href="#">My Items <small><i class="fas fa-clipboard-list text-muted"></i></small></a>
                        <a class="dropdown-item" href="#">Account Settings <small><i class="fas fa-cog text-muted"></i></small></a>
                        <a class="dropdown-item" href="#">Logout <small><i class="fas fa-sign-out-alt text-muted"></i></small></a>
                    </div>
                ';
                echo '</li>';
                echo '</ul>';

            } else {
                echo '
                    <ul class="navbar-nav">
                        <li>
                            <button onclick="location.assign(\'?login=true\')" type="button" class="btn btn-outline-secondary rounded">Sign in</button>
                        </li>
                    </ul>
                ';
            }
            ?>

        </div>
    </div>
</nav>


<!--LOGIN MODAL-->

<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
<!--        <button type="button" class="float-lg-right close" data-dismiss="modal" aria-label="Close">-->
<!--            <span class="rounded-circle" aria-hidden="true">&times;</span>-->
<!--        </button>-->
        <div class="modal-content">
            <div class="modal-body">
                <!-- Default form login -->
                <form class="text-center border border-light p-3" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">

                    <p class="h4 mb-3">Sign in</p>
                    <!--Username or Email -->
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">@</span>
                        </div>
                        <input name="username-email" type="text" class="form-control rounded" placeholder="Username or Email Address" aria-label="Username" aria-describedby="basic-addon1">
                    </div>

                    <!-- Password -->
                    <input name="password" type="password" id="defaultLoginFormPassword" class="form-control mb-2 rounded" placeholder="Password">

                    <div class="d-flex justify-content-center">
                        <div>
                            <!-- Forgot password -->
                            <a href="/?forgotten=true">Forgot password?</a>
                        </div>
                    </div>

                    <!-- Sign in button -->
                    <button name="login-btn" class="btn btn-lg btn-primary btn-block rounded my-2" type="submit">Sign in</button>

                    <!-- Register -->
                    <p>Not a member?
                        <a href="?register=true">Register</a>
                    </p>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- Default form login


REGISTER FORM MODAL-->

<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <!--        <button type="button" class="float-lg-right close" data-dismiss="modal" aria-label="Close">-->
        <!--            <span class="rounded-circle" aria-hidden="true">&times;</span>-->
        <!--        </button>-->
        <div class="modal-content">
            <div class="modal-body">
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
                } else if (isset($_GET['error_username-exist']) && $_GET['error_username-exist'] === 'This username is already used by someone else.'){
                    $invalid_username = "is-invalid";
                    $invalid_username_Msg = "<div class=\"invalid-feedback\">".$_GET['error_username-exist']."</div>";
                }

                if (isset($_GET['error_email']) && $_GET['error_email'] === 'you forgot to fill your email address.'){
                    $invalid_email = "is-invalid";
                    $invalid_email_Msg = "<div class=\"invalid-feedback\">".$_GET['error_email']."</div>";
                } else if (isset($_GET['error_email']) && $_GET['error_email'] === 'invalid Email Address.'){
                    $invalid_email = "is-invalid";
                    $invalid_email_Msg = "<div class=\"invalid-feedback\">".$_GET['error_email']."</div>";
                } else if (isset($_GET['error_email-exist']) && $_GET['error_email-exist'] === 'Email already exist.'){
                    $invalid_email = "is-invalid";
                    $invalid_email_Msg = "<div class=\"invalid-feedback\">".$_GET['error_email-exist']."</div>";
                }

                if (isset($_GET['error_phone']) && $_GET['error_phone'] === 'you forgot to fill your phone.'){
                    $invalid_phone = "is-invalid";
                    $invalid_phone_Msg = "<div class=\"invalid-feedback\">".$_GET['error_phone']."</div>";
                } else if (isset($_GET['error_phone']) && $_GET['error_phone'] === 'invalid Phone Number.'){
                    $invalid_phone = "is-invalid";
                    $invalid_phone_Msg = "<div class=\"invalid-feedback\">".$_GET['error_phone']."</div>";
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
                <form class="text-center border border-light p-3" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">

                    <p class="h4 mb-3">Join us</p>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">@</span>
                        </div>
                        <input name="username" type="text" class="form-control rounded <?php echo $invalid_username;?>" value="<?php echo $_GET['username'];?>" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                        <?php echo $invalid_username_Msg;?>
                    </div>
                    <input name="email" type="text" id="defaultRegisterFormEmail" class="form-control mb-2 rounded <?php echo $invalid_email;?>" value="<?php echo $_GET['email'];?>" placeholder="Email Address">
                    <?php echo $invalid_email_Msg;?>
                    <input name="phone" type="text" id="defaultRegisterPhonePassword" class="form-control mb-2 rounded <?php echo $invalid_phone;?>" value="<?php echo $_GET['phone'];?>" placeholder="Phone number" aria-describedby="defaultRegisterFormPhoneHelpBlock">
                    <?php echo $invalid_phone_Msg;?>

                    <!-- Password -->
                    <input name="password" type="password" id="defaultRegisterFormPassword" class="form-control rounded <?php echo $invalid_password;?>" placeholder="Password" aria-describedby="defaultRegisterFormPasswordHelpBlock">
                    <?php echo $invalid_password_Msg;?>
                    <input name="confirm_password" type="password" id="defaultRegisterFormPassword" class="form-control mt-2 mb-2 rounded <?php echo $invalid_cpassword;?>" placeholder="Confirm Password" aria-describedby="defaultRegisterFormPasswordHelpBlock">
                    <?php echo $invalid_cpassword_Msg;?>
                    <!-- Sign up button -->
                    <button name="register" class="btn btn-lg btn-primary my-2 btn-block rounded" type="submit">Register</button>

                    <p>Already a member?
                        <a href="?login=true">Login</a>
                    </p>

                    <hr>

                    <!-- Terms of service -->
                    <p>By clicking
                        <em> Register</em> you have become a member of<br>
                        <a href="/about" target="_blank">Kingdom Life Gospel Church</a>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- Default form login -->


