<?php
/**
 * Frontpage Call to action four
 *
 * @package oneto-companion
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Oneto_Customize_Homepage_Cta_Four_Option' ) ) :

	class Oneto_Customize_Homepage_Cta_Four_Option extends Oneto_Customize_Base_Option {

		/**
		 * Arguments for options.
		 *
		 * @return array
		 */
		public function elements() {

			return array(

			    'oneto_main_cta_heading' => array(
					'setting' => array(),
					'control' => array(
						'type'    => 'heading',
				   		'priority'        => 1,
						'label'   => esc_html__( 'Call to Action Options', 'oneto-companion' ),
						'section' => 'oneto_theme_cta_four',
					),
				),			
			    	
				'oneto_cta_disabled' => array(
					'setting' => array(
						'default'           => true,
						'sanitize_callback' => array( 'Oneto_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 2,
						'label'    => esc_html__( 'Enable/Disable', 'oneto-companion' ),
						'section'  => 'oneto_theme_cta_four',
					),
				),
				
				'oneto_cta_four_button_link_one' => array(
					'setting' => array(
						'default'           => '#',
						'sanitize_callback' => 'sanitize_text_field',
					),
					'control' => array(
						'type'            => 'text',
						'priority'        => 6,
						'is_default_type' => true,
						'label'           => esc_html__( 'Button One Link', 'oneto-companion' ),
						'section'         => 'oneto_theme_cta_four',
					),
				),

				'oneto_cta_four_button_link_two' => array(
					'setting' => array(
						'default'           => '#',
						'sanitize_callback' => 'sanitize_text_field',
					),
					'control' => array(
						'type'            => 'text',
						'priority'        => 8,
						'is_default_type' => true,
						'label'           => esc_html__( 'Button Two Link', 'oneto-companion' ),
						'section'         => 'oneto_theme_cta_four',
					),
				),
				
				'oneto_cta_four_open_new_tab_disabled' => array(
					'setting' => array(
						'default'           => true,
						'sanitize_callback' => array( 'Oneto_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 9,
						'label'    => esc_html__( 'Open New Tab Enable/Disable', 'oneto-companion' ),
						'section'  => 'oneto_theme_cta_four',
					),
				),

			);

		}

	}

	new Oneto_Customize_Homepage_Cta_Four_Option();

endif;