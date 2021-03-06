<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
require ('config/db.php');

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

// initializing variables
$errors =  array();
$username_email = "";
$email = "";
$phone = "";
$admin = ['kingdomlifegospelchurch@gmail.com'];

//Initializing Sanitize
function sanitize($str){
    if (get_magic_quotes_gpc()) $str=stripslashes($str);
    if (function_exists('mysql_real_escape_string')) {
        return mysql_real_escape_string($str);
    } else return addslashes($str);
}
if (isset($_POST['register'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $password = $_POST['password'];
    $confirm_password = trim($_POST['confirm_password']);
    // Validate password strength
//    $uppercase = preg_match('@[A-Z]@', $password);
//    $lowercase = preg_match('@[a-z]@', $password);

    if (empty($username) && empty($email) && empty($phone) && empty($password)) {
        $errors['empty'] = "please fill out the form.";
        header("Location: ?register=true&error=".$errors['empty']."&username=".$username."&email=".$email."&phone=".$phone);
        exit();
    } else if (empty($username)) {
        $errors['empty_username'] = "you forgot to fill your username.";
        header("Location: ?register=true&username_error=".$errors['empty_username']."&username=".$username."&email=".$email."&phone=".$phone);
        exit();
    } else if ( preg_match('/\s/',$username) ) {
        $errors['invalidusername'] = "please use a valid username without any space.";
        header("Location: ?register=true&error_username-invalid=".$errors['invalidusername']."&username=".$username."&email=".$email."&phone=".$phone);
        exit();
    } else if(empty($email)){
        $errors['empty_email'] = "you forgot to fill your email address.";
        header("Location: ?register=true&error_email=".$errors['empty_email']."&username=".$username."&email=".$email."&phone=".$phone);
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email_invalid'] = "invalid Email Address.";
        header("Location: ?register=true&error_email_invalid=".$errors['email_invalid']."&username=".$username."&email=".$email."&phone=".$phone);
        exit();
    } else if(empty($phone)){
        $errors['empty_phone'] = "you forgot to fill your phone.";
        header("Location: ?register=true&error_phone=".$errors['empty_phone']."&username=".$username."&email=".$email."&phone=".$phone);
        exit();
    } else if (!preg_match('/^[0-9]{11}+$/', $phone)) {
        $errors['phone_invalid'] = "invalid Phone Number.";
        header("Location: ?register=true&error_phone_invalid=".$errors['phone_invalid']."&username=".$username."&email=".$email."&phone=".$phone);
        exit();
    } else if(strlen($password) < 6) {
        $invalid_password_Msg = "";
        $errors['password-short'] = "Password should be at least 6 characters";
        header("Location: ?register=true&error_password=".$errors['password-short']."&username=".$username."&email=".$email."&phone=".$phone);
        exit();
    } else if ($password != $confirm_password){
        $errors['password-confirm'] = "Password did not match.";
        header("Location: ?register=true&error_cpassword=".$errors['password-confirm']."&username=".$username."&email=".$email."&phone=".$phone);
        exit();
    }

    //CHECK IF EMAIL IS IN THE DATABASE

    $user_check_query = "SELECT * FROM members WHERE username='$username' OR email='$email' LIMIT 1";
    $result = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
        if ($user['username'] === $username) {
            $errors['username-exist'] = "This username is already used by someone else.";
            header("Location: ?register=true&error_username-exist=".$errors['username-exist']."&username=".$username."&email=".$email."&phone=".$phone);
        }

        if ($user['email'] === $email) {
            $errors['email-exist'] = "Email already exist.";
            header("Location: ?register=true&error_email-exist=".$errors['email-exist']."&username=".$username."&email=".$email."&phone=".$phone);
        }
    }
    if (count($errors) == 0) {

        $created_at = date("Y-m-d");
        $password = password_hash($password, PASSWORD_DEFAULT);
        $token = bin2hex(random_bytes(30));
        $verified = 0;

        $query = "INSERT INTO members (username, email, phone, password, verified, token, created_at, lastAction) 
              VALUES('$username', '$email', '$phone', '$password', '$verified', '$token', '$created_at', NOW())";
        $result = mysqli_query($conn, $query);

        if ($result){

            //INSERT INTO PROFILE IMAGE
            $sql = "SELECT * FROM members WHERE username = '$username' LIMIT 1";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($user = mysqli_fetch_assoc($result)){
                    $user_id = $user['id'];
                    $status = 0;
                    $sql = mysqli_query($conn, "INSERT INTO profileimg (userid, status) VALUES ('$user_id', '$status')");
                }
            } else {
                $errors['userimg'] = "Ops! no user : cant store image.";
            }

            session_regenerate_id();
            $_SESSION['user_session'] = TRUE;
            $userid = $conn->insert_id;
            $_SESSION['user_id'] = $userid;
            $_SESSION['fname'] = $user['firstname'];
            $_SESSION['lname'] = $user['lastname'];
            $_SESSION['gender'] = $user['gender'];
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            $_SESSION['phone'] = $phone;
            $_SESSION['verified'] = $verified;

            $to = $email;
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
            $message = '<html lang="en"><body>';
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

                if (isset($_SESSION['fromStore'])){
                    header('location: store?cart=true');
                } else if (isset($_SESSION['fromGive'])){
                    $gaveOption = $_SESSION['gaveOption'];
                    header('location: give?give='.$gaveOption);
                } else{
//                    DEFAULT LOCATION
                    header('location: users/profile?account=created');
                }
            } else{
                header("Location: ?error=true"); //could not send mail
            }
        }
    }
}


