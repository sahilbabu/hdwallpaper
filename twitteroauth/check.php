<?php

/**
 * @file
 * 
 */
$file = "/home/wallrgb/public_html/wp-content/uploads/2014/05/tw_back1.jpg";
// $file = "http://www.wallrgb.com/wp-content/uploads/2014/05/Royale_Esders_Roadster_type_41_pic1.jpg";


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

print "<pre>"; print_r($file_info); print "</pre>";
?>