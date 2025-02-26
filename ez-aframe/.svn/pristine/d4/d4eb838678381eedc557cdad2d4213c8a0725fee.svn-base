<?php
/**
 * @package ez-aframe
 */
/*
Plugin Name: EZ Aframe
Description: A simple plugin that allows you to create, view and manage AFrame content in WordPress. Content editor and creation tool are included.
Version: 1.0.0
Author: Otaiz
Author URI: https://ko-fi.com/otaiz
License: GPLv2 or later
Text Domain: ez-aframe
*/

// Make sure we don't expose any info if called directly
if ( !function_exists( 'add_action' ) ) {
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}

// Create/update database on plugin loaded
function wpaframe_update_db_check() {
    WpAframe_Project::UpdateDbCheck();
}
add_action( 'plugins_loaded', 'wpaframe_update_db_check' );

include_once("inc/sec.php");
include_once("inc/viewer.php");
include_once("inc/studio.php");
include_once("inc/studioajax.php");
include_once("inc/project_db.php");

// Style and script
// Admin
add_action( 'admin_init', 'wpaframe_enqueue_style', 1000 );
// Front end
add_action('wp_enqueue_scripts', 'wpaframe_enqueue_style', 1000);
function wpaframe_enqueue_style() {
    wp_enqueue_script( 'aframe-core', plugin_dir_url( __FILE__ ) . 'assets/aframe.min.js' );
    wp_enqueue_script( 'jquery-ui-menu' );
    wp_enqueue_style( 'ez-aframe-style', plugin_dir_url( __FILE__ ) . 'assets/style.min.css' );
    wp_enqueue_script( 'simple-notify-script', plugin_dir_url( __FILE__ ) . 'assets/simple-notify.min.js' );
    wp_enqueue_style( 'simple-notify-style', plugin_dir_url( __FILE__ ) . 'assets/simple-notify.min.css' );

    wpaframe_enqueue_managed_scripts('ezaframe_enqueue_script', array(
        "aframe-enviropacks" => plugin_dir_url( __FILE__ ) . 'assets/aframe-enviropacks.js',
        "aframe-extra" => plugin_dir_url( __FILE__ ) . 'assets/aframe-extras.min.js',
    ));

    do_action( 'ezaframe_enqueue_script_and_style' );
}

// Admin menu
add_action('admin_menu', 'wpaframe_add_admin_page', 30);
function wpaframe_add_admin_page() {
    // Admin only
    if(!is_admin())
        return;

    add_menu_page(__('Dashboard', 'ez-aframe' ), __( 'EZ A-Frame', 'ez-aframe' ), 'manage_options', 'ez-aframe', 'wpaframe_admin_home', '', 20);

    // Add page
    add_submenu_page( 'ez-aframe', 'Dashboard', 'Dashboard', 'manage_options', 'ez-aframe', 'wpaframe_admin_home' );
    add_submenu_page( 'ez-aframe', 'AFrame Studio', 'Add New', 'manage_options', 'ez-aframe-add-new', 'wpaframe_admin_studio_page' );
}

function wpaframe_admin_home() {
    $list = new WpAframe_Project();

    echo '<div class="wrap">';

    echo '<h1 class="wp-heading-inline">Projects</h1><a href="' . admin_url( "admin.php?page=ez-aframe-add-new" ) . '" class="page-title-action">Add New</a>';
    
    // Search form
    echo "<form method='get' name='frm_search_post' action='" . esc_url($_SERVER['PHP_SELF']) . "'>";
    echo '<input type="hidden" name="page" value="' . esc_attr($_REQUEST['page']) . '" />
     <input type="hidden" name="paged" value="' . intval($_REQUEST['paged']) . '" />
     <input type="hidden" name="status" value="' . ( isset($_REQUEST['status']) ? intval($_REQUEST['status']) : "-1" ) . '" />
      <input type="hidden" name="s" value="' . esc_attr($_REQUEST['s']) . '" />';
    $list->search_box( "Search Project(s)", "search_post_id" );
    echo "</form>";

    echo '<form id="events-filter" method="post">
    <input type="hidden" name="page" value="' . esc_attr($_REQUEST['page']) . '" />';
    
    // Display project list
    echo $list->views();
    echo $list->display();
    
    echo '</form>';

    echo '</div>';
}

// Custom folder for project content screenshot.
add_filter('upload_dir', 'wpaframe_fix_upload_paths');
function wpaframe_fix_upload_paths( $data )
{
    $data['wpa-basedir'] = $data['basedir'] . '/sites/' . get_current_blog_id();
    $data['wpa-path'] = $data['wpa-basedir'] . $data['subdir'];
    $data['wpa-baseurl'] = $data['baseurl'] . '/sites/' . get_current_blog_id();
    $data['wpa-url'] = $data['wpa-baseurl'] . $data['subdir'];

    return $data;
}

// Add glb and gltf support to media library
add_filter( 'upload_mimes', 'wpaframe_mime_types', 1, 1 );
function wpaframe_mime_types( $mime_types ){
    $mime_types['glb'] = 'application/gltf-buffer';
    $mime_types['gltf'] = 'application/gltf-buffer';

    return $mime_types;
}
