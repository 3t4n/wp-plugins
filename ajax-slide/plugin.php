<?php
/*
Plugin Name: AJAX Slide
Plugin URI: http://mr.hokya.com/ajax-slide
Description: Gives sliding animation on your page whenever you are going to go to another link using AJAX.
Version: 2.21
Author: Julian Widya Perdana
Author URI: http://mr.hokya.com/
*/


function ajax_slide () {
	$home = get_option("home");
	echo "<script src='$home/wp-content/plugins/ajax-slide/jquery.js'></script>\n";
	echo "<script src='$home/wp-content/plugins/ajax-slide/slide.js'></script>";
}

function ajax_slide_notify() {
	echo "<p>Thanks for using <strong><a href='http://mr.hokya.com/ajax-slide/' target='_blank'>AJAX Slide</a></strong> to animate your pages on every clicks.</p>";
}

function ajax_slide_js () {
	echo "<noscript><em>Please enable JavaScript on your browser to see <a href='http://mr.hokya.com/ajax-slide/' target='_blank'>AJAX Slide</a> animating this page.</em></noscript>";
}

add_action('wp_head', 'ajax_slide');
add_action('rightnow_end','ajax_slide_notify');
add_action('get_footer','ajax_slide_js');

?>