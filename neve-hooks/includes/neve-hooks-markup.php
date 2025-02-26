<?php
/**
 * Author:          Stefan Cotitosu <stefan@themeisle.com>
 * Created on:      2019-03-06
 *
 * @package Neve Hooks
 */

/**
 * Class Neve_Hooks_Markup
 */
class Neve_Hooks_Markup {

	/**
	 * Class instance
	 *
	 * @var object instance
	 */
	private static $instance;

	/**
	 * Init
	 *
	 * @return Neve_Hooks_Markup|object
	 */
	public static function get_instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new self;
		}
		return self::$instance;
	}

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->do_hooks();
	}

	/**
	 * Bind customizer content to the hooks
	 */
	public function do_hooks() {
		$hooks_list = neve_hooks();

		foreach ( $hooks_list as $hooks_location ) {
			foreach ( $hooks_location as $hook ) {

				add_action( $hook, function() use ($hook) {
					$custom_action = get_theme_mod( $hook );
					echo do_shortcode( $custom_action );
				} );
			}
		}
	}
}
Neve_Hooks_Markup::get_instance();