<?php
require_once 'google-api-php-client/autoload.php';

session_start();

$client = new Google_Client();

// OAuth 2.0 settings
//
// Go to the Google API Console, open your application's
// credentials page, and copy the client ID, client secret,
// redirect URI, and API key. Then paste them into the
// following code.
$client->setClientId('YOUR_CLIENT_ID');
$client->setClientSecret('YOUR_CLIENT_SECRET');
$client->setRedirectUri('YOUR_REDIRECT_URL');

$client->addScope('profile');
$client->addScope('https://www.googleapis.com/auth/contacts.readonly');

if (isset($_GET['oauth'])) {
  // Start auth flow by redirecting to Google's auth server
  $auth_url = $client->createAuthUrl();
  header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
} else if (isset($_GET['code'])) {
  // Receive auth code from Google, exchange it for an access token, and
  // redirect to your base URL
  $client->authenticate($_GET['code']);
  $_SESSION['access_token'] = $client->getAccessToken();
  $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/';
  header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
} else if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
  // You have an access token; use it to call the People API
  $client->setAccessToken($_SESSION['access_token']);
  $people_service = new Google_Service_PeopleService($client);
  // TODO: Use service object to request People data
} else {
  $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/?oauth';
  header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
}

?>