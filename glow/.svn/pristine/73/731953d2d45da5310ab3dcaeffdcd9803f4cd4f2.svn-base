<?php
/*
Plugin Name: Glow Javascript Library
Plugin URI: http://www.ramoonus.nl/wordpress/glow/
Description: This plugin adds BBCs Glow Javascript library to your set-up.
Version: 2.0.0
Author: Ramoonus
Author URI: http://www.ramoonus.nl/
License: GPL2
*/

// Update glow
function rw_glow() {
		// glow
		wp_deregister_script('glow'); // deregister
		wp_enqueue_script('glow', plugins_url('/js/glow.js', __FILE__), false, '2.0.0');
		// Core
		wp_deregister_script('glow-core'); // deregister
		wp_enqueue_script('glow-core', plugins_url('/js/core.js', __FILE__), false, '2.0.0');
		// UI
		wp_deregister_script('glow-ui'); // deregister
		wp_enqueue_script('glow-ui', plugins_url('/js/ui.js', __FILE__), false, '2.0.0');
		// CSS
		wp_deregister_style('glow-ui'); // deregister
		wp_enqueue_style('glow-ui', plugins_url('/js/glow.js', __FILE__), false, '2.0.0');
}
// load
add_action('wp_enqueue_scripts', 'rw_glow');
?>