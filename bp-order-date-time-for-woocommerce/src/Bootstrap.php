<?php
/**
 * @package BP Delivery For Woocommerce
 */

namespace Bright_Delivery_for_Woocommerce;

class Bootstrap {

	const PLUGIN_NAME_TITLE        = "Bright Delivery for Woocommerce";
	const FILE_MAIN_WITH_EXTENSION = 'wc-wdda-delivery-timeslots.php';
	const CLASS_NAME               = 'Bootstrap';
	const VERSION                  = '1.0';
	const PREFIX                   = "wc-wdda-delivery-timeslots";
	const CODESTAR_ID              = "wc-wdda-delivery-timeslots";

	/**
	 * Returns all classes, which will be used as services with a common method: register()
	 *
	 * @access public
	 * @static
	 * @since 1.0.0
	 *
	 * @return array services
	 */
	public static function getServices() {
		return [
			
			Pages\Settings::class,
			Pages\Checkout::class,
			Pages\Order::class,
			Pages\Email::class,
		];
	}

	/**
	 * Instances the classes obtained from getServices () and
	 * starts them to become part of the plugin functionality
	 *
	 * @access public
	 * @static
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public static function registerServices() {

		foreach ( self::getServices() as $class ) {
			$service = self::instantiate( $class );

			if ( method_exists( $service, 'register' ) ) {
				$service->register();
			}
		}
	}

	/**
	 * Instances the class passed by parameters and returns it
	 *
	 * @access public
	 * @static
	 * @since 1.0.0
	 *
	 * @param  class $class
	 * @return class $class class instance
	 */
	public static function instantiate( $class ) {
		return new $class;
	}

}
