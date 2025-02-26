<?php
/*
Plugin Name: WordPress fancy XMAS-Calendar
Plugin URI: https://wordpress.org/plugins/lmt-xmas-calendar/
Description: WordPress fancy XMAS-Calendar.
Author: LEMONTEC
Author URI: https://lemontec.at/
Version: 1.0.0
License: GPLv2 or later
Requires at least: 4
Requires PHP:      7.2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: lmt-xmas-calendar
*/

require_once('inc/inc-backend.php');
require_once('inc/acf-fields.php');

// Define path and URL to the ACF plugin.
define( 'LMT_XMAS_CALENDAR_PATH', plugin_dir_url( __FILE__ ));
define( 'LMT_XMAS_CALENDAR_ACF_PATH', plugin_dir_path(__FILE__) . '/acf/' );
define( 'LMT_XMAS_ACF_URL', plugin_dir_url( __FILE__ ) . '/acf/' );

// Include the ACF plugin.
include_once( LMT_XMAS_CALENDAR_ACF_PATH . 'acf.php' );

// Customize the url setting to fix incorrect asset URLs.
add_filter('acf/settings/url', 'lmt_xmas_calendar_acf_settings_url');
function lmt_xmas_calendar_acf_settings_url( $url ) {
    return LMT_XMAS_ACF_URL;
}

