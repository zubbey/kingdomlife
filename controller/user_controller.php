<?php
session_start();
require ('../config/db.php');
date_default_timezone_set("Africa/Lagos");

// last request was more than 30 minutes ago
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    $id = $_SESSION['userid'];
    $time = time();
    $updateQuery = mysqli_query($conn,"UPDATE `members` SET `lastAction` = '$time' WHERE `lastAction` = NOW() - 1800");
    session_unset();     // unset $_SESSION variable for the run-time
    session_destroy();   // destroy session data in storage
    header("Location: ?login=true&time=inactive");
    exit();
}$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp

$admin = ['kingdomlifegospelchurch@gmail.com'];

//Initializing Sanitize
function sanitize($str){
    if (get_magic_quotes_gpc()) $str=stripslashes($str);
    if (function_exists('mysql_real_escape_string')) {
        return mysql_real_escape_string($str);
    } else return addslashes($str);
}
//if click on upload images in profile settings

if (isset($_POST['upload-img'])) {
    $id = $_SESSION['user_id'];
    $file = $_FILES['file'];

    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize > 5000) {
                $fileNameNew = "profile".$id.".".$fileActualExt;
                $fileDestination = '../images/uploads/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);

                $sql = "UPDATE `profileimg` SET `status` = 1 WHERE `userid` = '$id';";
                $result = mysqli_query($conn, $sql);

                $_SESSION['updatedprofileimage']= "you updated your profile image.";
                header("Location: ?success=uploaded");
                exit();
            } else {
                header("Location: ?error=sizeerror");
                exit();
            }
        } else {
            header("Location: ?error=errorupload");
            exit();
        }
    } else {
        header("Location: ?error=filenotallowed");
        exit();
    }

}

// TESTIMONIES

if (isset($_POST['testimony-btn'])){
    $testimony = mysqli_real_escape_string($conn, $_POST['testimony']);

    if (empty($testimony)) {
        $errors['empty'] = "please type something on text field.";
        header("Location: ?error=postempty&errorMsg=".$errors['empty']."&text=".$testimony);
        exit();
    }

    if (count($errors) == 0) {
        $date = date("F j, Y, g:i a");
        $status = 0;
        $userid = $_SESSION['user_id'];

        $query = "INSERT INTO testimonies (userid, testimony, created_date, status) VALUES('$userid', '$testimony', '$date', '$status')";
        $result = mysqli_query($conn, $query);

        if ($result){
            $_SESSION['testimonyposted'] = $testimony;
            header('location: ?success=posted');
            exit();
        } else{
            header('location: ?error=posted');
            exit();
        }
    }

}
// Delete Testimonies
if ($_GET['testimonydelete_id']) {
    $id = $_GET['testimonydelete_id'];

    $deleteQuery = "DELETE FROM testimonies WHERE id = '$id'";
    if (mysqli_query($conn, $deleteQuery)){
        mysqli_query($conn,"ALTER TABLE testimonies AUTO_INCREMENT = 0");
        header('location: ?success=deleted');
        exit();
    } else {
        header('location: ?error=notdeleted');
        die($deleteQuery);
    }
}

// PRAYER REQUEST

