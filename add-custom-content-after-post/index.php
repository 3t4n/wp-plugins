<?php
/**
Plugin Name: Add custom content after Post
Plugin URI: 
Description: 
Author: Fabio Zuanon
Version: 1.0
Author URI: 
*/

//aggiungo voce di menu nel back office
require( dirname(__FILE__) . '/' . 'admin/index.php');

add_action('the_content', 'acc_addText');
function acc_addText($content) {
	$text = get_option('acc_content');
	$content = $content . $text;
	return $content;
}
?>