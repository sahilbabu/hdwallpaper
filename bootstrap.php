<?php

// include_once("wp-includes/twitter/twitteroauth.php"); //include facebook api library
// include_once("wp-includes/twitter/tmhOAuth.php"); //include facebook api library
######### edit details ##########
//define('CONSUMER_KEY', '4KZyHIq4P8SkCauX0MYrHVkxu');
//define('CONSUMER_SECRET', 'FqOoJmfwFxjfv4LXfqLVyz9Zez37oeoNVPCn2hCw02ar0SE2PJ');
define('ACCESS_TOKEN', '499666012-RcjPgHSJoubCvzkQfS3i1CnSnKdd1DuC1p83Ewv7');
define('ACCESS_TOKEN_SECRET', 'TT7t0nGrSP2n1oec3G5bVsMb7sSYFJaY0JT8VjEfjPEYP');
##################################


include 'wp-includes/twitter/tmhOAuth.php';
include 'wp-includes/twitter/TwitterApp.php';
include 'wp-includes/twitter/TwitterAvatars.php';

// set the consumer key and secret
define('CONSUMER_KEY',      'qSkJum23MqlG6greF8Z76A');
define('CONSUMER_SECRET',   'Bs738r5UY2R7e5mwp1ilU0voe8OtXAtifgtZe9EhXw');

try {

    // our tmhOAuth settings
    $config = array(
        'consumer_key'      => CONSUMER_KEY,
        'consumer_secret'   => CONSUMER_SECRET
    );

    // create a new TwitterAvatars object
   // $ta = new TwitterAvatars(new tmhOAuth($config),'temp');
    $ta = new TwitterApp(new tmhOAuth($config));

    // check our authentication status
    if($ta->isAuthed()) {

        print "authinticated user ";
    }
    // did the user request authorization?
    else{
        $ta->auth();
        print "not authinticated user ";
    }
   
} catch(Exception $e) {

    // catch any errors that may occur
    $error = $e;
}
?>

<?php

//$GetPicId = $_GET["pid"]; // Picture ID from Index page
//$GetAction = $_GET["action"]; // Picture ID from Index page
//$PicLocation = urldecode($GetPicId);
// $file = "/home/wallrgb/public_html/wp-content/uploads/2014/05/Royale_Esders_Roadster_type_41_pic1.jpg";
// $file = "http://www.wallrgb.com/wp-content/uploads/2014/05/Royale_Esders_Roadster_type_41_pic1.jpg";
//$file = base64_encode($file);
// array(	"image/gif", 	"image/pjpeg", "image/jpeg", "image/png", "image/x-png", "image/jpg");
//------------------------------------------------------------------------------------------------------------------------
//$tmhOAuth = new tmhOAuth(array(
//  'consumer_key'    => CONSUMER_KEY,
//  'consumer_secret' => CONSUMER_SECRET,
//  'user_token'      => ACCESS_TOKEN,
//  'user_secret'     => ACCESS_TOKEN_SECRET,
//));
//$imgbinary = file_get_contents($file);
//$img_str = base64_encode($imgbinary);
//$file_type = 'image/jpeg';
//$file_name = "Royale_Esders_Roadster_type_41_pic1.jpg";
//$params = array(
//    'image' => "@{$img_str};type={$file_type};filename={$file_name}",
//);                             
//$params['use'] = 'true';
// 
//$code = $tmhOAuth->request('POST', $tmhOAuth->url("1.1/account/update_profile_background_image.json"),
//    $params,
//    true, // use auth
//    true  // multipart
//);
//if ($code == 200)
//    echo 'background image updated.';
//else
//    echo 'Something went worng!!'; 

//-----------------------------------------------------------------------------------------------------------
//print $file.'<br/>';
//print base64_decode($file);
//$params = array(
//    'banner' => "@{$_FILES['image']['tmp_name']};type={$_FILES['image']['type']};filename={$_FILES['image']['name']}",
//  );
//$query = array(
//    "width" => 1500,
//    "height" => 500,
//    "offset_top" => 0,
//    "offset_left" => 0,
//    "banner" => $file
//);
//$results = search($query);
//function search(array $query) {
//   $toa = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);
    // cover banner 
//  $response =  $toa->post('account/update_profile_image', array('image' => $file));
//   print "<pre>"; print_r($tmhOAuth->response['raw']); die('----');
    // account/update_profile_image
   // $toa->post('account/update_profile_image',$q);
  //  return $toa->get('search/tweets', $query);
  //  
//}

?>