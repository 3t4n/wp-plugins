<?php

class DualColorHeading extends ET_Builder_Module {

	public $slug       = 'daio_dual_color_heading';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://divipeople.com/divi-aio',
		'author'     => 'DiviPeople',
		'author_uri' => 'https://divipeople.com',
	);

	public function init() {

		$this->name								=  esc_html__( ' AiO - Dual Color Heading', 'daio' );
		$this->icon_path					=  plugin_dir_path( __FILE__ ) . '';
		$this->main_css_element 	= '%%order_class%%.daio_dual_color_heading';
		
		$this->settings_modal_toggles = array(
			'general'  => array(
				'toggles' => array(
					'heading'		=>	esc_html__( 'Heading Text', 'daio' ),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'basic_settings'	=>	esc_html__( 'General', 'daio' ),
					'heading_style'   => array(
						'sub_toggles'		=> array(
							'normal'		=> array(
								'name'		=> 'Normal',
							),
							'highlight'		=> array(
								'name'		=> 'Highlight',
							),
						),
						'tabbed_subtoggles'	=> true,
						'title' 			=> esc_html__( 'Heading Style', 'daio' ),
					),
				),
			),
		);

		$this->custom_css_fields = array(
			'heading_text' => array(
				'label'    => esc_html__( 'Heading Text', 'daio' ),
				'selector' => '%%order_class%% .daio-dual-color-heading',
			),
		);
	}

	/**
	 * Get Fields
	 */
	public function get_fields() {

		$et_accent_color = et_builder_accent_color();

		return array(

			'before_text' => array(
				'default'           => 'I love ',
				'label'           	=> esc_html__( 'Before Text ', 'daio' ),
				'type'            	=> 'text',
				'option_category' 	=> 'basic_option',
				'toggle_slug'     	=> 'heading',
			),

			'highlight_text' => array(
				'default'           => 'WordPress ',
				'label'           	=> esc_html__( 'Highlight Text ', 'daio' ),
				'type'            	=> 'text',
				'option_category' 	=> 'basic_option',
				'toggle_slug'     	=> 'heading',
			),

			'after_text' => array(
				'default'           => 'and Divi',
				'label'           	=> esc_html__( 'After Text', 'daio' ),
				'type'            	=> 'text',
				'option_category' 	=> 'basic_option',
				'toggle_slug'     	=> 'heading',
			),

			'heading_tag' => array(
				'label'           => esc_html__( 'Select Tag', 'daio' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'		=>[
					'h1'   => __( 'H1', 'daio' ),
					'h2'   => __( 'H2', 'daio' ),
					'h3'   => __( 'H3', 'daio' ),
					'h4'   => __( 'H4', 'daio' ),
					'h5'   => __( 'H5', 'daio' ),
					'h6'   => __( 'H6', 'daio' ),
					'div'  => __( 'div', 'daio' ),
					'span' => __( 'span', 'daio' ),
					'p'    => __( 'p', 'daio' ),
				],
		    'default'         => 'h3',
				'tab_slug'				=> 'advanced',
				'toggle_slug'     => 'basic_settings',
			),

			'heading_align' => array(
				'label'           => esc_html__( 'Alignment', 'daio' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'					=> et_builder_get_text_orientation_options( array( 'justified' ), array( 'justify' => 'Justified' ) ),
	      'default'         => 'h3',
				'tab_slug'				=> 'advanced',
				'toggle_slug'     => 'basic_settings',
			),

		);
	}

		/**
	 * Config Advanced Fields
	 */
	public function get_advanced_fields_config() {

		$et_accent_color = et_builder_accent_color();
		$advanced_fields = array();

		$advanced_fields['text'] = false;
		$advanced_fields['link_options']  = false;
		
	  $advanced_fields['fonts']['normal'] = array(
	    'css'   => array(
	      'main' => "%%order_class%% .daio-dual-heading-text",
        'font_style' => "%%order_class%% .daio-first-text, %%order_class%% .daio-third-text",
	      'important' => 'all',
	    ),
	    'hide_text_align' => true,
			'label'        		=> esc_html__( 'Normal', 'daio' ),
			'tab_slug'				=> 'advanced',
	    'toggle_slug' 		=> 'heading_style',
			'sub_toggle'			=> 'normal',
	  );

	  $advanced_fields['fonts']['highlight'] = array(
	    'css'   => array(
	      'main' => "%%order_class%% .daio-highlight-text",
	      'important' => 'all',
	    ),
	    'hide_text_align' => true,
			'label'        => esc_html__( 'Highlight', 'daio' ),
			'tab_slug'			=> 'advanced',
	    'toggle_slug' 	=> 'heading_style',
			'sub_toggle'		=> 'highlight',
	  );

		return $advanced_fields;

	}

	/**
	 * Render Method
	 */
	public function render( $attrs, $content = null, $render_slug ) {

		$before_text 		= $this->props['before_text'];
		$highlight_text = $this->props['highlight_text'];
		$after_text 		= $this->props['after_text'];
		$heading_tag 		= $this->props['heading_tag'];
		$heading_align  = $this->props['heading_align'];

		if ( '' !== $heading_align ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%% .daio-dual-color-heading',
				'declaration' => sprintf(
					'text-align: %1$s%2$s;',
					esc_html( $heading_align ),
					et_is_builder_plugin_active() ? ' !important' : ''
				),
			) );
		}

		$output = sprintf(
			'<div class="daio-module-content daio-dual-color-heading">
				<%4$s>
					<span class="daio-before-heading">
						<span class="daio-dual-heading-text daio-first-text">
							%1$s
						</span>
					</span>
					<span class="daio-highlight-heading">
						<span class="daio-dual-heading-text daio-highlight-text daio-second-text">
							%2$s
						</span>
					</span>
					<span class="daio-after-heading">
						<span class="daio-dual-heading-text daio-third-text">
							%3$s
						</span>
					</span>
				</%4$s>
			</div>',
			$before_text,
			$highlight_text,
			$after_text,
			$heading_tag
		);

		return $output;

	}

}

new DualColorHeading;
