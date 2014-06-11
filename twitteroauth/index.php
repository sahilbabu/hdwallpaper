<?php

/**
 * @file
 * User has successfully authenticated with Twitter. Access tokens saved to session and DB.
 */
session_start();
//session_destroy();
//session_start();
require_once('twitteroauth/twitteroauth.php');
require_once('config.php');

if (isset($_GET) && count($_GET) >= 3) {
    $_SESSION['info']['p'] = base64_decode($_GET['p']);
    $_SESSION['info']['action'] = $_GET['action'];
    $_SESSION['info']['back'] = $_GET['back'];
    $_SESSION['info']['cover'] = $_GET['cover'];
}
$page = $_SESSION['info']['p'];
$option = $_SESSION['info']['action'];
$file_background = $_SESSION['info']['back'];
$file_banner = $_SESSION['info']['cover'];



/* If access tokens are not available redirect to connect page. */
if (empty($_SESSION['access_token']) || empty($_SESSION['access_token']['oauth_token']) || empty($_SESSION['access_token']['oauth_token_secret'])) {
    header('Location: ./clearsessions.php');
}
/* Get user access tokens out of the session. */
$access_token = $_SESSION['access_token'];

/* Create a TwitterOauth object with consumer/user tokens. */
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);

/* If method is set change API call made. Test is called by default. */
// $content = $connection->get('account/verify_credentials');

/* Some example calls */
//$connection->get('users/show', array('screen_name' => 'abraham'));
// $connection->post('statuses/update', array('status' => date(DATE_RFC822)));
//$connection->post('statuses/destroy', array('id' => 5437877770));
//$connection->post('friendships/create', array('id' => 9436992));
//$connection->post('friendships/destroy', array('id' => 9436992));
// $file_banner = "/home/wallrgb/public_html/wp-content/uploads/2014/05/1500x500_2.jpg";
// $file_background = "/home/wallrgb/public_html/wp-content/uploads/2014/05/tw_back.jpg";

switch ($option) {
    case 1:
        // for update_profile_banner
        if ($file_banner) {
            $file_info = file_info($file_banner);
            $img_str = img_binary($file_banner);
            $params = array(
                'banner' => "@{$img_str};type={$file_info['mime']};filename={$file_info['filename']}",
                'width' => $file_info['width'],
                'height' => $file_info['height'],
            );
            $retun = $connection->post('account/update_profile_banner', $params);
        }

        break;
    case 2:
        // for update_profile_background_image
        if ($file_background) {
            $file_info = file_info($file_background);
            $img_str = img_binary($file_background);
            $params = array(
                'image' => "@{$img_str};type={$file_info['mime']};filename={$file_info['filename']}",
                'use' => 1,
                    // 'tile' => 1,
            );
            $retun = $connection->post('account/update_profile_background_image', $params);
            break;
        }

    case 3:
        // for Both
        if ($file_banner && $file_background) {
            $file_info = file_info($file_banner);
            $img_str = img_binary($file_banner);
            $params = array(
                'banner' => "@{$img_str};type={$file_info['mime']};filename={$file_info['filename']}",
                'width' => $file_info['width'],
                'height' => $file_info['height'],
            );
            $retun = $connection->post('account/update_profile_banner', $params);

            $file_info = file_info($file_background);
            $img_str = img_binary($file_background);
            $params = array(
                'image' => "@{$img_str};type={$file_info['mime']};filename={$file_info['filename']}",
                'use' => 1,
            );
            $retun = $connection->post('account/update_profile_background_image', $params);
        }

        break;
}

header('Location: ' . $page);

function img_binary($file) {
    $imgbinary = file_get_contents($file);
    $img_str = base64_encode($imgbinary);
    return $img_str;
}

function file_info($file) {
    $file_info = array();
    $info = new SplFileInfo($file);
    $file_info['extension'] = $info->getExtension();
    $file_info['basename'] = $info->getBasename();
    $file_info['filename'] = $info->getFilename();
    $file_info['real_path'] = $info->getRealPath();
    $file_info['info'] = $info->getFileInfo();

    $imagesize = getimagesize($file);
    $file_info['width'] = $imagesize[0];
    $file_info['height'] = $imagesize[1];
    $file_info['mime'] = $imagesize['mime'];
    $file_info['filesize'] = filesize($file) * .0009765625;
}

function mime_type($file) {
    $info = new SplFileInfo($file);
    $file_extension = $info->getExtension();
    $mime = "";
    switch ($file_extension) {
        case "gif":
            $mime = "image/gif";
            break;
        case "png":
            $mime = "image/png";
            break;
        case "jpeg":
            $mime = "image/jpg";
            break;
        case "jpg":
            $mime = "image/jpg";
            break;
    }
    return $mime;
}

/* Include HTML to display on the page */
//include('html.inc');

