<?php
// AUTH CONTROLLER FOR BACKEND
//require_once ("../config/config-db.php");
require_once ("../controller/admin_controller.php");

if(isset($_SESSION['admin_session'])){
    header("Location: dashboard");
} else {

    if (isset($_GET['username_error']) && $_GET['username_error'] === 'Enter your admin username'){
        $invalid_username = "is-invalid";
        $invalid_username_Msg = "<div class=\"invalid-feedback\">".$_GET['username_error']."</div>";
    }
    if (isset($_GET['password_error']) && $_GET['password_error'] === 'Enter the correct admin password'){
        $invalid_password = "is-invalid";
        $invalid_password_Msg = "<div class=\"invalid-feedback\">".$_GET['password_error']."</div>";
    }
    if (isset($_GET['no_account']) && $_GET['no_account'] === 'You do not have access to this portal!'){
        $invalid_username = "is-invalid";
        $invalid_password = "is-invalid";
        $invalid_entry_Msg = "<small class=\"invalid-feedback d-block\">".$_GET['no_account']."</small>";
    }

    echo '
            <!DOCTYPE html>
            <html lang="en">
            
            <head>
                <meta charset="utf-8" />
                <link rel="apple-touch-icon" sizes="76x76" href="https://i.imgur.com/Kp37muV.png?1">
                <link rel="icon" type="image/png" href="https://i.imgur.com/Kp37muV.png?1">
                <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
                <title>
                    Kingdom Life Gospel | Admin
                </title>
                <meta content=\'width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no\' name=\'viewport\' />
                <!--     Fonts and icons     -->
                <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
                <!-- CSS Files -->
                <link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
                <link href="./assets/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />
                <!-- CSS Just for demo purpose, don\'t include it in your project -->
                <link href="./assets/demo/demo.css" rel="stylesheet" />
                <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
            </head>
            
            <body class="body">
            
            <main class="container">
                <div class="section__block" style="margin-top: 15%; margin-bottom: 10%;">
                    <form method="POST" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'">
                        <div class="row">
                            <div class="col-md-6 mb-lg-5 m-auto">
                                <a href="../"><img id="logo" src="https://i.imgur.com/GW24SvT.png" height="40" alt="Kingdom Life Gospel"></a>
                            </div>
                         </div>
                        <div class="row">
                            <div class="form-group col-md-6 m-auto">
                                <h5 class="page-title">Admin Portal</h5>
                                '.$invalid_entry_Msg.'
                               
                                <input type="text" name="username" class="form-control form-control-lg m-0 '.$invalid_username.'" id="cl" placeholder="Username" autocomplete="on" value="'.$_GET['username'].'">
                                '.$invalid_username_Msg.'<br>
                               
                                <input type="password" name="password" class="form-control form-control-lg m-0 '.$invalid_password.'" placeholder="Password" autocomplete="off">
                                '.$invalid_password_Msg.'<br>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-lg btn-round text-capitalize" name="login-btn" type="submit">Secure Login <i class="nc-icon nc-lock-circle-open"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </main>
            <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
            </body>
            </html>
        
        ';
}
?>