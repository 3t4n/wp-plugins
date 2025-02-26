<?php
/**
 * Frontpage Client.
 *
 * @package oneto
 */

defined( 'ABSPATH' ) || exit;


if ( ! class_exists( 'Oneto_Customize_Homepage_Client_Option' ) ) :

	class Oneto_Customize_Homepage_Client_Option extends Oneto_Customize_Base_Option {

		/**
		 * Arguments for options.
		 *
		 * @return array
		 */
		public function elements() {

			return array(
			
				'oneto_client_heading'     => array(
					'setting' => array(),
					'control' => array(
						'type'    => 'heading',
						'priority'        => 1,
						'label'   => esc_html__( 'Client Options', 'oneto-companion' ),
						'section' => 'oneto_theme_client',
					),
				),
				
				'oneto_front_client_disabled' => array(
					'setting' => array(
						'default'           => true,
						'sanitize_callback' => array( 'Oneto_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 2,
						'label'    => esc_html__( 'Enable/Disable', 'oneto-companion' ),
						'section'  => 'oneto_theme_client',
					),
				),
				
				'oneto_client_upgrade' => array(
					'setting' => array( ),
					'control' => array(
						'type'     => 'upgrade',
						'priority' => 20,
						'label'    => esc_html__( 'Client', 'oneto-companion' ),
						'section'  => 'oneto_theme_client',
					),
				),

			);

		}

	}

	new Oneto_Customize_Homepage_Client_Option();

endif;
