<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>E Store | Kingdom Life Church</title>

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
    <!--    <link rel="stylesheet" href="https://unpkg.com/swiper/css/swiper.css">-->
    <!--    <link rel="stylesheet" href="https://unpkg.com/swiper/css/swiper.min.css">-->

    <!--  flickity CSS-->
    <link rel="stylesheet" href="css/flickity.min.css">

    <!--    Audio messages-->
    <link rel="stylesheet" href="css/audio.css">
    <!-- Styles -->
    <link rel="stylesheet" href="style.css">
    <!--    favicon-->
    <link href="https://i.imgur.com/Kp37muV.png?1" rel="shortcut icon" type="image/x-icon">
    <link href="https://i.imgur.com/Kp37muV.png?1" rel="apple-touch-icon">
    <style>
        .site-navigation ul li a {
            padding: 20px 0;
        }
        p.card-text {
            font-size: 1.1em;
        }
        .card {
            height: 100% !important;
        }
        .table td, .table th {
            padding: 0 !important;
        }
    </style>
</head>
<body class="single-page">
<!--<div id="preloader">-->
<!--    <div id="status">&nbsp;</div>-->
<!--</div>-->
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
                    <a class="d-block" href="store" rel="home"><img class="d-block" src="https://i.imgur.com/cVOGT1I.png" height="40" alt="Kingdomlife Online Store"></a>
                </div><!-- .site-branding -->

                <nav class="site-navigation d-flex justify-content-end align-items-center">
                    <ul class="d-flex flex-column flex-lg-row justify-content-lg-end align-content-center">
                        <li class="my-account"><a href="users/profile">My Account</a></li>
                        <li class="contact"><a href="contact">Contact Us</a></li>
                        <li class="cart">
                            <button class="btn btn-outline" data-toggle="modal" data-target="#cart">
                                <i class="icon_cart"></i> Cart
                                <span class="badge">(<span class="total-count"></span>)</span>
                            </button>
<!--                            <ul class="dropdown-menu dropdown-menu-right cart-list">-->
<!--                                <li class="list-group-item">-->
<!--                                   <img src="http://lorempixel.com/50/50/" class="cart-thumb" alt="" />-->
<!--                                    <div class="modal-body">-->
<!--                                        <table class="show-cart table">-->
<!---->
<!--                                        </table>-->
<!--                                        <div>Total price: $<span class="total-cart"></span></div>-->
<!--                                    </div>-->
<!--                                </li>-->
<!--                                <li class="total">-->
<!--                                    <button class="btn gradient-bg btn-block">View Cart</button>-->
<!--                                </li>-->
<!--                            </ul>-->
                        </li>
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