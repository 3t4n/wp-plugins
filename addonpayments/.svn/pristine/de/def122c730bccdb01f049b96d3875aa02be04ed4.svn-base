<?php
/*
Plugin Name: addonpayments
Plugin URI: http://www.addonpayments.com/
Description: The official AddonPayments Plugin for WordPress accepts electronic transactions to your WordPress with a shortcode.
Version: 1.0.0
Author: AddonPayments
Author URI: http://www.addonpayments.com/
Tested up to: 4.9.3
Text Domain: addonpayments
Domain Path: /languages/
License: GNU General Public License v3.0
License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/

define( 'ADDONP_VERSION',     '1.0.0'                      );
define( 'ADDONP_PLUGIN_PATH',  plugin_dir_path( __FILE__ ) );
define( 'ADDONP_PLUGIN_URL',   plugin_dir_url( __FILE__ )  );

require_once( ADDONP_PLUGIN_PATH . 'core/loader-core.php'  );

function addonp_init() {
    load_plugin_textdomain( 'addonpayments', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}
add_action('init', 'addonp_init');