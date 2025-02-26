<?php

defined( 'ABSPATH' ) || exit;

class ACDM_AcademyRegForm extends ET_Builder_Module {

	public $slug       = 'acdm_reg_form';
	public $vb_support = 'on';

	protected $module_credits = array(
		'author'     => 'AcademyLMS',
		'author_uri' => 'https://academylms.net/',
	);

	public function init() {
		$this->name = esc_html__( 'Academy Registration Form', 'academy-divi-modules' );
		$this->icon_path = plugin_dir_path( __FILE__ ) . 'icon.svg';

		// settings toggles
		$this->settings_modal_toggles = array(
			'general'  => array(
				'toggles' => array(
					'form_content' => esc_html__( 'Form Content', 'academy-divi-modules' ),
					'heading' => esc_html__( 'Form Heading', 'academy-divi-modules' ),
					'form_fields' => esc_html__( 'Form Fields', 'academy-divi-modules' ),
					'button' => esc_html__( 'Submit Button', 'academy-divi-modules' ),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'form_container'     => esc_html__( 'Form Container', 'academy-divi-modules' ),
					'label_style'     => esc_html__( 'Label Style', 'academy-divi-modules' ),
					'placeholder_style'     => esc_html__( 'Placeholder Style', 'academy-divi-modules' ),
					'field_style'     => esc_html__( 'Field Style', 'academy-divi-modules' ),
					'button_style'     => esc_html__( 'Button Style', 'academy-divi-modules' ),
				),
			),

			$this->advanced_fields = array(
				// Typography Controls
				'fonts'          => array(
					'form_label_font'      => array(
						'css'             => array(
							'main' => '.academy-reg-form .academy-form-group label',
						),
						'hide_text_align' => true,
						'tab_slug'        => 'advanced',
						'toggle_slug'     => 'label_style',
					),
					'form_placeholder_font'      => array(
						'css'             => array(
							'main' => '.academy-reg-form .academy-form-group input::placeholder',
						),
						'hide_text_align' => true,
						'tab_slug'        => 'advanced',
						'toggle_slug'     => 'placeholder_style',
					),
					'form_field_font'      => array(
						'css'             => array(
							'main' => '.academy-reg-form .academy-form-group input',
						),
						'hide_text_align' => true,
						'tab_slug'        => 'advanced',
						'toggle_slug'     => 'field_style',
					),
					'form_button_font'      => array(
						'css'             => array(
							'main' => '.academy-reg-form .academy-form-group button',
						),
						'hide_text_align' => true,
						'tab_slug'        => 'advanced',
						'toggle_slug'     => 'button_style',
					),
				),
				'borders'        => array(
					'default'    => false,
					'form_container' => array(
						'css'         => array(
							'main'      => array(
								'border_radii'  => '%%order_class%% .academy-reg-form',
								'border_styles' => '%%order_class%% .academy-reg-form',
							),
							'important' => true,
						),
						'tab_slug'        => 'advanced',
						'toggle_slug'     => 'form_container',
					),
					'form_field_border' => array(
						'css'         => array(
							'main'      => array(
								'border_radii'  => '%%order_class%% .academy-reg-form .academy-form-group input',
								'border_styles' => '%%order_class%% .academy-reg-form .academy-form-group input',
							),
							'important' => true,
						),
						'tab_slug'        => 'advanced',
						'toggle_slug'     => 'field_style',
					),
					'form_button_border' => array(
						'css'         => array(
							'main'      => array(
								'border_radii'  => '%%order_class%% .academy-reg-form .academy-form-group button',
								'border_styles' => '%%order_class%% .academy-reg-form .academy-form-group button',
							),
							'important' => true,
						),
						'tab_slug'        => 'advanced',
						'toggle_slug'     => 'button_style',
					),
				),
				'background'     => array(
					'css'                  => array(
						'main'      => '%%order_class%% .academy-reg-form',
						'important' => true,
					),
					'settings'             => array(
						'tab_slug'    => 'advanced',
						'toggle_slug' => 'form_container',
					),
					'use_background_video' => false,
				),
			)
		);
	}

