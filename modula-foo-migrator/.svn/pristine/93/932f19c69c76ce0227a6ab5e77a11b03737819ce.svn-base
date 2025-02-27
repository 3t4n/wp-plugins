<?php
/**
 * Plugin Name: Modula Foo Migrator
 * Plugin URI: https://wp-modula.com/
 * Description: Submodule that helps migrate galleries from FooGallery to Modula Gallery
 * Author: WPChill
 * Author URI: https://www.wpchill.com/
 * Version: 1.0.1
 * License: GNU General Public License v3.0 or later
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'MODULA_FOO_MIGRATOR_VERSION', '1.0.1' );
define( 'MODULA_FOO_MIGRATOR_PATH', plugin_dir_path( __FILE__ ) );
define( 'MODULA_FOO_MIGRATOR_URL', plugin_dir_url( __FILE__ ) );
define( 'MODULA_FOO_MIGRATOR_FILE', __FILE__ );

require_once MODULA_FOO_MIGRATOR_PATH . 'includes/class-modula-foo-migrator.php';

// Load the main plugin class.
$modula_foo_migrator = Modula_Foo_Migrator::get_instance();
