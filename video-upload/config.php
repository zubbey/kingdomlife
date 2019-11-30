<?php

$host = "localhost";    /* Host name */
$user = "root";         /* User */
$password = "Inno070687";         /* Password */
$dbname = "kingdomlife_database";   /* Database name */

// Create connection
$con = mysqli_connect($host, $user, $password,$dbname);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

