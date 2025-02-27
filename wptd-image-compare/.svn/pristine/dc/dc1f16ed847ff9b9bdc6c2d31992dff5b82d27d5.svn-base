<?php
/**
 * WPTD Image Compare
 * @since 1.0.0
 */
 
class WPTD_Image_Compare_Widget extends \Elementor\Widget_Base {
	
	public $image_class;
	
	/**
	 * Get widget name.
	 *
	 * Retrieve Image Compare widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return "wptdimgc";
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Image Compare widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( "Image Compare", "wptd-image-compare" );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Image Compare widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return "wptd-image-compare-default-icon icon-split-v-alt";
	}


	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Animated Text widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ "wptd" ];
	}
	
	/**
	 * Retrieve the list of scripts the image compare depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @since 1.3.0
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends() {
		return [ 'jquery-event-move', 'jquery-wptdimgc', 'wptd-image-compare' ];
	}
	
	/**
	 * Retrieve the list of styles the image compare depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @since 1.3.0
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
	public function get_style_depends() {
		return [ 'wptdimgc' ];
	}
	
	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the widget belongs to.
	 *
	 * @since 2.1.0
	 * @access public
	 *
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'image', 'compare', 'image compare', 'before after' ];
	}

	/**
	 * Register Animated Text widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {

		//Image Section
		$this->start_controls_section(
			"image_section",
			[
				"label"	=> esc_html__( "Image", "wptd-image-compare" ),
				"tab"	=> \Elementor\Controls_Manager::TAB_CONTENT,
				"description"	=> esc_html__( "Default image options.", "wptd-image-compare" ),
			]
		);
		$this->start_controls_tabs( 'image_compares' );
		$this->start_controls_tab(
			'before_part',
			[
				'label' => esc_html__( 'Before', 'wptd-image-compare' ),
			]
		);
		$this->add_control(
			"before_img",
			[
				"type" => \Elementor\Controls_Manager::MEDIA,
				"label" => esc_html__( "Image", "wptd-image-compare" ),
				"description"	=> esc_html__( "Choose before image.", "wptd-image-compare" ),
				"dynamic" => [
					"active" => true,
				],
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'after_part',
			[
				'label' => esc_html__( 'After', 'wptd-image-compare' ),
			]
		);
		$this->add_control(
			"after_img",
			[
				"type" => \Elementor\Controls_Manager::MEDIA,
				"label" => esc_html__( "Image", "wptd-image-compare" ),
				"description"	=> esc_html__( "Choose after image.", "wptd-image-compare" ),
				"dynamic" => [
					"active" => true,
				],
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->add_group_control(
			\Elementor\Group_Control_Image_Size::get_type(),
			[
				'name' => 'compare_img', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `thumbnail_size` and `thumbnail_custom_dimension`.
				'default' => 'full',
				'separator' => 'none',
			]
		);
		$this->end_controls_section();
		
		//Option Section
		$this->start_controls_section(
			"option_section",
			[
				"label"	=> esc_html__( "Options", "wptd-image-compare" ),
				"tab"	=> \Elementor\Controls_Manager::TAB_CONTENT,
				"description"	=> esc_html__( "Default image compare slider options.", "wptd-image-compare" ),
			]
		);
		$this->add_control(
			'orientation',
			[
				'label' => __( 'Orientation', 'wptd-image-compare' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'default' => 'horizontal',
				'options' => [
					'horizontal' => [
						'title' => __( 'Horizontal', 'wptd-image-compare' ),
						'icon' => 'icon-split-h',
					],
					'vertical' => [
						'title' => __( 'Vertical', 'wptd-image-compare' ),
						'icon' => 'icon-split-v',
					]
				],
				'toggle' => false,
			]
		);		
		$this->add_responsive_control(
			'compare_offset',
			[
				'label' => esc_html__( 'Default Offset', 'wptd-image-compare' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'default' => [
					'size' => 0.5,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1,
						'step' => 0.1,
					],
				]
			]
		);
		$this->add_control(
			"slide_hover",
			[
				"type"			=> \Elementor\Controls_Manager::SWITCHER,
				"label" 		=> esc_html__( "Move slider on mouse hover?", "wptd-image-compare" ),
				"label_on"		=> esc_html__( "On", "wptd-image-compare" ),
				"label_off"		=> esc_html__( "Off", "wptd-image-compare" ),
				"description"	=> esc_html__( "This is option for enable or disable move slide on mouse hover.", "wptd-image-compare" ),
				"return_value"	=> "yes",
				"default"		=> "no"
			]
		);
		$this->add_control(
			"swipe",
			[
				"type"			=> \Elementor\Controls_Manager::SWITCHER,
				"label" 		=> esc_html__( "Allow a user to swipe", "wptd-image-compare" ),
				"label_on"		=> esc_html__( "Yes", "wptd-image-compare" ),
				"label_off"		=> esc_html__( "No", "wptd-image-compare" ),
				"description"	=> esc_html__( "Allow a user to swipe anywhere on the image to control slider movement.", "wptd-image-compare" ),
				"return_value"	=> "yes",
				"default"		=> "no"
			]
		);
		$this->add_control(
			"move",
			[
				"type"			=> \Elementor\Controls_Manager::SWITCHER,
				"label" 		=> esc_html__( "Anywhere move", "wptd-image-compare" ),
				"label_on"		=> esc_html__( "Yes", "wptd-image-compare" ),
				"label_off"		=> esc_html__( "No", "wptd-image-compare" ),
				"description"	=> esc_html__( "Allow a user to click (or tap) anywhere on the image to move the slider to that location.", "wptd-image-compare" ),
				"return_value"	=> "yes",
				"default"		=> "no"
			]
		);
		$this->add_control(
			"overlay",
			[
				"type"			=> \Elementor\Controls_Manager::SWITCHER,
				"label" 		=> esc_html__( "Overlay", "wptd-image-compare" ),
				"label_on"		=> esc_html__( "On", "wptd-image-compare" ),
				"label_off"		=> esc_html__( "Off", "wptd-image-compare" ),
				"description"	=> esc_html__( "This is option to disaplay overlay things like before after text.", "wptd-image-compare" ),
				"return_value"	=> "yes",
				"default"		=> "no"
			]
		);
		$this->start_controls_tabs( 'option_before_after' );
		$this->start_controls_tab(
			'opt_before_part',
			[
				'label' => esc_html__( 'Before', 'wptd-image-compare' ),
				"condition" 	=> [
					"overlay" 	=> "yes"
				]
			]
		);
		$this->add_control(
			"before_value",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label" 		=> esc_html__( "Before Text", "wptd-image-compare" ),
				"description"	=> esc_html__( "This is option set before text. If no need to display this value just leave it blank.", "wptd-image-compare" ),
				"default"		=> esc_html__( "Before", "wptd-image-compare" ),
				"condition" 	=> [
					"overlay" 	=> "yes"
				]
			]
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'opt_after_part',
			[
				'label' => esc_html__( 'After', 'wptd-image-compare' ),
				"condition" 	=> [
					"overlay" 	=> "yes"
				]
			]
		);
		$this->add_control(
			"after_value",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label" 		=> esc_html__( "After Text", "wptd-image-compare" ),
				"description"	=> esc_html__( "This is option set after text. If no need to display this value just leave it blank.", "wptd-image-compare" ),
				"default"		=> esc_html__( "After", "wptd-image-compare" ),
				"condition" 	=> [
					"overlay" 	=> "yes"
				]
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();
		
		// Style General Section
		$this->start_controls_section(
			'section_style_general',
			[
				'label' => __( 'General', 'wptd-image-compare' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'wrap_padding',
			[
				'label' => esc_html__( 'Padding', 'wptd-image-compare' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .wptd-imgc-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_responsive_control(
			'wrap_margin',
			[
				'label' => esc_html__( 'Margin', 'wptd-image-compare' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .wptd-imgc-wrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->end_controls_section();

	}

	/**
	 * Render Animated Text widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();
		extract( $settings );

		$_offset = isset( $compare_offset ) && isset( $compare_offset['size'] ) ? $compare_offset['size'] : 0.5;
		$_move = isset( $move ) && $move == 'yes' ? true : false;
		$_swipe = isset( $swipe ) && $swipe == 'yes' ? true : false;
		$_slide_hover = isset( $slide_hover ) && $slide_hover == 'yes' ? true : false;	
		$_overlay = isset( $overlay ) && $overlay != 'yes' ? true : false;	
		$_orientation = isset( $orientation ) ? $orientation : 'horizontal';
		$_before = isset( $before_value ) ? $before_value : '';
		$_after = isset( $after_value ) ? $after_value : '';
				
		//Image Section
		$before_image = $after_image = '';
		echo sprintf( '<figure class="%1$s" data-offset="%2$s" data-orientation="%3$s" data-move="%4$s" data-swipe="%5$s" data-hover="%6$s" data-noverlay="%7$s" data-before="%8$s" data-after="%9$s">',
			esc_attr( 'wptd-imgc-wrap' ),
			esc_attr( $_offset ),
			esc_attr( $_orientation ),
			esc_attr( $_move ),
			esc_attr( $_swipe ),
			esc_attr( $_slide_hover ),
			esc_attr( $_overlay ),
			esc_attr( $_before ),
			esc_attr( $_after )
		);
		if ( ! empty( $settings['before_img']['url'] ) ) {
			$this->image_class = 'before_image_class';
			$this->add_render_attribute( 'before_image_attr', 'src', $settings['before_img']['url'] );
			$this->add_render_attribute( 'before_image_attr', 'alt', \Elementor\Control_Media::get_image_alt( $settings['before_img'] ) );
			$this->add_render_attribute( 'before_image_attr', 'title', \Elementor\Control_Media::get_image_title( $settings['before_img'] ) );
			$this->add_render_attribute( 'before_image_class', 'class', 'img-fluid' );
			echo sprintf( '%1$s', WPTD_Image_Compare_Shortcode::wptd_get_attachment_image_html( $settings, 'compare_img', 'before_img', $this ) );
		}
		if ( ! empty( $settings['after_img']['url'] ) ) {
			$this->image_class = 'after_image_class';
			$this->add_render_attribute( 'after_image_attr', 'src', $settings['after_img']['url'] );
			$this->add_render_attribute( 'after_image_attr', 'alt', \Elementor\Control_Media::get_image_alt( $settings['after_img'] ) );
			$this->add_render_attribute( 'after_image_attr', 'title', \Elementor\Control_Media::get_image_title( $settings['after_img'] ) );
			$this->add_render_attribute( 'after_image_class', 'class', 'img-fluid' );
			echo sprintf( '%1$s', WPTD_Image_Compare_Shortcode::wptd_get_attachment_image_html( $settings, 'compare_img', 'after_img', $this ) );
		}
		echo sprintf( '%1$s', '</figure>' );

	}
		
}