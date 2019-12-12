<?php
require_once '../vendor/autoload.php';

define('CLIENT_ID', '427387293589-2nqnp9ladse2pnkorp62cqbdl1aau7kk.apps.googleusercontent.com');
define('CLIENT_SECRET', '0sLcy50DCvUx6442GrtvXRCm');
define('REDIRECT_URL', 'http://localhost/kingdomlife/controller/youtube_upload.php');

$client = new Google_Client();
$client->setClientId(CLIENT_ID);
$client->setClientSecret(CLIENT_SECRET);
$client->setScopes('https://www.googleapis.com/auth/youtube');
$redirect = filter_var(REDIRECT_URL);
$client->setRedirectUri($redirect);

// Define an object that will be used to make all API requests.
$youtube = new Google_Service_YouTube($client);