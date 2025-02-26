<?php
/**
 * @package  WooSearch
 * @developer  name : Joy Shaha
 */
namespace WOOS;

final class WOOS
{
	/**
	 * Store all the classes inside an array
	 * @return array Full list of classes
	 * Feature added by : Joy Shaha <joysaha7302@gmail.com>
 	 * Date : 21.04.2020
	 */
	public static function woos_getServices()
	{
		return [
			Common\WOOSAdminController::class,
			Common\WOOSCommonController::class,
			Library\WOOSGetFunction::class,
			Common\WOOSTransient::class,
			Common\WOOSAjaxController::class,
			Front\WOOSFrontController::class,
			Setup\WOOSEnqueue::class,
		];
	}

	/**
	 * Loop through the classes, initialize theme,
	 * and call the woos_registerServices() method if it exists
	 * @return
	 * Feature added by : Joy Shaha <joysaha7302@gmail.com>
 	 * Date : 21.04.2020
	 */
	public static function woos_registerServices()
	{
		foreach (self::woos_getServices() as $class) {
			$woos_service = self::woos_instantiate($class);
			if (method_exists($woos_service, 'woos_register')) {
				$woos_service->woos_register();
			}
		}
	}

	/**
	 * Initialize the class
	 * @param  class $class class from the services array
	 * @return class woos_instantiate new instance of the class
	 * Feature added by : Joy Shaha <joysaha7302@gmail.com>
 	 * Date : 21.04.2020
	 */
	private static function woos_instantiate($class)
	{
		$woos_service = new $class();

		return $woos_service;
	}
}