// CODE IF CLICKED ON LOGIN
if (isset($_POST['login-btn'])) {
    $username_email = $_POST['username-email'];
    $password = $_POST['password'];
    if (empty($username_email)) {
        $errors['empty_username'] = "you forgot to fill your username";
        header("Location: ?login=true&username_error=".$errors['empty_username']."&username=".$username_email);
    }else if (empty($password)) {
        $errors['empty_password'] = "you forgot to fill your password";
        header("Location: ?login=true&password_error=".$errors['empty_password']."&username=".$username_email);
    }
    if (count($errors) == 0) {

        $sql = "SELECT * FROM members WHERE username = ? OR email = ?";
        if($query = $conn->prepare($sql)) { // assuming $mysqli is the connection
            $query->bind_param('ss', $username_email, $username_email);
            $query->execute();
            // any additional code you need would go here.
            $result = $query->get_result();
            $user = $result->fetch_assoc();
            $query->close();
            if (password_verify($password, $user['password'])) {
                $id = $user['id'];
                if ($user['lastAction'] = 0) {
                    $updateQuery = mysqli_query($conn, "UPDATE `members` SET lastAction = NOW() WHERE `id` = '$id'");
                } else {
                    $updateQuery = mysqli_query($conn, "UPDATE `members` SET lastAction = NOW() WHERE `id` = '$id'");
                }
                $_SESSION['user_session'] = TRUE;
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['fname'] = $user['firstname'];
                $_SESSION['lname'] = $user['lastname'];
                $_SESSION['gender'] = $user['gender'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['phone'] = $user['phone'];
                $_SESSION['verified'] = $user['verified'];
                //SESSION VARIABLE WITH NULL VALUE

                // flash messages
                $_SESSION['successlogin'] = "you're logged in.";
                $_SESSION['loginlog'] = "you logged in at " . date("h:i a");
                if (isset($_SESSION['fromStore'])){
                    header('location: store?cart=true');
                } else if (isset($_SESSION['fromGive'])){
                    $gaveOption = $_SESSION['gaveOption'];
                    header('location: give?give='.$gaveOption);
                } else{
//                    DEFAULT LOCATION
                    header('location: users/profile?success=true');
                }
            } else {
                $errors['no_account'] = "No user found with this credentials";
                header("Location: ?login=true&no_account=" . $errors['no_account'] . "&username=" . $username_email);
            }
        } else {
            $error = $conn->errno . ' ' . $conn->error;
            echo $error; // 1054 Unknown column 'username' in 'field list'
        }
    }
}

//FORGOTTEN PASSWORD

if (isset($_POST['forgotten-password-btn'])){

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    if (empty($email)) {
        $errors['empty'] = "please enter your email account";
        header("Location: ?forgotten=true&error=emptychangeemail&errorMsg=" . $errors['empty']);
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['invalidemail'] = "please enter a valid Email Address.";
        header("Location: ?forgotten=true&error=invalidemail&errorMsg=" . $errors['invalidemail']);
        exit();
    }

    if (count($errors) == 0) {

        $emailQuery = "SELECT * FROM `members` WHERE `email` = '$email' LIMIT 1";
        $emailResult = mysqli_query($conn, $emailQuery);

        if (mysqli_num_rows($emailResult) > 0) {

            $row = mysqli_fetch_assoc($emailResult);
            $token = $row['token'];

            $to = $email;
            $subject = 'RESET YOUR MEMBERSHIP ACCOUNT PASSWORD';
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
            $message = '<html lang="en"><body>';
            $message .= '<tr>
                            <td align="center">
                                <table border="0" width="400" align="center" cellpadding="0" cellspacing="0" class="container590">
                                    <tr>
                                        <td align="center" style="color: #888888; font-size: 16px; line-height: 24px;">
                                            <div style="padding:10px 0; line-height: 24px">
                                                Please click the link below to reset you Kingdom life Gospel Outreach Membership Account, God bless you.
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>';
            $message .= '<tr>
                            <td align="center" style="color: #ffffff; font-size: 14px; line-height: 26px;">
                                <div style="line-height: 26px;">
                                    <a href="https://kingdomlifegospel.org?resetpassword=true&token='.$token.'" target="_blank" style="padding: 10px;border-radius: 10px;background: #fb9834;color: #ffffff;text-decoration: none;">RESET YOUR PASSWORD</a>
                                </div>
                            </td>
                        </tr>';
            $message .= '</body></html>';

            // Sending email
            if(mail($to, $subject, $message, $headers)){
                header('location: ?passwordlink=sent');
            } else{
                header("Location: ?error=true");
            }

        } else{
            $errors['emailnotfound'] = "This email is not in our record!";
            header("Location: ?forgotten=true&error=emailnotfound&errorMsg=" . $errors['emailnotfound']);
            exit();
        }

    }
}

//RESET PASSWORD WITH TOKEN
if (isset($_POST['reset-password-btn'])){
    $new_password = mysqli_real_escape_string($conn, $_POST['new_password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    if (strlen($new_password) < 6) {
        $errors['passwordshort'] = "Password should be at least 6 characters.";
        header("Location: ?resetpassword=true&error=passwordshort&errorMsg=".$errors['passwordshort']);
        exit();
    }
    if (count($errors) == 0) {
        if ($new_password === $confirm_password) {
            $token = $_SESSION['token'];

            $new_password = password_hash($new_password, PASSWORD_DEFAULT);
            //$current_password = password_hash($new_password, PASSWORD_DEFAULT);

            $result = mysqli_query($conn, "SELECT * FROM members WHERE token = '$token' LIMIT 1");
            $user = mysqli_fetch_array($result);
            if ($result > 0){
                $updatepassword = mysqli_query($conn, "UPDATE members set password ='$new_password' WHERE token = '$token'");

                if ($updatepassword) {
                    $_SESSION['updatedpassword']= "you changed your password.";
                    header('location: ?success=passwordChanged&login=true');
                    exit();
                }
            } else {
                $errors['tokennotmatch'] = "Your token did not match the record!";
                header('location: ?resetpassword=true&error=tokennotmatch&errorMsg='.$errors['tokennotmatch']);
                exit();
            }
        } else {
            $errors['passwordnotmatch'] = "Password did not match!";
            header('location: ?resetpassword=true&error=passwordnotmatch&errorMsg='.$errors['passwordnotmatch']);
            exit();
        }
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
    $message = '<html lang="en"><body>';
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

// verify your new user email address ####################################################
function verifyusernewEmail($token)
{
    global $conn;

    $sql = "SELECT * FROM members WHERE token = '$token' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $update_query = "UPDATE members SET verified = 1 WHERE token = '$token'";

        if (mysqli_query($conn, $update_query)) {
            //login user
            $_SESSION['user_session'] = TRUE;
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['phone'] = $user['phone'];
            $_SESSION['verified'] = $user['verified'];
            //SESSION VARIABLE WITH NULL VALUE

            // flash messages
            $_SESSION['verifiedMsg'] = "Congrat! you're email was verified successfully.";
            $_SESSION['loginlog'] = "you logged in at " . date("h:i a");

            header('location: users/profile?emailverified=true');
            exit();
        }
    } else{
        $errors['onuser'] = "Ops! no user found.";
    }
}
//UPLOAD AUDIO FILE

if (isset($_POST['audio-btn'])) {

    $filename = $_POST['fileName'];
    $description = mysqli_real_escape_string($conn, $_POST['description_entered']);

    if (!empty($filename) || !empty($description)) {
        mysqli_query($conn, "INSERT INTO `audio` (description, filename)
        VALUES ('$description', '$filename')");
        header("Location: ?success=true");
    } else {
        header("Location: ?error=empty");
    }
    mysqli_close($conn);
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
            header('location: /users/profile?mystory=true&success=posted');
            exit();
        } else{
            header('location: ?error=posted');
            exit();
        }
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
            header('location: ?success=prayersent');
            exit();
        } else{
            header('location: ?error=posted');
            exit();
        }
    }

}

// VISTORS PRAYER REQUEST

if (isset($_POST['visitor-prayer-btn'])){
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $country = mysqli_real_escape_string($conn, $_POST['country']);
    $prayer = mysqli_real_escape_string($conn, $_POST['prayer']);

    if (empty($fullname)) {
        $errors['empty'] = "please enter your fullname.";
        header("Location: ?error=fullnameempty&errorMsg=".$errors['empty']."&fullname=".$fullname."&email=".$email."&phone=".$phone."&prayer=".$prayer);
        exit();
    }
    if (empty($email)) {
        $errors['empty'] = "please enter your email address.";
        header("Location: ?error=fullnameempty&errorMsg=".$errors['empty']."&fullname=".$fullname."&email=".$email."&phone=".$phone."&prayer=".$prayer);
        exit();
    }
    if (empty($phone)) {
        $errors['empty'] = "please enter your phone number.";
        header("Location: ?error=fullnameempty&errorMsg=".$errors['empty']."&fullname=".$fullname."&email=".$email."&phone=".$phone."&prayer=".$prayer);
        exit();
    }
    if (empty($prayer)) {
        $errors['empty'] = "please enter your focused Prayer.";
        header("Location: ?error=prayerempty&errorMsg=".$errors['empty']."&fullname=".$fullname."&email=".$email."&phone=".$phone."&prayer=".$prayer);
        exit();
    }

    if (count($errors) == 0) {
        $date = date("F j, Y, g:i a");
        $status = 0;
        $userid = 0;

        $query = "INSERT INTO visitorprayerrequest (userid, fullname, email, phone, country, prayer, created_date, status)
                    VALUES('$userid', '$fullname', '$email', '$phone', '$country', '$prayer', '$date', '$status')";
        $result = mysqli_query($conn, $query);

        if ($result){
            header('location: ?success=prayersent&fullname='.$fullname.'&email='.$email.'&phone='.$phone);
            exit();
        } else{
            header('location: ?error=posted');
            exit();
        }
    }

}

//HANDLE ALL PAYMENT
function storePaymentData($referenceCode, $amount, $email, $gaveOption){
    global $conn;
    $date = date("F j, Y, g:i a");
    $paymentQuery = "INSERT INTO visitorspayment (email, referenceCode, amount, gaveOption, created_date) VALUES('$email', '$referenceCode', '$amount', '$gaveOption', '$date')";
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
    }
}

