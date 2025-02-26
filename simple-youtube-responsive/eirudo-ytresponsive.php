<?php
/*
Plugin Name: Simple YouTube Responsive
Plugin URI: https://eirudo.com/portfolios/wordpress-plugins/youtube-responsive
Text Domain: simple-youtube-responsive
Description: Embed YouTube video and Responsive using simple shortcode, and keep the video's Aspect Ratio. AMP & Lazy Load supported.
Version: 3.2.5
Author: Eirudo
Author URI: https://eirudo.com/
License: GPL2
Requires: WordPress version 2.5 and later
*/

// Block direct access
if ( !defined('ABSPATH') ){
	die;
}

define( 'EIRUDO_YTRESPONSIVE_VER', '3.2.5');
define( 'EIRUDO_YTRESPONSIVE_DIR', plugin_dir_path(__FILE__) );
define( 'EIRUDO_YTRESPONSIVE_URL', plugin_dir_url(__FILE__) );


require_once( EIRUDO_YTRESPONSIVE_DIR . 'fxs/fxs-core.php' );