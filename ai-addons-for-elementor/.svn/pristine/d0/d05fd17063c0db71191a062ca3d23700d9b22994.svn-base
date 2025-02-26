<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use AIEA_Elementor_Addons\Helper\Post_Helper as AIEA_Post_Helper;

/**
 * AI Addons AI Tab
 *
 * @since 1.0.0
 */
 
class AIEA_Elementor_Tab_Widget extends Widget_Base {
	
	/**
	 * Get widget name.
	 *
	 * Retrieve AI Tab widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'ai-tab';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve AI Tab widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Tab', 'ai-addons' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve AI Tab widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'ai-default-icon '. aiea_addon_base()->widget_icon_classes('tab');
	}


	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the AI Tab widget belongs to.
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
        return 'https://aiaddons.ai/tab-demo/';
    }
	
	/**
	 * Register AI Tab widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		
		//Tab Section
		$this->start_controls_section(
			'aiea_tab_section',
			[
				'label'	=> esc_html__( 'Tab', 'ai-addons' ),
				'accordion'	=> Controls_Manager::TAB_CONTENT,
			]
		);	
		$repeater = new Repeater();		
		$repeater->add_control(
			'tab_title',
			[
				'type'			=> Controls_Manager::TEXT,
				'label' 		=> esc_html__( 'Title', 'ai-addons' ),
			]
		);
		$repeater->add_control(
			'icon_type',
			[
				'label' 	=> __( 'Icon Type', 'ai-addons' ),
				'type' 		=> Controls_Manager::CHOOSE,
				'separator' 	=> 'before',
				'options' => [
					'none' => [
						'title' => esc_html__('None', 'ai-addons'),
						'icon' => 'eicon-ban',
					],
					'icon' => [
						'title' => esc_html__('Icon', 'ai-addons'),
						'icon' => 'eicon-library-upload',
					],
					'image' => [
						'title' => esc_html__('Image', 'ai-addons'),
						'icon' => 'eicon-image',
					],
				],
				'default' => 'icon',
			]
		);
		$repeater->add_control(
			'selected_icon',
			[
				'label' 		=> esc_html__( 'Icon', 'ai-addons' ),
				'type' 			=> Controls_Manager::ICONS,
				'separator' 	=> 'after',
				'fa4compatibility' => 'icon',
				'default' 		=> [
					'value' => 'fa fa-home',
					'library' => 'fa-solid'
				],
				'skin' => 'inline',
				'label_block' => false,
				'condition' => [
					'icon_type' => 'icon',
				],
			]
		);
		$repeater->add_control(
			'tab_image',
			[
				'type' 			=> Controls_Manager::MEDIA,
				'label' 		=> esc_html__( 'Tab Image', 'ai-addons' ),
				'separator' 	=> 'after',
				'dynamic' 		=> [
					'active' 	=> true,
				],
				'default' 		=> [
					'url' 		=> Utils::get_placeholder_image_src(),
				],
				'condition' 	=> [
					'icon_type' => 'image',
				],
			]
		);	
		$repeater->add_control(
			'tab_type',
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
		
		// Openai part	
		$repeater->add_control(
			'aiea_content_opt',
			[
				'label' 		=> esc_html__( 'OpenAI Content?', 'ai-addons' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'no',
				'condition' => [
					'tab_type' => 'content',
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
			'tab_content',
			[
				'label'			=> esc_html__( 'Tab Content', 'ai-addons' ),
				'type' 			=> Controls_Manager::WYSIWYG,
				'default'		=> aiea_addon_base()->make_default_content('tab-content'),
				'condition' => [
					'tab_type' => 'content',
				],
			]
		);		
		$repeater->add_control(
			'element_id',
			[
				'type'			=> Controls_Manager::TEXT,
				'label' 		=> esc_html__( 'Element ID', 'ai-addons' ),
				'condition' => [
					'tab_type' => 'element',
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
					'tab_type' => 'templates',
				],
			]
		);		
		$this->add_control(
			'tab_list',
			[
				'type'			=> Controls_Manager::REPEATER,
				'label'			=> esc_html__( 'Tab List', 'ai-addons' ),
				'fields'		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'tab_title' 	=> esc_html__( 'Title 1', 'ai-addons' ),
						'tab_type' => 'content',
						'icon_type' => 'none',
						'selected_icon' => '',
						'tab_image'		=> '',
						'element_id'	=> '',
						'tab_content'	=> aiea_addon_base()->make_default_content('tab-content'),
						'ele_templates' => ''
					],
					[
						'tab_title' 	=> esc_html__( 'Title 2', 'ai-addons' ),
						'tab_type' => 'content',
						'icon_type' => 'none',
						'selected_icon' => '',
						'tab_image'		=> '',
						'element_id'	=> '',
						'tab_content'	=> aiea_addon_base()->make_default_content('tab-content'),
						'ele_templates' => ''
					],
				],
				'title_field'	=> '{{{ tab_title }}}'
			]
		);	
		$this->add_control(
			'icon_pos',
			[
				'label' => esc_html__( 'Icon Alignment', 'ai-addons' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'ai-addons' ),
						'icon' => 'eicon-h-align-left',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'ai-addons' ),
						'icon' => 'eicon-h-align-right',
					],
					'top' => [
						'title' => esc_html__( 'Top', 'ai-addons' ),
						'icon' => 'eicon-v-align-top',
					],
				],
				'default' => is_rtl() ? 'right' : 'left',
				'toggle' => false,
			]
		);		
		$this->add_control(
			'vertical_tab',
			[
				'label' 		=> esc_html__( 'Vertical Tab', 'ai-addons' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'no'
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
		
		// Style Tab Section
		$this->start_controls_section(
			'section_style_tab',
			[
				'label' => __( 'Tab', 'ai-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'tab_padding',
			[
				'label' => esc_html__( 'Padding', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ai-tab-elementor-widget' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_responsive_control(
			'tab_margin',
			[
				'label' => esc_html__( 'Margin', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ai-tab-elementor-widget' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'tab_border',
				'selector' => '{{WRAPPER}} .ai-tab-elementor-widget',
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'tab_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ai-tab-elementor-widget' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_control(
			'tab_box_shadow_opt',
			[
				'label' 		=> esc_html__( 'Box Shadow', 'ai-addons' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'no'
			]
		);
		$this->add_control(
			'tab_box_shadow',
			[
				'label' 		=> esc_html__( 'Box Shadow', 'ai-addons' ),
				'type' 			=> Controls_Manager::BOX_SHADOW,
				'condition' => [
					'tab_box_shadow_opt' => 'yes',
				],
				'selectors' => [
					'{{WRAPPER}} .ai-tab-elementor-widget' => 'box-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{SPREAD}}px {{COLOR}} {{switch_wrap_shadow_pos.VALUE}};',
				]
			]
		);
		$this->add_control(
			'tab_box_shadow_pos',
			[
				'label' =>  esc_html__( 'Box Shadow Position', 'ai-addons' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					' ' => esc_html__( 'Outline', 'ai-addons' ),
					'inset' => esc_html__( 'Inset', 'ai-addons' ),
				],
				'condition' => [
					'switch_wrap_shadow_opt' => 'yes',
				],
				'default' => ' ',
				'render_type' => 'ui',
			]
		);
		$this->add_control(
			'tab_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ai-tab-elementor-widget' => 'background-color: {{VALUE}};'
				],
			]
		);		
		$this->end_controls_section();
		
		// Style Tab Title Section
		$this->start_controls_section(
			'section_style_tab_title',
			[
				'label' => esc_html__( 'Tab Title', 'ai-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'title_head',
			[
				'label'			=> esc_html__( 'Title Heading Tag', 'ai-addons' ),
				'type'			=> Controls_Manager::SELECT,
				'default'		=> 'h6',
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
				]
			]
		);
		$this->add_control(
			'title_trans',
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
					'{{WRAPPER}} .ai-tab-elementor-widget .ai-tabs .ai-tab-title' => 'text-transform: {{VALUE}};'
				],
			]
		);
		$this->add_responsive_control(
			'title_align',
			[
				'label' => __( 'Alignment', 'ai-addons' ),
				'type' => Controls_Manager::CHOOSE,
				'default' => 'center',
				'options' => [
					'left' => [
						'title' => __( 'Left', 'ai-addons' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'ai-addons' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'ai-addons' ),
						'icon' => 'eicon-text-align-right',
					],
					'justify' => [
						'title' => __( 'Justified', 'ai-addons' ),
						'icon' => 'eicon-text-align-justify',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ai-tab-elementor-widget .ai-tabs > a' => 'text-align: {{VALUE}};',
				],
			]
		);		
		$this->add_responsive_control(
			'tab_title_padding',
			[
				'label' => esc_html__( 'Padding', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ai-tab-elementor-widget .ai-tabs > a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_responsive_control(
			'tab_title_margin',
			[
				'label' => esc_html__( 'Margin', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ai-tab-elementor-widget .ai-tabs > a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'tab_title_border',
				'selector' => '{{WRAPPER}} .ai-tab-elementor-widget .ai-tabs > a',
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'title_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ai-tab-elementor-widget .ai-tabs > a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'title_typography',
				'selector' 		=> '{{WRAPPER}} .ai-tabs > a .ai-tab-title'
			]
		);
		$this->add_control(
			'title_style',
			[
				'label' => __( 'Title Colors', 'ai-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->start_controls_tabs( 'tab_title_styles' );
		$this->start_controls_tab(
			'tab_title_normal',
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
					'{{WRAPPER}} .ai-tabs > a .ai-tab-title' => 'color: {{VALUE}};'
				],
			]
		);
		$this->add_control(
			'title_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ai-tabs > a' => 'background-color: {{VALUE}};'
				],
			]
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'tab_title_hover',
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
					'{{WRAPPER}} .ai-tabs > a:hover .ai-tab-title, {{WRAPPER}} .ai-tabs > a.active .ai-tab-title' => 'color: {{VALUE}};'
				],
			]
		);
		$this->add_control(
			'title_bg_hcolor',
			[
				'label' => esc_html__( 'Background Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ai-tabs > a:hover, {{WRAPPER}} .ai-tabs > a.active' => 'background-color: {{VALUE}};'
				],
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		
		$this->add_control(
			'title_icon_style',
			[
				'label' => __( 'Title Icon', 'ai-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'tab_title_icon_size',
			[
				'label' => esc_html__( 'Size', 'ai-addons' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 25,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ai-tabs .ai-tab-icon' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .ai-tabs .ai-tab-icon > svg' => 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .ai-tabs .elementor-tab-icon > img' => 'max-width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'tab_title_icon_margin',
			[
				'label' => esc_html__( 'Icon Margin', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ai-tabs .ai-tab-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .ai-tabs .ai-tab-icon > svg' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .ai-tabs .elementor-tab-icon > img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->start_controls_tabs( 'tab_title_icon_styles' );
		$this->start_controls_tab(
			'tab_title_icon_normal',
			[
				'label' => esc_html__( 'Normal', 'ai-addons' ),
			]
		);
		$this->add_control(
			'title_icon_color',
			[
				'label' => esc_html__( 'Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ai-tabs .elementor-tab-icon > *' => 'color: {{VALUE}};'
				],
			]
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'tab_title_icon_hover',
			[
				'label' => esc_html__( 'Hover', 'ai-addons' ),
			]
		);
		$this->add_control(
			'title_icon_hcolor',
			[
				'label' => esc_html__( 'Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ai-tabs > a:hover .elementor-tab-icon > *, {{WRAPPER}} .ai-tabs > a.active .elementor-tab-icon > *' => 'color: {{VALUE}};'
				],
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->add_control(
			'caret_opt',
			[
				'label' 		=> esc_html__( 'Caret', 'ai-addons' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'no',
				'prefix_class' => 'ai-tab-caret-'	
			]
		);
		$this->add_control(
			'caret_color',
			[
				'label' => esc_html__( 'Caret Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'caret_opt' => 'yes',
				],
				'selectors' => [
					'{{WRAPPER}} .ai-tabs .inc-nav-link:after' => 'border-top-color: {{VALUE}};',
					'{{WRAPPER}} .ai-vertical-tab .ai-tabs .inc-nav-link:before' => 'border-left-color: {{VALUE}};'
				],
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
				'selector' 		=> '{{WRAPPER}} .tab-content'
			]
		);	
		$this->add_control(
			'content_color',
			[
				'label' => esc_html__( 'Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tab-content' => 'color: {{VALUE}};'
				],
			]
		);
		$this->add_control(
			'content_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tab-content' => 'background-color: {{VALUE}};'
				],
			]
		);
		$this->add_responsive_control(
			'content_margin',
			[
				'label' => esc_html__( 'Margin', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .tab-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .tab-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'content_border',
				'selector' => '{{WRAPPER}} .tab-content',
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'content_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .tab-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->end_controls_section();
	
	}
		
	/**
	 * Render Tab widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();
		extract( $settings );
		
		$parent_class = isset( $vertical_tab ) && $vertical_tab == 'yes' ? 'ai-vertical-tab' : '';
		$this->add_render_attribute( 'ai-widget-wrapper', 'class', 'ai-tab-elementor-widget' );
		$this->add_render_attribute( 'ai-widget-wrapper', 'class', esc_attr( $parent_class ) );
		?>
		<div <?php echo ''. $this->get_render_attribute_string( 'ai-widget-wrapper' ); ?>>
		<?php
		
		$tab_list = isset( $tab_list ) ? $tab_list : '';
		$vertical_tab = isset( $vertical_tab ) && $vertical_tab == '1' ? true : false;
		$title_head = isset( $title_head ) ? $title_head : 'h6';
		$rand_id = aiea_addon_base()->shortcode_rand_id();

		
		$tab_nav = ''; $list_active_class = ' active'; $content_active_class = ' active';  $tab_content = ''; $i = 1;
		if( !empty( $tab_list ) ){			
			foreach( $tab_list as $tab_single ){
				$tab_id = esc_attr( $rand_id ) .'-'. esc_attr( $i );
				$tab_type = isset( $tab_single['tab_type'] ) ? $tab_single['tab_type'] : 'content';
				$icon_type = isset( $tab_single['icon_type'] ) ? $tab_single['icon_type'] : 'none';
				
				//Icon migrated
				$migration_allowed = Icons_Manager::is_migration_allowed();
				if ( ! isset( $tab_single['selected_icon'] ) && ! $migration_allowed ) {
					$tab_single['icon'] = 'ti-home';
				}
				$migrated = isset( $tab_single['__fa4_migrated']['selected_icon'] );
				$is_new = ! isset( $tab_single['icon'] ) && $migration_allowed;		
				$has_icon = $icon_type == 'icon' && ( ! $is_new || ! empty( $tab_single['selected_icon']['value'] ) );				
				$icon_out = ''; $icon_left_out = ''; $icon_right_out = '';				
				if ( ! empty( $tab_single['icon'] ) || ( ! empty( $tab_single['selected_icon']['value'] ) && $is_new ) ){
					if ( $is_new || $migrated ) {
						$icon_out .= '<span class="ai-tab-icon">';
							ob_start();
							Icons_Manager::render_icon( $tab_single['selected_icon'], [ 'aria-hidden' => 'true' ] );
							$icon_out .= ob_get_clean();
						$icon_out .= '</span>';
					}else{
						$icon_out .= '<i class="ai-tab-icon '. esc_attr( $tab_single['icon'] ) .'"></i>';
					}
				}
				
				//Image
				if ( !$has_icon && $icon_type == 'image' && !empty( $tab_single['tab_image']['url'] ) ) {
					$this->image_class = 'image_class';
					$this->add_render_attribute( 'image', 'src', $tab_single['tab_image']['url'] );
					$this->add_render_attribute( 'image', 'alt', Control_Media::get_image_alt( $tab_single['tab_image'] ) );
					$this->add_render_attribute( 'image', 'title', Control_Media::get_image_title( $tab_single['tab_image'] ) );
					$this->add_render_attribute( 'image_class', 'class', 'img-fluid' );					
					$icon_out = wp_get_attachment_image( $tab_single['tab_image']['id'], 'full', false );
					$has_icon = true;
				}
				
				if( $has_icon && ( $settings['icon_pos'] == 'left' || $settings['icon_pos'] == 'top' ) ){
					$icon_left_out .= '<span class="elementor-tab-icon elementor-tab-icon-'. esc_attr( $settings['icon_pos'] ) .'" aria-hidden="true">';
						$icon_left_out .= $icon_out;
					$icon_left_out .= '</span>';
				}elseif( $has_icon && ( $settings['icon_pos'] == 'right' || $settings['icon_pos'] == 'bottom' ) ){
					$icon_right_out .= '<span class="elementor-tab-icon elementor-tab-icon-'. esc_attr( $settings['icon_pos'] ) .'" aria-hidden="true">';
						$icon_right_out .= $icon_out;
					$icon_right_out .= '</span>';
				}
				//Icon code end
				
				if( isset( $tab_single['tab_title'] ) && !empty( $tab_single['tab_title'] ) ){
					$tab_nav .= '<a class="inc-nav-item inc-nav-link'. esc_attr( $list_active_class ) .'" href="#" data-id="#ai-tab-'. esc_attr( $tab_id ) .'">';
						if( $has_icon && $icon_left_out ) $tab_nav .= $icon_left_out;
							$tab_nav .= '<'. esc_attr( $title_head ) .' class="ai-tab-title">'. $tab_single['tab_title'] .'</'. esc_attr( $title_head ) .'>';
						if( $has_icon && $icon_right_out ) $tab_nav .= $icon_right_out;
					$tab_nav .= '</a>';
				}
							
				if( $tab_type == 'content' ){
					if( isset( $tab_single['tab_content'] ) && !empty( $tab_single['tab_content'] ) ){
						$tab_content .= '<div class="ai-tab-pane'. esc_attr( $content_active_class ) .'" id="ai-tab-'. esc_attr( $tab_id ) .'">'. $tab_single['tab_content'] .'</div>';
					}
				}elseif( $tab_type == 'element' ){
					if( isset( $tab_single['element_id'] ) && !empty( $tab_single['element_id'] ) ){
						$tab_content .= '<div class="ai-tab-pane'. esc_attr( $content_active_class ) .'" id="ai-tab-'. esc_attr( $tab_id ) .'"><span class="ai-tab-id-to-element" data-id="'. esc_attr( $tab_single['element_id'] ) .'"></span></div>';
					}
				}elseif( $tab_type == 'templates' ){
					$template_id = isset( $tab_single['ele_templates'] ) ? $tab_single['ele_templates'] : '';
					$tab_content .= '<div class="ai-tab-pane'. esc_attr( $content_active_class ) .'" id="ai-tab-'. esc_attr( $tab_id ) .'">';
						$tab_content .= Plugin::$instance->frontend->get_builder_content( $template_id, true );
					$tab_content .= '</div><!-- .ai-tab-pane -->';
				}
				
				$list_active_class = $content_active_class = '';
				$i++;
			}
			$nav_class = $vertical_tab ? ' inc-flex-column' : '';
			echo '<div class="inc-nav inc-nav-tabs ai-tabs'. esc_attr( $nav_class ) .'">';
				echo ''. $tab_nav;
			echo '</div>';
			echo '<div class="tab-content ai-tab-content">';
				echo ''. $tab_content;
			echo '</div>';
			
		}
				
		echo '</div> <!-- .ai-widget-wrapper -->';

	}
		
}