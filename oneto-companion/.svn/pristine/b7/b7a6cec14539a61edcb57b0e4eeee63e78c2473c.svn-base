<?php
/**
 * Frontpage Site Top Header.
 *
 * @package oneto
 */

defined( 'ABSPATH' ) || exit;

/**
* Site Top Header customizer options.
*/
if ( ! class_exists( 'Oneto_Customize_Homepage_Site_Top_Header_Option' ) ) :

	class Oneto_Customize_Homepage_Site_Top_Header_Option extends Oneto_Customize_Base_Option {

		/**
		 * @return array
		 */
		public function elements() {

			return array(
			
			    'oneto_site_top_header_content_heading'     => array(
					'setting' => array(),
					'control' => array(
						'type'    => 'heading',
						'priority'        => 1,
						'label'   => esc_html__( 'Top Header Options', 'oneto-companion' ),
						'section' => 'oneto_theme_top_header_area',
					),
				),
			
				'oneto_site_top_header_disabled'            => array(
					'setting' => array(
						'default'           => true,
						'sanitize_callback' => array( 'Oneto_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 2,
						'label'    => esc_html__( 'Header Enable/Disable', 'oneto-companion' ),
						'section'  => 'oneto_theme_top_header_area',
					),
				),
				
			    'oneto_site_top_header_info_disabled'            => array(
					'setting' => array(
						'default'           => true,
						'sanitize_callback' => array( 'Oneto_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 3,
						'label'    => esc_html__( 'Info Enable/Disable', 'oneto-companion' ),
						'section'  => 'oneto_theme_top_header_area',
					),
				),
				
			    'oneto_site_top_header_social_disabled'            => array(
					'setting' => array(
						'default'           => true,
						'sanitize_callback' => array( 'Oneto_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 4,
						'label'    => esc_html__( 'Social Icon Enable/Disable', 'oneto-companion' ),
						'section'  => 'oneto_theme_top_header_area',
					),
				),

                'oneto_top_header_container_size'     => array(
						'setting' => array(
							'default'           => 'container',
							'sanitize_callback' => array( 'Oneto_Customizer_Sanitize', 'sanitize_radio' ),
						),
						'control' => array(
							'type'            => 'radio',
							'priority'        => 20,
							'is_default_type' => true,
							'label'           => esc_html__( 'Container Width', 'oneto-companion' ),
							'section'         => 'oneto_theme_top_header_area',
							'choices'         => array(
								'container'  => esc_html__( 'Container', 'oneto-companion' ),
								'container-fluid' => esc_html__( 'Container Full', 'oneto-companion' ),
							),
						),
			    ),	
				
				'oneto_top_upgrade'            => array(
					'setting' => array( ),
					'control' => array(
						'type'     => 'upgrade',
						'priority' => 10,
						'label'    => esc_html__( 'Top Header Info', 'oneto-companion' ),
						'section'  => 'oneto_theme_top_header_area',
					),
				),
				
				'oneto_social_upgrade'            => array(
					'setting' => array( ),
					'control' => array(
						'type'     => 'upgrade',
						'priority' => 19,
						'label'    => esc_html__( 'Social Icons', 'oneto-companion' ),
						'section'  => 'oneto_theme_top_header_area',
					),
				),
											
			

			);

		}

	}

	new Oneto_Customize_Homepage_Site_Top_Header_Option();

endif;