if (isset($_POST['prayer-btn'])){
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $country = mysqli_real_escape_string($conn, $_POST['country']);
    $prayer = mysqli_real_escape_string($conn, $_POST['prayer']);

    if (empty($fullname)) {
        $errors['empty'] = "please enter your fullname.";
        header("Location: ?error=fullnameempty&errorMsg=".$errors['empty']."&fullname=".$fullname."&prayer=".$prayer);
        exit();
    }
    if (empty($prayer)) {
        $errors['empty'] = "please enter your focused Prayer.";
        header("Location: ?error=prayerempty&errorMsg=".$errors['empty']."&fullname=".$fullname."&prayer=".$prayer);
        exit();
    }

    if (count($errors) == 0) {
        $date = date("F j, Y, g:i a");
        $status = 0;
        $userid = $_SESSION['user_id'];

        $query = "INSERT INTO prayerrequest (userid, fullname, email, phone, country, prayer, created_date, status)
                    VALUES('$userid', '$fullname', '$email', '$phone', '$country', '$prayer', '$date', '$status')";
        $result = mysqli_query($conn, $query);

        if ($result){
            $_SESSION['prayerrequestposted'] = $prayer;
            header('location: ?userprayerrequest=sent');
            exit();
        } else{
            header('location: ?error=posted');
            exit();
        }
    }

}
function storePaymentData($referenceCode, $amount, $email, $gaveOption){
    global $conn;
    $date = date("F j, Y, g:i a");
    $userid = $_SESSION['user_id'];
    $username = $_SESSION['username'];
    $paymentQuery = "INSERT INTO givepayment (userid, username, email, referenceCode, amount, gaveOption, created_date) VALUES('$userid', '$username', '$email', '$referenceCode', '$amount', '$gaveOption', '$date')";
    $result = mysqli_query($conn, $paymentQuery);
    if (!$result){
        echo '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Ops!</strong> We Ran Into Some Problem, Please Check Your Connection & Try Again.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
        ';
        exit();
    } else{
        $_SESSION['refCode'] = $referenceCode;
        $_SESSION['amount'] = $amount;
        $_SESSION['offeringsposted'] = $gaveOption;
    }
}

//Resend email verification link
if (isset($_GET['resendmail'])){

    $id = $_SESSION['user_id'];
    $userEmail = $_SESSION['email'];

    $resendSql = "SELECT * FROM members WHERE id = '$id' LIMIT 1";
    $result = mysqli_query($conn, $resendSql);
    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $token = $user['token'];
    }
    $to = $userEmail;
    $subject = 'VERIFY YOUR MEMBERSHIP ACCOUNT';
    $from = 'no-reply@kingdomlifegospel.org';

    // To send HTML mail, the Content-type header must be set
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    // Create email headers
    $headers .= 'From: '.$from."\r\n".
        'Reply-To: '.$from."\r\n" .
        'CC: '.$admin[0]."\r\n" .
        'X-Mailer: PHP/' . phpversion();

    // Compose a simple HTML email message
    $message = '<html><body>';
    $message .= '
                        <table>
                        <tr>
                            <!-- logo -->
                            <td align="left">
                                <a href="https://kingdomlifegospel.org" style="display: block; border: 0 none !important;"><img width="80" border="0" style="display: block; width: 80px;" src="https://i.imgur.com/GW24SvT.png" alt="" /></a>
                            </td>
                        </tr>
                        </table>
            ';
    $message .='<table>';
    $message .= '
                        <tr>
                            <td align="center" class="section-img">
                                <a href="" style=" display: block; border: 0 none !important;"><img src="https://i.imgur.com/0ae7Kp1.png" style="display: block; width: 590px;" width="590" border="0" alt="" /></a>
                            </td>
                        </tr>
                        <tr>
                            <td height="20" style="font-size: 20px; line-height: 20px;">&nbsp;</td>
                        </tr>
            ';
    $message .= '<tr>
                            <td align="center">
                                <table border="0" width="400" align="center" cellpadding="0" cellspacing="0" class="container590">
                                    <tr>
                                        <td align="center" style="color: #888888; font-size: 16px; line-height: 24px;">
                                            <div style="padding: 10px 0;line-height: 24px">
                                                Thank you for worshiping with us please verify your email address to continue, God bless you.
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>';
    $message .= '<tr>
                            <td align="center" style="color: #ffffff; font-size: 14px; line-height: 26px;">
                                <div style="line-height: 26px;">
                                    <a href="https://kingdomlifegospel.org/?accountcomfirm=true&token='.$token.'" target="_blank" style="padding: 10px;border-radius: 10px;background: #fb9834;color: #ffffff;text-decoration: none;">CONFIRM ACCOUNT</a>
                                </div>
                            </td>
                        </tr>';
    $message .='</table>';
    $message .= '</body></html>';

    // Sending email
    if(mail($to, $subject, $message, $headers)){
        header("Location: ?resendmail=true");
    } else{
        header("Location: ?error=true");
    }
}

