<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;

/**
 * AI Addons Circle Progress Widget
 *
 * @since 1.0.0
 */
 
class AIEA_Elementor_Circle_Progress_Widget extends Widget_Base {
	
	private $excerpt_len;
	
	/**
	 * Get widget name.
	 *
	 * Retrieve Circle Progress widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'inc-circle-progress';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Blog widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Circle Progress', 'ai-addons' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Blog widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'ai-default-icon '. aiea_addon_base()->widget_icon_classes('circle-progress');
	}


	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Circle Progress widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ "ai-elements" ];
	}
	
	/**
	 * Retrieve the list of scripts the counter widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @since 1.3.0
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends() {
		return [ 'appear', 'circle-progress', 'ai-front-end'  ];
	}
		
	public function get_help_url() {
        return 'https://aiaddons.ai/circle-progress-demo/';
    }

	/**
	 * Register Circle Progress widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		
		$this->start_controls_section(
			'progress_section',
			[
				'label'	=> esc_html__( 'Progress', 'ai-addons' ),
				'tab'	=> Controls_Manager::TAB_CONTENT,
			]
		);		
		$this->add_responsive_control(
			'circle_val',
			[
				'label' => esc_html__( 'Progress %', 'ai-addons' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 70,
				],
				'range' => [
					'%' => [
						'min' => 1,
						'max' => 100,
					],
				]
			]
		);
		$this->add_control(
			'value_suffix_opt',
			[
				'label' 		=> esc_html__( 'Value Option', 'ai-addons' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'no'				
			]
		);
		$this->add_control(
			'value_suffix',
			[
				'type'			=> Controls_Manager::TEXT,
				'label'			=> esc_html__( 'Value Suffix', 'ai-addons' ),
				'default' 		=> '%',
				'condition' 	=> [
					'value_suffix_opt' 	=> [ 'yes' ]
				]
			]
		);		
		$this->add_responsive_control(
			'progress_size',
			[
				'label' => esc_html__( 'Size', 'ai-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'default' => [
					'size' => 200,
				],
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 600,
						'step' => 10,
					],
				]
			]
		);		
		$this->add_responsive_control(
			'progress_thikness',
			[
				'label' => esc_html__( 'Thickness', 'ai-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'default' => [
					'size' => 10,
				],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 50,
						'step' => 1,
					],
				]
			]
		);	
		$this->add_responsive_control(
			'progress_duration',
			[
				'label' => esc_html__( 'Duration', 'ai-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'default' => [
					'size' => 1500,
				],
				'range' => [
					'px' => [
						'min' => 100,
						'max' => 5000,
						'step' => 50,
					],
				]
			]
		);			
		$this->end_controls_section();
				
		//Layouts Section
		$this->start_controls_section(
			'layouts_section',
			[
				'label'			=> esc_html__( 'Layouts', 'ai-addons' ),
				'tab'			=> Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_responsive_control(
			'alignment',
			[
				'label' => esc_html__( 'Alignment', 'ai-addons' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left'    => [
						'title' => esc_html__( 'Left', 'ai-addons' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'ai-addons' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'ai-addons' ),
						'icon' => 'eicon-text-align-right',
					],
					'justify' => [
						'title' => esc_html__( 'Justified', 'ai-addons' ),
						'icon' => 'eicon-text-align-justify',
					],
				],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .circle-progress-wrapper' => 'text-align: {{VALUE}};',
				],
			]
		);		
		$this->add_control(
			'circle_layout',
			[
				'label'			=> esc_html__( 'Layout', 'ai-addons' ),
				'type'			=> Controls_Manager::SELECT,
				'default'		=> 'default',
				'options'		=> [
					'default'		=> esc_html__( 'Default', 'ai-addons' ),
					'ai'		=> esc_html__( 'Classic', 'ai-addons' ),
					'modern'		=> esc_html__( 'Modern', 'ai-addons' ),
					'ai-pro'	=> esc_html__( 'AI Pro', 'ai-addons' ),
				]
			]
		);
		$this->add_control(
			'progress_heading',
			[
				'label'			=> esc_html__( 'Post Heading Tag', 'ai-addons' ),
				'type'			=> Controls_Manager::SELECT,
				'default'		=> 'h3',
				'options'		=> [
					'h1'		=> esc_html__( 'h1', 'ai-addons' ),
					'h2'		=> esc_html__( 'h2', 'ai-addons' ),
					'h3'		=> esc_html__( 'h3', 'ai-addons' ),
					'h4'		=> esc_html__( 'h4', 'ai-addons' ),
					'h5'		=> esc_html__( 'h5', 'ai-addons' ),
					'h6'		=> esc_html__( 'h6', 'ai-addons' ),
				]
			]
		);
		
		$this->add_control(
			'section_title_enabled',
			[
				'label' => esc_html__( 'Title Enabled?', 'ai-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'yes',
				'classes' => 'ai-hidden-trigger-control'
			]
		);
		$this->add_control(
			'section_content_enabled',
			[
				'label' => esc_html__( 'Content Enabled?', 'ai-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'no',
				'classes' => 'ai-hidden-trigger-control'
			]
		);
		
		$this->add_control(
			'circle_items',
			[
				'label'				=> 'Circle Progress Items',
				'type'				=> 'drag-n-drop',
				'drag_items' 			=> [ 
					'visible' 			=> [ 
						'circle'		=> esc_html__( 'Circle', 'ai-addons' ),
						'title'			=> esc_html__( 'Title', 'ai-addons' )
					],
					'disabled'			=> [
						'content'		=> esc_html__( 'Content', 'ai-addons' )
					]
				],
				'triggers' => [
					'title' => 'section_title_enabled',
					'content' => 'section_content_enabled'
				]
			]
		);		
		$this->end_controls_section();	
		
		// Title Section
		$this->start_controls_section(
			'title_section',
			[
				'label'	=> esc_html__( 'Title', 'ai-addons' ),
				'tab'	=> Controls_Manager::TAB_CONTENT,
				'condition' 	=> [
					'section_title_enabled' 		=> 'yes'
				],
			]
		);
		$this->add_control(
			'title',
			[
				'type'			=> Controls_Manager::TEXT,
				'label'			=> esc_html__( 'Title', 'ai-addons' ),
				'default' 		=> esc_html__( 'Progress', 'ai-addons' ),
			]
		);
		$this->end_controls_section();
		
		// Content Section
		$this->start_controls_section(
			'content_section',
			[
				'label'	=> esc_html__( 'Content', 'ai-addons' ),
				'tab'	=> Controls_Manager::TAB_CONTENT,
				'condition' 	=> [
					'section_content_enabled' 		=> 'yes'
				],
			]
		);
		$this->add_control(
			'content',
			[
				'type'			=> Controls_Manager::TEXTAREA,
				'label'			=> esc_html__( 'Content', 'ai-addons' ),
				'default' 		=> ''
			]
		);
		$this->end_controls_section();
		
		// Go premium section
		$this->start_controls_section(
			'aiea_section_pro',
			[
				'label' => esc_html__( 'Go Premium for More Features', 'ai-addons' )
			]
		);
		$this->add_control(
			'aiea_get_pro',
			[
				'type' => Controls_Manager::RAW_HTML,
				'raw' => '<span class="inc-pro-feature"> Get the  <a href="https://aiaddons.ai/pricing/" target="_blank">Pro version</a> for more ai elements and customization options.</span>',
				'content_classes' => 'ai-elementor-warning'
			]
		);
		$this->end_controls_section();
		
		// Style Content Section
		$this->start_controls_section(
			'section_style_general',
			[
				'label' => __( 'General', 'ai-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,				
			]
		);
		$this->add_responsive_control(
			'progress_padding',
			[
				'label' => esc_html__( 'Padding', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .circle-progress-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_responsive_control(
			'progress_margin',
			[
				'label' => esc_html__( 'Margin', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .circle-progress-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->start_controls_tabs( 'general_styles' );
			$this->start_controls_tab(
				'general_normal',
				[
					'label' => esc_html__( 'Normal', 'ai-addons' ),
				]
			);
			$this->add_control(
				'font_color',
				[
					'label' => esc_html__( 'Font Color', 'ai-addons' ),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .circle-progress-wrapper' => 'color: {{VALUE}};'
					]
				]
			);
			$this->add_control(
				'bg_color',
				[
					'label' => esc_html__( 'Background Color', 'ai-addons' ),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .circle-progress-wrapper' => 'background-color: {{VALUE}};'
					]
				]
			);
			$this->add_control(
				'shadow_opt',
				[
					'label' 		=> esc_html__( 'Box Shadow', 'ai-addons' ),
					'type' 			=> Controls_Manager::SWITCHER,
					'default' 		=> 'no'
				]
			);
			$this->add_control(
				'progress_box_shadow',
				[
					'label' 		=> esc_html__( 'Box Shadow', 'ai-addons' ),
					'type' 			=> Controls_Manager::BOX_SHADOW,
					'condition' => [
						'shadow_opt' => 'yes',
					],
					'selectors' => [
						'{{WRAPPER}} .circle-progress-wrapper' => 'box-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{SPREAD}}px {{COLOR}} {{progress_box_shadow_pos.VALUE}};',
					]
				]
			);
			$this->add_control(
				'progress_box_shadow_pos',
				[
					'label' =>  esc_html__( 'Box Shadow Position', 'ai-addons' ),
					'type' => Controls_Manager::SELECT,
					'options' => [
						' ' => esc_html__( 'Outline', 'ai-addons' ),
						'inset' => esc_html__( 'Inset', 'ai-addons' ),
					],
					'condition' => [
						'shadow_opt' => 'yes',
					],
					'default' => ' ',
					'render_type' => 'ui',
				]
			);
			$this->end_controls_tab();
			$this->start_controls_tab(
				'general_hover',
				[
					'label' => esc_html__( 'Hover', 'ai-addons' ),
				]
			);
			$this->add_control(
				'font_hcolor',
				[
					'label' => esc_html__( 'Font Color', 'ai-addons' ),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .circle-progress-wrapper:hover' => 'color: {{VALUE}};'
					]
				]
			);
			$this->add_control(
				'bg_hcolor',
				[
					'label' => esc_html__( 'Background Color', 'ai-addons' ),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .circle-progress-wrapper:hover' => 'background-color: {{VALUE}};'
					]
				]
			);
			$this->add_control(
				'shadow_hopt',
				[
					'label' 		=> esc_html__( 'Box Shadow', 'ai-addons' ),
					'type' 			=> Controls_Manager::SWITCHER,
					'default' 		=> 'no'
				]
			);
			$this->add_control(
				'progress_hbox_shadow',
				[
					'label' 		=> esc_html__( 'Hover Box Shadow', 'ai-addons' ),
					'type' 			=> Controls_Manager::BOX_SHADOW,
					'condition' => [
						'shadow_hopt' => 'yes',
					],
					'selectors' => [
						'{{WRAPPER}} .circle-progress-wrapper:hover' => 'box-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{SPREAD}}px {{COLOR}} {{progress_hbox_shadow_pos.VALUE}};',
					]
				]
			);
			$this->add_control(
				'progress_hbox_shadow_pos',
				[
					'label' =>  esc_html__( 'Box Shadow Position', 'ai-addons' ),
					'type' => Controls_Manager::SELECT,
					'options' => [
						' ' => esc_html__( 'Outline', 'ai-addons' ),
						'inset' => esc_html__( 'Inset', 'ai-addons' ),
					],
					'condition' => [
						'shadow_hopt' => 'yes',
					],
					'default' => ' ',
					'render_type' => 'ui',
				]
			);
			$this->end_controls_tab();	
		$this->end_controls_tabs();	
		$this->end_controls_section();	
		
		// Style Progress Section
		$this->start_controls_section(
			'section_style_progress',
			[
				'label' => __( 'Progress', 'ai-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'circle_empty_color',
			[
				'type'			=> Controls_Manager::COLOR,
				'label'			=> esc_html__( 'Circle Empty Fill Color', 'ai-addons' ),
				'default' 		=> '#e1e1e1'
			]
		);
		$this->add_control(
			'circle_start_color',
			[
				'type'			=> Controls_Manager::COLOR,
				'label'			=> esc_html__( 'Circle Start Color', 'ai-addons' ),
				'default' 		=> '#333333'
			]
		);
		$this->add_control(
			'circle_end_color',
			[
				'type'			=> Controls_Manager::COLOR,
				'label'			=> esc_html__( 'Circle End Color', 'ai-addons' ),
				'default' 		=> ''
			]
		);
		$this->add_responsive_control(
			'progress_spacing',
			[
				'label' => esc_html__( 'Progress Bar Spacing', 'ai-addons' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 5,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .circle-progress-wrapper .circle-progress-circle' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					'(mobile){{WRAPPER}} .circle-progress-wrapper .circle-progress-circle' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);		
		$this->end_controls_section();	
		
		// Style Title Section
		$this->start_controls_section(
			'section_style_title',
			[
				'label' => __( 'Title', 'ai-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition' 	=> [
					'section_title_enabled' 		=> 'yes'
				],
			]
		);
		$this->start_controls_tabs( 'title_colors' );
		$this->start_controls_tab(
			'title_colors_normal',
			[
				'label' => esc_html__( 'Normal', 'ai-addons' ),
			]
		);
		$this->add_control(
			'title_color',
			[
				'type'			=> Controls_Manager::COLOR,
				'label'			=> esc_html__( 'Title Color', 'ai-addons' ),
				'default' 		=> '',
				'selectors' => [
					'{{WRAPPER}} .circle-progress-wrapper .circle-progress-title > *' => 'color: {{VALUE}};'
				],
			]
		);			
		$this->end_controls_tab();

		$this->start_controls_tab(
			'title_colors_hover',
			[
				'label' => esc_html__( 'Hover', 'ai-addons' ),
			]
		);
		$this->add_control(
			'title_hcolor',
			[
				'type'			=> Controls_Manager::COLOR,
				'label'			=> esc_html__( 'Title Hover Color', 'ai-addons' ),
				'default' 		=> '',
				'selectors' => [
					'{{WRAPPER}} .circle-progress-wrapper:hover .circle-progress-title > *' => 'color: {{VALUE}};'
				],
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();	
		$this->add_responsive_control(
			'title_margin',
			[
				'label' => esc_html__( 'Title Margin', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .circle-progress-wrapper .circle-progress-title > *' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_control(
			'title_text_trans',
			[
				'label'			=> esc_html__( 'Title Transform', 'ai-addons' ),
				'type'			=> Controls_Manager::SELECT,
				'default'		=> 'none',
				'options'		=> [
					'none'			=> esc_html__( 'Default', 'ai-addons' ),
					'capitalize'	=> esc_html__( 'Capitalized', 'ai-addons' ),
					'uppercase'		=> esc_html__( 'Upper Case', 'ai-addons' ),
					'lowercase'		=> esc_html__( 'Lower Case', 'ai-addons' )
				],
				'selectors' => [
					'{{WRAPPER}} .circle-progress-wrapper .circle-progress-title > *' => 'text-transform: {{VALUE}};'
				],
			]
		);
		$this->add_responsive_control(
			'title_spacing',
			[
				'label' => esc_html__( 'Title Spacing', 'ai-addons' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 5,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .circle-progress-wrapper .circle-progress-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					'(mobile){{WRAPPER}} .circle-progress-wrapper .circle-progress-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'title_typography',
				'selector' 		=> '{{WRAPPER}} .circle-progress-wrapper .circle-progress-title > *'
			]
		);	
		$this->end_controls_section();
		
		// Style Content Section
		$this->start_controls_section(
			'section_style_content',
			[
				'label' => __( 'Content', 'ai-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition' 	=> [
					'section_content_enabled' 		=> 'yes'
				],
			]
		);
		$this->add_responsive_control(
			'desc_spacing',
			[
				'label' => esc_html__( 'Description Spacing', 'ai-addons' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 5,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .circle-progress-wrapper .circle-progress-content' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					'(mobile){{WRAPPER}} .circle-progress-wrapper .circle-progress-content' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'content_typography',
				'selector' 		=> '{{WRAPPER}} .circle-progress-wrapper .circle-progress-content'
			]
		);	
		$this->end_controls_section();	

	}
	 
	protected function render() {

		$settings = $this->get_settings_for_display();
		extract( $settings );
		
		$this->add_render_attribute( 'ai-widget-wrapper', 'class', 'ai-circle-progress-elementor-widget circle-progress-wrapper' );
		$parent_class = isset( $circle_layout ) && $circle_layout != '' ? 'circle-progress-style-' . $circle_layout : '';
		$this->add_render_attribute( 'ai-widget-wrapper', 'class', $parent_class );
		?>
		<div <?php echo ''. $this->get_render_attribute_string( 'ai-widget-wrapper' ); ?>>
		<?php
		
		//Define Variables
		$title = isset( $title ) && $title != '' ? $title : '';
		$circle_val = isset( $circle_val ) && !empty( $circle_val ) ? $circle_val : '';
		$value_suffix = isset( $value_suffix ) ? $value_suffix : '';
		$heading = isset( $progress_heading ) && $progress_heading != '' ? $progress_heading : '';
		$content = isset( $content ) && $content != '' ? $content : '';
		$progress_size = isset( $progress_size ) && $progress_size != '' ? $progress_size : '200';
		$progress_thikness = isset( $progress_thikness ) && $progress_thikness != '' ? $progress_thikness : '10';
		$progress_duration = isset( $progress_duration ) && $progress_duration != '' ? $progress_duration : '1500';
		$empty_color = isset( $circle_empty_color ) && $circle_empty_color != '' ? $circle_empty_color : '#e1e1e1';
		$circle_start_color = isset( $circle_start_color ) && $circle_start_color != '' ? $circle_start_color : '#333333';
		$circle_end_color = isset( $circle_end_color ) && $circle_end_color != '' ? $circle_end_color : '';	
		
		$default_items = array(
			"circle" => esc_html__( "Circle", 'ai-addons' ),
			"title" => esc_html__( "Title", 'ai-addons' )
		);
		
		$elemetns = isset( $circle_items ) && !empty( $circle_items ) ? json_decode( $circle_items, true ) : array( 'visible' => $default_items );

		if( isset( $elemetns['visible'] ) ) :
		
			foreach( $elemetns['visible'] as $element => $value ){
				switch( $element ){
		
					case "circle":
						$progress_value = isset( $circle_val['size'] ) ? $circle_val['size'] : 10;
						$progress_size = isset( $progress_size['size'] ) ? $progress_size['size'] : 200;
						$progress_thikness = isset( $progress_thikness['size'] ) ? $progress_thikness['size'] : 10;
						$progress_duration = isset( $progress_duration['size'] ) ? $progress_duration['size'] : 1500;
						echo '<div class="circle-progress-circle" data-value="'. esc_attr( $progress_value ) .'" data-value-suffix="'. esc_attr( $value_suffix ) .'" data-size="'. esc_attr( $progress_size ) .'" data-thickness="'. esc_attr( $progress_thikness ) .'" data-duration="'. esc_attr( $progress_duration ) .'" data-empty="'. esc_attr( $empty_color ) .'" data-scolor="'. esc_attr( $circle_start_color ) .'" data-ecolor="'. esc_attr( $circle_end_color ) .'">';
							echo '<span class="progress-value"></span>';
						echo '</div><!-- .circle-progress-circle -->';
					break;
					
					case "title":
						echo '<div class="circle-progress-title">';
							echo '<'. esc_attr( $heading ) .'>'. esc_html( $title ) .'</'. esc_attr( $heading ) .'>';
						echo '</div><!-- .circle-progress-title -->';
					break;
					
					case "content":
						echo '<div class="circle-progress-content">';
							echo esc_textarea( $content );
						echo '</div><!-- .circle-progress-read-more -->';
					break;
					
				}
			} // foreach end
				
		endif;
		
		echo '</div> <!-- .ai-widget-wrapper -->';

	}
	
}