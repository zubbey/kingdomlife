<?php
require("./assets/admin_menu.php");
//require ('../config/db.php');
if(!$_SESSION['admin_session']){
    header("Location: index");
}

//UPDATE ADMIN PROFILE
if (isset($_GET['email']) || isset($_GET['fname']) || isset($_GET['lname'])){
    $id = $_SESSION['adminid'];
    $email = mysqli_real_escape_string($conn, $_GET['email']);
    $firstname = mysqli_real_escape_string($conn, $_GET['fname']);
    $lastname = mysqli_real_escape_string($conn, $_GET['lname']);
    $about = mysqli_real_escape_string($conn, $_GET['about']);

    $updateAdmin = mysqli_query($conn,"UPDATE `admin` SET email = '$email', fname = '$firstname', lname = '$lastname', about = '$about' WHERE `id` = '$id'");
    if ($updateAdmin){
        $successMsg = "
            <div class=\"alert alert-primary alert-dismissible fade show\">
                <strong>Success!</strong>Your Update was successful!;
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
            </div>
        ";
        $_SESSION['adminEmail'] = $email;
        $_SESSION['adminFname'] = $firstname;
        $_SESSION['adminLname'] = $lastname;
        $_SESSION['adminAbout'] = $about;
    } else {
        $errorMsg = "
            <div class=\"alert alert-danger alert-dismissible fade show\">
                <strong>Ops!</strong> Something went wrong while deleting! please check your connection and try again.
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
            </div>
        ";
        exit();
    }
}
?>
    <div class="content">
        <?php echo $successMsg; ?>
        <?php echo $errorMsg; ?>
        <div class="row">
            <div class="col-md-4">
                <div class="card card-user">
                    <div class="image">
                        <img src="./assets/img/damir-bosnjak.jpg" alt="...">
                    </div>
                    <div class="card-body">
                        <div class="author">
                            <a href="#">
                                <img class="avatar border-gray" src="https://i.imgur.com/09BChWb.png" alt="...">
                                <h5 class="title"><?php echo $_SESSION['username']?></h5>
                            </a>
                        </div>
                        <p class="text-center">
                            <?php echo $_SESSION['adminEmail']?>
                        </p>
                        <hr>
                        <p class="description text-center">
                            <?php echo $_SESSION['adminAbout']?>
                        </p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Administrators</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled team-members">
                        <?php
                        $adminSql = "SELECT * FROM admin";
                        $result = $conn->query($adminSql);
                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($adminRow = $result->fetch_assoc()) {
                                echo '
                                <li>
                                    <div class="row">
                                        <div class="col-md-2 col-2">
                                            <div class="avatar">
                                                <img src="https://i.imgur.com/09BChWb.png" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                                            </div>
                                        </div>
                                        <div class="col-md-7 col-7">
                                            '.$adminRow['username'].'
                                            <br />
                                            <span class="text-muted">
                                              <small>'.$_SESSION['adminRole'].'</small>
                                            </span>
                                        </div>
                                        <div class="col-md-3 col-3 text-right">
                                            <btn class="btn btn-sm btn-outline-success btn-round btn-icon"><i class="fa fa-envelope"></i></btn>
                                        </div>
                                    </div>
                                </li>
                                ';
                            }
                        }?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card card-user">
                    <div class="card-header">
                        <h5 class="card-title">Edit Profile</h5>
                    </div>
                    <div class="card-body">
                        <form id="profileForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  method="GET">
                            <div class="row form-row">
                                <div class="col-md-6 px-1">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo $_SESSION['username']?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6 pl-1">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email Address</label>
                                        <input type="email" class="form-control" name="email" placeholder="Email Address" value="<?php echo $_SESSION['adminEmail']?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" class="form-control" name="fname" placeholder="First Name" value="<?php echo $_SESSION['adminFname']?>">
                                    </div>
                                </div>
                                <div class="col-md-6 pl-1">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" class="form-control" name="lname" placeholder="Last Name" value="<?php echo $_SESSION['adminLname']?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>About Me</label>
                                        <textarea class="form-control textarea" name="about"><?php echo $_SESSION['adminAbout']?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="update ml-auto mr-auto">
                                    <button type="button" id="updateProfileBtn" name="update" class="btn btn-primary btn-round disabled">Update Profile</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
require("./assets/footer.php");
?>