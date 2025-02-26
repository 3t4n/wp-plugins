<?php
/*
Plugin Name: Add HTML to Page
Plugin URI: http://www.itchimes.com
Description: Very simple to add .html to pages only.
Version: 1.0
Author: Dinesh Panchal
Author URI: http://www.itchimes.com
License: GPL2
*/
?>
<?php
add_action('init', 'htmlPage_permalink', -1);
register_activation_hook(__FILE__, 'active');
register_deactivation_hook(__FILE__, 'deactive');


function noPage_slash($string, $type){
   global $wp_rewrite;
	if ($wp_rewrite->using_permalinks() && $wp_rewrite->use_trailing_slashes==true && $type == 'page'){
		return untrailingslashit($string);
  }else{
   return $string;
  }
}

function htmlPage_permalink() {
	global $wp_rewrite;
 if ( !strpos($wp_rewrite->get_page_permastruct(), '.html')){
		$wp_rewrite->page_structure = $wp_rewrite->page_structure . '.html';
 }
}
add_filter('user_trailingslashit', 'noPage_slash',66,2);

function active() {
	global $wp_rewrite;
	if ( !strpos($wp_rewrite->get_page_permastruct(), '.html')){
		$wp_rewrite->page_structure = $wp_rewrite->page_structure . '.html';
 }
  $wp_rewrite->flush_rules();
}	
function deactive() {
	global $wp_rewrite;
	$wp_rewrite->page_structure = str_replace(".html","",$wp_rewrite->page_structure);
	$wp_rewrite->flush_rules();
}
?>