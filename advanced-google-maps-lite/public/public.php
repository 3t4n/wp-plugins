<?php
defined( 'ABSPATH' ) or die();

require_once( 'WL_AGM_LITE_Language.php' );
require( 'WL_AGM_LITE_Shortcode.php' );
require_once( 'WL_AGM_LITE_Widget.php' );

add_action( 'plugins_loaded', array( 'WL_AGM_LITE_Language', 'load_translation' ) );

/* Enqueue Assets for shortcodes */
add_action( 'wp_enqueue_scripts', array( 'WL_AGM_LITE_Shortcode', 'shortcode_enqueue_assets' ) );

/* Location Shortcode files */
add_shortcode( 'WL_AGM_LOCATION', array( 'WL_AGM_LITE_Shortcode', 'create_location_front' ) );

/* Route Shortcode files */
add_shortcode( 'WL_AGM_Route', array( 'WL_AGM_LITE_Shortcode', 'create_route_front' ) );

/* Map Shortcode files */
add_shortcode( 'WL_AGM_Map', array( 'WL_AGM_LITE_Shortcode', 'create_map_front' ) );

/* Intractive Map Shortcode files */
add_shortcode( 'WL_AGM_I_Map', array( 'WL_AGM_LITE_Shortcode', 'create_interactive_map_front' ) );

/* Registor google map widget */
add_action( 'widgets_init', array( 'WL_AGM_LITE_Widget', 'register_widgets' ) );