// Register Custom Post Type
function lmt_xmas_calendar_post_type() {
	$labels = array(
		'name'                  => _x( 'XMAS Calendar', 'Post Type General Name', 'lmt-xmas-calendar' ),
		'singular_name'         => _x( 'XMAS Calendar', 'Post Type Singular Name', 'lmt-xmas-calendar' ),
		'menu_name'             => __( 'XMAS Calendar', 'lmt-xmas-calendar' ),
		'name_admin_bar'        => __( 'XMAS Calendar', 'lmt-xmas-calendar' ),
		'archives'              => __( 'XMAS Calendar Archive', 'lmt-xmas-calendar' ),
		'attributes'            => __( 'Item Attributes', 'lmt-xmas-calendar' ),
		'parent_item_colon'     => __( 'Parent Item:', 'lmt-xmas-calendar' ),
		'all_items'             => __( 'All Items', 'lmt-xmas-calendar' ),
		'add_new_item'          => __( 'Add New Item', 'lmt-xmas-calendar' ),
		'add_new'               => __( 'Add New', 'lmt-xmas-calendar' ),
		'new_item'              => __( 'New Item', 'lmt-xmas-calendar' ),
		'edit_item'             => __( 'Edit Item', 'lmt-xmas-calendar' ),
		'update_item'           => __( 'Update Item', 'lmt-xmas-calendar' ),
		'view_item'             => __( 'View Item', 'lmt-xmas-calendar' ),
		'view_items'            => __( 'View Items', 'lmt-xmas-calendar' ),
		'search_items'          => __( 'Search Item', 'lmt-xmas-calendar' ),
		'not_found'             => __( 'Not found', 'lmt-xmas-calendar' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'lmt-xmas-calendar' ),
		'featured_image'        => __( 'Winner image', 'lmt-xmas-calendar' ),
		'set_featured_image'    => __( 'Set winner image', 'lmt-xmas-calendar' ),
		'remove_featured_image' => __( 'Remove featured image', 'lmt-xmas-calendar' ),
		'use_featured_image'    => __( 'Use as featured image', 'lmt-xmas-calendar' ),
		'insert_into_item'      => __( 'Insert into item', 'lmt-xmas-calendar' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'lmt-xmas-calendar' ),
		'items_list'            => __( 'Items list', 'lmt-xmas-calendar' ),
		'items_list_navigation' => __( 'Items list navigation', 'lmt-xmas-calendar' ),
		'filter_items_list'     => __( 'Filter items list', 'lmt-xmas-calendar' ),
	);
	$args = array(
		'label'                 => __( 'XMAS Calendar', 'lmt-xmas-calendar' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-calendar-alt',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => false,
		'has_archive'           => true,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'          => false,
	);
	register_post_type( 'xmas-calendar', $args );

    flush_rewrite_rules();
}
add_action( 'init', 'lmt_xmas_calendar_post_type', 0 );

// DELETE CPT ON UNINSTALL
register_uninstall_hook( __FILE__, 'lmt_xmas_calendar_plugin_uninstall' );
function lmt_xmas_calendar_plugin_uninstall() {
    // Uninstallation stuff here
    unregister_post_type( 'xmas-calendar' );
}


// SETUP PLUGIN
register_activation_hook( __FILE__, 'lmt_xmas_calendar_create_post' );
function lmt_xmas_calendar_create_post() {
  if ( ! current_user_can( 'activate_plugins' ) ) return;
  
  global $wpdb;
  $order_array = array(19, 8, 20, 3, 16, 23, 5, 22, 13, 2, 10, 17, 4, 11, 9, 6, 24, 15, 7, 18, 14, 21, 1, 12);
  $color_array = array("#2572B2", "#8F001D", "#6EB3DE", "#6EB3DE", "#FFFFFF", "#75B72B", "#75B72B", "#6EB3DE", "#9BC36A", "#FFFFFF", "#8F001D", "#FFFFFF", "#FFFFFF", "#2572B2", "#2572B2", "#9BC36A", "#FFFFFF", "#FFFFFF", "#FFFFFF", "#8F001D", "#004997", "#8F001D", "#004997", "#004997");
  $args = array('fields' => 'ids', 'post_type'   => 'xmas-calendar');
  $posts = get_posts($args);
  if(! $posts) {
     
    $current_user = wp_get_current_user();
    
	$index = 0;
    for ($x = 1; $x <= 24; $x++) {
        // create post object
        $page = array(
        'post_title'  => __($x),
        'post_status' => 'publish',
        'post_author' => $current_user->ID,
        'post_type'   => 'xmas-calendar',
        );
        
        // insert the post into the database
        $id = wp_insert_post( $page );
		update_post_meta( $id, 'lmt_xmas_calendar_order', $order_array[$index]);
		update_post_meta( $id, 'lmt_xmas_calendar_bg_color', $color_array[$index]);

		// DEFAULT
		
		$setting['lmt_xmas_calendar_text_field_1'] = '#7a0018';
		$setting['lmt_xmas_calendar_text_field_2'] = 'Das Türchen <br> wurde bereits geöffnet.';
		$setting['lmt_xmas_calendar_text_field_3'] = 'Adventkalender';
		$setting['lmt_xmas_calendar_text_field_4'] = '#cremixandchill';
		$setting['lmt_xmas_calendar_text_field_5'] = 'https://www.facebook.com/bleibfrisch';
		$setting['lmt_xmas_calendar_text_field_6'] = 'Vielen Dank für deine Teilnahme! <br>Mit etwas Glück sicherst du dir den Preis.';
		$setting['lmt_xmas_calendar_text_field_7'] = 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam <br> nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam<br> erat, sed diam voluptua. At vero eos et accusam et justo duo dolores';

		//Update entire array
		update_option('lmt_xmas_calendar_settings', $setting);

		$index++;
    }
  }
}

// CUSTOM ARCHIVE PAGE
function lmt_xmas_calendar_get_custom_post_type_template( $archive_template ) {
	global $post;

	if( is_post_type_archive ( 'xmas-calendar' ) && $_GET['lmt-xmas-calendar-thankyou'] != true) {
		$archive_template = dirname( __FILE__ ) . '/templates/xmas-calendar-archive.php';
	} elseif($_GET['lmt-xmas-calendar-thankyou'] == true) {
		$archive_template = dirname( __FILE__ ) . '/templates/thankyou-template.php';
	}
	return $archive_template;
}
add_filter( 'archive_template', 'lmt_xmas_calendar_get_custom_post_type_template' ) ;

// CUSTOM SINGLE PAGE
function lmt_xmas_calendar_get_custom_post_type_template_single( $single_template ) {
	global $post;

	if( is_singular( 'xmas-calendar' ) ) {
		 $single_template = dirname( __FILE__ ) . '/templates/xmas-calendar-single.php';
	}
	return $single_template;
}
add_filter( 'single_template', 'lmt_xmas_calendar_get_custom_post_type_template_single' ) ;


// STYLES
function lmt_xmas_calendar_css_stylesheet() {
	$plugin_url = plugin_dir_url( __FILE__ );

	if(is_singular( 'xmas-calendar' ) || is_post_type_archive ( 'xmas-calendar' )) {
		wp_enqueue_style( 'lmt-snow-style', $plugin_url . 'assets/css/snow.css' );
		wp_enqueue_style( 'lmt-xmas-style', $plugin_url . 'assets/css/style.css' );
	}	
}
add_action( 'wp_enqueue_scripts', 'lmt_xmas_calendar_css_stylesheet' );



function lmt_xmas_calendar_wp_head()
{
    if( is_singular( 'xmas-calendar' ) ) {
        echo '<meta name="robots" content="noindex, follow">';
    } 
}
add_action('wp_head', 'lmt_xmas_calendar_wp_head');