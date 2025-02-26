<?php
/**
 * Init class create instance classes
 */

namespace atlScrollTop;


class Init {

	public function __construct() {

		self::registerClasses();

	}

	/**
	 * Array name classes
	 */
	public static function initClasses(): array {
		return [
			Scroll::class,
			ScrollSettings::class,
			scrollStyleCss::class
		];
	}

	/**
	 * Method create instance Class
	 */
	public static function registerClasses() {
		$class = '';
		foreach (self::initClasses() as $class) {
			if(class_exists($class)) {
				$instance = $class;
				$class = new $instance;
			}
		}
		return $class;
	}

}