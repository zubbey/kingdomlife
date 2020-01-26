<?php
require_once("../controller/user_controller.php");
require("../components/user_menu.php");
//kingdomlifegospelchurch@gmail.com
//SEND EMAIL FOR ACTIVITIES
if (isset($_SESSION['user_session']) && isset($_SESSION['updatedpassword'])){
    $email = $_SESSION['email'];
    passwordChangeMail($email);
}
if (isset($_SESSION['user_session']) && isset($_SESSION['testimonyposted'])){
    $email = $_SESSION['email'];
    testimonyMail($email);
}
if (isset($_SESSION['user_session']) && isset($_SESSION['prayerrequestposted'])){
    $email = $_SESSION['email'];
    $prayer = $_SESSION['prayerrequestposted'];
    prayerrequestMail($email, $prayer);
}
if (isset($_SESSION['user_session']) && isset($_SESSION['offeringsposted'])){
    $email = $_SESSION['email'];
    $offering = $_SESSION['offeringsposted'];
    offeringsMail($email, $offering);
}
if (isset($_SESSION['user_session']) && isset($_SESSION['ordersposted'])){
    $email = $_SESSION['email'];
    $deliveryAddress = $_SESSION['ordersposted'];
    orderssMail($email, $deliveryAddress);
}

//FOR TESTIMONY
if (isset($_GET['error']) && $_GET['error'] === 'postempty'){
    $invalid_post_textarea = "style = 'border: 2px solid #f95503 !important;'";
    $invalid_post_Msg = "<div class=\"invalid-feedback d-block\">".$_GET['errorMsg']."</div>";
}

//for Prayer Request validation
if (isset($_GET['error']) && $_GET['error'] === 'fullnameempty'){
    $invalid_username = "is-invalid";
    $invalid_username_Msg = "<div class=\"invalid-feedback d-block\">".$_GET['errorMsg']."</div>";
}
if (isset($_GET['error']) && $_GET['error'] === 'prayerempty'){
    $invalid_post_textarea = "style = 'border: 2px solid #f95503 !important;'";
    $invalid_post_Msg = "<div class=\"invalid-feedback d-block\">".$_GET['errorMsg']."</div>";
}

//FOR PAYMENT AND ORDERS
if (isset($_GET['payment']) && $_GET['payment'] === 'true'){
    $referenceCode = $_GET['referenceCode'];
    $amount = $_GET['amount'];
    $email = $_GET['email'];
    $gaveOption = $_GET['gaveOption'];
    storePaymentData($referenceCode, $amount, $email, $gaveOption);
}


//SETTINGS ERROR MSG
if (isset($_GET['error']) && $_GET['error'] === 'phoneempty'){
    $invalid_phone = "is-invalid";
    $invalid_phone_Msg = "<div class=\"invalid-feedback d-block\">".$_GET['errorMsg']."</div>";
}
if (isset($_GET['error']) && $_GET['error'] === 'invalidphone'){
    $invalid_phone = "is-invalid";
    $invalid_phone_Msg = "<div class=\"invalid-feedback d-block\">".$_GET['errorMsg']."</div>";
}

//SETTINGS EMAIL ERROR MSG
if (isset($_GET['error']) && $_GET['error'] === 'invalidemail'){
    $invalid_email = "is-invalid";
    $invalid_email_Msg = "<div class=\"invalid-feedback d-block\">".$_GET['errorMsg']."</div>";
}
if (isset($_GET['error']) && $_GET['error'] === 'emptychangeemail'){
    $invalid_email = "is-invalid";
    $invalid_email_Msg = "<div class=\"invalid-feedback d-block\">".$_GET['errorMsg']."</div>";
}
if (isset($_GET['error']) && $_GET['error'] === 'emailexist'){
    $invalid_email = "is-invalid";
    $invalid_email_Msg = "<div class=\"invalid-feedback d-block\">".$_GET['errorMsg']."</div>";
}
if (isset($_GET['error']) && $_GET['error'] === 'wrongpassword'){
    $invalid_cpassword = "is-invalid";
    $invalid_cpassword_Msg = "<div class=\"invalid-feedback d-block\">".$_GET['errorMsg']."</div>";
}

