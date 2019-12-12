<?php
require_once("../config/db.php");
require_once("../controller/user_controller.php");

if (!isset($_SESSION['user_session'])) {
header('location: ../index.php?login=true');
exit();
}
?>
<!doctype html>
<html lang="en">
<head>
    <title>Home | Kingdom Life Church</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="refresh" content="180" >

    <link href="https://fonts.googleapis.com/css?family=Dosis:200,300,400,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Overpass:300,400,400i,600,700" rel="stylesheet">

    <link rel="stylesheet" href="../css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="../css/animate.css">

    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../css/magnific-popup.css">

    <link rel="stylesheet" href="../css/aos.css">

    <link rel="stylesheet" href="../css/ionicons.min.css">

    <link rel="stylesheet" href="../css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="../css/jquery.timepicker.css">

    <link rel="stylesheet" href="../css/flickity.min.css">
    <link rel="stylesheet" href="../css/flaticon.css">
    <link rel="stylesheet" href="../css/icomoon.css">
    <link rel="stylesheet" href="../css/style.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" integrity="sha384-KA6wR/X5RY4zFAHpv/CnoG2UW1uogYfdnP67Uv7eULvTveboZJg0qUpmJZb5VqzN" crossorigin="anonymous">
    <!--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">-->
    <link rel="stylesheet" href="https://allyoucan.cloud/cdn/icofont/1.0.1/icofont.css" integrity="sha384-jbCTJB16Q17718YM9U22iJkhuGbS0Gd2LjaWb4YJEZToOPmnKDjySVa323U+W7Fv" crossorigin="anonymous">

    <link rel="stylesheet" href="../css/loader.min.css">
    <link rel="stylesheet" href="../css/custom.css" />
    <link href="https://i.imgur.com/1QeMyjh.png" rel="shortcut icon" type="image/x-icon">
    <link href="https://i.imgur.com/1QeMyjh.png" rel="apple-touch-icon">

</head>
<body class="bg-light">
<div class="loader-body" id="loader">
    <div class="loader m-auto"></div>
</div>


<!--check if email Address is verified-->
<?php
if (isset($_SESSION['user_session']) && $_SESSION['verifed'] == 0){
    echo '
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <div class="container">
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
                        <a class="dropdown-item" href="../about">About Kingdomlife</a>
                        <a class="dropdown-item" href="../ministers?pastor=john">Victor C. Uzosike</a>
                        <a class="dropdown-item" href="../ministers">ministers / Team</a>
                        <a class="dropdown-item" href="../outreaches">Outreaches</a>
                        <a class="dropdown-item" href="../units">Units & their descriptions</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">Media
                    </a>
                    <div class="dropdown-menu dropdown-default dropdown-menu-right text-right " aria-labelledby="navbarDropdownMenuLink-333">
                        <a class="dropdown-item" href="../media?tab=picture">Pictures</a>
                        <a class="dropdown-item" href="../media?tab=video">Videos</a>
                    </div>
                </li>
                <li class="nav-item"><a href="give" class="nav-link">Give</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false"><i class="fas fa-shopping-basket"></i> Store
                    </a>
                    <div class="dropdown-menu dropdown-default dropdown-menu-right text-right " aria-labelledby="navbarDropdownMenuLink-333">
<!--                        <a class="dropdown-item" href="../store?tab=audio">Audio Messages</a>-->
                        <a class="dropdown-item" href="../store?tab=ebook">Buy Ebooks</a>
                        <a class="dropdown-item" href="../store?tab=other">Others Items</a>
                    </div>
                </li>
                <li class="nav-item"><a href="../events" class="nav-link">Events</a></li>
                <li class="nav-item"><a href="../connect" class="nav-link">Contact us</a></li>
            </ul>

            <ul class="navbar-nav">
                <li>
                    <button type="button" class="btn btn-danger rounded mr-3"><small><i class="fas fa-play text-white"></i></small> Live</button>
                </li>
            </ul>
            <ul class="navbar-nav ml-3 nav-flex-icons">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user"></i> <?php echo $_SESSION['username'];?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right text-right dropdown-default"
                         aria-labelledby="navbarDropdownMenuLink-333">
                        <a class="dropdown-item" href="profile">Profile <small><i class="fas fa-user text-muted"></i></small></a>
                        <a class="dropdown-item" href="#orders-tab">My Items <small><i class="fas fa-clipboard-list text-muted"></i></small></a>
                        <a class="dropdown-item" href="settings">Account Settings <small><i class="fas fa-cog text-muted"></i></small></a>
                        <a class="dropdown-item" href="?logout=true">Logout <small><i class="fas fa-sign-out-alt text-muted"></i></small></a>
                    </div>
                </li>';
             </ul>
        </div>
    </div>
</nav>