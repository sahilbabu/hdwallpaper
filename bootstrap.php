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
    $ta = new TwitterAvatars(new tmhOAuth($config),'temp');

    // check for stale files
    $ta->cleanupFiles();

    // check our authentication status
    if($ta->isAuthed()) {

        // has the user selected an option?
        if(isset($_POST['filter'])) {

            // is the user sure?
            if(isset($_POST['confirm'])) {

                // change the user's avatar
                $ta->commitAvatar($_POST['filter']);

                // tweet if the user chose to
                if(isset($_POST['tweet'])) {
                    $ta->sendTweet('I just updated my avatar using Avatar Effects...');
                }

                $success = true;
            }

            // get the image paths for display
            $original = $ta->getPreview();
            $newimage = $ta->getPreview($_POST['filter']);
        }
        // generate previews if the user has not chosen
        else {

            // $previews will be a list of images
            $previews = $ta->generatePreviews();
        }
    }
    // did the user request authorization?
    elseif(isset($_POST['auth'])) {

        // start authentication process
        $ta->auth();
    }
} catch(Exception $e) {

    // catch any errors that may occur
    $error = $e;
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Twitter Avatar Effects</title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
      <h1>Twitter Avatar Effects</h1>
  <?php if(isset($previews)): ?>
      <h2>Choose your weapon...</h2>
      <form action="bootstrap.php" method="post">
      <?php foreach($previews as $filter => $path): ?>
          <input type="image" src="<?php echo $path; ?>"
                 alt="<?php echo ucfirst($filter); ?>"
                  width="73" height="73"
                 name="filter" value="<?php echo $filter; ?>">
      <?php endforeach; ?>
      </form>
      <p>Select one of the images above to change your Twitter avatar.</p>
  <?php elseif(isset($success)): ?>
      <h2>Success! Your Twitter avatar is now:</h2>
      <img src="<?php echo $newimage; ?>" alt="Your Avatar" width="73" height="73">
      <p><a href="http://twitter.com/<?php echo $ta->userdata->screen_name; ?>">Go see it</a></p>
  <?php elseif(isset($newimage)): ?>
      <h2>Are you sure?</h2>
      <img src="<?php echo $original; ?>" alt="Original" width="73" height="73">
      <span class="arrow">&rArr;</span>
      <img src="<?php echo $newimage; ?>" alt="<?php echo ucfirst($_POST['filter']); ?>">
      <form action="bootstrap.php" method="post">
          <input type="hidden" name="filter" value="<?php echo $_POST['filter']; ?>">
          <input type="submit" name="confirm" value="Confirm">
          <a href="bootstrap.php">Cancel</a>
          <p><label>Tweet about your new avatar?
                  <input type="checkbox" name="tweet" value="true"></label></p>
      </form>
  <?php elseif(isset($error)): ?>
      <p>Error. <a href="bootstrap.php">Try again?</a></p>
  <?php else: ?>
      <form action="bootstrap.php" method="post">
          <input type="image" src="img/sign-in-with-twitter-l.png"
                 alt="Connect to Twitter" name="auth" value="1">
      </form>
      <p>Connect to Twitter to use this app.</p>
  <?php endif; ?>
  </body>
</html>

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