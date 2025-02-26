<?php
/*
 * Plugin Name: Simple Slideshow
 * Plugin URI: http://www.agence-web-cvmh.fr
 * Description: A very simple slideshow.
 * Version: 1.2.15
 * Author: CVMH solutions
 * Author URI: http://www.agence-web-cvmh.fr
 * License: GPLv2 or later
 * Text Domain: cvmh-simple-slideshow
 * Domain Path: /languages
 */

defined( 'ABSPATH' ) or exit;

define( 'CVMH_SLIDESHOW_VERSION'       , '1.2.15' );
define( 'CVMH_SLIDESHOW_SLUG'          , 'cvmh_slideshow' );
define( 'CVMH_SLIDESHOW_PATH'          , plugin_dir_path( __FILE__ ) ) . '/';
define( 'CVMH_SLIDESHOW_INC_PATH'      , CVMH_SLIDESHOW_PATH . 'includes/' ) ;
define( 'CVMH_SLIDESHOW_FUNCTIONS_PATH', CVMH_SLIDESHOW_INC_PATH . 'functions/' );
define( 'CVMH_SLIDESHOW_CLASSES_PATH'  , CVMH_SLIDESHOW_INC_PATH . 'classes/' );
define( 'CVMH_SLIDESHOW_3RD_PARTY_PATH', CVMH_SLIDESHOW_INC_PATH . '3rd-party/' );

require_once( CVMH_SLIDESHOW_CLASSES_PATH . 'widget.php' );

/*
 * Tell WP what to do when plugin is loaded
 * 
 * @since 1.1.3
 */
add_action( 'init', 'cvmh_slideshow_init' );
function cvmh_slideshow_init() {
    // Load translations
    load_plugin_textdomain( 'cvmh-simple-slideshow', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

    // Call options
    $options = json_decode( get_option( CVMH_SLIDESHOW_SLUG ), true );
    if ( empty ( $options ) ) :
        // Default options
        $default_options = array(
            'width' => 1920,
            'height' => 710,
            'duration' => 7000,
            'show_nav' => 1,
            'fields' => array(
                __( 'Title', 'cvmh-simple-slideshow' ),
                __( 'Subtitle', 'cvmh-simple-slideshow' ),
            ),
            'uninstall_delete' => 1,
        );
        update_option( CVMH_SLIDESHOW_SLUG, json_encode( $default_options ) );
    endif;
    
    // Add an image size
    add_image_size( CVMH_SLIDESHOW_SLUG, $options['width'], $options['height'], true );

    // Register custom post type
    $labels = array(
        "name"               => __( "Slides", 'cvmh-simple-slideshow' ),
        "singular_name"      => __( "Slide", 'cvmh-simple-slideshow' ),
        "menu_name"          => __( "Slideshow", 'cvmh-simple-slideshow' ),
        "all_items"          => __( "All slides", 'cvmh-simple-slideshow' ),
        "add_new"            => __( "Add new", 'cvmh-simple-slideshow' ),
        "add_new_item"       => __( "Add new slide", 'cvmh-simple-slideshow' ),
        "edit"               => __( "Edit", 'cvmh-simple-slideshow' ),
        "edit_item"          => __( "Edit slide", 'cvmh-simple-slideshow' ),
        "new_item"           => __( "New slide", 'cvmh-simple-slideshow' ),
        "view"               => __( "View", 'cvmh-simple-slideshow' ),
        "view_item"          => __( "View slide", 'cvmh-simple-slideshow' ),
        "search_items"       => __( "Search slide", 'cvmh-simple-slideshow' ),
        "not_found"          => __( "No slides found", 'cvmh-simple-slideshow' ),
        "not_found_in_trash" => __( "No slides found in Trash", 'cvmh-simple-slideshow' ),
        "parent"             => __( "Parent slide", 'cvmh-simple-slideshow' ),
    );
    $args = array(
        "labels"              => $labels,
        "description"         => "",
        "public"              => true,
        "show_ui"             => true,
        "has_archive"         => false,
        "show_in_menu"        => true,
        "show_in_nav_menus"   => false,
        "exclude_from_search" => true,
        "capability_type"     => "post",
        "map_meta_cap"        => true,
        "hierarchical"        => false,
        "rewrite"             => false,
        "query_var"           => true,
        "menu_icon"           => "dashicons-format-gallery",
        "supports"            => false,
    );
    register_post_type( CVMH_SLIDESHOW_SLUG, $args );
    
    // Register taxonomy
    if ( $options['categories'] == 1 ) :
        $tax_labels = array(
            'name'                       => __( 'Categories', 'cvmh-simple-slideshow' ),
            'singular_name'              => __( 'Category', 'cvmh-simple-slideshow' ),
            'all_items'                  => __( 'All categories', 'cvmh-simple-slideshow' ),
            'edit_item'                  => __( 'Edit category', 'cvmh-simple-slideshow' ),
            'view_item'                  => __( 'View category', 'cvmh-simple-slideshow' ),
            'update_item'                => __( 'Update category', 'cvmh-simple-slideshow' ),
            'add_new_item'               => __( 'Add new category', 'cvmh-simple-slideshow' ),
            'new_item_name'              => __( 'New category name', 'cvmh-simple-slideshow' ),
            'search_items'               => __( 'Search categories', 'cvmh-simple-slideshow' ),
            'popular_items'              => __( 'Popular categories', 'cvmh-simple-slideshow' ),
            'separate_items_with_commas' => __( 'Separate categories with commas', 'cvmh-simple-slideshow' ),
            'add_or_remove_items'        => __( 'Add or remove categories', 'cvmh-simple-slideshow' ),
            'choose_from_most_used'      => __( 'Choose from most used', 'cvmh-simple-slideshow' ),
            'not_found'                  => __( 'Not found', 'cvmh-simple-slideshow' ),
        );
        $tax_args   = array(
            "labels"            => $tax_labels,
            "show_in_nav_menus" => false,
            "show_admin_column" => true,
            "hierarchical"      => true
        );
        register_taxonomy( CVMH_SLIDESHOW_SLUG . '_category', CVMH_SLIDESHOW_SLUG, $tax_args );
    endif;

    require_once( CVMH_SLIDESHOW_FUNCTIONS_PATH . 'order.php' );

    if ( is_admin() ) :
        require_once( CVMH_SLIDESHOW_FUNCTIONS_PATH . 'admin.php' );
        require_once( CVMH_SLIDESHOW_3RD_PARTY_PATH . 'wordpress-seo.php' );
    else :
        require_once( CVMH_SLIDESHOW_FUNCTIONS_PATH . 'front.php' );
    endif;

}

/*
 * Tell WP what to do when plugin is deactivated
 *
 * @since 1.0
 */
register_deactivation_hook( __FILE__, 'cvmh_slideshow_deactivation' );
function cvmh_slideshow_deactivation() {
    flush_rewrite_rules();
}