<?php 
/*
Plugin Name: Super Smooth Scroll
Plugin URI: http://plugins.wpflaty.com/super-smooth-scroll/
Version: 1.0
Description: This plugin will change your browser old scrollbar to nice and smooth scrollbar. Just get it, install it and see the magic! 
Author: Tamim , wpflaty.com
Author URI: http://wpflaty.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

// Enqueue scripts

function sss_scripts(){
	wp_enqueue_script('super-smooth-scroll',plugins_url( '/js/jquery.nicescroll.min.js' , __FILE__ ),array( 'jquery' ));
}

add_action('wp_enqueue_scripts','sss_scripts');

// initialize the plugin
function sss_init(){ ?>

<script type="text/javascript">
	jQuery(document).ready(function() {
		jQuery("html").niceScroll();
	});
</script>
<?php }

add_action('wp_footer','sss_init');
 ?>