<?php

defined( 'ABSPATH' ) || exit;

class ACDM_AcademyEnrollForm extends ET_Builder_Module {

	public $slug       = 'acdm_enroll_form';
	public $vb_support = 'on';

	protected $module_credits = array(
		'author'     => 'AcademyLMS',
		'author_uri' => 'https://academylms.net/',
	);

	public function init() {
		$this->name = esc_html__( 'Academy Enroll Form', 'academy-divi-modules' );
		$this->icon_path = plugin_dir_path( __FILE__ ) . 'icon.svg';

		// settings toggles
		$this->settings_modal_toggles = array(
			'general'  => array(
				'toggles' => array(
					'content' => esc_html__( 'Content', 'academy-divi-modules' ),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'enroll_button'     => esc_html__( 'Enroll Button', 'academy-divi-modules' ),
					'start_continue_button'     => esc_html__( 'Start Course/Continue Button', 'academy-divi-modules' ),
					'complete_button'     => esc_html__( 'Complete Button', 'academy-divi-modules' ),
					'cart_button'     => esc_html__( 'Cart Button', 'academy-divi-modules' ),
				),
			),

			$this->advanced_fields = array(
				// Typography Controls
				'fonts'          => array(
					'enroll_font'      => array(
						'css'             => array(
							'main' => '.academy-widget-enroll__enroll-form .academy-btn',
						),
						'hide_text_align' => false,
						'tab_slug'        => 'advanced',
						'toggle_slug'     => 'enroll_button',
					),
					'start_continue_font'      => array(
						'css'             => array(
							'main' => '%%order_class%% .academy-widget-enroll__continue .academy-btn',
						),
						'hide_text_align' => true,
						'tab_slug'        => 'advanced',
						'toggle_slug'     => 'start_continue_button',
					),
					'complete_font'      => array(
						'css'             => array(
							'main' => '%%order_class%% .academy-widget-enroll__complete-form button.academy-btn',
						),
						'hide_text_align' => true,
						'tab_slug'        => 'advanced',
						'toggle_slug'     => 'complete_button',
					),
					'cart_font'      => array(
						'css'             => array(
							'main' => '%%order_class%% .academy-widget-enroll__add-to-cart .academy-btn',
						),
						'hide_text_align' => true,
						'tab_slug'        => 'advanced',
						'toggle_slug'     => 'cart_button',
					),
				),
				'borders'        => array(
					'default'    => false,
					'enroll_border' => array(
						'css'         => array(
							'main'      => array(
								'border_radii'  => '%%order_class%% .academy-widget-enroll__enroll-form .academy-btn',
								'border_styles' => '%%order_class%% .academy-widget-enroll__enroll-form .academy-btn',
							),
							'important' => true,
						),
						'tab_slug'        => 'advanced',
						'toggle_slug'     => 'enroll_button',
					),
					'start_continue_border' => array(
						'css'         => array(
							'main'      => array(
								'border_radii'  => '%%order_class%% .academy-widget-enroll__continue .academy-btn',
								'border_styles' => '%%order_class%% .academy-widget-enroll__continue .academy-btn',
							),
							'important' => true,
						),
						'tab_slug'        => 'advanced',
						'toggle_slug'     => 'start_continue_button',
					),
					'complete_border' => array(
						'css'         => array(
							'main'      => array(
								'border_radii'  => '%%order_class%% .academy-widget-enroll__complete-form button.academy-btn',
								'border_styles' => '%%order_class%% .academy-widget-enroll__complete-form button.academy-btn',
							),
							'important' => true,
						),
						'tab_slug'        => 'advanced',
						'toggle_slug'     => 'complete_button',
					),
					'cart_border' => array(
						'css'         => array(
							'main'      => array(
								'border_radii'  => '%%order_class%% .academy-widget-enroll__add-to-cart .academy-btn',
								'border_styles' => '%%order_class%% .academy-widget-enroll__add-to-cart .academy-btn',
							),
							'important' => true,
						),
						'tab_slug'        => 'advanced',
						'toggle_slug'     => 'cart_button',
					),
				),
			)
		);
	}

