<?php
/*
Plugin Name: Photo URL
Description: Replaces photo URL's wrapped in "[" and "]" with embed code for that photo. 
Version: 1.1
Author: LMP
Author URI: http://liamparker.com/
*/
function photo_url($content){
$patterns = array("/\[(([^\n]+)(.jpg|.png))\]/");
$replacements = array("<a href='$1'><img src='$1'/></a>");
return preg_replace($patterns , $replacements, $content);
}
function photo_replace(){
	ob_start('photo_url');
}
add_action('template_redirect', 'photo_replace'); 
?>