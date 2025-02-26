<?php
/**
 * Plugin Name: Awesome Google Analytics
 * Plugin URI: https://codebrothers.eu
 * Description: The most simple Google Analytics plugin ever with awesome features. Add Google Analytics tracking code in your WordPress pages.
 * Author: CodeBrothers
 * Version: 1.0.2
 * Requires at least: 4.1
 * Author URI: https://codebrothers.eu
 * License: GPL v3
 * Text Domain: awesome-google-analytics
 * Domain Path: /languages
 */

namespace AGA;

require( 'vendor/autoload.php' );

use AGA\Core\Init as Init;

define( 'AGA_VERSION', '1.0.2' );
define( 'AGA_ROOT_PATH', __FILE__ );
define( 'AGA_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'AGa_PLUGIN_ROOT', dirname( plugin_basename( __FILE__ ) ) );

$aga = new Init();
$aga->init_plugin( AGA_VERSION, AGA_PLUGIN_PATH );