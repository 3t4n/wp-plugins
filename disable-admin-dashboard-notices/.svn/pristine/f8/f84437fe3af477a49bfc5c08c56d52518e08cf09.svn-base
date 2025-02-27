<?php
/**
 * Singleton trait which implements Singleton pattern in any class in which this trait is used.
 *
 * @package assignment
 */

namespace WPFraternity\Disable_Admin_Dashboard\Traits;

trait Singleton {

	/**
	 * Protected class constructor to prevent direct object creation
	 */
	protected function __construct() {
	}

	/**
	 * Prevent object cloning
	 */
	final protected function __clone() {
	}

	/**
	 * This method returns new or existing Singleton instance
	 * of the class for which it is called.
	 *
	 * @return object Singleton instance of the class.
	 */
	final public static function get_instance() {

		/**
		 * Collection of instance.
		 *
		 * @var array
		 */
		static $instance = [];

		$called_class = get_called_class();

		if ( ! isset( $instance[ $called_class ] ) ) {

			$instance[ $called_class ] = new $called_class();

			do_action( sprintf( 'bsf_assignment_singleton_init_%s', $called_class ) ); // phpcs:ignore WordPress.NamingConventions.ValidHookName

		}

		return $instance[ $called_class ];

	}
}
