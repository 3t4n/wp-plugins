<?php
/*
Plugin Name: Audemedia Tools
Plugin URI: http://audemedia.com
Description: Audemedia Tools extends functionality to Audemedia WordPress Themes
Version: 1.0.8
Author: Audemedia
Author Email: hello@audemedia.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html 
*/

add_filter( 'audemedia_tools-installed', '__return_true' );

if( ! defined('AUDEMEDIA_TOOLS_DIR') )
	define( 'AUDEMEDIA_TOOLS_DIR', WP_PLUGIN_URL . '/audemedia_tools' );

// PORTFOLIO CUSTOM POST TYPE
include_once( plugin_dir_path( __FILE__ ) . 'lib/class.audemedia_portfolio.php');
add_action( 'init', array('Portfolio_Post_Type', 'portfolio_init') );

// SERVICES CUSTOM POST TYPE
include_once( plugin_dir_path( __FILE__ ) . 'lib/class.audemedia_services.php');
add_action( 'init', array('Services_Post_Type', 'services_init') );

// TEAM CUSTOM POST TYPE
include_once( plugin_dir_path( __FILE__ ) . 'lib/class.audemedia_team.php');
add_action( 'init', array('Team_Post_Type', 'team_init') );

// SLIDER CUSTOM POST TYPE
include_once( plugin_dir_path( __FILE__ ) . 'lib/class.audemedia_slider.php');
add_action( 'init', array('Slider_Post_Type', 'slider_init') );

// TESTIMONIALS CUSTOM POST TYPE
include_once( plugin_dir_path( __FILE__ ) . 'lib/class.audemedia_testimonials.php');
add_action( 'init', array('Testimonials_Post_Type', 'testimonials_init') );

// SHORTCODES
function check_audemedia_shortcodes() {
	if(current_theme_supports('audemedia_shortcodes')) {
		include_once( plugin_dir_path( __FILE__ ) . 'lib/shortcodes.php');
	}
}
add_action('init', 'check_audemedia_shortcodes');

// METABOXES
include_once( plugin_dir_path( __FILE__ ) . 'lib/metabox/metaboxes.php');

// AUTHOR SOCIAL ICONS
function check_audemedia_author_social() {
	if(current_theme_supports('audemedia_author_social')) {
		include_once( plugin_dir_path( __FILE__ ) . 'lib/authorboxsocial.php');
	}
}
add_action('init', 'check_audemedia_author_social');


// WIDGETS
include_once( plugin_dir_path( __FILE__ ) . 'lib/widgets/widget-tweets.php');
include_once( plugin_dir_path( __FILE__ ) . 'lib/widgets/widget-latest-posts.php');
?>