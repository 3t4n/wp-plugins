<?php


namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * AI Addons AI Accordion
 *
 * @since 1.0.0
 */
 
use AIEA_Elementor_Addons\Helper\Post_Helper as AIEA_Post_Helper;
 
class AIEA_Elementor_Accordion_Widget extends Widget_Base {
	
	/**
	 * Get widget name.
	 *
	 * Retrieve Accordion widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'ai-accordion';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Accordion widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Accordion', 'ai-addons' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Accordion widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'ai-default-icon '. aiea_addon_base()->widget_icon_classes('accordion');
	}


	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Accordion widget belongs to.
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
		return [ 'ai-front-end'  ];
	}
	
	public function get_style_depends() {
		return [ 'themify-icons', 'bootstrap-icons' ];
	}
	
	public function get_help_url() {
        return 'https://aiaddons.ai/accordion-demo/';
    }

	/**
	 * Register AI Accordion widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		
		//Accordion Section
		$this->start_controls_section(
			'aiea_accordion_section',
			[
				'label'	=> esc_html__( 'Accordion', 'ai-addons' ),
				'accordion'	=> Controls_Manager::TAB_CONTENT,
				'description'	=> esc_html__( 'Accordion options.', 'ai-addons' ),
			]
		);	
		
		$this->add_control(
			'variation',
			[
				'label'			=> esc_html__( 'Types', 'ai-addons' ),
				'type'			=> Controls_Manager::SELECT,
				'default'		=> 'default',
				'options'		=> [
					'default'		=> esc_html__( 'Standard', 'ai-addons' ),
					'classic'		=> esc_html__( 'Classic (Pro)', 'ai-addons' ),
					'modern'		=> esc_html__( 'Modern (Pro)', 'ai-addons' ),
					'classic-pro'	=> esc_html__( 'Minimalist (Pro)', 'ai-addons' ),
				],
			]
		);
		$this->add_control(
			'variation_pro_alert',
			[
				'type' => Controls_Manager::RAW_HTML,
				'raw' => esc_html__( 'Only available in pro version!', 'ai-addons'),
				'content_classes' => 'ai-elementor-warning',
				'condition' => [
					'variation!' => $this->get_free_options('variation'),
				]
			]
		);
		
		$repeater = new Repeater();		
		$repeater->add_control(
			'aiea_accordion_title',
			[
				'type'			=> Controls_Manager::TEXT,
				'label' 		=> esc_html__( 'Title', 'ai-addons' ),
				'description'	=> esc_html__( 'accordion title.', 'ai-addons' )
			]
		);		
		$repeater->add_control(
			'accordion_type',
			[
				'label' => esc_html__( 'Type', 'ai-addons' ),
				'type' => Controls_Manager::CHOOSE,
				'default'		=> 'content',
				'options' => [
					'content' => [
						'title' => esc_html__( 'Text Content', 'ai-addons' ),
						'icon' => 'eicon-text',
					],
					'element' => [
						'title' => esc_html__( 'HTML Element', 'ai-addons' ),
						'icon' => 'eicon-code-bold',
					],
					'templates' => [
						'title' => esc_html__( 'Saved Templates', 'ai-addons' ),
						'icon' => 'eicon-library-open',
					]					
				],
				'toggle' => false,
			]
		);
		$repeater->add_control(
			'active_default',
			[
				'label' 		=> esc_html__( 'Active as default', 'ai-addons' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'no'
			]
		);
		
		// Openai part
		$repeater->add_control(
			'aiea_content_opt',
			[
				'label' 		=> esc_html__( 'OpenAI Content?', 'ai-addons' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'no',
				'condition' => [
					'accordion_type' => 'content',
				],
			]
		);
		$repeater->add_control(
			'aiea_pro_alert',
			[
				'type' => Controls_Manager::RAW_HTML,
				'raw' => esc_html__( 'Only available in pro version!', 'ai-addons'),
				'content_classes' => 'ai-elementor-warning',
				'condition' => [
					'aiea_content_opt' => 'yes'
				],
			]
		);
		
		$repeater->add_control(
			'aiea_accordion_content',
			[
				'label'			=> esc_html__( 'Accordion Content', 'ai-addons' ),
				'type' 			=> Controls_Manager::WYSIWYG,
				'default'		=> aiea_addon_base()->make_default_content('accordion-content'),
				'condition' => [
					'accordion_type' => 'content',
				],
			]
		);		
		$repeater->add_control(
			'aiea_element_id',
			[
				'type'			=> Controls_Manager::TEXT,
				'label' 		=> esc_html__( 'Element ID', 'ai-addons' ),
				'description'	=> esc_html__( 'Enter element id', 'ai-addons' ),
				'condition' => [
					'accordion_type' => 'element',
				],
			]
		);	
		$repeater->add_control(
			'ele_templates',
			[
				'label' 	=> __( 'Choose Templates', 'ai-addons' ),
				'type' 		=> Controls_Manager::SELECT,
				'options' 	=> AIEA_Post_Helper::aiea_get_elementor_templates(),
				'separator' => 'before',
				'condition' => [
					'accordion_type' => 'templates',
				],
			]
		);		
		$this->add_control(
			'accordion_list',
			[
				'type'			=> Controls_Manager::REPEATER,
				'label'			=> esc_html__( 'Accordion List', 'ai-addons' ),
				'fields'		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'aiea_accordion_title' 	=> esc_html__( 'Title 1', 'ai-addons' ),
						'accordion_type' => 'content',
						'aiea_element_id'	=> '',
						'aiea_accordion_content'	=> aiea_addon_base()->make_default_content('accordion-content'),
						'ele_templates' => '',
						'active_default' => 'no'
					],
					[
						'aiea_accordion_title' 	=> esc_html__( 'Title 2', 'ai-addons' ),
						'accordion_type' => 'content',
						'aiea_element_id'	=> '',
						'aiea_accordion_content'	=> aiea_addon_base()->make_default_content('accordion-content'),
						'ele_templates' => '',
						'active_default' => 'no'
					],
				],
				'title_field'	=> '{{{ aiea_accordion_title }}}'
			]
		);	
		$this->add_control(
			'multi_open',
			[
				'label' 		=> esc_html__( 'Multi Open', 'ai-addons' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'no'
			]
		);
		$this->end_controls_section();
		
		//Icon Section
		$this->start_controls_section(
			'aiea_icon_section',
			[
				'label'	=> esc_html__( 'Icon', 'ai-addons' ),
				'accordion'	=> Controls_Manager::TAB_CONTENT,
				'description'	=> esc_html__( 'Icon options.', 'ai-addons' ),
			]
		);
		$this->add_control(
			'selected_icon',
			[
				'label' 		=> esc_html__( 'Close Icon', 'ai-addons' ),
				'type' 			=> Controls_Manager::ICONS,
				'separator' 	=> 'before',
				'fa4compatibility' => 'icon',
				'default' 		=> [
					'value' => 'fa fa-plus',
					'library' => 'fa-solid'
				],
				'recommended' 	=> [
					'fa-solid' 	=> [
						'chevron-down',
						'angle-down',
						'angle-double-down',
						'caret-down',
						'caret-square-down',
					],
					'fa-regular' => [
						'caret-square-down',
					],
					'themify' => [
						'angle-down',
						'angle-double-down',
						'plus',
					]
				],
				'skin' => 'inline',
				'label_block' => false,
			]
		);
		$this->add_control(
			'selected_active_icon',
			[
				'label' => esc_html__( 'Open Icon', 'ai-addons' ),
				'type' => Controls_Manager::ICONS,
				'fa4compatibility' => 'icon_active',
				'default' => [
					'value' => 'fa fa-minus',
					'library' => 'fa-solid'
				],
				'recommended' => [
					'fa-solid' => [
						'chevron-up',
						'angle-up',
						'angle-double-up',
						'caret-up',
						'caret-square-up',
					],
					'fa-regular' => [
						'caret-square-up',
					],
					'themify' => [
						'angle-up',
						'angle-double-up',
						'minus',
					]
				],
				'skin' => 'inline',
				'label_block' => false,
				'condition' => [
					'selected_icon[value]!' => '',
				],
			]
		);
		$this->add_control(
			'icon_pos',
			[
				'label' => esc_html__( 'Icon Alignment', 'ai-addons' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Start', 'ai-addons' ),
						'icon' => 'eicon-h-align-left',
					],
					'right' => [
						'title' => esc_html__( 'End', 'ai-addons' ),
						'icon' => 'eicon-h-align-right',
					],
				],
				'default' => is_rtl() ? 'left' : 'right',
				'toggle' => false,
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
		
		// Style Accordion Section
		$this->start_controls_section(
			'section_style_accordion',
			[
				'label' => __( 'Accordion', 'ai-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'accordion_padding',
			[
				'label' => esc_html__( 'Padding', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ai-accordion-elementor-widget' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_responsive_control(
			'accordion_margin',
			[
				'label' => esc_html__( 'Margin', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ai-accordion-elementor-widget' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'accordion_border',
				'selector' => '{{WRAPPER}} .ai-accordion-elementor-widget',
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'accordion_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ai-accordion-elementor-widget' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'accordion_box_shadow',
				'selector' => '{{WRAPPER}} .ai-accordion-elementor-widget'
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'accordion_bg_color',
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .ai-accordion-elementor-widget',
			]
		);
		$this->add_responsive_control(
			'accordion_spacing',
			[
				'label' => esc_html__( 'Accordion Spacing', 'ai-addons' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => '',
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ai-accordions > .ai-accordion:not(first-child)' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					'(mobile){{WRAPPER}} .ai-accordions > .ai-accordion:not(first-child)' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'title_typography',
				'selector' 		=> '{{WRAPPER}} .ai-accordion-header > a'
			]
		);
		$this->start_controls_tabs( 'accordion_title_styles' );
		$this->start_controls_tab(
			'accordion_title_normal',
			[
				'label' => esc_html__( 'Normal', 'ai-addons' ),
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ai-accordion-header > a' => 'color: {{VALUE}};'
				],
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'title_bg_color',
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .ai-accordion-header > a',
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'title_border',
				'selector' => '{{WRAPPER}} .ai-accordion-header > a',
			]
		);	
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'title_box_shadow',
				'selector' => '{{WRAPPER}} .ai-accordion-header > a'
			]
		);
		$this->add_responsive_control(
			'title_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ai-accordion-header > a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);		
		$this->end_controls_tab();
		$this->start_controls_tab(
			'accordion_title_hover',
			[
				'label' => esc_html__( 'Hover', 'ai-addons' ),
			]
		);
		$this->add_control(
			'title_hcolor',
			[
				'label' => esc_html__( 'Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ai-accordion-header > a:hover, {{WRAPPER}} .ai-accordion-header > a.active' => 'color: {{VALUE}};'
				],
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'title_bg_hcolor',
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .ai-accordion-header > a:hover, {{WRAPPER}} .ai-accordion-header > a.active'
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'title_hborder',
				'selector' => '{{WRAPPER}} .ai-accordion-header > a:hover, {{WRAPPER}} .ai-accordion-header > a.active',
			]
		);	
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'title_hbox_shadow',
				'selector' => '{{WRAPPER}} .ai-accordion-header > a:hover, {{WRAPPER}} .ai-accordion-header > a.active',
			]
		);
		$this->add_responsive_control(
			'title_hborder_radius',
			[
				'label' => esc_html__( 'Border Radius', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ai-accordion-header > a:hover, {{WRAPPER}} .ai-accordion-header > a.active' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);	
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->add_control(
			'title_tag',
			[
				'label'			=> esc_html__( 'Title Tag', 'ai-addons' ),
				'type'			=> Controls_Manager::SELECT,
				'default'		=> 'div',
				'options'		=> [
					'h1'		=> esc_html__( 'h1', 'ai-addons' ),
					'h2'		=> esc_html__( 'h2', 'ai-addons' ),
					'h3'		=> esc_html__( 'h3', 'ai-addons' ),
					'h4'		=> esc_html__( 'h4', 'ai-addons' ),
					'h5'		=> esc_html__( 'h5', 'ai-addons' ),
					'h6'		=> esc_html__( 'h6', 'ai-addons' ),
					'p'			=> esc_html__( 'p', 'ai-addons' ),
					'span'		=> esc_html__( 'span', 'ai-addons' ),
					'div'		=> esc_html__( 'div', 'ai-addons' ),
					'i'			=> esc_html__( 'i', 'ai-addons' )
				],
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'title_margin',
			[
				'label' => esc_html__( 'Margin', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ai-accordion-header > a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_responsive_control(
			'title_padding',
			[
				'label' => esc_html__( 'Padding', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ai-accordion-header > a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_responsive_control(
			'title_align',
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
				'selectors' => [
					'{{WRAPPER}} .ai-accordion-header > a' => 'text-align: {{VALUE}};',
				],
				'default' => '',
			]
		);
		$this->add_control(
			'icon_styles',
			[
				'label' => __( 'Icon Styles', 'ai-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->start_controls_tabs( 'accordion_icon_styles' );
		$this->start_controls_tab(
			'accordion_icon_normal',
			[
				'label' => esc_html__( 'Normal', 'ai-addons' ),
			]
		);
		$this->add_control(
			'icon_color',
			[
				'label' => esc_html__( 'Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ai-accordion-header > a .elementor-accordion-icon > span > *' => 'color: {{VALUE}};'
				],
			]
		);
		$this->add_control(
			'icon_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ai-accordion-header > a .elementor-accordion-icon > span > *' => 'background-color: {{VALUE}};'
				],
			]
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'accordion_icon_hover',
			[
				'label' => esc_html__( 'Hover', 'ai-addons' ),
			]
		);
		$this->add_control(
			'icon_hcolor',
			[
				'label' => esc_html__( 'Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ai-accordion-header > a:hover .elementor-accordion-icon > span > *, {{WRAPPER}} .ai-accordion-header > a.active .elementor-accordion-icon > span > *' => 'color: {{VALUE}};'
				],
			]
		);
		$this->add_control(
			'icon_hbg_color',
			[
				'label' => esc_html__( 'Background Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ai-accordion-header > a:hover .elementor-accordion-icon > span > *, {{WRAPPER}} .ai-accordion-header > a.active .elementor-accordion-icon > span > *' => 'background-color: {{VALUE}};'
				],
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->add_responsive_control(
			'icon_padding',
			[
				'label' => esc_html__( 'Icon Padding', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ai-accordion-header > a .elementor-accordion-icon > span > *' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_responsive_control(
			'icon_margin',
			[
				'label' => esc_html__( 'Icon Margin', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ai-accordion-header .elementor-accordion-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->end_controls_section();	
		
		$this->start_controls_section(
			'section_style_content',
			[
				'label' => __( 'Content', 'ai-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'content_typography',
				'selector' 		=> '{{WRAPPER}} .ai-accordion-content'
			]
		);	
		$this->add_control(
			'content_color',
			[
				'label' => esc_html__( 'Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ai-accordion-content' => 'color: {{VALUE}};'
				],
			]
		);	
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'content_bg_color',
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .ai-accordion-content'
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'content_box_shadow',
				'selector' => '{{WRAPPER}} .ai-accordion-content'
			]
		);
		$this->add_responsive_control(
			'content_align',
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
				'selectors' => [
					'{{WRAPPER}} .ai-accordion-pane' => 'text-align: {{VALUE}};',
				],
				'default' => '',
			]
		);
		$this->add_responsive_control(
			'content_margin',
			[
				'label' => esc_html__( 'Margin', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ai-accordion-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_responsive_control(
			'content_padding',
			[
				'label' => esc_html__( 'Padding', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ai-accordion-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'content_border',
				'selector' => '{{WRAPPER}} .ai-accordion-content',
			]
		);
		$this->add_responsive_control(
			'content_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ai-accordion-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);		
		$this->end_controls_section();
	
	}
		
	/**
	 * Render Accordion widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();
		extract( $settings );
		
		$multi_open = isset( $multi_open ) && $multi_open == 'yes' ? true : false;
		$free_types = [ 'default' ];		
		$parent_class = isset( $variation ) && in_array( $variation, $free_types ) ? 'ai-accordion-style-'. $variation : 'ai-accordion-style-default';
		
		$this->add_render_attribute( 'ai-widget-wrapper', 'class', 'ai-accordion-elementor-widget' );
		$this->add_render_attribute( 'ai-widget-wrapper', 'class', esc_attr( $parent_class ) );
		$this->add_render_attribute( 'ai-widget-wrapper', 'data-toggle', esc_attr( $multi_open ) );
		?>
		<div <?php echo ''. $this->get_render_attribute_string( 'ai-widget-wrapper' ); ?>>
		<?php
		
		$accordion_list = isset( $accordion_list ) ? $accordion_list : '';
		$rand_id = aiea_addon_base()->shortcode_rand_id();
		
		//Icon migrated
		$migrated = isset( $settings['__fa4_migrated']['selected_icon'] );
		if ( ! isset( $settings['icon'] ) && ! Icons_Manager::is_migration_allowed() ) {
			// @todo: remove when deprecated
			// added as bc in 2.6
			// add old default
			$settings['icon'] = 'fa fa-plus';
			$settings['icon_active'] = 'fa fa-minus';
			$settings['icon_pos'] = $this->get_settings( 'icon_pos' );
		}
		$is_new = empty( $settings['icon'] ) && Icons_Manager::is_migration_allowed();
		$has_icon = ( ! $is_new || ! empty( $settings['selected_icon']['value'] ) );
		
		 $i = 1;
		if( !empty( $accordion_list ) ){		

			echo '<div class="ai-accordions" id="ai-accordion-'. esc_attr( $rand_id ) .'">';
		
			foreach( $accordion_list as $accordion_single ){
				
				$accordion_type = isset( $accordion_single['accordion_type'] ) ? $accordion_single['accordion_type'] : 'content';
				$active_default = isset( $accordion_single['active_default'] ) ? $accordion_single['active_default'] : 'no';
				echo '<div class="inc-card ai-accordion">';
				
					$accordion_id = esc_attr( $rand_id ) .'-'. esc_attr( $i );				
					if( isset( $accordion_single['aiea_accordion_title'] ) && !empty( $accordion_single['aiea_accordion_title'] ) ){
						$title_tag = isset( $title_tag ) ? $title_tag : 'div';
						echo '<'. esc_attr( $title_tag ) .' class="inc-card-header ai-accordion-header">';
							echo '<a class="inc-nav-item inc-nav-link'. esc_attr( $active_default == 'yes' ? ' active' : '' ) .'" data-id="#ai-accordion-'. esc_attr( $accordion_id ) .'" href="#">';
								
								if ( $has_icon ) :
									echo '<span class="elementor-accordion-icon elementor-accordion-icon-'. esc_attr( $settings['icon_pos'] ) .'" aria-hidden="true">';
									if ( $is_new || $migrated ) {
										echo '<span class="ai-accordion-icon-closed">';
											Icons_Manager::render_icon( $settings['selected_icon'] );
										echo '</span>';
										echo '<span class="ai-accordion-icon-opened">';
											Icons_Manager::render_icon( $settings['selected_active_icon'] );
										echo '</span>';
									} else {
										echo '<i class="ai-accordion-icon-closed '. esc_attr( $settings['icon'] ) .'"></i>';
										echo '<i class="ai-accordion-icon-opened '. esc_attr( $settings['icon_active'] ) .'"></i>';
									}
									echo '</span>';
								endif;
								
								echo ''. $accordion_single['aiea_accordion_title'];
							echo '</a>';
						echo '</'. esc_attr( $title_tag ) .'><!-- .inc-card-header -->';
					}
					
					echo '<div class="ai-accordion-content'. esc_attr( $active_default == 'yes' ? ' active' : '' ) .'" id="ai-accordion-'. esc_attr( $accordion_id ) .'">';		
						echo '<div class="inc-card-body">';
							if( $accordion_type == 'content' ){
								if( isset( $accordion_single['aiea_accordion_content'] ) && !empty( $accordion_single['aiea_accordion_content'] ) ){
									echo '<div class="ai-accordion-pane">'. $accordion_single['aiea_accordion_content'] .'</div>';
								}
							}elseif( $accordion_type == 'element' ){
								if( isset( $accordion_single['aiea_element_id'] ) && !empty( $accordion_single['aiea_element_id'] ) ){
									echo '<div class="ai-accordion-pane"><span class="ai-accordion-id-to-element" data-id="'. esc_attr( $accordion_single['aiea_element_id'] ) .'"></span></div>';
								}
							}elseif( $accordion_type == 'templates' ){
								$template_id = isset( $accordion_single['ele_templates'] ) ? $accordion_single['ele_templates'] : '';
								echo Plugin::$instance->frontend->get_builder_content( $template_id, true );
							}
						echo '</div><!-- .inc-card-body -->';
					echo '</div><!-- .ai-accordion-content -->';
				
				echo '</div><!-- .inc-card -->';
				$i++;
			}
			echo '</div>';
			
		}
		
		echo '</div> <!-- .ai-widget-wrapper -->';
		
	}
	
	public function get_free_options( $key ) {
		$free_options = [
			'variation' => [ 'default' ]
		];
		return $free_options[$key];
	}
		
}