<?php
/*
	Plugin Name: Artificial ScrollUp
	Plugin URI: http://www.rapiditsolution.ciki.me/rapid/artificial-scrollup
	Author: Reyad Hossain
	Author URI: http://www.rapiditsolution.ciki.me/rapid
	Description: Scroll page bottom to top.
	Version: 1.0
*/

define('ARTIFICIAL_CUSTOM_SCROLLUP_PLUGIN_PATH', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );

function rapid_custom_scrollup_jquery(){
	wp_enqueue_script('jquery');
}
add_action('init' , 'rapid_custom_scrollup_jquery');

wp_enqueue_script('artificial-scrollup-custom-scroll-up-easing-js', ARTIFICIAL_CUSTOM_SCROLLUP_PLUGIN_PATH.'js/jquery.easing.min.js', array('jquery'));
wp_enqueue_script('artificial-scrollup-custom-scroll-up-scrollup-js', ARTIFICIAL_CUSTOM_SCROLLUP_PLUGIN_PATH.'js/jquery.scrollUp.min.js', array('jquery'));


function artificial_scrollup_custom_function()
{
	?>
	<script type="text/javascript">
		jQuery(document).ready(function() {
	jQuery.scrollUp({
		        scrollName: 'scrollUp', // Element ID
		        scrollDistance: 300, // Distance from top/bottom before showing element (px)
		        scrollFrom: 'top', // 'top' or 'bottom'
		        scrollSpeed: 500, // Speed back to top (ms)
		        easingType: 'linear', // Scroll to top easing (see http://easings.net/)
		        animation: 'fade', // Fade, slide, none
		        animationInSpeed: 200, // Animation in speed (ms)
		        animationOutSpeed: 200, // Animation out speed (ms)
		        scrollText: 'Top', // Text for element, can contain HTML
		        scrollTitle: false, // Set a custom <a> title if required. Defaults to scrollText
		        scrollImg: false, // Set true to use image
		        activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
		        zIndex: 2147483647 // Z-Index for the overlay
			});
	});
	</script>
	
	<style type="text/css">
		a#scrollUp{
		background-color: #2C2C2C;
		border-radius: 5px;
		-moz-border-radius: 5px;
		-webkit-border-radius: 5px;
		-o-border-radius: 5px;
		bottom: 35px;
		color: #DDDDDD;
		font-weight: bold;
		padding: 10px;
		right: 25px;
		text-decoration: none;
		transition:all .8s ease;
		-moz-transition:all .8s ease;
		-webkit-transition:all .8s ease;
		-o-transition:all .8s ease;
	}
	a#scrollUp:hover{
		background-color:#DDDDDD;
		color:#2C2C2C;
		transition:all .8s ease;
		-moz-transition:all .8s ease;
		-webkit-transition:all .8s ease;
		-o-transition:all .8s ease;
	}
		
	</style>
	
	<?php
}

add_action('wp_head', 'artificial_scrollup_custom_function');

?>