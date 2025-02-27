<?php

/**
 * Module to check the modules that are needed
 *
 * @link       https://wordpress.org/plugins/fg-opencart-to-woocommerce/
 * @since      1.0.0
 *
 * @package    FG_OpenCart_to_WooCommerce
 * @subpackage FG_OpenCart_to_WooCommerce/admin
 */

if ( !class_exists('FG_OpenCart_to_WooCommerce_Modules_Check', false) ) {

	/**
	 * Class to check the modules that are needed
	 *
	 * @package    FG_OpenCart_to_WooCommerce
	 * @subpackage FG_OpenCart_to_WooCommerce/admin
	 * @author     Frédéric GILLES
	 */
	class FG_OpenCart_to_WooCommerce_Modules_Check {

		private $plugin;
		
		/**
		 * Initialize the class and set its properties.
		 *
		 * @param    object    $plugin       Admin plugin
		 */
		public function __construct( $plugin ) {

			$this->plugin = $plugin;

		}

		/**
		 * Check if some modules are needed
		 *
		 */
		public function check_modules() {
			$premium_url = 'https://www.fredericgilles.net/fg-opencart-to-woocommerce/';
			$message_premium = __('Your OpenCart database contains %s. You need the <a href="%s" target="_blank">Premium version</a> to import them.', 'fg-opencart-to-woocommerce');
			if ( defined('FGOC2WCP_LOADED') ) {
				// Message for the Premium version
				$message_addon = __('Your OpenCart database contains %1$s. You need the <a href="%3$s" target="_blank">%4$s</a> to import them.', 'fg-opencart-to-woocommerce');
			} else {
				// Message for the free version
				$message_addon = __('Your OpenCart database contains %1$s. You need the <a href="%2$s" target="_blank">Premium version</a> and the <a href="%3$s" target="_blank">%4$s</a> to import them.', 'fg-opencart-to-woocommerce');
			}
			$modules = array(
				// Check if we need the Premium version: check the number of customers
				array(array($this, 'count'),
					array('customer', 1),
					'fg-opencart-to-woocommerce-premium/fg-opencart-to-woocommerce-premium.php',
					sprintf($message_premium, __('several customers', 'fg-opencart-to-woocommerce'), $premium_url)
				),
				
				// Check if we need the Premium version: check the number of attributes
				array(array($this, 'count'),
					array('attribute', 0),
					'fg-opencart-to-woocommerce-premium/fg-opencart-to-woocommerce-premium.php',
					sprintf($message_premium, __('some attributes', 'fg-opencart-to-woocommerce'), $premium_url)
				),
				
				// Check if we need the Premium version: check the number of options
				array(array($this, 'count'),
					array('option', 0),
					'fg-opencart-to-woocommerce-premium/fg-opencart-to-woocommerce-premium.php',
					sprintf($message_premium, __('some options', 'fg-opencart-to-woocommerce'), $premium_url)
				),
				
				// Check if we need the Premium version: check the number of orders
				array(array($this, 'count'),
					array('orders', 1),
					'fg-opencart-to-woocommerce-premium/fg-opencart-to-woocommerce-premium.php',
					sprintf($message_premium, __('some orders', 'fg-opencart-to-woocommerce'), $premium_url)
				),
				
				// Check if we need the Premium version: check the number of downloads
				array(array($this, 'count'),
					array('download', 0),
					'fg-opencart-to-woocommerce-premium/fg-opencart-to-woocommerce-premium.php',
					sprintf($message_premium, __('some downloads', 'fg-opencart-to-woocommerce'), $premium_url)
				),
				
				// Check if we need the Brands module
				array(array($this, 'count'),
					array('manufacturer', 1),
					'fg-opencart-to-woocommerce-premium-brands-module/fgoc2wc-brands.php',
					sprintf($message_addon, __('several manufacturers', 'fg-opencart-to-woocommerce'), $premium_url, $premium_url . 'brands/', __('Brands add-on', 'fg-opencart-to-woocommerce'))
				),
				
				// Check if we need the Internationalization module
				array(array($this, 'count'),
					array('language', 1),
					'fg-opencart-to-woocommerce-premium-internationalization-module/fgoc2wc-internationalization.php',
					sprintf($message_addon, __('several languages', 'fg-opencart-to-woocommerce'), $premium_url, $premium_url . 'internationalization/', __('Internationalization add-on', 'fg-opencart-to-woocommerce'))
				),
				
			);
			foreach ( $modules as $module ) {
				list($callback, $params, $plugin, $message) = $module;
				if ( !is_plugin_active($plugin) ) {
					if ( call_user_func_array($callback, $params) ) {
						$this->plugin->display_admin_warning($message);
					}
				}
			}
		}

		/**
		 * Count the number of rows in the table
		 *
		 * @param string $table Table
		 * @param int $min_value Minimum value to trigger the warning message
		 * @param string $where WHERE clause
		 * @return bool Trigger the warning or not
		 */
		private function count($table, $min_value, $where='') {
			$count = 0;
			if ( $this->plugin->table_exists($table) ) {
				$prefix = $this->plugin->plugin_options['prefix'];
				$sql = "SELECT COUNT(*) AS nb FROM `{$prefix}{$table}`";
				if ( !empty($where) ) {
					$sql .= ' ' . $where;
				}
				$count = $this->count_sql($sql);
			}
			return ($count > $min_value);
		}

		/**
		 * Execute the SQL request and return the nb value
		 *
		 * @param string $sql SQL request
		 * @return int Count
		 */
		private function count_sql($sql) {
			$count = 0;
			$result = $this->plugin->opencart_query($sql, false);
			if ( isset($result[0]['nb']) ) {
				$count = $result[0]['nb'];
			}
			return $count;
		}

	}
}