if (isset($_GET['anonymousEmail'])){
    $_SESSION['email'] = $_GET['anonymousEmail'];
}

if (isset($_GET['checkout'])){
    if (isset($_SESSION['user_session'])){
        if (count($errors) < 1) {
            $id = $_SESSION['user_id'];

            $firstname = mysqli_real_escape_string($conn, $_GET['firstname']);
            $lastname = mysqli_real_escape_string($conn, $_GET['lastname']);
            $email = mysqli_real_escape_string($conn, $_GET['email']);
            $phone = mysqli_real_escape_string($conn, $_GET['phone']);
            $address = mysqli_real_escape_string($conn, $_GET['address']);

            if (!preg_match('/^[0-9]{11}+$/', $phone)) {
                $errors['invalidphone'] = "please enter a valid Phone Number.";
                header('location: ?cart=true&error=invalidphone&errorMsg='.$errors['invalidphone']."&address=".$address."&phone=".$phone);
                exit();
            }
            if (empty($firstname) || empty($lastname) || empty($email) || empty($phone) || empty($address)) {
                $errors['emptyinput'] = "All field are required.";
                header("Location: ?cart=true&error=emptyinput&errorMsg=".$errors['emptyinput']."&address=".$address."&phone=".$phone);
                exit();
            }
        }
    } else {
        $_SESSION['fromStore'] = true;
        header("Location: index?error=notregistered&register=true");
        exit();
    }
}

