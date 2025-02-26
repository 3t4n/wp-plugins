<?php

defined( 'ABSPATH' ) || exit;

class ACDM_AcademyCourseFilters extends ET_Builder_Module {

	public $slug       = 'acdm_course_filters';
	public $vb_support = 'on';

	protected $module_credits = array(
		'author'     => 'AcademyLMS',
		'author_uri' => 'https://academylms.net/',
	);

	public function init() {
		$this->name = esc_html__( 'Academy Course Filters', 'academy-divi-modules' );
		$this->icon_path = plugin_dir_path( __FILE__ ) . 'icon.svg';

		// settings toggles
		$this->settings_modal_toggles = array(
			'advanced' => array(
				'toggles' => array(
					'label_options'     => esc_html__( 'Label Options', 'academy-divi-modules' ),
					'items_options'     => esc_html__( 'Items Options', 'academy-divi-modules' ),
					'search_options'     => esc_html__( 'Search Options', 'academy-divi-modules' ),
					'checkbox_options'     => esc_html__( 'Checkbox Options', 'academy-divi-modules' ),
					'spacing_options'     => esc_html__( 'Spacing Options', 'academy-divi-modules' ),
				),
			),
		);

		$this->advanced_fields = array(
			// Typography Controls
			'fonts'          => array(
				'label_font'      => array(
					'label'               => esc_html__( 'Label', 'academy-divi-modules' ),
					'css'             => array(
						'main' => '.academy-course-filters .academy-archive-course-widget__title',
					),
					'hide_text_align' => true,
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'label_options',
				),
				'items_font'      => array(
					'label'               => esc_html__( 'Items', 'academy-divi-modules' ),
					'css'             => array(
						'main' => '.academy-course-filters .academy-archive-course-widget__body label',
					),
					'hide_text_align' => true,
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'items_options',
				),
				'search_font'      => array(
					'label'               => esc_html__( 'Search Box', 'academy-divi-modules' ),
					'css'             => array(
						'main' => '.academy-course-filters .academy-archive-course-widget--search input.academy-archive-course-search',
					),
					'hide_text_align' => true,
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'search_options',
				),
			),
			'borders'        => array(
				'default'    => false,
				'search_border' => array(
					'label'               => esc_html__( 'Search Box', 'academy-divi-modules' ),
					'css'         => array(
						'main'      => array(
							'border_radii'  => '%%order_class%% .academy-course-filters .academy-archive-course-widget--search input.academy-archive-course-search',
							'border_styles' => '%%order_class%% .academy-course-filters .academy-archive-course-widget--search input.academy-archive-course-search',
						),
						'important' => true,
					),
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'search_options',
				),
				'checkbox_border' => array(
					'label'               => esc_html__( 'Checkbox', 'academy-divi-modules' ),
					'css'         => array(
						'main'      => array(
							'border_radii'  => '%%order_class%% .academy-course-filters .academy-archive-course-widget__body label .checkmark',
							'border_styles' => '%%order_class%% .academy-course-filters .academy-archive-course-widget__body label .checkmark',
						),
						'important' => true,
					),
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'checkbox_options',
				),
			),
			'margin_padding' => array(),
		);
	}

	public function get_fields() {
		return array(           
			'__shortcode' => array(
                'type'            => 'computed', // Change type to computed
                'toggle_slug'     => 'main_content',
				'computed_callback'   => array(
					'ACDM_AcademyCourseFilters',
					'get_shortcode',
				),
                'computed_depends_on' => array(
                    '',
                ),
            ),

			// Search Box Styles

			'search_background_color' => array(
				'label'           => esc_html__( 'Background Color', 'academy-divi-modules' ),
				'type'            => 'color',
				'tab_slug'    => 'advanced',
				'toggle_slug'     => 'search_options',
			),

			'search_input_color' => array(
				'label'           => esc_html__( 'Input Color', 'academy-divi-modules' ),
				'type'            => 'color',
				'tab_slug'    => 'advanced',
				'toggle_slug'     => 'search_options',
			),

			'search_placeholder_color' => array(
				'label'           => esc_html__( 'Input Placeholder Color', 'academy-divi-modules' ),
				'type'            => 'color',
				'tab_slug'    => 'advanced',
				'toggle_slug'     => 'search_options',
			),

			// Checkbox Styles

			'checkbox_size' => array(
				'label'           => esc_html__( 'Checkbox Size', 'academy-divi-modules' ),
				'type'            => 'range',
				'tab_slug'    => 'advanced',
				'toggle_slug'     => 'checkbox_options',
				'mobile_options'  => true,
			),

			'checked_background_color' => array(
				'label'           => esc_html__( 'Checked Background Color', 'academy-divi-modules' ),
				'type'            => 'color',
				'tab_slug'    => 'advanced',
				'toggle_slug'     => 'checkbox_options',
			),

			'checked_color' => array(
				'label'           => esc_html__( 'Checked Color', 'academy-divi-modules' ),
				'type'            => 'color',
				'tab_slug'    => 'advanced',
				'toggle_slug'     => 'checkbox_options',
			),

			// Spacing Styles

			'filter_widget_heading' => array(
				'label'           => esc_html__( 'Filter Widget Heading', 'academy-divi-modules' ),
				'type'            => 'range',
				'tab_slug'    => 'advanced',
				'toggle_slug'     => 'spacing_options',
				'mobile_options'  => true,
			),

			'space_between_filter_widgets' => array(
				'label'           => esc_html__( 'Space Between Filter Widgets', 'academy-divi-modules' ),
				'type'            => 'range',
				'tab_slug'    => 'advanced',
				'toggle_slug'     => 'spacing_options',
				'mobile_options'  => true,
			),

			'space_between_widget_item' => array(
				'label'           => esc_html__( 'Space Between Widget item', 'academy-divi-modules' ),
				'type'            => 'range',
				'tab_slug'    => 'advanced',
				'toggle_slug'     => 'spacing_options',
				'mobile_options'  => true,
			),

			'space_between_checkbox_text' => array(
				'label'           => esc_html__( 'Space Between Checkbox & Text', 'academy-divi-modules' ),
				'type'            => 'range',
				'tab_slug'    => 'advanced',
				'toggle_slug'     => 'spacing_options',
				'mobile_options'  => true,
			),

		);
	}
	