	public function get_fields() {
		return array(           
			'registration_type' => array(
				'label'           => esc_html__( 'Registration Type', 'academy-divi-modules' ),
				'type'            => 'select',
				'option_category' => 'basic_option',
				'toggle_slug'     => 'form_content',
				'options'         => array(
					'student' => 'Student',
					'instructor' => 'Instructor',
				),
				'default'         => 'instructor',
				'computed_affects' => array(
					'__shortcode',
				),
			),
			'__shortcode' => array(
                'type'            => 'computed', // Change type to computed
                'toggle_slug'     => 'main_content',
				'computed_callback'   => array(
					'ACDM_AcademyRegForm',
					'get_shortcode',
				),
                'computed_depends_on' => array(
                    'registration_type',
                ),
            ),

			// Form Container Styles
			'form_container_margin_top' => array(
				'label'           => esc_html__( 'Top Margin', 'academy-divi-modules' ),
				'type'            => 'range',
				'tab_slug'    => 'advanced',
				'toggle_slug'     => 'form_container',
			),

			'form_container_margin_bottom' => array(
				'label'           => esc_html__( 'Bottom Margin', 'academy-divi-modules' ),
				'type'            => 'range',
				'tab_slug'    => 'advanced',
				'toggle_slug'     => 'form_container',
			),

			'form_container_margin_left' => array(
				'label'           => esc_html__( 'Left Margin', 'academy-divi-modules' ),
				'type'            => 'range',
				'tab_slug'    => 'advanced',
				'toggle_slug'     => 'form_container',
			),

			'form_container_margin_right' => array(
				'label'           => esc_html__( 'Rigth Margin', 'academy-divi-modules' ),
				'type'            => 'range',
				'tab_slug'    => 'advanced',
				'toggle_slug'     => 'form_container',
			),

			'form_container_padding' => array(
				'label'           => esc_html__( 'Padding', 'academy-divi-modules' ),
				'type'            => 'range',
				'tab_slug'    => 'advanced',
				'toggle_slug'     => 'form_container',
			),

			// Form Label Styles

			'form_label_margin_top' => array(
				'label'           => esc_html__( 'Top Margin', 'academy-divi-modules' ),
				'type'            => 'range',
				'tab_slug'    => 'advanced',
				'toggle_slug'     => 'label_style',
			),

			'form_label_margin_bottom' => array(
				'label'           => esc_html__( 'Bottom Margin', 'academy-divi-modules' ),
				'type'            => 'range',
				'tab_slug'    => 'advanced',
				'toggle_slug'     => 'label_style',
			),

			'form_label_margin_left' => array(
				'label'           => esc_html__( 'Left Margin', 'academy-divi-modules' ),
				'type'            => 'range',
				'tab_slug'    => 'advanced',
				'toggle_slug'     => 'label_style',
			),

			'form_label_margin_right' => array(
				'label'           => esc_html__( 'Rigth Margin', 'academy-divi-modules' ),
				'type'            => 'range',
				'tab_slug'    => 'advanced',
				'toggle_slug'     => 'label_style',
			),

			'form_label_padding' => array(
				'label'           => esc_html__( 'Padding', 'academy-divi-modules' ),
				'type'            => 'range',
				'tab_slug'    => 'advanced',
				'toggle_slug'     => 'label_style',
			),


			// Form Field Styles

			'form_field_margin_top' => array(
				'label'           => esc_html__( 'Top Margin', 'academy-divi-modules' ),
				'type'            => 'range',
				'tab_slug'    => 'advanced',
				'toggle_slug'     => 'field_style',
			),

			'form_field_margin_bottom' => array(
				'label'           => esc_html__( 'Bottom Margin', 'academy-divi-modules' ),
				'type'            => 'range',
				'tab_slug'    => 'advanced',
				'toggle_slug'     => 'field_style',
			),

			'form_field_margin_left' => array(
				'label'           => esc_html__( 'Left Margin', 'academy-divi-modules' ),
				'type'            => 'range',
				'tab_slug'    => 'advanced',
				'toggle_slug'     => 'field_style',
			),

			'form_field_margin_right' => array(
				'label'           => esc_html__( 'Rigth Margin', 'academy-divi-modules' ),
				'type'            => 'range',
				'tab_slug'    => 'advanced',
				'toggle_slug'     => 'field_style',
			),

			'form_field_padding' => array(
				'label'           => esc_html__( 'Padding', 'academy-divi-modules' ),
				'type'            => 'range',
				'tab_slug'    => 'advanced',
				'toggle_slug'     => 'field_style',
			),


			// Form Button Styles

			'form_button_colors' => array(
				'label'               => esc_html__( 'Background Color', 'academy-divi-modules' ),
				'tab_slug'    => 'advanced',
				'toggle_slug'     => 'button_style',
				'type'                => 'composite',
				'composite_type'      => 'default',
				'composite_structure' => array(
					'normal_color' => array(
						'label'    => esc_html( 'Normal', 'academy-divi-modules' ),
						'controls' => array(
							'button_background_color' => array(
								'type'            => 'color',
								'tab_slug'    => 'advanced',
								'toggle_slug'     => 'button_style',
							),
						),
					),
					'hover_color' => array(
						'label'    => esc_html( 'Hover', 'academy-divi-modules' ),
						'controls' => array(
							'button_background_hover_color' => array(
								'type'            => 'color',
								'tab_slug'    => 'advanced',
								'toggle_slug'     => 'button_style',
							),
						),
					),
				),
			),

			'form_button_margin_top' => array(
				'label'           => esc_html__( 'Top Margin', 'academy-divi-modules' ),
				'type'            => 'range',
				'tab_slug'    => 'advanced',
				'toggle_slug'     => 'button_style',
			),

			'form_button_margin_bottom' => array(
				'label'           => esc_html__( 'Bottom Margin', 'academy-divi-modules' ),
				'type'            => 'range',
				'tab_slug'    => 'advanced',
				'toggle_slug'     => 'button_style',
			),

			'form_button_margin_left' => array(
				'label'           => esc_html__( 'Left Margin', 'academy-divi-modules' ),
				'type'            => 'range',
				'tab_slug'    => 'advanced',
				'toggle_slug'     => 'button_style',
			),

			'form_button_margin_right' => array(
				'label'           => esc_html__( 'Rigth Margin', 'academy-divi-modules' ),
				'type'            => 'range',
				'tab_slug'    => 'advanced',
				'toggle_slug'     => 'button_style',
			),

			'form_button_padding' => array(
				'label'           => esc_html__( 'Padding', 'academy-divi-modules' ),
				'type'            => 'range',
				'tab_slug'    => 'advanced',
				'toggle_slug'     => 'button_style',
			),
		);
	}
	
