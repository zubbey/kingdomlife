<?php
//require __DIR__ . '../../vendor/autoload.php';
//
//$dotenv = new Dotenv\Dotenv(__DIR__, '.env');
//$dotenv->load();
// set a default environment
$WEBSITE_ENVIRONMENT = "Development";
// detect the URL to determine if it's development or production
if(stristr($_SERVER['HTTP_HOST'], 'localhost') === FALSE) $WEBSITE_ENVIRONMENT = "Production";
// value of variables will change depending on if Development vs Production
if ($WEBSITE_ENVIRONMENT =="Development") {
    $host 		= "localhost";
    $user 		= "root";
    $password 	= "Inno070687";
    $database 	= "kingdomlife_database";
    define("APP_ENVIRONMENT", "Development");
    define("APP_BASE_URL", "http://localhost/kingdomlife");
    error_reporting(E_ALL ^ E_NOTICE); // turn ON showing errors
} else {
    $host 		= "localhost";
    $user 		= "kingdoml_church";
    $password 	= "KLGospel@2019";
    $database 	= "kingdoml_database";
    define("APP_ENVIRONMENT", "Production");
    define("APP_BASE_URL", "https://kingdomlifegospel.org");
    #error_reporting(0); // turn OFF showing errors
    error_reporting(E_ALL ^ E_NOTICE); // turn ON showing errors
}
// connect to the database server
$conn = mysqli_connect($host, $user, $password) or die("Could not connect to database");
// select the right database
mysqli_select_db($conn, $database);
// END Database connection and Configuration
?>