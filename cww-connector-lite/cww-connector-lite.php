<?php
/**
 * Plugin Name: CWW Connector Lite
 * Plugin URI: https://codeworkweb.com/wordpress-plugins/cww-connector-lite/
 * Description: CWW Connector Lite is an addon for contact form 7 which allows you to collect leads from contact form 7 to ActiveCampaign. This simple yet powerful plugin sends contact form 7 data to ActiveCampaign. The plugin is straightforward to use, also there is detailed documentation to set it up.
 * Version: 1.0.2
 * Author: Code Work Web
 * Author URI:  https://codeworkweb.com/
 * Text Domain: cww-connector-lite
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path: /languages
 *
 */


if ( !defined( 'WPINC' ) ) {
    die();
}

define( 'CWW_CONNECTOR_DATA', 'CWW Connector Lite' ); ;
define( 'CWW_CONNECTOR_VER', '1.0.2' );

define( 'CWW_CONNECTOR_FILE', __FILE__ );
define( 'CWW_CONNECTOR_BASENAME', plugin_basename( CWW_CONNECTOR_FILE ) );
define( 'CWW_CONNECTOR_PATH', plugin_dir_path( CWW_CONNECTOR_FILE ) );
define( 'CWW_CONNECTOR_URL', plugins_url( '/', CWW_CONNECTOR_FILE ) );

require_once CWW_CONNECTOR_PATH.'/cww-connector-class.php';
