<?php
/**
 * Plugin Name:       Forminix
 * Plugin URI:        https://forminix.com
 * Description:       Build powerful forms with most popular WordPress Form Builder Plugin - Forminix.
 * Version:           1.2.6
 * Author:            Forminix - Contact Form Builder for WordPress
 * Author URI:        https://forminix.com
 * License:           GPL-2.0+
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       forminix
 * Domain Path:       /languages
 */


// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}


defined( 'FORMINIX_VERSION' ) or define( 'FORMINIX_VERSION', '1.2.6' );
defined( 'FORMINIX_PATH' ) or define( 'FORMINIX_PATH', plugin_dir_path( __FILE__ ) );
defined( 'FORMINIX_URL' ) or define( 'FORMINIX_URL', plugin_dir_url( __FILE__ ) );
defined( 'FORMINIX_BASE_FILE' ) or define( 'FORMINIX_BASE_FILE', __FILE__ );
defined( 'FORMINIX_BASE_PATH' ) or define( 'FORMINIX_BASE_PATH', plugin_basename(__FILE__) );
defined( 'FORMINIX_IMG_DIR' ) or define( 'FORMINIX_IMG_DIR', plugin_dir_url( __FILE__ ) . 'assets/img/' );
defined( 'FORMINIX_CSS_DIR' ) or define( 'FORMINIX_CSS_DIR', plugin_dir_url( __FILE__ ) . 'assets/css/' );
defined( 'FORMINIX_JS_DIR' ) or define( 'FORMINIX_JS_DIR', plugin_dir_url( __FILE__ ) . 'assets/js/' );
defined( 'FORMINIX_IMPORTS_DIR' ) or define( 'FORMINIX_IMPORTS_DIR', plugin_dir_url( __FILE__ ) . 'assets/imports/' );
defined( 'FORMINIX_SERVER' ) or define( 'FORMINIX_SERVER', 'https://forminix.com' );



function forminix_check_premium_activation() {
    if ( !in_array( 'forminix-pro/forminix.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

        require_once FORMINIX_PATH . 'includes/ForminixUtils.php';
        require_once FORMINIX_PATH . 'includes/ForminixSettings.php';
        require_once FORMINIX_PATH . 'includes/ForminixEmails.php';
        require_once FORMINIX_PATH . 'includes/ForminixIntegrations.php';
        require_once FORMINIX_PATH . 'backend/class-forminix-ajax.php';
        require_once FORMINIX_PATH . 'backend/class-forminix-admin.php';

        require_once FORMINIX_PATH . 'frontend/class-forminix-shortcode.php';
        require_once FORMINIX_PATH . 'frontend/class-forminix-ajax.php';
        require_once FORMINIX_PATH . 'frontend/class-forminix-client.php';


    }
}
add_action( 'forminix_pro_check_init', 'forminix_check_premium_activation', 10, 2 );
do_action( 'forminix_pro_check_init');