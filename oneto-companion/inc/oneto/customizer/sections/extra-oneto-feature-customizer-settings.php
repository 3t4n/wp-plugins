<?php
/**
 * Frontpage Theme Feature.
 *
 * @package oneto-companion
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Oneto_Customize_Homepage_theme_feature_Option' ) ) :

	class Oneto_Customize_Homepage_theme_feature_Option extends Oneto_Customize_Base_Option {

 

		/**
		 * Arguments for options.
		 *
		 * @return array
		 */
		public function elements() {

			return array(

			    'oneto_theme_feature_heading'     => array(
					'setting' => array(),
					'control' => array(
						'type'    => 'heading',
						'priority'        => 1,
						'label'   => esc_html__( 'Feature Options', 'oneto-companion' ),
						'section' => 'oneto_theme_feature',
					),
				),
			    	
				'oneto_theme_feature_disabled'            => array(
					'setting' => array(
						'default'           => true,
						'sanitize_callback' => array( 'Oneto_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 2,
						'label'    => esc_html__( 'Feature Enable/Disable', 'oneto-companion' ),
						'section'  => 'oneto_theme_feature',
					),
				),
				
				'oneto_feature_upgrade'            => array(
					'setting' => array( ),
					'control' => array(
						'type'     => 'upgrade',
						'priority' => 20,
						'label'    => esc_html__( 'Feature', 'oneto-companion' ),
						'section'  => 'oneto_theme_feature',
					),
				),
			

			);

		}

	}

	new Oneto_Customize_Homepage_theme_feature_Option();

endif;
