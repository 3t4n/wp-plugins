<?php 
/* ===================================
Plugin Name:       Comment Form WP
Plugin URI:        https://plugin.habibcoder.com/comment-form-wp/hello-world/
Author:            HabibCoder
Author URI:        http://habibcoder.com
Version:           2.0.0
Required at least: 6.0
Required PHP:      7.0
Tested up to:      6.7
License:           General Public License v-2 or later
License URI:       http://www.gnu.org/licenses/gpl-2.0.html
Tags: comment form, advanced comment form, comment field change, WordPress Comment Form, Customize Comment Form
Description: WordPress default comment form can modified by the Comment Form WP Plugin. You can remove/add/change comment fields and texts with more functionality.
Text Domain:       comment-form-wp
=================================== */

// ABSPATH Defined
if (! defined('ABSPATH')) {
	exit('not valid');
}


/* ==========================
	Register Text Domain
========================== */
add_action('plugins_loaded', 'commentformwp_load_textdomain');
function commentformwp_load_textdomain(){
    load_plugin_textdomain('comment-form-wp', false, dirname( plugin_basename( __FILE__ ) ) . '/languages');
}


/* ==================================================
	Get Plugin Directory & URL and Define Constant
================================================== */
//Get plugin Dir & Url
$commentformwp_dir = plugin_dir_path( __FILE__ ); 
$commentformwp_url = plugin_dir_url( __FILE__ );

//Define Dir & Url as a Constants
define( 'COMMENTFORMWP_PLUGIN_DIR', $commentformwp_dir );
define( 'COMMENTFORMWP_PLUGIN_URL', $commentformwp_url );


/* ==========================
	Requires File
========================== */
// Dashboard Require
$commentformwp_admin_dir = COMMENTFORMWP_PLUGIN_DIR .'form-backend/commentformwp-backend.php';
if(file_exists( $commentformwp_admin_dir )){
	require_once( $commentformwp_admin_dir );
}
// Frontend
$commentformwp_frontend_dir = COMMENTFORMWP_PLUGIN_DIR .'form-frontend/commentformwp-frontend.php';
if(file_exists( $commentformwp_frontend_dir )){
	require_once( $commentformwp_frontend_dir );
}

/* ============================
	Enqueue in Admin Panel
============================ */
add_action('admin_enqueue_scripts', 'commentformwp_admin_enqueue');
function commentformwp_admin_enqueue(){
    // Scripts
    wp_enqueue_script('jquery');
    wp_enqueue_script('jquery-ui-tabs');
    // Stylesheet
	wp_enqueue_style('commentformwp-style', PLUGINS_URL('css/commentformwp-backend.css', __FILE__), array(), '1.0.0', 'all');
}



/* ==========================
	Redirect to plugin
========================== */
register_activation_hook( __FILE__, 'commentformwp_plugin_activation' );
function commentformwp_plugin_activation(){
    add_option('commentformwp_plugin_do_activate', true);
}

add_action('admin_init', 'commentformwp_plugin_redirect');
function commentformwp_plugin_redirect(){
    if (is_admin() && get_option('commentformwp_plugin_do_activate', false)) {
        delete_option('commentformwp_plugin_do_activate');

        if (!isset($_GET['active_multi'])) {
            wp_safe_redirect( admin_url('tools.php?page=comment-form-wp') );
            exit;
        }

    }
};