<?php
/**
 * Frontpage Blog.
 *
 * @package oneto-companion
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Oneto_Customize_Homepage_Blog_Option' ) ) :

	class Oneto_Customize_Homepage_Blog_Option extends Oneto_Customize_Base_Option {

		/**
		 * Arguments for options.
		 *
		 * @return array
		 */
		public function elements() {

			return array(

		        'oneto_main_blog_heading'     => array(
					'setting' => array(),
					'control' => array(
						'type'    => 'heading',
						'priority'        => 1,
						'label'   => esc_html__( 'Blog Options', 'oneto-companion' ),
						'section' => 'oneto_theme_blog',
					),
				),
			    	
				'oneto_blog_disabled'            => array(
					'setting' => array(
						'default'           => true,
						'sanitize_callback' => array( 'Oneto_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 2,
						'label'    => esc_html__( 'Blog Enable/Disable', 'oneto-companion' ),
						'section'  => 'oneto_theme_blog',
					),
				),
				
				'oneto_top_info_upgrade'            => array(
					'setting' => array( ),
					'control' => array(
						'type'     => 'upgrade',
						'priority' => 100,
						'label'    => esc_html__( 'Project', 'oneto-companion' ),
						'section'  => 'oneto_theme_project',
					),
				),

			);

		}

	}

	new Oneto_Customize_Homepage_Blog_Option();

endif;
