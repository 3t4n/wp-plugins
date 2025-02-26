<?php
/**
 * @link              https://www.flexbillet.dk
 * @since             1.0.0
 *
 * @package           flexbillet-events
 *
 * @wordpress-plugin
 * Plugin Name: Flexbillet Events
 * Description: Viser dine events fra FlexBillet på din Wordpress side
 * Version: 1.0.5
 * Author: Kaare Heinsen
 * Author URI: https://www.flexbillet.dk
 */

/* block direct access */
defined( 'ABSPATH' ) or die( 'I cannot do anything when called directly good sir' );

/* Define constants */
define( 'FLEXBILLET_EVENTS_PLUGIN', __FILE__ );
define( 'FLEXBILLET_EVENTS_PLUGIN_DIR', untrailingslashit( dirname( FLEXBILLET_EVENTS_PLUGIN ) ) );
define( 'FLEXBILLET_EVENTS_PLUGIN_URL', untrailingslashit( plugins_url('', __FILE__ ) ) );
define( 'FLEXBILLET_EVENTS_URL', 'https://www.flexbillet.dk/');
/* Load dependencies */
require_once('settings.php'); 
require_once('functions.php'); 
require_once('includes/admin/admin_functions.php'); 

/* Uninstall cleanup */
register_uninstall_hook(__FILE__, 'flexbillet_events_uninstall');

/* Activation */
register_activation_hook( __FILE__, 'flexbillet_events_activate' );

?>