<?php
/**
 * Plugin Name: APG - Awesome Photo Gallery
 * Plugin URI: https://codebrothers.eu
 * Description: The most simple Photo Gallery plugin ever. Create photo albums and show images on your WP site very easily. Integrate with shortcodes, add more functionality with our Add-ons. Role based access in the plugin.
 * Author: CodeBrothers
 * Version: 1.1.2
 * Requires at least: 4.1
 * Author URI: https://codebrothers.eu
 * License: GPL v3
 * Text Domain: apg
 * Domain Path: /languages
 */
namespace APG;

require( 'vendor/autoload.php' );

use APG\Core\Init as Init;

define( 'APG_VERSION', '1.1.2' );
define( 'APG_ROOT_PATH', __FILE__ );
define( 'APG_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'APG_PLUGIN_ROOT', dirname( plugin_basename( __FILE__ ) ) );

$apg = new Init();
$apg->init_plugin( APG_VERSION, APG_PLUGIN_PATH );

require( 'apg-widgets.php' );