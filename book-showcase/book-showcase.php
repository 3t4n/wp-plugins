<?php
/**
 * @package Book Showcase
 */
/*
Plugin Name: Book Showcase
Plugin URI: http://adlplugins.com/book-showcase
Description: Book Showcase is a very beautiful WordPress plugin to showcase your books for your readers or users. It is a very easy-to-use plugin.
Version: 1.2
Author: ADL Plugins
Author URI: http://adlplugins.com
License: GPLv2 or later
Domain Path: /languages/
Text Domain: book-showcase
*/


/**
 * Deny direct access
 */
if (!defined('BS3D_ALERT_MSG')) define( 'BS3D_ALERT_MSG', __( 'Sorry! This is not your place!', 'book-showcase' ) );
if ( !defined('ABSPATH') ) die( BS3D_ALERT_MSG );


// check for required php version and deactivate the plugin if php version is less.
if ( version_compare( PHP_VERSION, '5.4', '<' )) {
    add_action( 'admin_notices', 'bs3d_notice' );
    function bs3d_notice() { ?>
        <div class="error"> <p>
                <?php
                echo 'Book Showcase requires minimum PHP 5.4 to function properly. Please upgrade PHP version. The Plugin has been auto-deactivated.. You have PHP version '.PHP_VERSION;
                ?>
            </p></div>
        <?php
        if ( isset( $_GET['activate'] ) ) {
            unset( $_GET['activate'] );
        }
    }

    // deactivate the plugin because required php version is less.
    add_action( 'admin_init', 'bookshowcase_deactivate_self' );
    function bookshowcase_deactivate_self() {
        deactivate_plugins( plugin_basename( __FILE__ ) );
    }
    return;
}

/*
 * All Constants
 */
if (!defined('BS3D_VERSION')) define( 'BS3D_VERSION', '1.0.0' );
if (!defined('BS3D_MINIMUM_WP_VERSION')) define( 'BS3D_MINIMUM_WP_VERSION', '4.4' );
if (!defined('BS3D_PLUGIN_DIR')) define( 'BS3D_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
if (!defined('BS3D_PLUGIN_URI')) define( 'BS3D_PLUGIN_URI', plugins_url('', __FILE__) );
if (!defined('BS3D_TEXTDOMAIN')) define( 'BS3D_TEXTDOMAIN', 'book-showcase' );



/*
 * All Includes
 */

require_once BS3D_PLUGIN_DIR . 'includes/bs3d-cpt.php';
require_once BS3D_PLUGIN_DIR . 'includes/bs3d-cpt-columns.php';
require_once BS3D_PLUGIN_DIR . 'includes/bs3d-image-resizer.php';
require_once BS3D_PLUGIN_DIR . 'includes/bs3d-metabox.php';
require_once BS3D_PLUGIN_DIR . 'includes/bs3d-save-metabox.php';
require_once BS3D_PLUGIN_DIR . 'includes/bs3d-pagination.php';
require_once BS3D_PLUGIN_DIR . 'includes/bs3d-shortcodes.php';

/*
 * Register and enqueue styles and scripts
 */
// add scripts and style for front-end
function bs3d_enqueue_scripts() {
    // styles
    wp_register_style('bs3d-component-1-style', BS3D_PLUGIN_URI . '/css/bs3d-component.css', false, BS3D_VERSION);
    wp_register_style('bs3d-default-style', BS3D_PLUGIN_URI . '/css/bs3d-default.css', false, BS3D_VERSION);
    //scripts
    wp_register_script('bs3d-book-1-js', BS3D_PLUGIN_URI . '/js/bs3d-book-1.js', array('jquery'), BS3D_VERSION, true);
    wp_register_script('bs3d-main-js', BS3D_PLUGIN_URI . '/js/bs3d-main.js', array('jquery', 'bs3d-book-1-js'), BS3D_VERSION, true);
 }

add_action('wp_enqueue_scripts', 'bs3d_enqueue_scripts');


// add scripts and styles for back-end
function bs3d_admin_enqueue_scripts( ){
    global $typenow;
    if ( 'bs3dbook' == $typenow || 'bs3d_sgenerator' == $typenow ) {
        wp_enqueue_style('bs3d-cmb2-style', BS3D_PLUGIN_URI . '/css/cmb2.min.css', false, BS3D_VERSION);
        wp_enqueue_style('bs3d-admin-style', BS3D_PLUGIN_URI . '/css/bs3d-admin.css', false, BS3D_VERSION);

        wp_enqueue_script('bs3d-metabox-options-js', BS3D_PLUGIN_URI . '/js/bs3d-metabox-options.js', array('jquery','wp-color-picker'), BS3D_VERSION, true);
        wp_enqueue_style('wp-color-picker');
        wp_enqueue_media();

    }
}
add_action('admin_enqueue_scripts', 'bs3d_admin_enqueue_scripts');


/**
 * Enables shortcode for Widget
 */
add_filter('widget_text', 'do_shortcode');

/*
 * Load Text domain after plugin has been loaded
 * */
add_action('plugins_loaded', 'bs3d_load_textdomain');
function bs3d_load_textdomain(){
    load_plugin_textdomain(BS3D_TEXTDOMAIN, false, plugin_basename( dirname( __FILE__ ) ) . '/languages/');
}



