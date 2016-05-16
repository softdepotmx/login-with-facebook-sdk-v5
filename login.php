
<?php
session_start();

require_once __DIR__ . '/facebook-php-sdk-v5/autoload.php';
$fb = new Facebook\Facebook([
  'app_id' => '<YOUR FACEBOOK ID>',
  'app_secret' => '<YOUR APP SECRET>',
  'default_graph_version' => 'v2.2',


  ]);





$helper = $fb->getRedirectLoginHelper();
try {
  $accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

if (isset($accessToken)) {
  // Logged in!
  $_SESSION['facebook_access_token'] = (string) $accessToken;
$tokensito=$_SESSION['facebook_access_token'];
  // Now you can redirect to another page and use the
  // access token from $_SESSION['facebook_access_token']
}

try {
  // Returns a `Facebook\FacebookResponse` object
  $response = $fb->get('/me?fields=id,name,email,gender', ''.$tokensito.'');
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

$user = $response->getGraphUser();

$_SESSION["FBNAME"]= $user['name'];
$email=$user['email'];
$_SESSION["FBGENDER"]=$user['gender'];
$_SESSION["FBID"]=$user['id'];
?>
<!DOCTYPE html>
<html>
    <head>
                <meta charset="UTF-8">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </head>
       <body>
<?php
$_SESSION["facebookid"]=$user['id'];
echo "Tu email es: ".$email."<br>"; 
echo "Tu nombre es: ".$_SESSION["FBNAME"]."<br>"; 
echo "Tu género es: ".$_SESSION["FBGENDER"]."<br>"; 
echo '<img src="//graph.facebook.com/'.$_SESSION["FBID"].'/picture"><br>';
echo '<img src="//graph.facebook.com/'.$_SESSION["FBID"].'/picture?type=large">';
?>
        
    </body>
 
</html>