//UPDATE ACCOUNT information
if (isset($_POST['update-data-btn'])){

    $id = $_SESSION['user_id'];

    $firstname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lname']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);

    if (!preg_match('/^[0-9]{11}+$/', $phone)) {
        $errors['invalidphone'] = "please enter a valid Phone Number.";
        header('location: ?error=invalidphone&errorMsg='.$errors['invalidphone'].'phone='.$phone."&fname=".$firstname."&lname=".$lastname);
        exit();
    }
    if (empty($phone)) {
        $errors['empty'] = "please enter your Phone Number.";
        header("Location: ?error=phoneempty&errorMsg=".$errors['empty']."&fname=".$firstname."&lname=".$lastname);
        exit();
    }
    if (count($errors) == 0) {
        $sql_check = mysqli_query($conn, "SELECT * FROM members WHERE id = '$id' LIMIT 1");
        $result = mysqli_num_rows($sql_check);
        if($result > 0){
            $username = $_SESSION['username'];
            $email = $_SESSION['email'];
            $update = "UPDATE members SET username = '$username', firstname = '$firstname', lastname= '$lastname', gender= '$gender', email= '$email', phone= '$phone' WHERE `id` = '$id'";
            if (mysqli_query($conn, $update)){

                $_SESSION['fname'] = $_POST['fname'];
                $_SESSION['lname'] = $_POST['lname'];
                $_SESSION['phone'] = $_POST['phone'];
                $_SESSION['gender'] = $_POST['gender'];

                $_SESSION['updatedinfo']= "you updated your information.";
                header('location: ?success=infoupdated');
                exit();
            } else{
                header('location: ?error=couldnotupdated');
                exit();
            }
        } else {
            die("there was an error" .mysqli_connect_error());
        }
    }

}

//CHANGE EMAIL ADDRESS
if (isset($_POST['change-email-btn'])) {

    $id = $_SESSION['user_id'];

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['confirm_password'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['invalidemail'] = "please enter a valid Email Address.";
        header("Location: ?changeEmail=true&error=invalidemail&errorMsg=" . $errors['invalidemail']);
        exit();
    }
    if (empty($email) || empty($password)) {
        $errors['empty'] = "please fill all fields";
        header("Location: ?changeEmail=true&error=emptychangeemail&errorMsg=" . $errors['empty']);
        exit();
    }
//    echo $row['password'];
//    echo "<br/>";
//    echo $password;
    if (count($errors) == 0) {
        $result = mysqli_query($conn, "SELECT * FROM members WHERE id='$id' LIMIT 1");
        $user = mysqli_fetch_array($result);

        if (password_verify($password, $user['password'])) {
            $emailQuery = "SELECT * FROM `members` WHERE `email` = '$email' LIMIT 1";
            $emailResult = mysqli_query($conn, $emailQuery);

            if (mysqli_num_rows($emailResult) == 0) {
                $row = mysqli_fetch_assoc($emailResult);
                $token = $user['token'];

                $update = mysqli_query($conn, "UPDATE members SET verified = 0, email = '$email' WHERE id = '$id'");
                if ($update) {
                    $to = $email;
                    $subject = 'VERIFY YOUR NEW EMAIL ADDRESS';
                    $from = 'no-reply@kingdomlifegospel.org';

                    // To send HTML mail, the Content-type header must be set
                    $headers  = 'MIME-Version: 1.0' . "\r\n";
                    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

                    // Create email headers
                    $headers .= 'From: '.$from."\r\n".
                        'Reply-To: '.$from."\r\n" .
                        'CC: '.$admin[0]."\r\n" .
                        'X-Mailer: PHP/' . phpversion();

                    // Compose a simple HTML email message
                    $message = '<html><body>';
                    $message .= '<tr>
                            <td align="center">
                                <table border="0" width="400" align="center" cellpadding="0" cellspacing="0" class="container590">
                                    <tr>
                                        <td align="center" style="color: #888888; font-size: 16px; line-height: 24px;">
                                            <div style="padding:10px 0; line-height: 24px">
                                                You current changed your email address please verify to continue, God bless you.
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>';
                    $message .= '<tr>
                            <td align="center" style="color: #ffffff; font-size: 14px; line-height: 26px;">
                                <div style="line-height: 26px;">
                                    <a href="https://kingdomlifegospel.org?accountcomfirm=true&token='.$token.'" target="_blank" style="padding: 10px;border-radius: 10px;background: #fb9834;color: #ffffff;text-decoration: none;">CONFIRM ACCOUNT</a>
                                </div>
                            </td>
                        </tr>';
                    $message .= '</body></html>';

                    // Sending email
                    if(mail($to, $subject, $message, $headers)){

                        $_SESSION['email'] = $email;
                        $_SESSION['updatedemail'] = "you changed your email address.";
                        header('location: ?success=emailchanged');
                        exit();
                    } else{
                        header("Location: ?error=true");
                        exit();
                    }

                }
            } else if (mysqli_num_rows($emailResult) > 0) {
                $errors['emailexist'] = "email already used!";
                header("Location: ?changeEmail=true&error=emailexist&errorMsg=" . $errors['emailexist']);
                exit();
            }
        } else {
            $errors['wrongpassword'] = "Your password in wrong!";
            header("Location: ?changeEmail=true&error=wrongpassword&errorMsg=" . $errors['wrongpassword']);
            exit();
        }
    }
}