	public function get_fields() {
		return array(           
			'course_id'     => array(
				'label'           => esc_html__( 'Course ID', 'academy-divi-modules' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'toggle_slug'     => 'content',
                'default'         => '',
				'computed_affects' => array(
					'__shortcode',
				),
			),
			'__shortcode' => array(
                'type'            => 'computed', // Change type to computed
                'toggle_slug'     => 'main_content',
				'computed_callback'   => array(
					'ACDM_AcademyEnrollForm',
					'get_shortcode',
				),
                'computed_depends_on' => array(
                    'course_id',
                ),
            ),

				// Enroll Button Styles

				'enroll_button_colors' => array(
					'label'               => esc_html__( 'Background Color', 'academy-divi-modules' ),
					'tab_slug'    => 'advanced',
					'toggle_slug'     => 'enroll_button',
					'type'                => 'composite',
					'composite_type'      => 'default',
					'composite_structure' => array(
						'normal_color' => array(
							'label'    => esc_html( 'Normal', 'academy-divi-modules' ),
							'controls' => array(
								'enroll_background_color' => array(
									'type'            => 'color',
									'tab_slug'    => 'advanced',
									'toggle_slug'     => 'enroll_button',
								),
							),
						),
						'hover_color' => array(
							'label'    => esc_html( 'Hover', 'academy-divi-modules' ),
							'controls' => array(
								'enroll_background_hover_color' => array(
									'type'            => 'color',
									'tab_slug'    => 'advanced',
									'toggle_slug'     => 'enroll_button',
								),
							),
						),
					),
				),

				'enroll_button_margin_top' => array(
					'label'           => esc_html__( 'Top Margin', 'academy-divi-modules' ),
					'type'            => 'range',
					'tab_slug'    => 'advanced',
					'toggle_slug'     => 'enroll_button',
				),

				'enroll_button_margin_bottom' => array(
					'label'           => esc_html__( 'Bottom Margin', 'academy-divi-modules' ),
					'type'            => 'range',
					'tab_slug'    => 'advanced',
					'toggle_slug'     => 'enroll_button',
				),

				'enroll_button_margin_left' => array(
					'label'           => esc_html__( 'Left Margin', 'academy-divi-modules' ),
					'type'            => 'range',
					'tab_slug'    => 'advanced',
					'toggle_slug'     => 'enroll_button',
				),

				'enroll_button_margin_right' => array(
					'label'           => esc_html__( 'Rigth Margin', 'academy-divi-modules' ),
					'type'            => 'range',
					'tab_slug'    => 'advanced',
					'toggle_slug'     => 'enroll_button',
				),

				'enroll_button_padding' => array(
					'label'           => esc_html__( 'Padding', 'academy-divi-modules' ),
					'type'            => 'range',
					'tab_slug'    => 'advanced',
					'toggle_slug'     => 'enroll_button',
				),


				// Start Course/Continue Button Styles

				'start_continue_button_colors' => array(
					'label'               => esc_html__( 'Background Color', 'academy-divi-modules' ),
					'tab_slug'    => 'advanced',
					'toggle_slug'     => 'start_continue_button',
					'type'                => 'composite',
					'composite_type'      => 'default',
					'composite_structure' => array(
						'normal_color' => array(
							'label'    => esc_html( 'Normal', 'academy-divi-modules' ),
							'controls' => array(
								'start_continue_background_color' => array(
									'type'            => 'color',
									'tab_slug'    => 'advanced',
									'toggle_slug'     => 'start_continue_button',
								),
							),
						),
						'hover_color' => array(
							'label'    => esc_html( 'Hover', 'academy-divi-modules' ),
							'controls' => array(
								'start_continue_background_hover_color' => array(
									'type'            => 'color',
									'tab_slug'    => 'advanced',
									'toggle_slug'     => 'start_continue_button',
								),
							),
						),
					),
				),

				'start_continue_button_margin_top' => array(
					'label'           => esc_html__( 'Top Margin', 'academy-divi-modules' ),
					'type'            => 'range',
					'tab_slug'    => 'advanced',
					'toggle_slug'     => 'start_continue_button',
				),

				'start_continue_button_margin_bottom' => array(
					'label'           => esc_html__( 'Bottom Margin', 'academy-divi-modules' ),
					'type'            => 'range',
					'tab_slug'    => 'advanced',
					'toggle_slug'     => 'start_continue_button',
				),

				'start_continue_button_margin_left' => array(
					'label'           => esc_html__( 'Left Margin', 'academy-divi-modules' ),
					'type'            => 'range',
					'tab_slug'    => 'advanced',
					'toggle_slug'     => 'start_continue_button',
				),

				'start_continue_button_margin_right' => array(
					'label'           => esc_html__( 'Rigth Margin', 'academy-divi-modules' ),
					'type'            => 'range',
					'tab_slug'    => 'advanced',
					'toggle_slug'     => 'start_continue_button',
				),

				'start_continue_button_padding' => array(
					'label'           => esc_html__( 'Padding', 'academy-divi-modules' ),
					'type'            => 'range',
					'tab_slug'    => 'advanced',
					'toggle_slug'     => 'start_continue_button',
				),

				// Complete Button Styles

				'complete_button_colors' => array(
					'label'               => esc_html__( 'Background Color', 'academy-divi-modules' ),
					'tab_slug'    => 'advanced',
					'toggle_slug'     => 'complete_button',
					'type'                => 'composite',
					'composite_type'      => 'default',
					'composite_structure' => array(
						'normal_color' => array(
							'label'    => esc_html( 'Normal', 'academy-divi-modules' ),
							'controls' => array(
								'complete_background_color' => array(
									'type'            => 'color',
									'tab_slug'    => 'advanced',
									'toggle_slug'     => 'complete_button',
								),
							),
						),
						'hover_color' => array(
							'label'    => esc_html( 'Hover', 'academy-divi-modules' ),
							'controls' => array(
								'complete_background_hover_color' => array(
									'type'            => 'color',
									'tab_slug'    => 'advanced',
									'toggle_slug'     => 'complete_button',
								),
							),
						),
					),
				),

				'complete_button_margin_top' => array(
					'label'           => esc_html__( 'Top Margin', 'academy-divi-modules' ),
					'type'            => 'range',
					'tab_slug'    => 'advanced',
					'toggle_slug'     => 'complete_button',
				),

				'complete_button_margin_bottom' => array(
					'label'           => esc_html__( 'Bottom Margin', 'academy-divi-modules' ),
					'type'            => 'range',
					'tab_slug'    => 'advanced',
					'toggle_slug'     => 'complete_button',
				),

				'complete_button_margin_left' => array(
					'label'           => esc_html__( 'Left Margin', 'academy-divi-modules' ),
					'type'            => 'range',
					'tab_slug'    => 'advanced',
					'toggle_slug'     => 'complete_button',
				),

				'complete_button_margin_right' => array(
					'label'           => esc_html__( 'Rigth Margin', 'academy-divi-modules' ),
					'type'            => 'range',
					'tab_slug'    => 'advanced',
					'toggle_slug'     => 'complete_button',
				),

				'complete_button_padding' => array(
					'label'           => esc_html__( 'Padding', 'academy-divi-modules' ),
					'type'            => 'range',
					'tab_slug'    => 'advanced',
					'toggle_slug'     => 'complete_button',
				),

				// Cart Button Styles

				'cart_button_colors' => array(
					'label'               => esc_html__( 'Background Color', 'academy-divi-modules' ),
					'tab_slug'    => 'advanced',
					'toggle_slug'     => 'cart_button',
					'type'                => 'composite',
					'composite_type'      => 'default',
					'composite_structure' => array(
						'normal_color' => array(
							'label'    => esc_html( 'Normal', 'academy-divi-modules' ),
							'controls' => array(
								'cart_background_color' => array(
									'type'            => 'color',
									'tab_slug'    => 'advanced',
									'toggle_slug'     => 'cart_button',
								),
							),
						),
						'hover_color' => array(
							'label'    => esc_html( 'Hover', 'academy-divi-modules' ),
							'controls' => array(
								'cart_background_hover_color' => array(
									'type'            => 'color',
									'tab_slug'    => 'advanced',
									'toggle_slug'     => 'cart_button',
								),
							),
						),
					),
				),

				'cart_button_margin_top' => array(
					'label'           => esc_html__( 'Top Margin', 'academy-divi-modules' ),
					'type'            => 'range',
					'tab_slug'    => 'advanced',
					'toggle_slug'     => 'cart_button',
				),

				'cart_button_margin_bottom' => array(
					'label'           => esc_html__( 'Bottom Margin', 'academy-divi-modules' ),
					'type'            => 'range',
					'tab_slug'    => 'advanced',
					'toggle_slug'     => 'cart_button',
				),

				'cart_button_margin_left' => array(
					'label'           => esc_html__( 'Left Margin', 'academy-divi-modules' ),
					'type'            => 'range',
					'tab_slug'    => 'advanced',
					'toggle_slug'     => 'cart_button',
				),

				'cart_button_margin_right' => array(
					'label'           => esc_html__( 'Rigth Margin', 'academy-divi-modules' ),
					'type'            => 'range',
					'tab_slug'    => 'advanced',
					'toggle_slug'     => 'cart_button',
				),

				'cart_button_padding' => array(
					'label'           => esc_html__( 'Padding', 'academy-divi-modules' ),
					'type'            => 'range',
					'tab_slug'    => 'advanced',
					'toggle_slug'     => 'cart_button',
				),
		);
	}

	public static function get_shortcode($settings = array()) {
		$shortcode = "[academy_enroll_form course_id='" . $settings['course_id'] . "']";
		return do_shortcode( $shortcode );
	}


    public function render( $attrs, $content = null, $render_slug ) {

		// Enroll Button Styles
		
		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '%%order_class%% .academy-login-form .academy-form-group button',
			'declaration' => sprintf(
				'margin-top: %1$s;',
				esc_html( $this->props['enroll_button_margin_top'].'px' )
			),
		));

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '%%order_class%% .academy-widget-enroll__enroll-form .academy-btn',
			'declaration' => sprintf(
				'margin-bottom: %1$s;',
				esc_html( $this->props['enroll_button_margin_bottom'].'px' )
			),
		));

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '%%order_class%% .academy-widget-enroll__enroll-form .academy-btn',
			'declaration' => sprintf(
				'margin-left: %1$s;',
				esc_html( $this->props['enroll_button_margin_left'].'px' )
			),
		));

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '%%order_class%% .academy-widget-enroll__enroll-form .academy-btn',
			'declaration' => sprintf(
				'margin-right: %1$s;',
				esc_html( $this->props['enroll_button_margin_right'].'px' )
			),
		));

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '%%order_class%% .academy-widget-enroll__enroll-form .academy-btn',
			'declaration' => sprintf(
				'padding: %1$s;',
				esc_html( $this->props['enroll_button_padding'].'px' )
			),
		));

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '%%order_class%% .academy-widget-enroll__enroll-form .academy-btn',
			'declaration' => sprintf(
				'background-color: %1$s;',
				esc_html( $this->props['enroll_background_color'])
			),
		));

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '%%order_class%% .academy-widget-enroll__enroll-form:hover .academy-btn',
			'declaration' => sprintf(
				'background-color: %1$s;',
				esc_html( $this->props['enroll_background_hover_color'])
			),
		));

		// Start/Continue Button Styles
		
		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '%%order_class%% .academy-widget-enroll__continue .academy-btn',
			'declaration' => sprintf(
				'margin-top: %1$s;',
				esc_html( $this->props['start_continue_button_margin_top'].'px' )
			),
		));

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '%%order_class%% .academy-widget-enroll__continue .academy-btn',
			'declaration' => sprintf(
				'margin-bottom: %1$s;',
				esc_html( $this->props['start_continue_button_margin_bottom'].'px' )
			),
		));

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '%%order_class%% .academy-widget-enroll__continue .academy-btn',
			'declaration' => sprintf(
				'margin-left: %1$s;',
				esc_html( $this->props['start_continue_button_margin_left'].'px' )
			),
		));

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '%%order_class%% .academy-widget-enroll__continue .academy-btn',
			'declaration' => sprintf(
				'margin-right: %1$s;',
				esc_html( $this->props['start_continue_button_margin_right'].'px' )
			),
		));

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '%%order_class%% .academy-widget-enroll__continue .academy-btn',
			'declaration' => sprintf(
				'padding: %1$s;',
				esc_html( $this->props['start_continue_button_padding'].'px' )
			),
		));

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '%%order_class%% .academy-widget-enroll__continue .academy-btn',
			'declaration' => sprintf(
				'background-color: %1$s;',
				esc_html( $this->props['start_continue_background_color'])
			),
		));

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '%%order_class%% .academy-widget-enroll__continue:hover .academy-btn',
			'declaration' => sprintf(
				'background-color: %1$s;',
				esc_html( $this->props['start_continue_background_hover_color'])
			),
		));

		// Complete Button Styles
		
		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '%%order_class%% .academy-widget-enroll__complete-form button.academy-btn',
			'declaration' => sprintf(
				'margin-top: %1$s;',
				esc_html( $this->props['complete_button_margin_top'].'px' )
			),
		));

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '%%order_class%% .academy-widget-enroll__complete-form button.academy-btn',
			'declaration' => sprintf(
				'margin-bottom: %1$s;',
				esc_html( $this->props['complete_button_margin_bottom'].'px' )
			),
		));

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '%%order_class%% .academy-widget-enroll__complete-form button.academy-btn',
			'declaration' => sprintf(
				'margin-left: %1$s;',
				esc_html( $this->props['complete_button_margin_left'].'px' )
			),
		));

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '%%order_class%% .academy-widget-enroll__complete-form button.academy-btn',
			'declaration' => sprintf(
				'margin-right: %1$s;',
				esc_html( $this->props['complete_button_margin_right'].'px' )
			),
		));

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '%%order_class%% .academy-widget-enroll__complete-form button.academy-btn',
			'declaration' => sprintf(
				'padding: %1$s;',
				esc_html( $this->props['complete_button_padding'].'px' )
			),
		));

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '%%order_class%% .academy-widget-enroll__complete-form button.academy-btn',
			'declaration' => sprintf(
				'background-color: %1$s;',
				esc_html( $this->props['complete_background_color'])
			),
		));

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '%%order_class%% .academy-widget-enroll__complete-form button.academy-btn',
			'declaration' => sprintf(
				'background-color: %1$s;',
				esc_html( $this->props['complete_background_hover_color'])
			),
		));

		// Cart Button Styles
		
		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '%%order_class%% .academy-widget-enroll__add-to-cart .academy-btn',
			'declaration' => sprintf(
				'margin-top: %1$s;',
				esc_html( $this->props['cart_button_margin_top'].'px' )
			),
		));

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '%%order_class%% .academy-widget-enroll__add-to-cart .academy-btn',
			'declaration' => sprintf(
				'margin-bottom: %1$s;',
				esc_html( $this->props['cart_button_margin_bottom'].'px' )
			),
		));

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '%%order_class%% .academy-widget-enroll__add-to-cart .academy-btn',
			'declaration' => sprintf(
				'margin-left: %1$s;',
				esc_html( $this->props['cart_button_margin_left'].'px' )
			),
		));

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '%%order_class%% .academy-widget-enroll__add-to-cart .academy-btn',
			'declaration' => sprintf(
				'margin-right: %1$s;',
				esc_html( $this->props['cart_button_margin_right'].'px' )
			),
		));

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '%%order_class%% .academy-widget-enroll__add-to-cart .academy-btn',
			'declaration' => sprintf(
				'padding: %1$s;',
				esc_html( $this->props['cart_button_padding'].'px' )
			),
		));

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '%%order_class%% .academy-widget-enroll__add-to-cart .academy-btn',
			'declaration' => sprintf(
				'background-color: %1$s;',
				esc_html( $this->props['cart_background_color'])
			),
		));

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '%%order_class%% .academy-widget-enroll__add-to-cart:hover .academy-btn',
			'declaration' => sprintf(
				'background-color: %1$s;',
				esc_html( $this->props['cart_background_hover_color'])
			),
		));


        $output = self::get_shortcode( $this->props );
		// Render empty string if no output is generated to avoid unwanted vertical space.
		if ( '' === $output ) {
			return '';
		}

		return $this->_render_module_wrapper( $output, $render_slug );
	}	
}

new ACDM_AcademyEnrollForm();

