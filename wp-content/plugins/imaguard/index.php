<?php
/*
Plugin Name: Imaguard
Plugin URI: http://www.imaguard.com/
Description: Redirect direct image hits to page within Wordpress
Version: 1.3.3
Author: Imaguard
Author URI: http://www.imaguard.com/
*/

include('helpers.php');

function ir_activate() {
	
	$url = site_url();
	$url = ir_get_domain($url);
	
	if (!get_option( 'ir_whitelistUA' )) { update_option( 'ir_page_slug', 'show-image' ); }
	if (!get_option( 'ir_page_slug' )) { update_option( 'ir_page_title', 'View Image' ); }
	if (!get_option( 'ir_image_width' )) { update_option( 'ir_image_width', '500' ); }
	if (!get_option( 'ir_image_height' )) { update_option( 'ir_image_height', '500' ); }
	if (!get_option( 'ir_image_ext' )) { update_option( 'ir_image_ext', 'jpg,png,jpeg,gif' ); }
	if (!get_option( 'ir_whitelist' )) { update_option( 'ir_whitelist', '' ); }
	if (!get_option( 'ir_whitelistUA' )) { update_option( 'ir_whitelistUA', '' ); }
	if (!get_option( 'ir_show_homelink' )) { update_option( 'ir_show_homelink', 'on' ); }
	if (!get_option( 'ir_showImgText' )) { update_option( 'ir_showImgText', '' ); }
	if (!get_option( 'ir_showImgTextStr' )) { update_option( 'ir_showImgTextStr', 'Click to see!' ); }
	if (!get_option( 'ir_imgopacity' )) { update_option( 'ir_imgopacity', '125' ); }
	if (!get_option( 'ir_textposcorr' )) { update_option( 'ir_textposcorr', '0' ); }
	if (!get_option( 'ir_fontsizemultiple' )) { update_option( 'ir_fontsizemultiple', '138' ); }
	if (!get_option( 'ir_redirectcode' )) { update_option( 'ir_redirectcode', '302' ); }
	if (!get_option( 'ir_showpostpage' )) { update_option( 'ir_showpostpage', ''); }

	$rules = array();
	$rules[] = 'RewriteEngine on';
	$rules[] = 'RewriteCond %{HTTP_REFERER} !^http://(.+\.)?'.trim(str_replace(".","\.",$url)).' [NC]';
	$rules[] = 'RewriteRule ^(.*)\.(jpg|png|jpeg|gif)$ /show-image/?img=/$1.$2 [R=301,NC,L]';
	
	add_htaccess($rules);
}

register_activation_hook( __FILE__, 'ir_activate' );

function add_htaccess($insertion) {
    $htaccess_file = ABSPATH.'.htaccess';
    return insert_with_markers($htaccess_file, 'imaguard', (array) $insertion);
}

register_deactivation_hook( __FILE__, 'ir_deactivate' );

function ir_deactivate() {
	$htaccess_file = ABSPATH.'.htaccess';
	insert_with_markers($htaccess_file, 'imaguard', "");
}

function ir_update_rewrite() {
	$domains = array();
	
	$url = site_url();
	
	$url = ir_get_domain($url);
	$domains[] = $url;	

	$whitelist = get_option( 'ir_whitelist' );
	$whitelist = explode("\n",$whitelist);

	$whitelistUA = get_option( 'ir_whitelistUA' );
	$whitelistUA = explode("\n",$whitelistUA);
	
	foreach($whitelist as $d)
	{
		$domain = ir_get_domain($d);
		
		if($domain)
		{
			$domains[] = $domain;	
		}
	}
	
	$extensions = get_option( 'ir_image_ext' );
	$extensions = explode(",",$extensions);
	
	foreach($extensions as $e)
	{
		$e = trim($e);
		$ext .= $e.'|';
	}
	
	$ext = trim($ext,'|');

	$rules = array();
	$rules[] = 'RewriteEngine on';
	//$rules[] = 'RewriteCond %{HTTP_REFERER} !^$';

	foreach($domains as $d)
	{
		$rules[] = 'RewriteCond %{HTTP_REFERER} !^http://(.+\.)?'.str_replace(".","\.",trim($d)).' [NC]';
	}

	foreach($whitelistUA as $dd)
	{
		$dd = trim($dd);
		$dd = preg_replace("!(\!| |\.|\?|\*|\+|\{|\}|\[|\]|\(|\))!", '\\\$1', $dd);
		if (strlen($dd)>2 ) { $rules[] = 'RewriteCond %{HTTP_USER_AGENT} !'.$dd.' [NC]'; }  //strlen tmp thing to avoid problem with blank user agnts
	}

	$rules[] = 'RewriteRule ^(.*)\.('.$ext.')$ /'.get_option('ir_page_slug').'/?img=/$1.$2 [R='.get_option('ir_redirectcode').',NC,L]';
	
	add_htaccess($rules);
}

function ir_getpostidbyurl($url) {
	global $wpdb;
	$query = "SELECT ID FROM {$wpdb->posts} WHERE post_content like '%".$url."%' LIMIT 1";
	$thisid = $wpdb->get_var($query);
	return $thisid;
}

add_filter('the_posts','ir_detectpost');

