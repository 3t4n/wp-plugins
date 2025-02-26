<?php
/**
 * Frontpage Main Slider.
 *
 * @package oneto-companion
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Oneto_Customize_Homepage_Slider_Option' ) ) :

	class Oneto_Customize_Homepage_Slider_Option extends Oneto_Customize_Base_Option {

		/**
		 * Arguments for options.
		 *
		 * @return array
		 */
		public function elements() {

			return array(
			
				'oneto_main_slider_heading'     => array(
					'setting' => array(),
					'control' => array(
						'type'    => 'heading',
						'priority'        => 1,
						'label'   => esc_html__( 'Slider Options', 'oneto-companion' ),
						'section' => 'oneto_main_theme_slider',
					),
				),
				
	
				'oneto_main_slider_disabled'            => array(
					'setting' => array(
						'default'           => true,
						'sanitize_callback' => array( 'Oneto_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 2,
						'label'    => esc_html__( 'Slider Enable/Disable', 'oneto-companion' ),
						'section'  => 'oneto_main_theme_slider',
					),
				),	
				
				'oneto_main_slider_overlay_disable'            => array(
					'setting' => array(
						'default'           => true,
						'sanitize_callback' => array( 'Oneto_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 51,
						'label'    => esc_html__( 'Overlay Enable/Disable', 'oneto-companion' ),
						'section'  => 'oneto_main_theme_slider',
					),
				),
				
				'oneto_main_slider_content_color' => array(
					'setting' => array(
						'default'           => '',
						'sanitize_callback' => array( 'Oneto_Customizer_Sanitize', 'sanitize_alpha_color' ),
					),
					'control' => array(
						'type'            => 'color',
						'priority'        => 53,
						'label'           => esc_html__( 'Slide content color', 'oneto-companion' ),
						'section'         => 'oneto_main_theme_slider',
						'choices'         => array(
							'alpha' => false,
						),
					),
				),	
				
				'oneto_slider_upgrade'            => array(
					'setting' => array( ),
					'control' => array(
						'type'     => 'upgrade',
						'priority' => 20,
						'label'    => esc_html__( 'Slides', 'oneto-companion' ),
						'section'  => 'oneto_main_theme_slider',
					),
				),

			);

		}

	}

	new Oneto_Customize_Homepage_Slider_Option();

endif;
