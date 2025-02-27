<?php
/**
 * PHPUnit bootstrap file
 *
 * @package Wc_Peach_Payments_Gateway
 */

/*$_tests_dir = getenv( 'WP_TESTS_DIR' );

if ( ! $_tests_dir ) {
	$_tests_dir = rtrim( sys_get_temp_dir(), '/\\' ) . '/wordpress-tests-lib';
}
*/

define( 'RUNNING_TESTS', TRUE ); 

$_tests_dir = getenv( 'WP_TESTS_DIR' );
if ( ! $_tests_dir ) $_tests_dir = '/var/www/html/phpunit/wordpress-tests-lib';
define( 'WP_TESTS_DIR', $_tests_dir ); 
echo 'Done defining stuff!<br> '; 
//echo "Folder for Phupunit:->".$_tests_dir;
echo "<br>";

if ( ! file_exists( $_tests_dir . '/includes/functions.php' ) ) {
	echo "Could not find $_tests_dir/includes/functions.php, have you run bin/install-wp-tests.sh ?" . PHP_EOL; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	exit( 1 );
}

//$plugin_dir   = dirname( $_tests_dir ) . '/includes/woocommerce';
//require_once $_tests_dir . '/includes/woocommerce/woocommerce.php';
// Give access to tests_add_filter() function.
require_once $_tests_dir . '/includes/functions.php';

/**
 * Manually load the plugin being tested.
 */
/*function _manually_load_plugin() {
	require dirname( dirname( __FILE__ ) ) . '/wc-peach-payments-gateway.php';
}
tests_add_filter( 'muplugins_loaded', '_manually_load_plugin' );*/

// Start up the WP testing environment.
//require $_tests_dir . '/includes/bootstrap.php';

require $_tests_dir . '/includes/woocommerce/tests/bootstrap.php';
require dirname( dirname( __FILE__ ) ) . '/woocommerce-gateway-peach-payments.php';
require dirname( dirname( __FILE__ ) ) . '/classes/class-wc-peach-payments.php';
