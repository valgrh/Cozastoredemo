<?php
// I have no idea where I got this from tbh just ignore it for now
$composer require google/apiclient:"^2.0"
require_once 'vendor/autoload.php';
 
// init configuration
$clientID = '<66448144629-d2hev2h57v4kmb6f123pmnldv450bfiq.apps.googleusercontent.com>';
$clientSecret = '<a68NlpKGfWAGtLFuw6ZBeVL4>';
$redirectUri = '<http://localhost/ValeriaGranillo/login.html/index.php>';
  
// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");
 
// authenticate code from Google OAuth Flow
if (isset($_GET['code'])) {
  $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
  $client->setAccessToken($token['access_token']);
  
  // get profile info
  $google_oauth = new Google_Service_Oauth2($client);
  $google_account_info = $google_oauth->userinfo->get();
  $email =  $google_account_info->email;
  $name =  $google_account_info->name;
 
  // now you can use this profile info to create account in your website and make user logged in.
} else {
  echo "<a href='".$client->createAuthUrl()."'>Google Login</a>";
}

?>