//SETTINGS USERNAME ERROR MSG
if (isset($_GET['error']) && $_GET['error'] === 'invalidusername'){
    $invalid_username = "is-invalid";
    $invalid_username_Msg = "<div class=\"invalid-feedback d-block\">".$_GET['errorMsg']."</div>";
}
if (isset($_GET['error']) && $_GET['error'] === 'emptychangeusername'){
    $invalid_username = "is-invalid";
    $invalid_username_Msg = "<div class=\"invalid-feedback d-block\">".$_GET['errorMsg']."</div>";
}
if (isset($_GET['error']) && $_GET['error'] === 'emailusername'){
    $invalid_username = "is-invalid";
    $invalid_username_Msg = "<div class=\"invalid-feedback d-block\">".$_GET['errorMsg']."</div>";
}
if (isset($_GET['changeUsername']) && isset($_GET['error']) && $_GET['error'] === 'wrongpassword'){
    $invalid_cpassword = "is-invalid";
    $invalid_cpassword_Msg = "<div class=\"invalid-feedback d-block\">".$_GET['errorMsg']."</div>";
}

//PASSWORD RESET
if (isset($_GET['error']) && $_GET['error'] === 'passwordshort'){
    $invalid_password = "is-invalid";
    $invalid_password_short_Msg = "<div class=\"invalid-feedback d-block\">".$_GET['errorMsg']."</div>";
}
if (isset($_GET['error']) && $_GET['error'] === 'nouserpasswordfound'){
    $invalid_password = "is-invalid";
    $invalid_password_cwrong_Msg = "<div class=\"invalid-feedback d-block\">".$_GET['errorMsg']."</div>";
}
if (isset($_GET['error']) && $_GET['error'] === 'passwordnotmatch'){
    $invalid_password = "is-invalid";
    $invalid_password_confirm_Msg = "<div class=\"invalid-feedback d-block\">".$_GET['errorMsg']."</div>";
}
?>
<style>
    span.btn.custom-file-control {
        padding: 10px !important;
        transition: all .45s ease;
    }
    .custom-file-control::before{
        display: none !important;
    }
    span.btn.custom-file-control:hover, span.btn.custom-file-control:focus{
        border-color: #f94101 !important;
        transition: all .45s ease;
    }
    li.list-group-item {
        display: flex;
        justify-content: space-between;
        align-content: center;
    }
