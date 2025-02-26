<?php
/*
Plugin Name: ADL Recent Post Slider
Plugin URI: https://adlplugins.com/plugin/adl-recent-post-slider-pro
Description: You can display your recent posts in a beautiful and responsive slider with a modern and minimal theme.
Version: 1.0
Author: ADL Plugins
Author URI: http://adlplugins.com
License: GPLv2 or later
Domain Path: /languages/
Text Domain: adl-recent-post-slider
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

Copyright  ADL Plugins.
*/


/**
 * Deny direct access
 */

if ( !defined('ABSPATH') ) die( 'Sorry! This is not your place!' );

// check for required php version and deactivate the plugin if php version is less.
if ( version_compare( PHP_VERSION, '5.4', '<' )) {
    add_action( 'admin_notices', 'adl_rec_post_notice' );
    function adl_rec_post_notice() { ?>
        <div class="error notice is-dismissible"> <p>
                <?php
                echo 'ADL Post Slider requires minimum PHP 5.4 to function properly. Please upgrade PHP version. The Plugin has been auto-deactivated.. You have PHP version '.PHP_VERSION;
                ?>
            </p></div>
        <?php
        if ( isset( $_GET['activate'] ) ) {
            unset( $_GET['activate'] );
        }
    }

    // deactivate the plugin because required php version is less.
    add_action( 'admin_init', 'adl_rec_post_deactivate_self' );
    function adl_rec_post_deactivate_self() {
        deactivate_plugins( plugin_basename( __FILE__ ) );
    }
    return;
}



/*
 * All Constants
 */
if (!defined('A_RCP_VERSION')) define( 'A_RCP_VERSION', '1.0.0' );
if (!defined('A_RCP_BASENAME')) define( 'A_RCP_BASENAME', plugin_basename(__FILE__) );
if (!defined('A_RCP_MINIMUM_WP_VERSION')) define( 'A_RCP_MINIMUM_WP_VERSION', '3.5' );
if (!defined('A_RCP_PLUGIN_DIR')) define( 'A_RCP_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
if (!defined('A_RCP_PLUGIN_URI')) define( 'A_RCP_PLUGIN_URI', plugins_url('', __FILE__) );
if (!defined('A_RCP_TEXTDOMAIN')) define( 'A_RCP_TEXTDOMAIN', 'adl-recent-post-slider' );
if (!defined('A_RCP_DEFAULT_IMG')) define( 'A_RCP_DEFAULT_IMG', A_RCP_PLUGIN_URI .'/img/featured_image_placeholder.jpg' );
if (!defined('A_RCP_ALERT_MSG')) define( 'A_RCP_ALERT_MSG', __( 'Sorry! This is not your place!', A_RCP_TEXTDOMAIN ) );

// All includes

require_once A_RCP_PLUGIN_DIR . 'includes/a-rcp-helper.php';
require_once A_RCP_PLUGIN_DIR . 'includes/a-rcp-cpt.php';
require_once A_RCP_PLUGIN_DIR . 'includes/a-rcp-cpt-columns.php';
require_once A_RCP_PLUGIN_DIR . 'includes/a-rcp-image-resizer.php';
require_once A_RCP_PLUGIN_DIR . 'includes/a-rcp-metabox.php';
require_once A_RCP_PLUGIN_DIR . 'includes/a-rcp-metabox-save.php';
require_once A_RCP_PLUGIN_DIR . 'includes/a-rcp-shortcode.php';
require_once A_RCP_PLUGIN_DIR . 'includes/upgrade-support.php';

// warn if unsupported WordPress Version. This function should be called after including helper.php
if ( adl_rec_post_check_min_wp_version(A_RCP_MINIMUM_WP_VERSION) ) {
    add_action('admin_notices', 'adl_rec_post_warn_if_unsupported_wp');
    add_action( 'admin_init', 'adl_rec_post_deactivate_self' );
    function adl_rec_post_deactivate_self() {
        deactivate_plugins( A_RCP_BASENAME );
    }
}
// Registering all styles and scripts
function adl_rpost_enqueue_styles() {
    //styles
    wp_register_style('owl-carousel-min-style', A_RCP_PLUGIN_URI. '/css/owl.carousel.css',false, A_RCP_VERSION);
    wp_register_style('a-rcp-frontend', A_RCP_PLUGIN_URI. '/css/a-rcp-frontend.css',false, A_RCP_VERSION);
    wp_register_style('a-rcp-frontend_style', A_RCP_PLUGIN_URI. '/css/a-rcp-frontend_style.css',false, A_RCP_VERSION);
    wp_register_style('venobox', A_RCP_PLUGIN_URI. '/css/venobox.css',false, A_RCP_VERSION);
    wp_register_style('fontello-style', A_RCP_PLUGIN_URI. '/css/fontello.css',false, A_RCP_VERSION);
    wp_register_style('owl-theme-default-min-style', A_RCP_PLUGIN_URI. '/css/owl.theme.default.min.css',array('owl-carousel-min-style'), A_RCP_VERSION);
    wp_register_style('fonts-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css',array('owl-carousel-min-style'), A_RCP_VERSION);
    wp_register_style('google-fonts-custom', 'https://fonts.googleapis.com/css?family=Poppins:400,500|Source+Sans+Pro:400,600',array('owl-carousel-min-style'), A_RCP_VERSION);

    //scripts
    wp_register_script('venobox-min', A_RCP_PLUGIN_URI. '/js/venobox.min.js', array('jquery'), A_RCP_VERSION, false);
    wp_register_script('owl-carousel-min-script', A_RCP_PLUGIN_URI. '/js/owl.carousel.min.js', array('jquery'), A_RCP_VERSION, true);
}
add_action('wp_enqueue_scripts', 'adl_rpost_enqueue_styles');

function a_rcp_enqueue_admin_scripts_and_styles( ){
global $typenow;
    if ( 'adl_rec_post' === $typenow ) {
        wp_enqueue_style('cmb2-style', A_RCP_PLUGIN_URI. '/css/cmb2.min.css',false, A_RCP_VERSION);
        wp_enqueue_script('admin-script', A_RCP_PLUGIN_URI. '/js/a-rcp-admin.js',array('jquery', 'wp-color-picker'), A_RCP_VERSION, true);
        wp_enqueue_style('wp-color-picker');
        wp_enqueue_media();

    }
    if ( 'adl_rec_post' === $typenow || 'post' === $typenow) {
        wp_enqueue_style('admin-style', A_RCP_PLUGIN_URI. '/css/a-rcp-admin.css',false, A_RCP_VERSION);
    }
    
}
add_action('admin_enqueue_scripts', 'a_rcp_enqueue_admin_scripts_and_styles');


