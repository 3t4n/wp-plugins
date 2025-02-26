<?php

defined( 'ABSPATH' ) || exit;

use AcademyLMS\Divi\Helper;

class ACDM_AcademySearch extends ET_Builder_Module {

	public $slug       = 'acdm_search';
	public $vb_support = 'on';

	protected $module_credits = array(
		'author'     => 'AcademyLMS',
		'author_uri' => 'https://academylms.net/',
	);

	public function init() {
		$this->name = esc_html__( 'Academy Course Search', 'academy-divi-modules' );
		$this->icon_path = plugin_dir_path( __FILE__ ) . 'icon.svg';

		// settings toggles
		$this->settings_modal_toggles = array(
			'general'  => array(
				'toggles' => array(
					'search_box' => esc_html__( 'Search Box', 'academy-divi-modules' ),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'form_container'     => esc_html__( 'Search Box Style', 'academy-divi-modules' ),
					'placeholder_style'     => esc_html__( 'Placeholder Style', 'academy-divi-modules' ),
					'field_style'     => esc_html__( 'Field Style', 'academy-divi-modules' ),
					'icon_style'     => esc_html__( 'Search Icon Style', 'academy-divi-modules' ),
				),
			),

			$this->advanced_fields = array(
				// Typography Controls
				'fonts'          => array(
					'form_placeholder_font'      => array(
						'css'             => array(
							'main' => '.academy-search-form-wrap .academy-search-form__field input::placeholder',
						),
						'hide_text_align' => true,
						'tab_slug'        => 'advanced',
						'toggle_slug'     => 'placeholder_style',
					),
					'form_field_font'      => array(
						'css'             => array(
							'main' => '.academy-search-form-wrap .academy-search-form__field input',
						),
						'hide_text_align' => true,
						'tab_slug'        => 'advanced',
						'toggle_slug'     => 'field_style',
					),
				),
				'borders'        => array(
					'default'    => false,
					'form_container' => array(
						'css'         => array(
							'main'      => array(
								'border_radii'  => '%%order_class%%  .academy-search-form-wrap .academy-search-form__field-input',
								'border_styles' => '%%order_class%%  .academy-search-form-wrap .academy-search-form__field-input',
							),
							'important' => true,
						),
						'tab_slug'        => 'advanced',
						'toggle_slug'     => 'form_container',
					),
					'form_icon_border' => array(
						'css'         => array(
							'main'      => array(
								'border_radii'  => '%%order_class%% .academy-search-form-wrap .academy-search-form__field-icon',
								'border_styles' => '%%order_class%% .academy-search-form-wrap .academy-search-form__field-icon',
							),
							'important' => true,
						),
						'tab_slug'        => 'advanced',
						'toggle_slug'     => 'button_style',
					),
				),
				'background'     => array(
					'css'                  => array(
						'main'      => '%%order_class%%  .academy-search-form-wrap .academy-search-form__field-input',
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
            'placeholder'     => array(
				'label'           => esc_html__( 'Search Placeholder', 'academy-divi-modules' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'toggle_slug'     => 'search_box',
                'default'         => 'Search your course here....',
				'computed_affects' => array(
					'__shortcode',
				),
			),
			'__shortcode' => array(
                'type'            => 'computed', // Change type to computed
                'toggle_slug'     => 'main_content',
				'computed_callback'   => array(
					'ACDM_AcademySearch',
					'get_shortcode',
				),
                'computed_depends_on' => array(
                    'placeholder',
                ),
            ),

			// Form Container Styles

			'form_container_margin_top' => array(
				'label'           => esc_html__( 'Top Margin', 'academy-divi-modules' ),
				'type'            => 'range',
				'tab_slug'    => 'advanced',
				'toggle_slug'     => 'form_container',
				'mobile_options'  => true,
			),

			'form_container_margin_bottom' => array(
				'label'           => esc_html__( 'Bottom Margin', 'academy-divi-modules' ),
				'type'            => 'range',
				'tab_slug'    => 'advanced',
				'toggle_slug'     => 'form_container',
				'mobile_options'  => true,
			),

			'form_container_margin_left' => array(
				'label'           => esc_html__( 'Left Margin', 'academy-divi-modules' ),
				'type'            => 'range',
				'tab_slug'    => 'advanced',
				'toggle_slug'     => 'form_container',
				'mobile_options'  => true,
			),

			'form_container_margin_right' => array(
				'label'           => esc_html__( 'Rigth Margin', 'academy-divi-modules' ),
				'type'            => 'range',
				'tab_slug'    => 'advanced',
				'toggle_slug'     => 'form_container',
				'mobile_options'  => true,
			),

			'form_container_padding' => array(
				'label'           => esc_html__( 'Padding', 'academy-divi-modules' ),
				'type'            => 'range',
				'tab_slug'    => 'advanced',
				'toggle_slug'     => 'form_container',
				'mobile_options'  => true,
			),


			// Form Icon Styles

			'icon_color' => array(
				'label'               => esc_html__( 'Icon Color', 'academy-divi-modules' ),
				'type'            => 'color',
				'tab_slug'    => 'advanced',
				'toggle_slug'     => 'icon_style',
			),

			'form_icon_background_color' => array(
				'label'               => esc_html__( 'Background Color', 'academy-divi-modules' ),
				'tab_slug'    => 'advanced',
				'toggle_slug'     => 'icon_style',
				'type'                => 'composite',
				'composite_type'      => 'default',
				'composite_structure' => array(
					'normal_color' => array(
						'label'    => esc_html( 'Normal', 'academy-divi-modules' ),
						'controls' => array(
							'icon_background_color' => array(
								'type'            => 'color',
								'tab_slug'    => 'advanced',
								'toggle_slug'     => 'icon_style',
							),
						),
					),
					'hover_color' => array(
						'label'    => esc_html( 'Hover', 'academy-divi-modules' ),
						'controls' => array(
							'icon_background_hover_color' => array(
								'type'            => 'color',
								'tab_slug'    => 'advanced',
								'toggle_slug'     => 'icon_style',
							),
						),
					),
				),
			),

			'form_icon_size' => array(
				'label'           => esc_html__( 'Icon Size', 'academy-divi-modules' ),
				'type'            => 'range',
				'tab_slug'    => 'advanced',
				'toggle_slug'     => 'icon_style',
			),

			'form_icon_position_top' => array(
				'label'           => esc_html__( 'Position Top', 'academy-divi-modules' ),
				'type'            => 'range',
				'tab_slug'    => 'advanced',
				'toggle_slug'     => 'icon_style',
			),

			'form_icon_position_right' => array(
				'label'           => esc_html__( 'Position Right', 'academy-divi-modules' ),
				'type'            => 'range',
				'tab_slug'    => 'advanced',
				'toggle_slug'     => 'icon_style',
			),

			'form_icon_padding' => array(
				'label'           => esc_html__( 'Padding', 'academy-divi-modules' ),
				'type'            => 'range',
				'tab_slug'    => 'advanced',
				'toggle_slug'     => 'icon_style',
			),
		);
	}

	public static function get_shortcode($settings = array()) {
		$attr_array = [
			'placeholder'               => $settings['placeholder'],
		];

		$shortcode = '[academy_course_search ' . Helper::attr_shortcide( $attr_array ) . ']';
		return do_shortcode( $shortcode );
	}

    public function render( $attrs, $content = null, $render_slug ) {
		// Form Container Styles
		
		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '%%order_class%% .academy-search-form-wrap .academy-search-form__field-input',
			'declaration' => sprintf(
				'margin-top: %1$s;',
				esc_html( $this->props['form_container_margin_top'].'px' )
			),
		));

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '%%order_class%% .academy-search-form-wrap .academy-search-form__field-input',
			'declaration' => sprintf(
				'margin-bottom: %1$s;',
				esc_html( $this->props['form_container_margin_bottom'].'px' )
			),
		));

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '%%order_class%% .academy-search-form-wrap .academy-search-form__field-input',
			'declaration' => sprintf(
				'margin-left: %1$s;',
				esc_html( $this->props['form_container_margin_left'].'px' )
			),
		));

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '%%order_class%% .academy-search-form-wrap .academy-search-form__field-input',
			'declaration' => sprintf(
				'margin-right: %1$s;',
				esc_html( $this->props['form_container_margin_right'].'px' )
			),
		));

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '%%order_class%% .academy-search-form-wrap .academy-search-form__field-input',
			'declaration' => sprintf(
				'padding: %1$s;',
				esc_html( $this->props['form_container_padding'].'px' )
			),
		));


		// Form Icon Styles


		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '%%order_class%% .academy-search-form-wrap .academy-search-form__field-icon',
			'declaration' => sprintf(
				'font-size: %1$s;',
				esc_html( $this->props['form_icon_size'].'px' )
			),
		));

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '%%order_class%% .academy-search-form-wrap .academy-search-form__field-icon',
			'declaration' => sprintf(
				'top: %1$s;',
				esc_html( $this->props['form_icon_position_top'].'px' )
			),
		));

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '%%order_class%% .academy-search-form-wrap .academy-search-form__field-icon',
			'declaration' => sprintf(
				'right: %1$s;',
				esc_html( $this->props['form_icon_position_top'].'px' )
			),
		));

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '%%order_class%% .academy-search-form-wrap .academy-search-form__field-icon',
			'declaration' => sprintf(
				'padding: %1$s;',
				esc_html( $this->props['form_icon_padding'].'px' )
			),
		));

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '%%order_class%% .academy-icon--search:before',
			'declaration' => sprintf(
				'color: %1$s;',
				esc_html( $this->props['icon_color'])
			),
		));

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '%%order_class%% .academy-search-form-wrap .academy-search-form__field-icon',
			'declaration' => sprintf(
				'background-color: %1$s;',
				esc_html( $this->props['icon_background_color'])
			),
		));

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '%%order_class%% .academy-search-form-wrap .academy-search-form__field-icon:hover',
			'declaration' => sprintf(
				'background-color: %1$s;',
				esc_html( $this->props['icon_background_hover_color'])
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

new ACDM_AcademySearch();