//CONTACT US FORM
if (isset($_POST['contact-btn'])){
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $msg = mysqli_real_escape_string($conn, $_POST['message']);

    if (!empty($fullname) || !empty($email) || !empty($phone) || !empty($msg)){

        $to = 'kingdoml@kingdomlifegospel.org';
        $subject = 'YOU HAVE A NEW MAIL FROM ' . $fullname;
        $from = $email;

// To send HTML mail, the Content-type header must be set
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Create email headers
        $headers .= 'From: '.$from."\r\n".
            'Reply-To: '.$from."\r\n" .
            'CC: '.$admin[0]."\r\n" .
            'X-Mailer: PHP/' . phpversion();

// Compose a simple HTML email message
        $message = '<html lang="en"><body>';
        $message .= '<h1 style="font-size:18px;">'.$msg.'</h1>';
        $message .= '<p style="color:#2e3133;font-size:14px;">My Contact Line: '.$phone.'</p>';
        $message .= '</body></html>';

// Sending email
        if(mail($to, $subject, $message, $headers)){
            header("Location: ?contact=sent");
        } else{
            header("Location: ?error=true");
        }
    } else {
        $errors['emptyContact'] = "Please don't leave any field empty.";
        header("Location: ?error=true&errorMsg=".$errors['emptyContact']."&fullname=".$fullname."&email=".$email."&phone=".$phone."&msg=".$msg."#contactForm");
        exit();
    }
}

// CODE TO LOGOUT A USER
if (isset($_GET['logout'])) {
    $id = $_SESSION['user_id'];
    $updateQuery = mysqli_query($conn,"UPDATE `members` SET lastAction = NULL WHERE `id` = '$id'");
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
    header('location: index');
    exit();
}