<?php
$to = "com.zubbey@hotmail.com";
$subject = "Testing From Hosted";
$txt = "Hello world!";
$headers = "From: zubbey@protonmail.com" . "\r\n" .
"CC: zubyinnocent@outlook.com";

mail($to,$subject,$txt,$headers);
?>