// CHANGE USERNAME
if (isset($_POST['change-username-btn'])) {

    $id = $_SESSION['user_id'];

    $username = mysqli_real_escape_string($conn, $_POST['new_username']);
    $password = $_POST['confirm_password'];

    if ( preg_match('/\s/',$username) ) {
        $errors['invalidusername'] = "please use a valid username without any space.";
        header("Location: ?changeUsername=true&error=invalidusername&errorMsg=" . $errors['invalidusername']);
        exit();
    }
    if (empty($username) || empty($password)) {
        $errors['emptyfield'] = "Please fill all fields";
        header("Location: ?changeUsername=true&error=emptychangeusername&errorMsg=" . $errors['emptyfield']);
        exit();
    }

    if (count($errors) == 0) {
        $result = mysqli_query($conn, "SELECT * FROM members WHERE id='$id' LIMIT 1");
        $user = mysqli_fetch_array($result);

        if (password_verify($password, $user['password'])) {
            $usernameQuery = "SELECT * FROM `members` WHERE `username` = '$username' LIMIT 1";
            $usernameResult = mysqli_query($conn, $usernameQuery);

            if (mysqli_num_rows($usernameResult) == 0) {
                $row = mysqli_fetch_assoc($usernameResult);

                $update = mysqli_query($conn, "UPDATE members SET verified = 0, email = '$email' WHERE id = '$id'");
                if ($update) {
                    $email = $_SESSION['email'];
                    $to = $email;
                    $subject = 'YOU CHANGED YOUR USERNAME TO '.$username;
                    $from = 'no-reply@kingdomlifegospel.org';

                    // To send HTML mail, the Content-type header must be set
                    $headers  = 'MIME-Version: 1.0' . "\r\n";
                    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

                    // Create email headers
                    $headers .= 'From: '.$from."\r\n".
                        'Reply-To: '.$from."\r\n" .
                        'CC: '.$admin[0]."\r\n" .
                        'X-Mailer: PHP/' . phpversion();

                    // Compose a simple HTML email message
                    $message = '<html><body>';
                    $message .= '<tr>
                            <td align="center">
                                <table border="0" width="400" align="center" cellpadding="0" cellspacing="0" class="container590">
                                    <tr>
                                        <td align="center" style="color: #888888; font-size: 16px; line-height: 24px;">
                                            <div style="padding:10px 0; line-height: 24px">
                                                You current changed your Username to ( '.$username.' ) if you did not perform this action please contact us quickly, God bless you.
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center" style="color: #888888; font-size: 16px; line-height: 24px;">
                                            <div style="padding:10px 0; line-height: 24px">
                                                Contact Line: +234 807 299 2247 | +234 807 299 2248 | +234 803 309 6872
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>';
                    $message .= '</body></html>';

                    // Sending email
                    if(mail($to, $subject, $message, $headers)){

                        $_SESSION['username'] = $username;
                        $_SESSION['updatedusername'] = "you changed your username.";
                        header('location: ?success=usernamechanged');
                        exit();
                    } else {
                        header("Location: ?error=true");
                        exit();
                    }

                }
            } else if (mysqli_num_rows($usernameResult) > 0) {
                $errors['usernameexist'] = "Username already in use!";
                header("Location: ?changeUsername=true&error=usernameexist&errorMsg=" . $errors['emailexist']);
                exit();
            }
        } else {
            $errors['wrongpassword'] = "Your password in wrong!";
            header("Location: ?changeUsername=true&error=wrongpassword&errorMsg=" . $errors['wrongpassword']);
            exit();
        }
    }
}