	public static function get_shortcode($args = array()) {
		$shortcode_output = '[academy_course_filters]';
		return do_shortcode($shortcode_output);
	}

    public function render( $attrs, $content = null, $render_slug ) {

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '%%order_class%% .academy-course-filters .academy-archive-course-widget--search input.academy-archive-course-search',
			'declaration' => sprintf(
				'background-color: %1$s;',
				esc_html( $this->props['search_background_color'] )
			),
		));

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '%%order_class%% .academy-course-filters .academy-archive-course-widget--search input.academy-archive-course-search',
			'declaration' => sprintf(
				'color: %1$s;',
				esc_html( $this->props['search_input_color'] )
			),
		));

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => '%%order_class%% .academy-course-filters .academy-archive-course-widget--search input.academy-archive-course-search::placeholder',
			'declaration' => sprintf(
				'color: %1$s;',
				esc_html( $this->props['search_placeholder_color'] )
			),
		));

		// Checkbox Styles

		ET_Builder_Element::set_style($render_slug, array(
			'selector'    => '%%order_class%% .academy-course-filters .academy-archive-course-widget__body label .checkmark',
			'declaration' => sprintf(
				'width: %1$s; height: %2$s;',
				esc_html($this->props['checkbox_size'].'px'),
				esc_html($this->props['checkbox_size'].'px'),
			),
		));

		ET_Builder_Element::set_style($render_slug, array(
			'selector'    => '%%order_class%% .academy-course-filters .academy-archive-course-widget__body label input:checked ~ .checkmark',
			'declaration' => sprintf(
				'background-color: %1$s;',
				esc_html($this->props['checked_background_color']),
			),
		));

		ET_Builder_Element::set_style($render_slug, array(
			'selector'    => '%%order_class%% .academy-course-filters .academy-archive-course-widget__body label .checkmark:after',
			'declaration' => sprintf(
				'border-color: %1$s;',
				esc_html($this->props['checked_color']),
			),
		));


		// Spacing Styles


		ET_Builder_Element::set_style($render_slug, array(
			'selector'    => '%%order_class%% .academy-course-filters .academy-archive-course-widget__title',
			'declaration' => sprintf(
				'margin-bottom: %1$s;',
				esc_html($this->props['filter_widget_heading'].'px'),
			),
		));

		ET_Builder_Element::set_style($render_slug, array(
			'selector'    => '%%order_class%% .academy-course-filters .academy-archive-course-widget',
			'declaration' => sprintf(
				'margin-bottom: %1$s;',
				esc_html($this->props['space_between_filter_widgets'].'px'),
			),
		));

		ET_Builder_Element::set_style($render_slug, array(
			'selector'    => '%%order_class%% .academy-course-filters .academy-archive-course-widget__body label',
			'declaration' => sprintf(
				'margin-bottom: %1$s;',
				esc_html($this->props['space_between_widget_item'].'px'),
			),
		));

		ET_Builder_Element::set_style($render_slug, array(
			'selector'    => '%%order_class%% .academy-course-filters .academy-archive-course-widget__body label',
			'declaration' => sprintf(
				'padding-left: %1$s;',
				esc_html($this->props['space_between_checkbox_text'].'px'),
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

new ACDM_AcademyCourseFilters();

