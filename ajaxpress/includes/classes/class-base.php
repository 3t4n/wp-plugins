<?php
/**
 * AjaxPress Settings
 *
 * @package AjaxPress
 * @since 1.3.0
 */
namespace AjaxPress;

/**
 * Assets
 */
class Base {
	/**
	 * Singleton instance
	 *
	 * @var array
	 */
	private static $instances = [];

	/**
	 * Get singleton instance
	 *
	 * @return object
	 */
	public static function get_instance() {
		$class = get_called_class();

		if ( ! isset( self::$instances[ $class ] ) ) {
			self::$instances[ $class ] = new $class();
		}

		return self::$instances[ $class ];
	}

	/**
	 * Static Init
	 *
	 * @since 1.3.0
	 */
	public static function init() {
		$instance = self::get_instance();

		$instance->actions();
		$instance->filters();
	}

	/**
	 * Actions
	 *
	 * @since 1.3.0
	 */
	public function actions(){}

	/**
	 * Filters
	 *
	 * @since 1.3.0
	 */
	public function filters(){}
}
