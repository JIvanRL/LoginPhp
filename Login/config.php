<?php

//start session on web page
session_start();

//config.php

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('1068636663068-m3vc3c1cifr79mba8j85u4naefdv7iq4.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('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');

//Set the OAuth 2.0 Redirect URI

$google_client->setRedirectUri('http://localhost/LoginPhp/user.php');

// to get the email and profile 
$google_client->addScope('email');

$google_client->addScope('profile');

?>