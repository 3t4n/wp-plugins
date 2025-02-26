<?php
/**
 * Plugin Name: Sirve - Simple Directory Listing
 * Description: Enables you to easily manage your product and service listings with tons of features.
 * Plugin URI:  https://hasthemes.com/plugins/
 * Author:      HasThemes
 * Author URI:  https://hasthemes.com/
 * Version:     1.0.9
 * License:     GPL2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: sirve
 * Domain Path: /languages
*/

if( ! defined( 'ABSPATH' ) ) exit(); // Exit if accessed directly

define( 'SIRVE_VERSION', '1.0.9' );
define( 'SIRVE_PL_ROOT', __FILE__ );
define( 'SIRVE_PL_URL', plugins_url( '/', SIRVE_PL_ROOT ) );
define( 'SIRVE_PL_PATH', plugin_dir_path( SIRVE_PL_ROOT ) );
define( 'SIRVE_PL_INCLUDE', SIRVE_PL_PATH .'include/' );
define( 'SIRVE_PL_FRONTEND', SIRVE_PL_PATH .'frontend/' );

// Plugin Init
include( SIRVE_PL_INCLUDE.'/class.sirve.php' );
// Admin Pages Init
include( SIRVE_PL_PATH.'/admin/class.admin-init.php' );
// Initialize Main Class
HTSirve::instance();