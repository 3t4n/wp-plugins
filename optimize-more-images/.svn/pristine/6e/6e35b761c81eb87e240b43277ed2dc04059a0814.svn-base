<?php	
/**
* Plugin Name: Optimize More! - Images & Media Files
* Description: A lightweight yet powerful image, iframe, and video optimization plugin. Lazy load, preload, and more. No jquery dependency. Part of ThinkWeb's Performance Pack.
* Author: Arya Dhiratara
* Author URI: https://dhiratara.com/
* Version: 1.1.3
* License: GPLv2 or later
* License URI: http://www.gnu.org/licenses/gpl-2.0.html
* Text Domain: opm_img
*/

if (!defined('ABSPATH')) exit; // Exit if accessed directly


define('OPM_IMG_NAME', 'Optimize More!');
define('OPM_IMG_PLUGIN_NAME', 'Image & Media Files');
define('OPM_IMG_VERSION', '1.1.3');
define("OPM_IMG_DIR", plugin_dir_path(__FILE__));
define("OPM_IMG_ASSETS_URL", plugin_dir_url(__FILE__) . 'assets/');
define("OPM_IMG_PUBLIC_URL", plugin_dir_url(__FILE__) . 'public/');
define("OPM_IMG_CLASSES_DIR", plugin_dir_path(__FILE__) . 'includes/classes/');
define("OPM_IMG_FUNCTIONS_URL", plugin_dir_url(__FILE__) . 'includes/functions/');
define("OPM_IMG_FUNCTIONS_DIR", plugin_dir_path(__FILE__) . 'includes/functions/');
define("OPM_IMG_PARSER_DIR", plugin_dir_path(__FILE__) . 'includes/functions/lib/');
define("OPM_IMG_BASENAME", plugin_basename(__FILE__));
define("OPM_IMG_ASSETS_DIR", OPM_IMG_DIR . 'assets/');


include_once(OPM_IMG_DIR . 'includes/classes/Loader.php');
include_once(OPM_IMG_DIR . 'includes/Functions.php');


global $opm_img;

if (!function_exists('opm_img')) :
    function opm_img()
    {
        global $opm_img;

        $opm_img = OPM_IMG_Loader::getInstance();

        return $opm_img;
    }
endif;

opm_img();

function opm_img_activation_redirect( $plugin ) {
    if( $plugin == plugin_basename( __FILE__ ) ) {
        exit( wp_redirect( admin_url( 'admin.php?page=optimize-more-images' ) ) );
    }
}
add_action( 'activated_plugin', 'opm_img_activation_redirect' );