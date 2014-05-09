<?php

function ir_get_domain($url)
{
	$nowww = ereg_replace('www\.','',$url);
	$domain = parse_url($nowww);
	
	preg_match("/[^\.\/]+\.[^\.\/]+$/", $nowww, $matches);
	
	if(count($matches) > 0)
	{
		return $matches[0];
	}
	else
	{
		return FALSE;
	}
}

function ir_resize_dimensions($goal_width,$goal_height,$width,$height) { 
    $return = array('width' => $width, 'height' => $height); 

    // If the ratio > goal ratio and the width > goal width resize down to goal width 
    if ($width/$height > $goal_width/$goal_height && $width > $goal_width) { 
        $return['width'] = $goal_width; 
        $return['height'] = $goal_width/$width * $height; 
    } 
    // Otherwise, if the height > goal, resize down to goal height 
    else if ($height > $goal_height) { 
        $return['width'] = $goal_height/$height * $width; 
        $return['height'] = $goal_height; 
    } 

    return $return; 
}

function ir_random_cb($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}

?>