<?php
/**
 * @package  WooSearch
 * @developer  name : Joy Shaha
 */
namespace WOOS\Setup;
if (!class_exists('WOOSActivate')) {
	class WOOSActivate{
		/**
		 * Active Plugin
		 * @return string
		 * Feature added by : Joy Shaha <joysaha7302@gmail.com>
		 * Date : 19.04.2020
		*/
	    public static function woos_activatePluginFlush() {
			flush_rewrite_rules();

			$default = array();
			if ( ! get_option( 'woos_version' ) ) {
				update_option( 'woos_version', WOOS_VERSION );
			}
			if ( ! get_option( 'woos_wp_search' ) ) {
				update_option( 'woos_wp_search', 'last_code_woos' );
			}
			if ( ! get_option( 'woos_setting_data' ) ) {
				update_option( 'woos_setting_data', $default );
			}
		}
	}
}