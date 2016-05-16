<?php     
session_start();

//FACEBOOK SDKV5
require_once __DIR__ . '/facebook-php-sdk-v5/autoload.php';
//NEW FACEBOOK PON TU ID Y APP
$fb = new Facebook\Facebook([
  'app_id' => '<YOUR FACEBOOK ID>',
  'app_secret' => '<YOUR APP SECRET>',
  'default_graph_version' => 'v2.2',
  ]);


$helper = $fb->getRedirectLoginHelper();
$permissions = ['email']; // optional
$loginUrl = $helper->getLoginUrl('http://faberacademy.org/examples/facebook-login/login.php', $permissions);
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
        <?php   echo '<a class=" btn btn-primary" href="'.$loginUrl.'">'; ?><i class="fa fa-facebook"></i> Login con Facebook</a>       
    </body>
 
</html>

