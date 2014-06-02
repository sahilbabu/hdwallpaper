<?php
/**
 * @file
 * 
 */
 $file = "/home/wallrgb/public_html/wp-content/uploads/2014/05/Royale_Esders_Roadster_type_41_pic1.jpg";
 // $file = "http://www.wallrgb.com/wp-content/uploads/2014/05/Royale_Esders_Roadster_type_41_pic1.jpg";


    $info = new SplFileInfo($file);
    $file_extension = $info->getExtension();
    $file_basename = $info->getBasename();
    $file_name = $info->getFilename();
    //$size = $info->getSize();
   // $type = $info->getType();
    $real_path = $info->getRealPath();
    $info = $info->getFileInfo();
    $size = getimagesize($file);
    $filesize = filesize($file) * .0009765625; 
    print "<br/>file_extension : ".$file_extension;
    print "<br/>size : "; print_r($size);
    print "<br/>filesize : "; print_r($filesize);
    print "<br/>type : ".$type;
    print "<br/>file_name : ".$file_name;
    print "<br/>info : ".$info;
?>