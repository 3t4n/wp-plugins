<?php
/*
Plugin Name: Ajax More Posts
Description: Load more posts via Ajax
Version: 0.1
Author: Michael Restuccia
*/

function awp_click_link() {
	$home = is_home();
	$admin = admin_url( 'admin-ajax.php' );
	if (is_home() || ($admin == currentPage())) {
			echo '<a rel="nofollow" href="#" id="more-posts-button">Read More Articles</a>';	
	}
	
}

function awp_get_more_posts() {
	global $query_string;
	$offset = $_POST['offset'] * 5;
	$query_string .= "&offset=$offset&cat=-833,-843&post_status=publish'";
	query_posts($query_string);
	include TEMPLATEPATH . '/loop.php';
	die();
}

// embed the javascript file that makes the AJAX request


function currentPage() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}


wp_enqueue_script( 'my-ajax-request', plugins_url() . '/ajax-more-posts/js/ampscripts.js', array( 'jquery' ) );
wp_localize_script( 'my-ajax-request', 'wpajax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
wp_enqueue_script( 'ajax-more-posts', plugins_url() . '/ajax-more-posts/js/ampscripts.js' , array(), '1.0', true );
add_action('wp_ajax_nopriv_get_more_posts', 'awp_get_more_posts');
add_action('wp_ajax_get_more_posts', 'awp_get_more_posts');
add_action('loop_end', 'awp_click_link');
?>