	public static function get_shortcode($settings = array()) {
		$shortcode_output = 'student' === $settings['registration_type'] ? '[academy_student_registration_form]' : '[academy_instructor_registration_form]';
		return do_shortcode($shortcode_output);
	}

    public function render( $attrs, $content = null, $render_slug ) {
		// Form Container Styles
		
		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '%%order_class%% .academy-reg-form',
			'declaration' => sprintf(
				'margin-top: %1$s;',
				esc_html( $this->props['form_container_margin_top'].'px' )
			),
		));

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '%%order_class%% .academy-reg-form',
			'declaration' => sprintf(
				'margin-bottom: %1$s;',
				esc_html( $this->props['form_container_margin_bottom'].'px' )
			),
		));

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '%%order_class%% .academy-reg-form',
			'declaration' => sprintf(
				'margin-left: %1$s;',
				esc_html( $this->props['form_container_margin_left'].'px' )
			),
		));

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '%%order_class%% .academy-reg-form',
			'declaration' => sprintf(
				'margin-right: %1$s;',
				esc_html( $this->props['form_container_margin_right'].'px' )
			),
		));

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '%%order_class%% .academy-reg-form',
			'declaration' => sprintf(
				'padding: %1$s;',
				esc_html( $this->props['form_container_padding'].'px' )
			),
		));


		// Form Label Styles


		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '%%order_class%% .academy-reg-form .academy-form-group label',
			'declaration' => sprintf(
				'margin-top: %1$s;',
				esc_html( $this->props['form_label_margin_top'].'px' )
			),
		));

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '%%order_class%% .academy-reg-form .academy-form-group label',
			'declaration' => sprintf(
				'margin-bottom: %1$s;',
				esc_html( $this->props['form_label_margin_bottom'].'px' )
			),
		));

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '%%order_class%% .academy-reg-form .academy-form-group label',
			'declaration' => sprintf(
				'margin-left: %1$s;',
				esc_html( $this->props['form_label_margin_left'].'px' )
			),
		));

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '%%order_class%% .academy-reg-form .academy-form-group label',
			'declaration' => sprintf(
				'margin-right: %1$s;',
				esc_html( $this->props['form_label_margin_right'].'px' )
			),
		));

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '%%order_class%% .academy-reg-form .academy-form-group label',
			'declaration' => sprintf(
				'padding: %1$s;',
				esc_html( $this->props['form_label_padding'].'px' )
			),
		));

		// Form Field Styles


		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '%%order_class%% .academy-reg-form .academy-form-group input',
			'declaration' => sprintf(
				'margin-top: %1$s;',
				esc_html( $this->props['form_field_margin_top'].'px' )
			),
		));

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '%%order_class%% .academy-reg-form .academy-form-group input',
			'declaration' => sprintf(
				'margin-bottom: %1$s;',
				esc_html( $this->props['form_field_margin_bottom'].'px' )
			),
		));

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '%%order_class%% .academy-reg-form .academy-form-group input',
			'declaration' => sprintf(
				'margin-left: %1$s;',
				esc_html( $this->props['form_field_margin_left'].'px' )
			),
		));

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '%%order_class%% .academy-reg-form .academy-form-group input',
			'declaration' => sprintf(
				'margin-right: %1$s;',
				esc_html( $this->props['form_field_margin_right'].'px' )
			),
		));

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '%%order_class%% .academy-reg-form .academy-form-group input',
			'declaration' => sprintf(
				'padding: %1$s;',
				esc_html( $this->props['form_field_padding'].'px' )
			),
		));

		// Form Button Styles


		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '%%order_class%% .academy-reg-form .academy-form-group button',
			'declaration' => sprintf(
				'margin-top: %1$s;',
				esc_html( $this->props['form_button_margin_top'].'px' )
			),
		));

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '%%order_class%% .academy-reg-form .academy-form-group button',
			'declaration' => sprintf(
				'margin-bottom: %1$s;',
				esc_html( $this->props['form_button_margin_bottom'].'px' )
			),
		));

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '%%order_class%% .academy-reg-form .academy-form-group button',
			'declaration' => sprintf(
				'margin-left: %1$s;',
				esc_html( $this->props['form_button_margin_left'].'px' )
			),
		));

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '%%order_class%% .academy-reg-form .academy-form-group button',
			'declaration' => sprintf(
				'margin-right: %1$s;',
				esc_html( $this->props['form_button_margin_right'].'px' )
			),
		));

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '%%order_class%% .academy-reg-form .academy-form-group button',
			'declaration' => sprintf(
				'padding: %1$s;',
				esc_html( $this->props['form_button_padding'].'px' )
			),
		));

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '%%order_class%% .academy-reg-form .academy-form-group button',
			'declaration' => sprintf(
				'background-color: %1$s;',
				esc_html( $this->props['button_background_color'])
			),
		));

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '%%order_class%% .academy-reg-form .academy-form-group button:hover',
			'declaration' => sprintf(
				'background-color: %1$s;',
				esc_html( $this->props['button_background_hover_color'])
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

new ACDM_AcademyRegForm();