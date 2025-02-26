<?php
/**
 * Plugin Name: HT Social Share 
 * Description: Place your social button according to your choice.
 * Author: 		HasThemes
 * Author URI: 	https://hasthemes.com/
 * Version: 	1.0.6
 * Text Domain: htsocialshare-btn
 * Domain Path: /languages
*/

if( ! defined( 'ABSPATH' ) ) exit(); // Exit if accessed directly
define( 'HTSOCIALSHARE_PL_ROOT', __FILE__ );
define( 'HTSOCIALSHARE_PL_URL', plugins_url( '/', HTSOCIALSHARE_PL_ROOT ) );
define( 'HTSOCIALSHARE_PL_PATH', plugin_dir_path( HTSOCIALSHARE_PL_ROOT ) );
define( 'HTSOCIALSHARE_PLUGIN_BASE', plugin_basename( HTSOCIALSHARE_PL_ROOT ) );

//Required File
require_once ( HTSOCIALSHARE_PL_PATH .'includes/class.social-share.php' );