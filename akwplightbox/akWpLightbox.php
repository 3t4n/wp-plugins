<?php
/*
Plugin Name: akWpLightbox
Plugin URI: http://amiworks.co.in/talk/akwplightbox/
Description: It converts all the image in a post that are linked to larger images, to open with lightbox effect. it uses Stephane Caron's prettyPhoto jquery library to achive the effect.
Author: Amit kumar singh
Version: 1.1.0
Author URI: http://amiworks.co.in/talk
	This is a WordPress plugin (http://wordpress.org).
*/
define('AKDIR', 'akwpLightbox');                
add_action('wp_head','AddJquery');

wp_enqueue_script("jquery");
function AddJquery()
{
		echo"
	<link rel='stylesheet' href='".get_option('siteurl')."/wp-content/plugins/".AKDIR."/css/prettyPhoto.css' type='text/css' media='screen' charset='utf-8' />
	<script src='".get_option('siteurl')."/wp-content/plugins/".AKDIR."/js/prettyPhoto.js' type='text/javascript' charset='utf-8'></script>
	<script>
		jQuery(document).ready(function(){
			setupImages();
			prettyPhoto.init();
		});
		function setupImages()
		{
			jQuery(\"a[href$='jpg']\").attr('rel','prettyOverlay');
			jQuery(\"a[href$='gif']\").attr('rel','prettyOverlay');
			jQuery(\"a[href$='png']\").attr('rel','prettyOverlay');
		}
	</script>
	";
}

