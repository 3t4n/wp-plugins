<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * AI Addons Counter Widget
 *
 * @since 1.0.0
 */

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;
 
class AIEA_Elementor_Counter_Widget extends Widget_Base {
	
	private $excerpt_len;
	
	/**
	 * Get widget name.
	 *
	 * Retrieve Counter widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'ai-counter';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Counter widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Counter', 'ai-addons' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Counter widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'ai-default-icon '. aiea_addon_base()->widget_icon_classes('counter');
	}


	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Counter widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'ai-elements' ];
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
		return [ 'appear', 'ai-front-end'  ];
	}
	
	public function get_style_depends() {
		return [ 'themify-icons', 'bootstrap-icons' ];
	}
	
	/**
	 * Get widget keywords.
	 * @return array widget keywords.
	 */
	public function get_keywords() {
		return [ 'counter', 'number', 'count', 'increase', 'increment' ];
	}
		
	public function get_help_url() {
        return 'https://aiaddons.ai/counter-demo/';
    }

	/**
	 * Register Counter widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {

		//Counter Section
		$this->start_controls_section(
			'counter_section',
			[
				'label'	=> esc_html__( 'Counter', 'ai-addons' ),
				'tab'	=> Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'title',
			[
				'type'			=> Controls_Manager::TEXT,
				'label'			=> esc_html__( 'Title', 'ai-addons' ),
				'default' 		=> esc_html__( 'Counter', 'ai-addons' ),
				'condition' 	=> [
					'section_title_enabled' 		=> 'yes'
				],
			]
		);
		$this->add_control(
			'count_val',
			[
				'type'			=> Controls_Manager::NUMBER,
				'label'			=> esc_html__( 'Value', 'ai-addons' ),
				'min' => 0,
				'step' => 1,
				'default' => 100,
			]
		);
		$this->add_control(
			'count_suffix_val',
			[
				'type'			=> Controls_Manager::TEXT,
				'label'			=> esc_html__( 'Suffix', 'ai-addons' ),
				'default' 		=> '%'
			]
		);
		$this->add_control(
			'counter_duration',
			[
				'type'			=> Controls_Manager::TEXT,
				'label'			=> esc_html__( 'Duration', 'ai-addons' ),
				'min' => 100,
				'step' => 100,
				'default' => 2000,
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
					'{{WRAPPER}} .ai-counter-wrapper' => 'text-align: {{VALUE}};',
				],
			]
		);			
		$this->add_control(
			'counter_layout',
			[
				'label'			=> esc_html__( 'Layout', 'ai-addons' ),
				'type'			=> Controls_Manager::SELECT,
				'default'		=> 'standard',
				'options'		=> [
					'standard'		=> esc_html__( 'Standard', 'ai-addons' ),
					'classic'		=> esc_html__( 'Classic (Pro)', 'ai-addons' ),
					'modern'		=> esc_html__( 'Modern (Pro)', 'ai-addons' ),
					'classic-pro'	=> esc_html__( 'Minimalist (Pro)', 'ai-addons' ),
				]
			]
		);
		$this->add_control(
			'layout_pro_alert',
			[
				'type' => Controls_Manager::RAW_HTML,
				'raw' => esc_html__( 'Only available in pro version!', 'ai-addons'),
				'content_classes' => 'ai-elementor-warning',
				'condition' => [
					'counter_layout!' => $this->get_free_options('counter_layout'),
				]
			]
		);
		$this->add_control(
			'heading_tag',
			[
				'label'			=> esc_html__( 'Tag', 'ai-addons' ),
				'type'			=> Controls_Manager::SELECT,
				'default'		=> 'h5',
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
			'section_count_enabled',
			[
				'label' => esc_html__( 'Count Enabled?', 'ai-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'yes',
				'classes' => 'ai-hidden-trigger-control'
			]
		);
		$this->add_control(
			'section_icon_enabled',
			[
				'label' => esc_html__( 'Icon Enabled?', 'ai-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'no',
				'classes' => 'ai-hidden-trigger-control'
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
			'section_image_enabled',
			[
				'label' => esc_html__( 'Image Enabled?', 'ai-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'no',
				'classes' => 'ai-hidden-trigger-control'
			]
		);
		
		$this->add_control(
			"counter_items",
			[
				"label"				=> "Items",
				"type"				=> "drag-n-drop",
				"drag_items" 			=> [ 
					esc_html__( "visible", 'ai-addons' ) => array( 
						"count"	=> esc_html__( "Count Value", 'ai-addons' ),
						"title"	=> esc_html__( "Title", 'ai-addons' )
						
					),
					esc_html__( "disabled", 'ai-addons' ) => array(
						"icon"	=> esc_html__( "Icon", 'ai-addons' ),
						"content"	=> esc_html__( "Content", 'ai-addons' ),
						"image"		=> esc_html__( "Image", 'ai-addons' )
					)
				],
				'triggers' => array(
					'count' => 'section_count_enabled',
					'title' => 'section_title_enabled',
					'content' => 'section_content_enabled',
					'icon' => 'section_icon_enabled',
					'image' => 'section_image_enabled'
				),
			]
		);
		$this->end_controls_section();
		
		//Icon Section
		$this->start_controls_section(
			'section_icon',
			[
				'label' => esc_html__( 'Icon', 'ai-addons' ),
				'condition' 	=> [
					'section_icon_enabled' 		=> 'yes'
				],
			]
		);		
		$this->add_control(
			'selected_icon',
			[
				'label' => esc_html__( 'Icon', 'ai-addons' ),
				'type' => Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',
				'default' => [
					'value' => 'ti-heart',
					'library' => 'themify',
				],
			]
		);
		$this->add_control(
			'icon_view',
			[
				'label' => esc_html__( 'View', 'ai-addons' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'default' => esc_html__( 'Default', 'ai-addons' ),
					'stacked' => esc_html__( 'Stacked', 'ai-addons' ),
					'framed' => esc_html__( 'Framed', 'ai-addons' ),
				],
				'default' => 'default',
				'prefix_class' => 'ai-view-',
			]
		);
		$this->add_control(
			'icon_shape',
			[
				'label' => esc_html__( 'Shape', 'ai-addons' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'circle' => esc_html__( 'Circle', 'ai-addons' ),
					'square' => esc_html__( 'Square', 'ai-addons' ),
				],
				'default' => 'circle',
				'condition' => [
					'icon_view!' => 'default',
				],
				'prefix_class' => 'ai-shape-',
			]
		);
		$this->end_controls_section();	
		
		// Image Section
		$this->start_controls_section(
			"image_section",
			[
				"label"			=> esc_html__( "Image", 'ai-addons' ),
				"tab"			=> Controls_Manager::TAB_CONTENT,
				'condition' 	=> [
					'section_image_enabled' 		=> 'yes'
				],
			]
		);
		$this->add_control(
			"image",
			[
				"type" => Controls_Manager::MEDIA,
				"label" => esc_html__( "Image", 'ai-addons' ),
				"dynamic" => [
					"active" => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);		
		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name' => 'thumbnail', 
				'default' => 'full',
				'separator' => 'none',
			]
		);				
		$this->end_controls_section();	
		
		// Content
		$this->start_controls_section(
			'content_section',
			[
				'label'			=> esc_html__( 'Content', 'ai-addons' ),
				'tab'			=> Controls_Manager::TAB_CONTENT,
				'condition' 	=> [
					'section_content_enabled' => 'yes'
				],
			]
		);
		$this->add_control(
			'content',
			[
				'type'			=> Controls_Manager::TEXTAREA,
				'label'			=> esc_html__( 'Content', 'ai-addons' ),
				'default' 		=> esc_html__( 'We bring most ai and awesome icon box.', 'ai-addons' ),
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
		
		// Style General Section
		$this->start_controls_section(
			'section_style_general',
			[
				'label' => __( 'General', 'ai-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'counter_padding',
			[
				'label' => esc_html__( 'Padding', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .ai-counter-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_responsive_control(
			'counter_margin',
			[
				'label' => esc_html__( 'Margin', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .ai-counter-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);	
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'icon_box_border',
				'selector' => '{{WRAPPER}} .ai-counter-wrapper',
				'separator' => 'before',
			]
		);	
		$this->add_responsive_control(
			'counter_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ai-counter-wrapper' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .ai-counter-wrapper > .counter-title > *, {{WRAPPER}} .ai-counter-wrapper > .counter-content' => 'color: {{VALUE}};'
					]
				]
			);
			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name' => 'bg_color',
					'types' => [ 'classic', 'gradient' ],
					'selector' => '{{WRAPPER}} .ai-counter-wrapper'
				]
			);
			$this->add_control(
				"shadow_opt",
				[
					"label" 		=> esc_html__( "Box Shadow", 'ai-addons' ),
					"type" 			=> Controls_Manager::SWITCHER,
					"default" 		=> "no"
				]
			);
			$this->add_control(
				"counter_box_shadow",
				[
					"label" 		=> esc_html__( "Box Shadow", 'ai-addons' ),
					"type" 			=> Controls_Manager::BOX_SHADOW,
					'condition' => [
						'shadow_opt' => 'yes',
					],
					'selectors' => [
						'{{WRAPPER}} .ai-counter-wrapper' => 'box-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{SPREAD}}px {{COLOR}} {{counter_box_shadow_pos.VALUE}};',
					]
				]
			);
			$this->add_control(
				"counter_box_shadow_pos",
				[
					'label' =>  esc_html__( "Box Shadow Position", 'ai-addons' ),
					'type' => Controls_Manager::SELECT,
					'options' => [
						' ' => esc_html__( "Outline", 'ai-addons' ),
						'inset' => esc_html__( "Inset", 'ai-addons' ),
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
						'{{WRAPPER}} .ai-counter-wrapper:hover > .counter-title > *, {{WRAPPER}} .ai-counter-wrapper:hover > .counter-content' => 'color: {{VALUE}};'
					]
				]
			);			
			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name' => 'bg_hcolor',
					'types' => [ 'classic', 'gradient' ],
					'selector' => '{{WRAPPER}} .ai-counter-wrapper:hover'
				]
			);
			$this->add_control(
				"shadow_hopt",
				[
					"label" 		=> esc_html__( "Box Shadow", 'ai-addons' ),
					"type" 			=> Controls_Manager::SWITCHER,
					"default" 		=> "no"
				]
			);
			$this->add_control(
				"counter_hbox_shadow",
				[
					"label" 		=> esc_html__( "Box Shadow", 'ai-addons' ),
					"type" 			=> Controls_Manager::BOX_SHADOW,
					'condition' => [
						'shadow_hopt' => 'yes',
					],
					'selectors' => [
						'{{WRAPPER}} .ai-counter-wrapper:hover' => 'box-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{SPREAD}}px {{COLOR}} {{counter_hbox_shadow_pos.VALUE}};',
					]
				]
			);
			$this->add_control(
				"counter_hbox_shadow_pos",
				[
					'label' =>  esc_html__( "Box Shadow Position", 'ai-addons' ),
					'type' => Controls_Manager::SELECT,
					'options' => [
						' ' => esc_html__( "Outline", 'ai-addons' ),
						'inset' => esc_html__( "Inset", 'ai-addons' ),
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
			"title_color",
			[
				"type"			=> Controls_Manager::COLOR,
				"label"			=> esc_html__( "Color", 'ai-addons' ),
				"default" 		=> "",
				'selectors' => [
					'{{WRAPPER}} .ai-counter-wrapper .counter-title > *' => 'color: {{VALUE}};'
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
			"title_hcolor",
			[
				"type"			=> Controls_Manager::COLOR,
				"label"			=> esc_html__( "Color", 'ai-addons' ),
				"default" 		=> "",
				'selectors' => [
					'{{WRAPPER}} .ai-counter-wrapper:hover .counter-title > *' => 'color: {{VALUE}};'
				],
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();	
		
		$this->add_responsive_control(
			'title_padding',
			[
				'label' => esc_html__( 'Padding', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .ai-counter-wrapper .counter-title > *' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_responsive_control(
			'title_margin',
			[
				'label' => esc_html__( ' Margin', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .ai-counter-wrapper .counter-title > *' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_control(
			"title_text_trans",
			[
				"label"			=> esc_html__( "Transform", 'ai-addons' ),
				"type"			=> Controls_Manager::SELECT,
				"default"		=> "none",
				"options"		=> [
					"none"			=> esc_html__( "Default", 'ai-addons' ),
					"capitalize"	=> esc_html__( "Capitalized", 'ai-addons' ),
					"uppercase"		=> esc_html__( "Upper Case", 'ai-addons' ),
					"lowercase"		=> esc_html__( "Lower Case", 'ai-addons' )
				],
				'selectors' => [
					'{{WRAPPER}} .ai-counter-wrapper .counter-title > *' => 'text-transform: {{VALUE}};'
				],
			]
		);
		$this->add_responsive_control(
			'title_spacing',
			[
				'label' => esc_html__( 'Spacing', 'ai-addons' ),
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
					'{{WRAPPER}} .ai-counter-wrapper .counter-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					'(mobile){{WRAPPER}} .ai-counter-wrapper .counter-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'title_typography',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
				],
				'selector' 		=> '{{WRAPPER}} .ai-counter-wrapper .counter-title > *'
			]
		);	
		$this->end_controls_section();
		
		// Style Counter Section
		$this->start_controls_section(
			'section_style_counter',
			[
				'label' => __( 'Counter', 'ai-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition' 	=> [
					'section_count_enabled' 		=> 'yes'
				],
			]
		);
		$this->start_controls_tabs( 'counter_colors' );
		$this->start_controls_tab(
			'counter_colors_normal',
			[
				'label' => esc_html__( 'Normal', 'ai-addons' ),
			]
		);
		$this->add_control(
			"counter_value_color",
			[
				"type"			=> Controls_Manager::COLOR,
				"label"			=> esc_html__( "Color", 'ai-addons' ),
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ai-counter-wrapper .counter-value > *' => 'color: {{VALUE}};'
				],
			]
		);			
		$this->end_controls_tab();

		$this->start_controls_tab(
			'counter_colors_hover',
			[
				'label' => esc_html__( 'Hover', 'ai-addons' ),
			]
		);
		$this->add_control(
			"counter_value_hcolor",
			[
				"type"			=> Controls_Manager::COLOR,
				"label"			=> esc_html__( "Color", 'ai-addons' ),
				"default" 		=> "",
				'selectors' => [
					'{{WRAPPER}} .ai-counter-wrapper:hover .counter-value > *' => 'color: {{VALUE}};'
				],
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();	
		$this->add_responsive_control(
			'counter_value_margin',
			[
				'label' => esc_html__( 'Margin', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .ai-counter-wrapper .counter-value > *' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_responsive_control(
			'counter_value_padding',
			[
				'label' => esc_html__( 'Padding', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .ai-counter-wrapper .counter-value > *' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_responsive_control(
			'counter_value_spacing',
			[
				'label' => esc_html__( 'Spacing', 'ai-addons' ),
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
					'{{WRAPPER}} .ai-counter-wrapper .counter-value' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					'(mobile){{WRAPPER}} .ai-counter-wrapper .counter-value' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'counter_typography',
				'selector' 		=> '{{WRAPPER}} .ai-counter-wrapper .counter-value > *'
			]
		);	
		$this->end_controls_section();
		
		// Style Icon Section
		$this->start_controls_section(
			'section_style_icon',
			[
				'label' => esc_html__( 'Icon', 'ai-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' 	=> [
					'section_icon_enabled' 		=> 'yes'
				],
			]
		);

		$this->start_controls_tabs( 'icon_colors' );

		$this->start_controls_tab(
			'icon_colors_normal',
			[
				'label' => esc_html__( 'Normal', 'ai-addons' ),
			]
		);

		$this->add_control(
			'icon_primary_color',
			[
				'label' => esc_html__( 'Icon Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .counter-icon' => 'color: {{VALUE}};',
					'{{WRAPPER}} .counter-icon svg' => 'fill: {{VALUE}};'
				]
			]
		);

		$this->add_control(
			'icon_secondary_color',
			[
				'label' => esc_html__( 'Background Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'condition' => [
					'icon_view!' => 'default',
				],
				'selectors' => [
					'{{WRAPPER}}.ai-view-framed .counter-icon' => 'background-color: {{VALUE}};',
					'{{WRAPPER}}.ai-view-stacked .counter-icon' => 'background-color: {{VALUE}};'
				],
			]
		);
		$this->add_control(
			'border_color',
			[
				'label' => esc_html__( 'Border Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'condition' => [
					'icon_view' => 'framed',
				],
				'selectors' => [
					'{{WRAPPER}}.ai-view-framed .counter-icon' => 'border-color: {{VALUE}};'
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'icon_colors_hover',
			[
				'label' => esc_html__( 'Hover', 'ai-addons' ),
			]
		);

		$this->add_control(
			'icon_primary_hcolor',
			[
				'label' => esc_html__( 'Icon Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}}:hover .counter-icon' => 'color: {{VALUE}};',
					'{{WRAPPER}}:hover .counter-icon svg' => 'fill: {{VALUE}};'
				],
			]
		);

		$this->add_control(
			'icon_secondary_hcolor',
			[
				'label' => esc_html__( 'Background Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'condition' => [
					'icon_view!' => 'default',
				],
				'selectors' => [
					'{{WRAPPER}}.ai-view-framed:hover .counter-icon' => 'background-color: {{VALUE}};',
					'{{WRAPPER}}.ai-view-stacked:hover .counter-icon' => 'background-color: {{VALUE}};'
				],
			]
		);	
		$this->add_control(
			'hover_border_color',
			[
				'label' => esc_html__( 'Border Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'condition' => [
					'icon_view' => 'framed',
				],
				'selectors' => [
					'{{WRAPPER}}.ai-view-framed:hover .counter-icon' => 'border-color: {{VALUE}};'
				],
			]
		);		
		$this->add_control(
			'icon_hover_animation',
			[
				'label' => esc_html__( 'Hover Animation', 'ai-addons' ),
				'type' => Controls_Manager::HOVER_ANIMATION,
				'selectors' => [
					'{{WRAPPER}}:hover .counter-icon' => 'animation-name: elementor-animation-{{VALUE}}; animation-duration: 1s; animation-timing-function: linear; animation-iteration-count: infinite;'
				],
			]
		);
		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_responsive_control(
			'icon_size',
			[
				'label' => esc_html__( 'Size', 'ai-addons' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 6,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .counter-icon' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .counter-icon svg' => 'height: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'icon_rotate',
			[
				'label' => esc_html__( 'Rotate', 'ai-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'deg' ],
				'default' => [
					'size' => 0,
					'unit' => 'deg',
				],
				'tablet_default' => [
					'unit' => 'deg',
				],
				'mobile_default' => [
					'unit' => 'deg',
				],
				'selectors' => [
					'{{WRAPPER}} .counter-icon i, {{WRAPPER}} .counter-icon svg' => 'transform: rotate({{SIZE}}{{UNIT}});',
				],
			]
		);
		$this->add_responsive_control(
			'icon_outer_margin',
			[
				'label' => esc_html__( 'Outer Margin', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .counter-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->add_responsive_control(
			'icon_padding',
			[
				'label' => esc_html__( 'Padding', 'ai-addons' ),
				'type' => Controls_Manager::SLIDER,
				'selectors' => [
					'{{WRAPPER}}.ai-view-stacked .counter-icon' => 'padding: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}}.ai-view-framed .counter-icon' => 'padding: {{SIZE}}{{UNIT}};'
				],
				'default' => [
					'unit' => 'px',
					'size' => 30,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
					],
				],
				'condition' => [
					'icon_view!' => 'default',
				],
			]
		);

		$this->add_control(
			'icon_border_width',
			[
				'label' => esc_html__( 'Border Width', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .counter-icon' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'icon_view' => 'framed',
				],
			]
		);

		$this->add_responsive_control(
			'icon_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .counter-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'icon_view!' => 'default',
				],
			]
		);
		$this->end_controls_section();
		
		// Style Image Section		
		$this->start_controls_section(
			'section_style_image',
			[
				'label' => __( 'Image', 'ai-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition' 	=> [
					'section_image_enabled' 		=> 'yes'
				],
			]
		);
		
		$this->start_controls_tabs( 'counter_image_styles' );
		$this->start_controls_tab(
			'counter_img_normal',
			[
				'label' => esc_html__( 'Normal', 'ai-addons' ),
			]
		);
		$this->add_control(
			'counter_img_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ai-counter-wrapper .counter-image > img' => 'background-color: {{VALUE}};'
				]
			]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'counter_img_hover',
			[
				'label' => esc_html__( 'Hover', 'ai-addons' ),
			]
		);
		$this->add_control(
			'counter_img_bg_hcolor',
			[
				'label' => esc_html__( 'Background Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ai-counter-wrapper:hover .counter-image > img' => 'background-color: {{VALUE}};'
				],
			]
		);				
		$this->add_control(
			'img_hover_animation',
			[
				'label' => esc_html__( 'Hover Animation', 'ai-addons' ),
				'type' => Controls_Manager::HOVER_ANIMATION,
				'selectors' => [
					'{{WRAPPER}}:hover .counter-image' => 'animation-name: elementor-animation-{{VALUE}}; animation-duration: 1s; animation-timing-function: linear; animation-iteration-count: infinite;'
				],
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();			
			
		$this->add_control(
			"img_style",
			[
				"label"			=> esc_html__( "Image Style", 'ai-addons' ),
				"type"			=> Controls_Manager::SELECT,
				"default"		=> "squared",
				"options"		=> [
					"squared"			=> esc_html__( "Squared", 'ai-addons' ),
					"inc-rounded"			=> esc_html__( "Rounded", 'ai-addons' ),
					"inc-rounded-circle"	=> esc_html__( "Circled", 'ai-addons' )
				]
			]
		);
		$this->add_control(
			"resize_opt",
			[
				"label" 		=> esc_html__( "Resize Option", 'ai-addons' ),
				"type" 			=> Controls_Manager::SWITCHER,
				"default" 		=> "no"
			]
		);
		$this->add_responsive_control(
			'image_size',
			[
				'label' => esc_html__( 'Image Size', 'ai-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ '%' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 50,
				],
				'condition' => [
					'resize_opt' => 'yes',	
				],
				'selectors' => [
					'{{WRAPPER}} .counter-image > img' => 'width: {{SIZE}}%; max-width: {{SIZE}}%;',
					'{{WRAPPER}} .counter-image' => 'width: {{SIZE}}%; max-width: {{SIZE}}%;'
				],
			]
		);
		$this->add_responsive_control(
			'image_spacing',
			[
				'label' => esc_html__( 'Image Spacing', 'ai-addons' ),
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
					'{{WRAPPER}} .counter-image' => 'margin-bottom: {{SIZE}}{{UNIT}};'
				],
			]
		);		
		$this->add_responsive_control(
			'counter_img_padding',
			[
				'label' => esc_html__( 'Padding', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .counter-image > img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
				[
					'name' => 'counter_img_border',
					'label' => esc_html__( 'Border', 'ai-addons' ),
					'selector' => '{{WRAPPER}} .counter-image > img'
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
					'{{WRAPPER}} .ai-counter-wrapper .counter-content' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					'(mobile){{WRAPPER}} .ai-counter-wrapper .counter-content' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'content_typography',
				'selector' 		=> '{{WRAPPER}} .ai-counter-wrapper .counter-content'
			]
		);	
		$this->end_controls_section();

	}
	
	/**
	 * Render Counter widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();
		extract( $settings );
		
		$free_layouts = [ 'standard' ];		
		$parent_class = isset( $counter_layout ) && in_array( $counter_layout, $free_layouts ) ? 'ai-counter-style-' . $counter_layout : 'ai-counter-style-standard';
		$this->add_render_attribute( 'ai-widget-wrapper', 'class', 'ai-counter-elementor-widget ai-counter-wrapper' );
		$this->add_render_attribute( 'ai-widget-wrapper', 'class', esc_attr( $parent_class ) );
		?>
		<div <?php echo ''. $this->get_render_attribute_string( 'ai-widget-wrapper' ); ?>>
		<?php
		
		//Define Variables
		$title = isset( $title ) && $title != '' ? $title : '';
		$content = isset( $content ) && $content != '' ? $content : '';
		$count_val = isset( $count_val ) && $count_val != '' ? $count_val : '';
		$count_suffix_val = isset( $count_suffix_val ) ? $count_suffix_val : '';
		$duration = isset( $counter_duration ) ? $counter_duration : '2000';
		$heading_tag = isset( $heading_tag ) ? $heading_tag : 'h4';		
		$default_items = array( 
			"count"	=> esc_html__( "Count Value", 'ai-addons' ),
			"title"	=> esc_html__( "Title", 'ai-addons' )
		);
		$elemetns = isset( $counter_items ) && !empty( $counter_items ) ? json_decode( $counter_items, true ) : array( 'visible' => $default_items );
	
		if( isset( $elemetns['visible'] ) ) :
				
			foreach( $elemetns['visible'] as $element => $value ){
				switch( $element ){
	
					case "title":
						echo '<div class="counter-title">';
							echo '<'. esc_attr( $heading_tag ) .' class="counter-title-head">'. esc_html( $title ) .'</'. esc_attr( $heading_tag ) .'>';
						echo '</div><!-- .counter-title -->';
					break;
			
					case "icon":						
						//Icon Section
						$this->add_render_attribute( 'icon-wrapper', 'class', 'counter-icon' );
						if ( empty( $settings['icon'] ) && ! Icons_Manager::is_migration_allowed() ) {
							// add old default
							$settings['icon'] = 'ti-heart';
						}
						if ( ! empty( $settings['icon'] ) ) {
							$this->add_render_attribute( 'icon', 'class', $settings['icon'] );
							$this->add_render_attribute( 'icon', 'aria-hidden', 'true' );
						}		
						$migrated = isset( $settings['__fa4_migrated']['selected_icon'] );
						$is_new = empty( $settings['icon'] ) && Icons_Manager::is_migration_allowed();
						if( $settings['selected_icon'] ){
							echo '<div '. $this->get_render_attribute_string( 'icon-wrapper' ) .'>';
								if ( $is_new || $migrated ) :
									Icons_Manager::render_icon( $settings['selected_icon'], [ 'aria-hidden' => 'true' ] );
								else : ?>
									<i <?php echo ''. $this->get_render_attribute_string( 'icon' ); ?>></i>
								<?php endif; 
							echo '</div>';
						}
					break;
					
					case "count": 
						echo '<div class="counter-value">';
							echo '<h3><span class="counter-up" data-count="'. esc_attr( $count_val ) .'" data-duration="'. esc_attr( $duration ) .'">0</span>';
							if( $count_suffix_val ) echo '<span class="counter-suffix">'. esc_html( $count_suffix_val ) .'</span>';
							echo '</h3>';
						echo '</div><!-- .counter-value -->';	
					break;
					
					case "content":
						echo '<div class="counter-content">';
							echo '<p>'. esc_textarea( $content ) .'</p>';
						echo '</div><!-- .counter-read-more -->';		
					break;
					
					case "image":						
						//Image Section
						if ( ! empty( $settings['image']['url'] ) ) {
							$this->image_class = 'image_class';
							$this->add_render_attribute( 'image', 'src', $settings['image']['url'] );
							$this->add_render_attribute( 'image', 'alt', Control_Media::get_image_alt( $settings['image'] ) );
							$this->add_render_attribute( 'image', 'title', Control_Media::get_image_title( $settings['image'] ) );
							$this->add_render_attribute( 'image_class', 'class', 'img-fluid' );
							$this->add_render_attribute( 'image_class', 'class', $settings['img_style'] );

							if ( $settings['img_hover_animation'] ) {
								$this->add_render_attribute( 'image_class', 'class', 'elementor-animation-' . $settings['img_hover_animation'] );
								
							}
							echo '<figure class="counter-image">';
							echo aiea_addon_base()->get_attachment_image_html( $settings, 'thumbnail', 'image', $this );
							echo '</figure>';
						}														
					break;					
					
				}
			} // foreach end
							
		endif;
		
		echo '</div> <!-- .ai-widget-wrapper -->';

	}
	
	public function get_free_options( $key ) {
		$free_options = [
			'counter_layout' => [ 'standard' ]
		];
		return $free_options[$key];
	}
	
}