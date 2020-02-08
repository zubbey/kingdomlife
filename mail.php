<?php
$to_email = 'com.zubbey@hotmail.com';
$subject = 'Testing PHP Mail';
$message = 'This mail is sent using the PHP mail function';
$headers = 'From: no-reply@kingdomlifegospel.org';
if (mail($to_email,$subject,$message,$headers)){
    echo "sent";
} else{
    echo "could not send this mail";
}
?>