<?php
/**
 * GiroCheckout
 *
 * @author      S-Public Services GmbH
 * @copyright   2021 S-Public Services GmbH
 * @license     GPL-2.0+
 *
 * @wordpress-plugin
 * Plugin Name: GiroCheckout
 * Description: Plugin to integrate the GiroCheckout payment methods into WooCommerce.
 * Version:     4.1.9
 * Author:      S-Public Services GmbH
 * Author URI:  https://s-publicservices.de
 * Text Domain: girocheckout
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

include_once(realpath(dirname(__FILE__)) . '/library/GiroCheckout_SDK.php');
include_once(realpath(dirname(__FILE__)) . '/library/GiroCheckout_Utility.php');

add_action('plugins_loaded', 'woocommerce_girocheckout_init', 0);
add_action('admin_init', 'girocheckout_update_admin_options', 1);
register_activation_hook( __FILE__, 'girocheckout_install' );
register_deactivation_hook(__FILE__ ,'girocheckout_uninstall');

function woocommerce_girocheckout_init() {
    if (!class_exists('WC_Payment_Gateway'))
        return;

    /**
     * Localisation
     */
    load_plugin_textdomain('girocheckout', false, dirname(plugin_basename(__FILE__)) . '/languages');

    /**
     * Gateway class
     */
    foreach (glob(dirname(__FILE__) . '/payments/*.php') as $filename) {
        include_once $filename;
    }

    // Create the table 'wp_girocheckout_orders_status'
    girocheckout_install();

    /**
     * Add the Gateway to WooCommerce
     * */
    function woocommerce_add_girocheckout_gateway($methods) {

        $methods[] = 'gc_giropay';
        $methods[] = 'gc_directdebit';
        $methods[] = 'gc_creditcard';
        $methods[] = 'gc_ideal';
        $methods[] = 'gc_eps';
        $methods[] = 'gc_paydirekt';
        $methods[] = 'gc_sofortuw';
        $methods[] = 'gc_maestro';
        $methods[] = 'gc_bluecode';

        return $methods;
    }

		/**
		 * Modify the values for field 'statuscapture' in payments: gc_creditcard, gc_directdebit and gc_paydirekt
		 * */
		function girocheckout_update_admin_options()
		{
			$iCurrVersion = intval(str_replace(".", "", GiroCheckout_Utility::getVersion()));
			$iVersionUpdate = 403;
			$girocheckoutUpdates = get_option('girocheckout_updates');

			if ($iCurrVersion >= $iVersionUpdate && (empty($girocheckoutUpdates) || $girocheckoutUpdates < $iVersionUpdate)) {
				$key = 'statuscapture';
				$value = 'wc-completed';
				$oldvalue = 'completed';

				if (empty($girocheckoutUpdates)) {
					add_option('girocheckout_updates',$iCurrVersion);
				}

				// Load all of the option values from wp_options for 'gc_creditcard'
				$optionCreditcard = "woocommerce_gc_creditcard_settings";
				$allOptionsCreditcard = get_option($optionCreditcard);

				// Update just the one option you passed in
				$allOptionsCreditcard[$key] = $value;

				// Save to wp_options
				if ($oldvalue == $allOptionsCreditcard[$key]) {
					update_option($optionCreditcard, $allOptionsCreditcard);
				}

				// Load all of the option values from wp_options for 'gc_directdebit'
				$optionDirectdebit = "woocommerce_gc_directdebit_settings";
				$allOptionsDirectdebit = get_option($optionDirectdebit);
				// Update just the one option you passed in
				$allOptionsDirectdebit[$key] = $value;

				// Save to wp_options
				if ($oldvalue == $allOptionsDirectdebit[$key]) {
					update_option($optionDirectdebit, $allOptionsDirectdebit);
				}

				// Load all of the option values from wp_options for 'gc_paydirekt'
				$optionPaydirekt = "woocommerce_gc_paydirekt_settings";
				$allOptionsPaydirekt = get_option($optionPaydirekt);

				// Update just the one option you passed in
				$allOptionsPaydirekt[$key] = $value;

				// Save to wp_options
				if ($oldvalue == $allOptionsPaydirekt[$key]) {
					update_option($optionPaydirekt, $allOptionsPaydirekt);
				}
			}
		}

    add_filter('woocommerce_payment_gateways', 'woocommerce_add_girocheckout_gateway');
}

/**
 * Create table 'wp_girocheckout_orders_status'.
 * To management the orders status payment notification
 */
function girocheckout_install() {

  global $wpdb;
  $charset_collate = $wpdb->get_charset_collate();
  $table_name = $wpdb->prefix . 'girocheckout_orders_status';

  $sql = "CREATE TABLE IF NOT EXISTS $table_name (
      orderid varchar(30) NOT NULL,
      time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
      status smallint(5) DEFAULT 1 NOT NULL,
      UNIQUE KEY orderid (orderid)
    ) $charset_collate;";

  require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
  dbDelta( $sql );
}

/**
 * Drop the table 'wp_girocheckout_orders_status'
 */
function girocheckout_uninstall() {

  global $wpdb;

  $table_name = $wpdb->prefix . 'girocheckout_orders_status';
  $sql = "drop table if exists $table_name";
  $wpdb->query($sql);
}
