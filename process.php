<?php

include_once("wp-includes/fb/facebook.php"); //include facebook api library
######### edit details ##########
$appId = '1459918874245839'; //Facebook App ID
$appSecret = 'a3505bbff947e3beaabb73c9ff4dcc04'; // Facebook App Secret
$return_url = 'http://wallrgb.com/hd_wallpaper/hdwallpaper/process.php';  //return url (url to script)
$homeurl = 'http://wallrgb.com/hd_wallpaper/hdwallpaper/';  //return to home
$fbPermissions = 'publish_stream,user_photos';  //Required facebook permissions
##################################


$GetPicId = $_GET["pid"]; // Picture ID from Index page
$GetAction = $_GET["action"]; // Picture ID from Index page
$PicLocation = urldecode($GetPicId);
print $PicLocation;
/*
  Users do not need to know original location of image.
  I think it's better to get image location from database using ID.
  for demo here i'am using PHP switch.
 */

//Call Facebook API
$facebook = new Facebook(array(
            'appId' => $appId,
            'secret' => $appSecret,
            'fileUpload' => true,
            'cookie' => true
        ));
if ($GetPicId) {
//get user
    $fbuser = $facebook->getUser();
    $access_token = $facebook->getAccessToken();
} else {
    header('Location: ' . $homeurl);
}
//variables we are going to post to facebook
$msg_body = array(
    'access_token' => $access_token,
    'message' => 'I liked this pic from ' . $homeurl . ' it is perfect for my cover photo.',
    'source' => '@' . realpath($PicLocation)
);

if ($fbuser) { //user is logged in to facebook, post our image
    try {
        $uploadPhoto = $facebook->api('/me/photos', 'post', $msg_body);
    } catch (FacebookApiException $e) {
        echo $e->getMessage(); //output any error
    }
} else {
    $loginUrl = $facebook->getLoginUrl(array('scope' => $fbPermissions, 'return_url' => $return_url));
    header('Location: ' . $loginUrl);
}

if ($uploadPhoto) {
    /*
      image is posted in user facebook account, but still we need to send user to facebook
      so s/he can set cover or profile picture!
     */
    if ($GetAction == 1) {
        header("Location:http://www.facebook.com/profile.php?preview_cover={$uploadPhoto['id']}");
    } else {
        header("Location:http://www.facebook.com/photo.php?fbid={$uploadPhoto['id']}&type=1&makeprofile=1&makeuserprofile=1");
    }
    die();
}
?>