</style>
<div class="container">
    <div class="row my-3">
        <div class="col-md-3">
            <div class="osahan-account-page-left shadow-sm bg-white h-100">
                <div class="border-bottom p-4">
                    <div class="osahan-user text-center">
                        <div class="osahan-user-media">
                            <div class="osahan-user-media-body">
                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">
                                    <?php

                                    $sql = "SELECT * FROM members LIMIT 1;";
                                    $result = mysqli_query($conn, $sql);

                                    if (mysqli_num_rows($result) > 0) {
                                        if ($user = mysqli_fetch_assoc($result)) {
                                            $id = $_SESSION['user_id'];

                                            $sqlImg = "SELECT * FROM profileimg WHERE userid='$id' LIMIT 1;";
                                            $resultImg = mysqli_query($conn, $sqlImg);
                                            while ($imgRow = mysqli_fetch_assoc($resultImg)){
                                                if ($imgRow['status'] == 1 ) {
                                                    $profileImage = '<img src="../images/uploads/profile'.$id.'.jpg?'.mt_rand().'" id="profile-image1" width="150" class="mx-auto img-fluid img-circle d-block rounded-circle img-thumbnail" alt="Profile Image">';
                                                    $profileImageSmall = '<img src="../images/uploads/profile'.$id.'.jpg?'.mt_rand().'" id="profile-image1" width="40" class="rounded-circle img-thumbnail" alt="Profile Image">';
                                                } else {
                                                    $profileImage = '<img src="https://i.imgur.com/gaJNXRO.png" class="mx-auto img-fluid img-circle d-block rounded-circle" alt="Profile Image">';
                                                    $profileImageSmall = '<img src="https://i.imgur.com/gaJNXRO.png" width="30" class="rounded-circle" alt="Profile Image">';
                                                }
                                            }
                                        }
                                    }

                                    ?>
                                    <span><?php echo $profileImage; ?></span>
                                    <h4 class="mt-2"><?php echo $_SESSION['username'];?></h4>
                                    <label class="custom-file" style="cursor: pointer; transition: all .45s ease;">
                                        <input type="file" id="file" name="file" class="custom-file-input d-none">
                                        <span class="btn custom-file-control">Change image</span>
                                        <button type="submit" id="upload-img" name="upload-img" class="d-none"></button>
                                    </label>
                                </form>

                                <hr class="my-4">
                                <p class="mb-1"><?php echo $_SESSION['phone'];?></p>
                                <p><?php echo $_SESSION['email'];?></p>
                                <p class="mb-0 text-black font-weight-bold"><a class="text-secondary mr-3" id="settings-tab" data-toggle="tab" href="#settings" role="tab" aria-controls="settings" aria-selected="false"><i class="icon_pencil-edit"></i> Edit Profile</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="nav nav-tabs flex-column border-0 pt-4 pl-4 pb-4" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="testimony-tab" data-toggle="tab" href="#testimony" role="tab" aria-controls="testimony" aria-selected="false">Testimonies</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="prayer-request-tab" data-toggle="tab" href="#prayer-request" role="tab" aria-controls="prayer-request" aria-selected="false">Prayer Request</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="orders-tab" data-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false">My Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="offerings-tab" data-toggle="tab" href="#offerings" role="tab" aria-controls="offerings" aria-selected="false">My Offerings</a>
                    </li>
                    <hr class="mt-2">
                    <li class="nav-item">
                        <a class="nav-link" id="settings-tab" data-toggle="tab" href="#settings" role="tab" aria-controls="settings" aria-selected="false">Settings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?logout=true">Sign out</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="osahan-account-page-right shadow-sm bg-white p-4 h-100">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active show" id="testimony" role="tabpanel" aria-labelledby="testimony-tab">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <h4 class="pt-5 pb-3">Share your story</h4>
                                    <form class="contact-form m-0" style="border-radius: 25px;" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                                        <div class="entry-footer d-flex align-items-center py-3">
                                            <?php echo $profileImageSmall;?>
                                            <h4> @<?php echo ucwords($_SESSION['username']); ?></h4>
                                        </div>
                                        <?php echo $invalid_post_Msg;?>
                                        <textarea rows="4" cols="6" placeholder="Eg: Thank you Jesus for my life!" name="testimony" <?php echo $invalid_post_textarea;?>></textarea>
                                        <div class="entry-footer">
                                            <input class="btn gradient-bg" type="submit" name="testimony-btn" value="Share Your Testimony">
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col" id="mystory-tab">
                                    <h4 class="pt-4 pb-3">My Stories</h4>
                                    <?php
                                    $sql = "SELECT * FROM testimonies WHERE userid='$id' order by id DESC;";
                                    $testiResult = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($testiResult)){
                                        if ($row['status'] > 0){
                                            $status = "<p class='card-link text-success'><i class='icon_check'></i> Live<p>";
                                        } else{
                                            $status = "<p class='card-link text-danger m-0'>Pending</p>";
                                        }
                                        echo '
                                              <div class="card my-4" style="border-radius: 10px;">
                                                <div class="card-body">
                                                    <p class="card-text entry-content">
                                                        '.$profileImageSmall.'
                                                        '.sanitize($row['testimony']).'
                                                    </p>
                                                    <div class="d-flex justify-content-between align-content-center">
                                                        <div>
                                                            <p class="card-link">Posted Date: <span>'.$row['created_date'].'</p>
                                                            '.$status.'
                                                        </div>
                                                        <div onclick="location.assign(\'?testimonydelete_id='.$row['id'].'\')" style="cursor: pointer;" class="text-danger text-right delete-post" ><i class="icon_trash"></i> Delete</div>
                                                    </div>
                                                </div>
                                            </div>
                                        ';
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>

<!--                    PRAYER REQUEST-->
                    <div class="tab-pane fade" id="prayer-request" role="tabpanel" aria-labelledby="prayer-request-tab">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <h4 class="pt-4 pb-3">My Prayer Request</h4>
                                    <div class="col-12">
                                        <?php
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

                                        ?>
                                    </div><!-- .col -->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <h4 class="pt-4 pb-3">My Prayers</h4>
                                    <?php
                                    $sql = "SELECT * FROM prayerRequest WHERE userid='$id' order by id DESC;";
                                    $prayerResult = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($prayerResult)) {
                                        $prayer = sanitize($row['prayer']);
                                        if ($row['status'] > 0) {
                                            $status = "<p class='card-link text-success'><i class='icon_check'></i> Recieve<p>";
                                        } else {
                                            $status = "<p class='card-link text-danger m-0'>Pending</p>";
                                        }
                                        echo '
                                            <div class="card my-4" style="border-radius: 10px;">
                                                <div class="card-body">
                                                    <p class="card-text entry-content">'.nl2br($prayer).'</p>
                                                </div>
                                                <hr class="mb-0">
                                                <div class="p-4 d-flex justify-content-between align-content-center">
                                                <p class="card-link">Posted Date: <span>'.$row['created_date'].'</p>
                                                '.$status.'
                                                </div>
                                            </div>
                                        ';
                                    }
                                        ?>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                        <div class="entry-title">
                            <h4 class="font-weight-bold">My Orders</h4>
                        </div>

                        <div class="bg-white card mb-4 order-list shadow-sm">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">Product key</th>
                                    <th scope="col">Product value</th>
                                    <th scope="col">Order number</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
