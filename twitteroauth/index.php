<?php

/**
 * @file
 * User has successfully authenticated with Twitter. Access tokens saved to session and DB.
 */
/* Load required lib files. */
session_start();
require_once('twitteroauth/twitteroauth.php');
require_once('config.php');

/* If access tokens are not available redirect to connect page. */
if (empty($_SESSION['access_token']) || empty($_SESSION['access_token']['oauth_token']) || empty($_SESSION['access_token']['oauth_token_secret'])) {
    header('Location: ./clearsessions.php');
}
/* Get user access tokens out of the session. */
$access_token = $_SESSION['access_token'];

/* Create a TwitterOauth object with consumer/user tokens. */
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);

/* If method is set change API call made. Test is called by default. */
$content = $connection->get('account/verify_credentials');

/* Some example calls */
//$connection->get('users/show', array('screen_name' => 'abraham'));
// $connection->post('statuses/update', array('status' => date(DATE_RFC822)));
//$connection->post('statuses/destroy', array('id' => 5437877770));
//$connection->post('friendships/create', array('id' => 9436992));
//$connection->post('friendships/destroy', array('id' => 9436992));

// $file = "/home/wallrgb/public_html/wp-content/uploads/2014/05/Royale_Esders_Roadster_type_41_pic1.jpg";
// $file = "http://www.wallrgb.com/wp-content/uploads/2014/05/Royale_Esders_Roadster_type_41_pic1.jpg";
 $file = "/home/wallrgb/public_html/wp-content/uploads/2014/05/1500x500.jpg";
// $file = "http://www.wallrgb.com/wp-content/uploads/2014/05/1500x500.jpg";
$imgbinary = file_get_contents($file);
$img_str = base64_encode($imgbinary);
$file_type = 'image/jpeg';
$file_name = "1500x500.jpg";
//$params = array(
//    'banner' => "@{$img_str};type={$file_type};filename={$file_name}",
//    'width' => "1500",
//    'height' => "500",
//);
//$retun = $connection->post('account/update_profile_banner', $params);

$params = array(
    'image' => "@{$img_str};type={$file_type};filename={$file_name}",
    'use' => 1,
   // 'tile' => 1,
);
$retun = $connection->post('account/update_profile_background_image', $params);

print "<pre> ()()()()()"; print_r($retun); print "()()()()() </pre>"; 
/* Include HTML to display on the page */
include('html.inc');