function ir_createpage() {
	if (get_option('ir_showpostpage')) {
		$post = new stdClass;
	
		$ir_location = get_bloginfo('url')."/index.php?p=".ir_getpostidbyurl($_GET['img']);
		Header( "HTTP/1.1 302 Moved Temporarily" );
		Header( "Location: $ir_location" ); 
		exit;
	} else {
		$post = new stdClass;
		$post->post_author = 1;
		$post->post_name = get_option('ir_page_slug');
		$post->guid = get_bloginfo('wpurl') . '/' . get_option('ir_page_slug');
		$post->post_title = get_option('ir_page_title');
		$post->post_content = ir_newcontent();
		$post->ID = -1;
		$post->post_status = 'static';
		$post->comment_status = 'closed';
		$post->ping_status = 'open';
		$post->comment_count = 0;
		$post->post_date = current_time('mysql');
		$post->post_date_gmt = current_time('mysql', 1);
	
		return($post);   
	}
}
   
function ir_newcontent()
{
	list($width, $height) = getimagesize(ABSPATH.$_GET['img']);
	$maxheight = get_option( 'ir_image_height' );
	$maxwidth = get_option( 'ir_image_width' );
	
	if($maxwidth <> "0" && $maxheight <> "0")
	{
		$imgdim = ir_resize_dimensions($maxwidth,$maxheight,$width,$height);
		$width = ' width="'.$imgdim['width'].'"';
		$height = ' height="'.$imgdim['height'].'"';
	}
	elseif($maxwidth <> "0" && $maxheight == "0")
	{
		$width = ' width="'.$maxwidth.'"';
		$height = '';
	}
	elseif($maxheight <> "0" && $maxwidth == "0")
	{
		$height = ' height="'.$maxheight.'"';
		$width = '';
	}
	else
	{
		$width = '';
		$height = '';	
	}
	
	$content = '<a class="thickbox" href="'.$_GET['img'].'?cb='.ir_random_cb().'"><img src="'.$_GET['img'].'?cb='.ir_random_cb ().'"'.$height.$width.' /></a>';

	if (get_option( 'ir_show_homelink' )) {
		$content .= '<p>Image handling by <a href="http://imaguard.com">Imaguard</a> plugin</p>';
	}
	
	return $content;
}
 
function ir_detectpost($posts) {
	global $wp;
	global $wp_query;

	//![a-z0-9\-\.\/]+\.(?:jpe?g|png|gif)!Ui
	if ((get_option('ir_showImgText') == 'true' || get_option('ir_showImgText') == 'on' ) && preg_match('![a-z0-9\-\.\/]+\.(?:jpe?g)!Ui', $_GET['img']) ) {

		header("Content-Type: image/jpeg");
	
		//open up the image you want to put text over
		$im = ImageCreateFromJPEG(ABSPATH.$_GET['img']); 

		imagefilter($im, IMG_FILTER_BRIGHTNESS, (0- get_option('ir_imgopacity')));

		//The numbers are the RGB values of the color you want to use
		$color = ImageColorAllocate($im, 255, 255, 255);

		//The canvas's (0,0) position is the upper left corner
		//So this is how far down and to the right the text should start
		$textstr = get_option( 'ir_showImgTextStr');
		if (strlen($textstr)<2) { $textstr = "Click Here"; }
		list($imgwidth, $imgheight) = getimagesize(ABSPATH.$_GET['img']);
		$start_x = 10;
		$start_y = $imgheight/2 + ( $imgheight * (get_option('ir_textposcorr')/200));
		$fontsize = ($imgwidth/(strlen($textstr))) * (get_option('ir_fontsizemultiple')/100);
	
		$font = ABSPATH.'wp-content/plugins/imaguard/AUDIMO_.TTF';
		imagettftext($im, $fontsize, 0, $start_x, $start_y, $color, $font, $textstr );

		if (get_option( 'ir_show_homelink' )) {
			imagettftext($im, $fontsize/3, 0, $start_x, $start_y+$fontsize/2.25, $color, $font, " Powered by Imaguard" );
		}
       	header("Expires: 1 Jan 1990 00:00:00 GMT");
        	header("Pragma: no-cache");
        	header("Cache-control: no-cache");
		header("Cache-control: no-store");
		header("Cache-control: max-age=0, must-revalidate");
        	header("Cache-control: pre-check=0,post-check=0", false);

		//Creates the jpeg image and sends it to the browser
		//100 is the jpeg quality percentage
		Imagejpeg($im, NULL, 100);

		ImageDestroy($im); 

		exit;
	} else {
	
		if (strtolower($wp->request) == strtolower(get_option('ir_page_slug')) || $wp->query_vars['page_id'] == get_option('ir_page_slug')){
			$posts = NULL;
			$posts[] = ir_createpage();
			$wp_query->is_page = true;
			$wp_query->is_singular = true;
			$wp_query->is_home = false;
			$wp_query->is_archive = false;
			$wp_query->is_category = false;
			unset($wp_query->query["error"]);
			$wp_query->query_vars["error"]="";
			$wp_query->is_404=false;
		}
		return $posts;
	}
}

add_filter ( 'the_content', 'ir_add_timestamp_to_img' );

function ir_add_timestamp_to_img($content) {
	// this adds a timestamp to all jpg images in content to prevent cache issues
	// NOTE FOR LATER VERSION - MAY REMOVE THIS IS TEXT OVERLAY IS DISABLED
	$content = preg_replace("!(<*?img.+?src.+?[\"'])(.+?\.(jpg|jpeg))!is", "$1$2?timestamp=".time(), $content);
   	return $content;
}

function ir_insert_scripts()
{
	wp_enqueue_script('jquery');
	wp_enqueue_style('thickbox');
	wp_enqueue_script('thickbox');
}

add_action('init', 'ir_insert_scripts');

add_action('admin_menu', 'ir_addmenus');

function ir_addmenus() {	 
	add_submenu_page( 'options-general.php', 'Imaguard', 'Imaguard', 'administrator', 'ir_settings', 'ir_settings');
}

function ir_settings() {
	include ('settings.php');	
}

?>