//                                SELECT domain FROM mytable WHERE domain LIKE '%domain.com%';
                                $sql = "SELECT productKey, productValue, ordernumber, status, order_date FROM orders WHERE productKey LIKE 'qty%' OR productKey LIKE 'product_amount%' OR productKey LIKE 'product_name%' AND userid='$id' order by id DESC;";
                                $orderResult = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($orderResult)) {
                                    if ($row['status'] > 0) {
                                        $status = "<p class='card-link text-success'><i class='icon_check'></i> Delivered<p>";
                                    } else {
                                        $status = "<p class='card-link text-danger m-0'>In Transit</p>";
                                    }
                                    echo '
                                            <tr>
                                                <th scope="row">'.$row['productKey'].'</th>
                                                <td>'.$row['productValue'].'</td>
                                                <td>'.$row['ordernumber'].'</td>
                                                <td>'.$status.'</td>
                                                <td>'.$row['order_date'].'</td>
                                            </tr>
                                        ';
                                }
                                ?>

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="offerings" role="tabpanel" aria-labelledby="offerings-tab">
                        <div class="container">
                            <div class="row">
                                    <?php
                                        $sql = "SELECT * FROM givePayment WHERE userid='$id' order by id DESC;";
                                        $giveResult = mysqli_query($conn, $sql);
                                        while ($row = mysqli_fetch_assoc($giveResult)) {
                                            echo '
                                            <div class="col-sm-6">
                                                <div class="card border-light mb-3 bg-light" style=" border-radius: 25px;">
                                                    <div class="card-body">
                                                        <h5 class="card-title font-weight-bold">'.$row['gaveOption'].'</h5>
                                                        <hr>
                                                        <ul class="list-group list-group-flush">
                                                            <li class="list-group-item"><span class="small">Amount:</span>  &#8358;'.$row['amount'].'.00</li>
                                                            <hr class="m-0">
                                                            <li class="list-group-item"><span class="small">Reference Code:</span> '.$row['referenceCode'].'</li>
                                                            <hr class="m-0">
                                                            <li class="list-group-item"><span class="small">Transaction Status:</span> <span class="badge badge-success">Success</span></li>
                                                            <hr class="m-0">
                                                            <li class="list-group-item"><span class="small">Transaction Date:</span> '.$row['created_date'].'</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            ';
                                        }
                                        if ($row <= 0){
                                            echo "<h5> You have made 0 Offering</h5>";
                                        }
                                    ?>
                            </div>
                        </div>
                    </div>

