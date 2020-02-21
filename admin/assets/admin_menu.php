<?php
require_once ("../controller/admin_controller.php");

if(!isset($_SESSION['admin_session'])){
    header("Location: ./");
    exit();
}

//if (isset($_SESSION['loginlog'])){
//    $sql = mysqli_query($conn, "INSERT INTO system_logs (log_msg) VALUES ('".$_SESSION['loginlog']."')");
//    if ($sql){
//        unset($_SESSION['loginlog']);
//    }
//}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="https://i.imgur.com/Kp37muV.png?1">
    <link rel="icon" type="image/png" href="https://i.imgur.com/Kp37muV.png?1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>

    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" integrity="sha384-KA6wR/X5RY4zFAHpv/CnoG2UW1uogYfdnP67Uv7eULvTveboZJg0qUpmJZb5VqzN" crossorigin="anonymous">
        <!-- CSS Files -->
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="./assets/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="./assets/demo/demo.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
    <link href="./assets/css/custom.css" rel="stylesheet">
</head>

<body class="body">
<div id="result"></div>
<div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
        <!--
          Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
      -->
        <div class="logo">
            <a href="#" class="simple-text logo-mini">
                <div class="logo-image-small">
                    <img src="https://i.imgur.com/09BChWb.png">
                </div>
            </a>
            <a href="#" class="simple-text logo-normal">
                <?php echo $_SESSION['username']?>
            </a>
        </div>
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li class="dashboard">
                    <a href="dashboard">
                        <i class="nc-icon nc-bank"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="registered">
                    <a href="registered">
                        <i class="nc-icon nc-tile-56"></i>
                        <p>Members</p>
                    </a>
                </li>
                <li class="testimonies">
                    <a href="testimonies">
                        <i class="nc-icon nc-chat-33"></i>
                        <p>Testimonies</p>
                    </a>
                </li>
                <li class="prayers">
                    <a href="./prayers">
                        <i class="nc-icon nc-globe-2"></i>
                        <p>Prayers</p>
                    </a>
                </li>
                <li class="givers">
                    <a href="givers">
                        <i class="nc-icon nc-money-coins"></i>
                        <p>Givers</p>
                    </a>
                </li>
                <li class="orders">
                    <a href="orders">
                        <i class="nc-icon nc-delivery-fast"></i>
                        <p>Placed Orders</p>
                    </a>
                </li>
                <li class="task">
                    <a href="task">
                        <i class="nc-icon nc-layout-11"></i>
                        <p>Tasks</p>
                    </a>
                </li>
                <li class="profile">
                    <a href="profile">
                        <i class="nc-icon nc-single-02"></i>
                        <p>Admin Profile</p>
                    </a>
                </li>
                <li class="active-pro">
                    <a href="?logout=true">
                        <i class="nc-icon nc-key-25"></i>
                        <p>Sign out</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <div class="navbar-toggle">
                        <button type="button" class="navbar-toggler">
                            <span class="navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </button>
                    </div>
                    <a class="navbar-brand" href="./"><img id="logo" src="https://i.imgur.com/GW24SvT.png" height="40" alt="Kindom Life Gospel"></a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navigation">
                    <form>
                        <div class="input-group no-border">
<!--                            <input type="text" value="" class="form-control" placeholder="Search...">-->
                        </div>
                    </form>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link btn-magnify" href="#pablo">
                                <i class="nc-icon nc-layout-11"></i>
                                <p>
                                    <span class="d-lg-none d-md-block">Stats</span>
                                </p>
                            </a>
                        </li>
                        <li id="logs" class="nav-item btn-rotate dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="nc-icon nc-bell-55"></i>
                                <p><span class="badge badge-pill badge-danger">0</span></p>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <div class="d-flex justify-content-between">
                                    <a class="dropdown-item" href="?logid='.$logs['id'].'" >Welcome back <?php echo $_SESSION['username']?></a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-rotate" href="#pablo">
                                <i class="nc-icon nc-settings-gear-65"></i>
                                <p>
                                    <span class="d-lg-none d-md-block">Account</span>
                                </p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->