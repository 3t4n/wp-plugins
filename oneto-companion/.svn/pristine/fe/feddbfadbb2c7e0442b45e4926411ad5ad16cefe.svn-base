<?php
/**
 * Frontpage Testimonial.
 *
 * @package oneto-companion
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Oneto_Customize_Homepage_Testimonial_Option' ) ) :

	class Oneto_Customize_Homepage_Testimonial_Option extends Oneto_Customize_Base_Option {

		/**
		 * Arguments for options.
		 *
		 * @return array
		 */
		public function elements() {

			return array(

			    'oneto_main_testimonial_heading' => array(
					'setting' => array(),
					'control' => array(
						'type'    => 'heading',
				   		'priority'        => 1,
						'label'   => esc_html__( 'Testimonial Options', 'oneto-companion' ),
						'section' => 'oneto_theme_testimonial',
					),
				),
			    	
				'oneto_testimonial_disabled' => array(
					'setting' => array(
						'default'           => true,
						'sanitize_callback' => array( 'Oneto_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 2,
						'label'    => esc_html__( 'Testimonial Enable/Disable', 'oneto-companion' ),
						'section'  => 'oneto_theme_testimonial',
					),
				),

				'oneto_testimonial_button_link' => array(
					'setting' => array(
						'default'           => '#',
						'sanitize_callback' => 'sanitize_text_field',
					),
					'control' => array(
						'type'            => 'text',
						'priority'        => 7,
						'is_default_type' => true,
						'label'           => esc_html__( 'Button Link', 'oneto-companion' ),
						'section'         => 'oneto_theme_testimonial',
					),
				),
				

				'oneto_testimonial_open_new_tab_disabled' => array(
					'setting' => array(
						'default'           => true,
						'sanitize_callback' => array( 'Oneto_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 8,
						'label'    => esc_html__( 'Open New Tab Enable/Disable', 'oneto-companion' ),
						'section'  => 'oneto_theme_testimonial',
					),
				),
				
				'oneto_testimonial_upgrade' => array(
					'setting' => array( ),
					'control' => array(
						'type'     => 'upgrade',
						'priority' => 20,
						'label'    => esc_html__( 'Testimonial', 'oneto-companion' ),
						'section'  => 'oneto_theme_testimonial',
					),
				),

			);

		}

	}

	new Oneto_Customize_Homepage_Testimonial_Option();

endif;