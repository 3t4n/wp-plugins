<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;

/**
 * AI Addons Content Switcher
 *
 * @since 1.0.0
 */
 
class AIEA_Elementor_Content_Switcher_Widget extends Widget_Base {
	
	/**
	 * Get widget name.
	 *
	 * Retrieve Content Switcher widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'ai-content-switcher';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Content Switcher widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Content Switcher', 'ai-addons' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Content Switcher widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'ai-default-icon '. aiea_addon_base()->widget_icon_classes('content-switcher');
	}


	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Content Switcher widget belongs to.
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
        return 'https://aiaddons.ai/content-switcher-demo/';
    }

	/**
	 * Register Content Switcher widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {

		//Switcher Section
		$this->start_controls_section(
			'switcher_section',
			[
				'label'	=> esc_html__( 'Switcher', 'ai-addons' ),
				'accordion'	=> Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'switcher_content_type',
			[
				'type'			=> Controls_Manager::SELECT,
				'label'			=> esc_html__( 'Type', 'ai-addons' ),
				'default'		=> 'content',
				'options'		=> [
					'content'	=> esc_html__( 'Text Content', 'ai-addons' ),
					'element'	=> esc_html__( 'HTML Element', 'ai-addons' )
				]
			]
		);
		$this->add_responsive_control(
			'content_align',
			[
				'label' => esc_html__( 'Alignment', 'ai-addons' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
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
				],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .switcher-content-wrapper' => 'text-align: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();
		
		//Primary Content
		$this->start_controls_section(
			'primary_content_section',
			[
				'label'	=> esc_html__( 'Primary Content', 'ai-addons' ),
				'accordion'	=> Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'primary_switcher_title',
			[
				'type'			=> Controls_Manager::TEXT,
				'label' 		=> esc_html__( 'Primary Title', 'ai-addons' ),
				'default' => esc_html__( 'Primary', 'ai-addons' ),
			]
		);
		$this->add_control(
			'primary_switcher_icon',
			[
				'label' => esc_html__( 'Icon', 'ai-addons' ),
				'type' => Controls_Manager::ICONS,
				'fa4compatibility' => 'primary_switcher_compatibility_icon', 
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'fa-solid',
				],
				'skin' => 'inline',
				'label_block' => false,
			]
		);
		$this->add_control(
			'primary_switcher_element',
			[
				'type'			=> Controls_Manager::TEXT,
				'label' 		=> esc_html__( 'Element ID', 'ai-addons' ),
				'condition' 	=> [
					'switcher_content_type'	=> 'element'
				]
			]
		);

		// Openai part
		$this->add_control(
			'aiea_content_opt',
			[
				'label' 		=> esc_html__( 'OpenAI Content?', 'ai-addons' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'no'
			]
		);
		$this->add_control(
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
		
		$this->add_control(
			'primary_switcher_content',
			[
				'label'			=> esc_html__( 'Content', 'plugin-domain' ),
				'type' 			=> Controls_Manager::WYSIWYG,
				'default'		=> aiea_addon_base()->make_default_content('cs-primary'),
				'condition' 	=> [
					'switcher_content_type'	=> 'content'
				]
			]
		);		
		$this->end_controls_section();
		
		//Secondary Content
		$this->start_controls_section(
			'secondary_content_section',
			[
				'label'	=> esc_html__( 'Secondary Content', 'ai-addons' ),
				'accordion'	=> Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'secondary_switcher_title',
			[
				'type'			=> Controls_Manager::TEXT,
				'label' 		=> esc_html__( 'Secondary Title', 'ai-addons' ),
				'default' => esc_html__( 'Secondary', 'ai-addons' ),
			]
		);
		$this->add_control(
			'secondary_switcher_icon',
			[
				'label' => esc_html__( 'Icon', 'ai-addons' ),
				'type' => Controls_Manager::ICONS,
				'fa4compatibility' => 'secondary_switcher_compatibility_icon', 
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'fa-solid',
				],
				'skin' => 'inline',
				'label_block' => false,
			]
		);
		$this->add_control(
			'secondary_switcher_element',
			[
				'type'			=> Controls_Manager::TEXT,
				'label' 		=> esc_html__( 'Element ID', 'ai-addons' ),
				'condition' 	=> [
					'switcher_content_type'	=> 'element'
				]
			]
		);
		
		// Openai part
		$this->add_control(
			's_aiea_content_opt',
			[
				'label' 		=> esc_html__( 'OpenAI Content?', 'ai-addons' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'no'
			]
		);
		$this->add_control(
			'aiea_pro_alert_1',
			[
				'type' => Controls_Manager::RAW_HTML,
				'raw' => esc_html__( 'Only available in pro version!', 'ai-addons'),
				'content_classes' => 'ai-elementor-warning',
				'condition' => [
					's_aiea_content_opt' => 'yes'
				],
			]
		);
		
		$this->add_control(
			'secondary_switcher_content',
			[
				'label'			=> esc_html__( 'Content', 'plugin-domain' ),
				'type' 			=> Controls_Manager::WYSIWYG,
				'default'		=> aiea_addon_base()->make_default_content('cs-secondary'),
				'condition' 	=> [
					'switcher_content_type'	=> 'content'
				]
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
		
		// Style Switch General Section
		$this->start_controls_section(
			'section_style_general',
			[
				'label' => __( 'General', 'ai-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'switch_wrap_padding',
			[
				'label' => esc_html__( 'Padding', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .switcher-content-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_responsive_control(
			'switch_wrap_margin',
			[
				'label' => esc_html__( 'Margin', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .switcher-content-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_control(
			'switch_wrap_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .switcher-content-wrapper' => 'background-color: {{VALUE}};'
				]
			]
		);
		$this->add_control(
			'switch_wrap_shadow_opt',
			[
				'label' 		=> esc_html__( 'Box Shadow', 'ai-addons' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'no'
			]
		);
		$this->add_control(
			'switch_wrap_shadow',
			[
				'label' 		=> esc_html__( 'Box Shadow', 'ai-addons' ),
				'type' 			=> Controls_Manager::BOX_SHADOW,
				'condition' => [
					'switch_wrap_shadow_opt' => 'yes',
				],
				'selectors' => [
					'{{WRAPPER}} .switcher-content-wrapper' => 'box-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{SPREAD}}px {{COLOR}} {{switch_wrap_shadow_pos.VALUE}};',
				]
			]
		);
		$this->add_control(
			'switch_wrap_shadow_pos',
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
		$this->add_responsive_control(
			'widget_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .switcher-content-wrapper' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();
		
		// Style Switcher Head Section
		$this->start_controls_section(
			'section_style_header',
			[
				'label' => __( 'Switcher Head', 'ai-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'switcher_head_padding',
			[
				'label' => esc_html__( 'Padding', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .switcher-content-wrapper .ai-switcher-header' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_responsive_control(
			'switcher_head_margin',
			[
				'label' => esc_html__( 'Margin', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .switcher-content-wrapper .ai-switcher-header' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_control(
			'head_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .switcher-content-wrapper .ai-switcher-header' => 'background-color: {{VALUE}};'
				]
			]
		);
		$this->add_control(
			'icon_label',
			[
				'label' => esc_html__( 'Header Icon', 'ai-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator'		=> 'before'
			]
		);
		$this->start_controls_tabs( 'header_icon_styles' );
		$this->start_controls_tab(
			'header_icon',
			[
				'label' => esc_html__( 'Normal', 'ai-addons' ),
			]
		);
		$this->add_control(
			'icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ai-swticher-list > li i' => 'color: {{VALUE}};'
				]
			]
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'header_icon_active',
			[
				'label' => esc_html__( 'Active', 'ai-addons' ),
			]
		);
		$this->add_control(
			'icon_color_active',
			[
				'label' => esc_html__( 'Icon Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ai-swticher-list > li.switcher-active i' => 'color: {{VALUE}};'
				]
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
					'{{WRAPPER}} .ai-swticher-list > li i' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .ai-swticher-list > li svg' => 'height: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'icon_spacing',
			[
				'label' => esc_html__( 'Icon Spacing', 'ai-addons' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 10,
				],
				'range' => [
					'px' => [
						'min' => 0,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ai-swticher-list > li i' => is_rtl() ? 'margin-left: {{SIZE}}{{UNIT}};' : 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->start_controls_tabs( 'header_styles' );
		$this->start_controls_tab(
			'primary_header',
			[
				'label' => esc_html__( 'Normal', 'ai-addons' ),
			]
		);
		$this->add_control(
			'primary_head_font_color',
			[
				'label' => esc_html__( 'Font Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .switcher-content-wrapper .ai-swticher-list li:not(.ai-switch-toggle-wrap)' => 'color: {{VALUE}};'
				]
			]
		);
		$this->add_control(
			'primary_head_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .switcher-content-wrapper .ai-swticher-list li:not(.ai-switch-toggle-wrap)' => 'background-color: {{VALUE}};'
				]
			]
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'primary_head_active',
			[
				'label' => esc_html__( 'Active', 'ai-addons' ),
			]
		);
		$this->add_control(
			'secondary_head_font_color',
			[
				'label' => esc_html__( 'Font Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .switcher-content-wrapper .ai-swticher-list li.switcher-active' => 'color: {{VALUE}};'
				]
			]
		);
		$this->add_control(
			'secondary_head_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .switcher-content-wrapper .ai-swticher-list li.switcher-active' => 'background-color: {{VALUE}};'
				]
			]
		);
		$this->end_controls_tab();	
		$this->end_controls_tabs();
		$this->add_control(
			'slider_label',
			[
				'label' => esc_html__( 'Switcher Slider', 'ai-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator'		=> 'before'
			]
		);
		$this->add_control(
			'switch_slider_bg_color',
			[
				'label' => esc_html__( 'Slider Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .switcher-content-wrapper .ai-swticher-list .ai-swticher-slider' => 'background-color: {{VALUE}};'
				]
			]
		);	
		
		$this->add_control(
			'typo_label',
			[
				'label' => esc_html__( 'Typograpy', 'ai-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator'		=> 'before'
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' 		=> esc_html__( 'Switcher Title Typo', 'ai-addons' ),
				'name' 			=> 'title_typography',
				'selector' 		=> '{{WRAPPER}} .switcher-content-wrapper li span',
			]
		);
		$this->add_responsive_control(
			'switcher_head_item_padding',
			[
				'label' => esc_html__( 'Switch Title Padding', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .switcher-content-wrapper .ai-switcher-header li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->end_controls_section();
		
		// Style Content Switcher Section
		$this->start_controls_section(
			'section_style_content',
			[
				'label' => __( 'Content Switcher', 'ai-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'switcher_content_padding',
			[
				'label' => esc_html__( 'Padding', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .switcher-content-wrapper .ai-switcher-content > div' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_responsive_control(
			'switcher_content_margin',
			[
				'label' => esc_html__( 'Margin', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .switcher-content-wrapper .ai-switcher-content > div' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->start_controls_tabs( 'content_styles' );
		$this->start_controls_tab(
			'primary_content',
			[
				'label' => esc_html__( 'Primary', 'ai-addons' ),
			]
		);
		$this->add_control(
			'primary_content_font_color',
			[
				'label' => esc_html__( 'Font Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .switcher-content-wrapper .ai-switcher-content .ai-switcher-primary' => 'color: {{VALUE}};'
				]
			]
		);
		$this->add_control(
			'primary_content_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .switcher-content-wrapper .ai-switcher-content .ai-switcher-primary' => 'background-color: {{VALUE}};'
				]
			]
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'secondary_content',
			[
				'label' => esc_html__( 'Secondary', 'ai-addons' ),
			]
		);
		$this->add_control(
			'secondary_content_font_color',
			[
				'label' => esc_html__( 'Font Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .switcher-content-wrapper .ai-switcher-content .ai-switcher-secondary' => 'color: {{VALUE}};'
				]
			]
		);
		$this->add_control(
			'secondary_content_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .switcher-content-wrapper .ai-switcher-content .ai-switcher-secondary' => 'background-color: {{VALUE}};'
				]
			]
		);
		$this->end_controls_tab();	
		$this->end_controls_tabs();		
		$this->add_control(
			'shadow_opt',
			[
				'label' 		=> esc_html__( 'Box Shadow', 'ai-addons' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'no'
			]
		);
		$this->add_control(
			'counter_box_shadow',
			[
				'label' 		=> esc_html__( 'Box Shadow', 'ai-addons' ),
				'type' 			=> Controls_Manager::BOX_SHADOW,
				'condition' => [
					'shadow_opt' => 'yes',
				],
				'selectors' => [
					'{{WRAPPER}} .switcher-content-wrapper .ai-switcher-content' => 'box-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{SPREAD}}px {{COLOR}} {{counter_box_shadow_pos.VALUE}};',
				]
			]
		);
		$this->add_control(
			'counter_box_shadow_pos',
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
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'content_border',
				'selector' => '{{WRAPPER}} .switcher-content-wrapper .ai-switcher-content',
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'content_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .switcher-content-wrapper .ai-switcher-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' 		=> esc_html__( 'Content Switcher Typo', 'ai-addons' ),
				'name' 			=> 'content_typography',
				'selector' 		=> '{{WRAPPER}} .switcher-content-wrapper .ai-switcher-content'
			]
		);
		$this->end_controls_section();	
	
	}
	
	/**
	 * Render Content Switcher widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();
		extract( $settings );
		
		$multi_open = isset( $multi_open ) && $multi_open != '1' ? true : false;
		$this->add_render_attribute( 'ai-widget-wrapper', 'class', 'ai-switcher-content-elementor-widget switcher-content-wrapper' );
		$this->add_render_attribute( 'ai-widget-wrapper', 'data-toggle', esc_attr( $multi_open ) );
		?>
		<div <?php echo ''. $this->get_render_attribute_string( 'ai-widget-wrapper' ); ?>>
		<?php
		
		$output = '';

		$switcher_type = isset( $switcher_content_type ) && !empty( $switcher_content_type ) ? $switcher_content_type : 'content';
		
		$primary_switcher_title = isset( $primary_switcher_title ) && !empty( $primary_switcher_title ) ? $primary_switcher_title : '';
		$primary_switcher_element = isset( $primary_switcher_element ) && !empty( $primary_switcher_element ) ? $primary_switcher_element : '';
		$primary_switcher_content = isset( $primary_switcher_content ) && !empty( $primary_switcher_content ) ? $primary_switcher_content : '';
		
		$secondary_switcher_title = isset( $secondary_switcher_title ) && !empty( $secondary_switcher_title ) ? $secondary_switcher_title : '';
		$secondary_switcher_element = isset( $secondary_switcher_element ) && !empty( $secondary_switcher_element ) ? $secondary_switcher_element : '';
		$secondary_switcher_content = isset( $secondary_switcher_content ) && !empty( $secondary_switcher_content ) ? $secondary_switcher_content : '';
		
		$primary_icon_stat = false; $primary_icon = '';
		$secondary_icon_stat = false; $secondary_icon = '';
		
		// Primary icon
		if ( empty( $settings['primary_switcher_icon'] ) && ! Icons_Manager::is_migration_allowed() ) {
			// add old default
			$settings['primary_switcher_icon'] = 'fa fa-star';
		}

		if ( ! empty( $settings['primary_switcher_icon'] ) ) {
			$this->add_render_attribute( 'p_icon', 'class', $settings['primary_switcher_icon'] );
			$this->add_render_attribute( 'p_icon', 'aria-hidden', 'true' );
		}
		
		if( isset( $settings['primary_switcher_icon'] ) ) {
			$primary_icon = $this->aiea_icon_stat( 'primary_switcher_compatibility_icon', 'primary_switcher_icon', 'ti-settings' );
			$primary_icon_stat = true;
		}
		
		// Secondary icon
		if ( empty( $settings['secondary_switcher_icon'] ) && ! Icons_Manager::is_migration_allowed() ) {
			// add old default
			$settings['secondary_switcher_icon'] = 'fa fa-star';
		}

		if ( ! empty( $settings['secondary_switcher_icon'] ) ) {
			$this->add_render_attribute( 's_icon', 'class', $settings['secondary_switcher_icon'] );
			$this->add_render_attribute( 's_icon', 'aria-hidden', 'true' );
		}
		
		if( isset( $settings['secondary_switcher_icon'] ) ) {
			$secondary_icon = $this->aiea_icon_stat( 'primary_switcher_compatibility_icon', 'secondary_switcher_icon', 'ti-settings' );
			$secondary_icon_stat = true;
		}

		echo '<div class="ai-switcher-header">';
			echo '<ul class="inc-nav ai-swticher-list">';
				echo '<div class="ai-swticher-slider"></div>';
				if( $primary_switcher_title || $primary_icon_stat ) {
					echo '<li class="ai-primary-switch switcher-active">';
						if( $primary_icon_stat ) {
							if ( $primary_icon ) :
								Icons_Manager::render_icon( $settings['primary_switcher_icon'], [ 'aria-hidden' => 'true' ] );				
							else :						
							?>
								<i <?php $this->print_render_attribute_string( 'p_icon' ); ?>></i>
							<?php endif; 
						}
					echo '<span>'. esc_html( $primary_switcher_title ) .'</span></li>';
				}
				if( $secondary_switcher_title || $secondary_icon_stat ) {
					echo '<li class="ai-secondary-switch">';
						if( $secondary_icon_stat ) {
							if ( $secondary_icon ) :
								Icons_Manager::render_icon( $settings['secondary_switcher_icon'], [ 'aria-hidden' => 'true' ] );
							else :						
							?>
								<i <?php $this->print_render_attribute_string( 's_icon' ); ?>></i>
							<?php endif; 
						}
					echo '<span>'. esc_html( $secondary_switcher_title ) .'</span></li>';
				}
			echo '</ul>';
		echo '</div><!-- .ai-switcher-header -->';
		
		echo '<div class="ai-switcher-content">';
			
			//Primary Part
			$primary_content = '';
			if( !$primary_switcher_element ) {
				$primary_content = $primary_switcher_content;
			}else{
				$primary_content = '<span class="ai-switcher-id-to-element" data-id="'. esc_attr( $primary_switcher_element ) .'"></span>';
			}			
			if( $primary_content ) echo '<div class="ai-switcher-primary">'. $primary_content .'</div><!-- .ai-switcher-primary -->';
			
			//Secondary Part
			$secondary_content = '';
			if( !$secondary_switcher_element ) {
				$secondary_content = $secondary_switcher_content;
			}else{
				$secondary_content = '<span class="ai-switcher-id-to-element" data-id="'. esc_attr( $secondary_switcher_element ) .'"></span>';
			}			
			if( $secondary_content ) echo '<div class="ai-switcher-secondary">'. $secondary_content .'</div><!-- .ai-switcher-secondary -->';
			
		echo '</div><!-- .ai-switcher-content -->';
			
		echo '</div> <!-- .ai-widget-wrapper -->';

	}
	
	protected function aiea_icon_stat( $compatibility, $icon_field, $default = '' ) {
		$settings = $this->get_settings_for_display();
				
		$migrated = isset( $settings['__fa4_migrated'][$icon_field] );
		$is_new = empty( $settings[$compatibility] ) && Icons_Manager::is_migration_allowed();
		
		if ( empty( $settings[$compatibility] ) && !Icons_Manager::is_migration_allowed() ) {
			// add old default
			$settings[$compatibility] = $default;
		}
		if ( ! empty( $settings[$compatibility] ) ) {
			$this->add_render_attribute( $icon_field. '_attr', 'class', $settings[$compatibility] );
			$this->add_render_attribute( $icon_field. '_attr', 'aria-hidden', 'true' );
		}

		if ( $is_new || $migrated ) return true;
			
		return false;
	}
		
}