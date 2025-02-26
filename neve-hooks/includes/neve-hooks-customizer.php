<?php
/**
 * Author:          Stefan Cotitosu <stefan@themeisle.com>
 * Created on:      2019-03-06
 *
 * @package Neve Hooks
 */

/**
 * Class Neve_Hooks_Customizer
 */
class Neve_Hooks_Customizer {

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
		add_action( 'customize_register', array( $this, 'customize_register' ) );
	}

	/**
	 * Register customize input for each hook
	 */
	public function customize_register( $wp_customize ) {

		/**
		 * Hooks Main Panel
		 */
		$wp_customize->add_panel(
			'neve_hooks', array(
				'title'    => __( 'Hooks', 'neve-hooks' ),
				'priority' => 36,
			)
		);

		$hooks = neve_hooks();

		$section_priority = 5;
		foreach ( $hooks as $location => $hooks_list ) {

			$location_id = 'neve_hooks_' . $location;

			$wp_customize->add_section(
				$location_id,
				array(
					'title'    => $location,
					'priority' => $section_priority,
					'panel'    => 'neve_hooks'
				)
			);

			$hook_priority = 5;
			foreach ( $hooks_list as $hook_in_location ) {

				$wp_customize->add_setting( $hook_in_location, array(
					'transport' => 'refresh',
				) );
				$wp_customize->add_control( $hook_in_location, array(
					'label'    => $hook_in_location,
					'section'  => $location_id,
					'settings' => $hook_in_location,
					'priority' => $hook_priority,
					'type'     => 'textarea',
				) );

				$hook_priority += 5;
			}


			$section_priority += 5;
		}

	}
}

Neve_Hooks_Customizer::get_instance();