// CHANGE PASSWORD
if (isset($_POST['update-password-btn'])){

    $id = $_SESSION['user_id'];

    $current_password = mysqli_real_escape_string($conn, $_POST['currentPassword']);
    $new_password = mysqli_real_escape_string($conn, $_POST['newPassword']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirmPassword']);

    if (strlen($new_password) < 6) {
        $errors['passwordshort'] = "Password should be at least 6 characters.";
        header("Location: ?error=passwordshort&errorMsg=".$errors['passwordshort']);
        exit();
    }
    if (count($errors) == 0) {
        if ($new_password === $confirm_password) {

            $new_password = password_hash($new_password, PASSWORD_DEFAULT);
            //$current_password = password_hash($new_password, PASSWORD_DEFAULT);

            $result = mysqli_query($conn, "SELECT * FROM members WHERE id='$id'");
            $user = mysqli_fetch_array($result);
            //echo $row["password"].' '.$current_password;
            if (password_verify($current_password, $user['password'])) {
                $updatepassword = mysqli_query($conn, "UPDATE members set password='$new_password' WHERE id='$id'");
                if ($updatepassword) {
                    $_SESSION['updatedpassword'] = "you changed your password.";
                    header('location: ?success=passwordChanged&logout=true');
                    exit();
                }
            } else {
                $errors['wrongpassword'] = "your current password is wrong!.";
                header("Location: ?error=nouserpasswordfound&errorMsg=".$errors['wrongpassword']);
                exit();
            }
        } else {
            $errors['passwordnotmatch'] = "Password did not match!";
            header('location: ?error=passwordnotmatch&errorMsg='.$errors['passwordnotmatch']);
            exit();
        }
    }

}


//STORE ORDER INTO THE DATABASE
if (isset($_GET['order']) && $_GET['order'] === 'orderSent'){
    $id = $_SESSION['user_id'];

    $date = date("F j, Y, g:i a");
    $orderid = bin2hex(random_bytes(6));
    $status = 0;

    $query = "INSERT INTO orders (userid, productKey, productValue, ordernumber, order_date, status) VALUES ";
    foreach ($_GET as $getParam => $value)
    {
        // Get values from post.
        $values = mysqli_real_escape_string($conn, $value);
        $keys = mysqli_real_escape_string($conn, $getParam);

        // Add to database
        $query = $query." ('$id', '$keys', '$values', '$orderid', '$date', '$status') ,";
    }
    $query = substr($query,0,-1); //remove last char
    $result = mysqli_query($conn, $query);
    if ($result){

        $result = mysqli_query($conn, "SELECT productValue FROM orders WHERE productKey LIKE '%address%' AND id='$id' LIMIT 1");
        $row = mysqli_fetch_array($result);
        $_SESSION['ordersposted'] = $_GET['address'];
        header('location: ?order=sent');
        exit();
    } else{
        header('location: ?error=posted');
        exit();
    }
}

// CODE TO LOGOUT A USER
if (isset($_GET['logout'])) {
    $id = $_SESSION['user_id'];
    $time = time();
    $updateQuery = mysqli_query($conn,"UPDATE `members` SET lastAction = '$time' WHERE `id` = '$id'");
    session_destroy();
    $_SESSION['user_session'] = FALSE;
    unset($_SESSION['user_id']);
    unset($_SESSION['username']);
    unset($_SESSION['fname']);
    unset($_SESSION['lname']);
    unset($_SESSION['gender']);
    unset($_SESSION['email']);
    unset($_SESSION['phone']);
    unset($_SESSION['verified']);
    // UNSET SESSION VAIRABLE WITH NULL
    header('location: ../index.php');
    exit();
}