<!--                    USERS SETTINGS-->
                    <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                        <div class="row">
                            <div class="col-12">
                                <div class="entry-title">
                                    <h4 class="font-weight-bold">Personal Informations</h4>
                                </div>
                                <form class="contact-form m-0" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">@</span>
                                        </div>
                                        <input style="width: auto;" type="text" name="username" id="username" class="form-control m-0 p-4" value="<?php echo $_SESSION['username']; ?>" disabled>
                                        <a href="?changeUsername=true" class="btn btn-default"><i class="icon_pencil-edit"></i> Change username</a>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label for="Fname">First Name: </label>
                                            <input id="Fname" type="text" name="fname" class="form-control" placeholder="First name" value="<?php echo $_SESSION['fname']; ?>">
                                        </div>
                                        <div class="col">
                                            <label for="Lname">Last Name: </label>
                                            <input id="Lname" type="text" name="lname" class="form-control" placeholder="Last name" value="<?php echo $_SESSION['lname']; ?>">
                                        </div>
                                    </div>
                                    <label for="Email">Email Address: </label>
                                    <div class="input-group">
                                        <input style="width: auto;" type="email" name="email" id="Email" class="form-control m-0 p-4" placeholder="Email Address" value="<?php echo $_SESSION['email']; ?>" disabled>
                                        <a href="?changeEmail=true" class="btn btn-default"><i class="icon_pencil-edit"></i> Change Email</a>
                                    </div>
                                    <label for="Phone">Phone Number: </label>
                                    <?php echo $invalid_phone_Msg;?>
                                    <input type="text" id="Phone" name="phone" class="form-control <?php echo $invalid_phone;?>" placeholder="Phone Number" value="<?php echo $_SESSION['phone']; ?>">
                                    <label for="Gender">Gender: </label>
                                    <input type="text" id="Gender" name="gender" class="form-control" placeholder="Male / Famale" value="<?php echo $_SESSION['gender']; ?>">
                                    <span><input class="btn gradient-bg" type="submit" name="update-data-btn" value="Update"></span>
                                </form>
                            </div>
                        </div>


                        <div class="row m-lg-5" id="password-tab">
                            <div class="col-12">
                                <div class="entry-title">
                                    <h4 class="font-weight-bold">Change Password</h4>
                                </div>

                                <form class="contact-form m-0" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
                                    <label for="currentPassword">Current Password: </label>
                                    <?php echo $invalid_password_cwrong_Msg; ?>
                                    <input type="password" class="form-control <?php echo $invalid_password;?>" id="currentPassword" name="currentPassword" placeholder="********"">
                                    <label for="newPassword">New Password: </label>
                                    <?php echo $invalid_password_short_Msg; ?>
                                    <input type="password" class="form-control <?php echo $invalid_password;?>" id="newPassword" name="newPassword" placeholder="********"">
                                    <label for="confirmPassword">Confirm Password: </label>
                                    <?php echo $invalid_password_confirm_Msg; ?>
                                    <input type="password" class="form-control <?php echo $invalid_password;?>" id="confirmPassword" name="confirmPassword" placeholder="********"">
                                    <span><input class="btn gradient-bg mt-3" type="submit" name="update-password-btn" value="Change Password"></span>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--CHANGE USERNAME MODAL-->

<div class="modal fade" id="changeusernameModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content bg-transparent border-0">
            <div class="modal-body">
                <!-- Default form login -->
                <button type="button" class="close text-right p-3" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="icon_close_alt"></i></span>
                </button>

                <form style="border-radius: 20px;" class="contact-form text-center m-0" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">

                    <p class="h4 mb-3">Change Username</p>
                    <!--Username or Email -->
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">@</span>
                        </div>
                        <input style="width: auto;" name="new_username" type="text" class="form-control m-0 p-4 <?php echo $invalid_username;?>" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" value="<?php echo $_SESSION['username'];?>">
                        <?php echo $invalid_username_Msg;?>
                    </div>

                    <!-- Password -->
                    <label for="confirmPassword">Confirm Your Password</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                        </div>
                        <input name="confirm_password" type="password" id="defaultLoginFormPassword" class="form-control m-0 p-4 <?php echo $invalid_cpassword;?>" placeholder="Password">
                        <?php echo $invalid_cpassword_Msg;?>
                    </div>
                    <!-- Sign in button -->
                    <button name="change-username-btn" class="btn gradient-bg btn-block my-2" type="submit">Change Username</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!--CHANGE EMAIL MODAL-->

<div class="modal fade" id="changeemailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content bg-transparent border-0">
            <div class="modal-body">
                <!-- Default form login -->
                <button type="button" class="close text-right p-3" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="icon_close_alt"></i></span>
                </button>

                <form style="border-radius: 20px;" class="contact-form text-center m-0" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">

                    <p class="h4 mb-3">Change Email Address</p>
                    <!--Username or Email -->
                    <div class="input-group mb-2">
                        <input style="width: auto;" name="email" type="text" class="form-control m-0 p-4 <?php echo $invalid_email;?>" placeholder="Email Address" value="<?php echo $_SESSION['email'];?>">
                        <?php echo $invalid_email_Msg;?>
                    </div>

                    <!-- Password -->
                    <label for="confirmPassword">Confirm Your Password</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                        </div>
                        <input name="confirm_password" type="password" id="defaultLoginFormPassword" class="form-control m-0 p-4 <?php echo $invalid_cpassword;?>" placeholder="Password">
                        <?php echo $invalid_cpassword_Msg;?>
                    </div>
                    <!-- Sign in button -->
                    <button name="change-email-btn" class="btn gradient-bg btn-block my-2" type="submit">Change Email</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
require("../components/user_footer.php");
?>
