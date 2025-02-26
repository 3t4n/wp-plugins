<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * AI Addons Contact Info 
 *
 * @since 1.0.0
 */

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
 
class AIEA_Elementor_Contact_Info_Widget extends Widget_Base {
	
	private $excerpt_len;
	
	/**
	 * Get widget name.
	 *
	 * Retrieve contact info widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'contact-info';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve contact info widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Contact Info', 'ai-addons' );
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
		return [ 'contact', 'address', 'icon', 'link' ];
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve contact info widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'ai-default-icon '. aiea_addon_base()->widget_icon_classes('contact-info');
	}


	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Contact Info widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'ai-elements' ];
	}
		
	public function get_help_url() {
        return 'https://aiaddons.ai/contact-form-demo/';
    }

	/**
	 * Register Contact Info widget controls. 
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {

		//Title Section
		$this->start_controls_section(
			'title_section',
			[
				'label'			=> esc_html__( 'Title', 'ai-addons' ),
				'tab'			=> Controls_Manager::TAB_CONTENT,
				'description'	=> esc_html__( 'Title options available here.', 'ai-addons' )
			]
		);
		$this->add_control(
			'title',
			[
				'type'			=> Controls_Manager::TEXT,
				'label' 		=> esc_html__( 'Title', 'ai-addons' ),
				'default' 		=>  esc_html__( 'Contact Info', 'ai-addons' )
			]
		);	
		$this->add_control(
			'contact_types',
			[
				'label'			=> esc_html__( 'Types', 'ai-addons' ),
				'type'			=> Controls_Manager::SELECT,
				'default'		=> 'standard',
				'options'		=> [
					'standard'		=> esc_html__( 'Standard', 'ai-addons' ),
					'classic'		=> esc_html__( 'Classic (Pro)', 'ai-addons' ),
					'classic-pro'	=> esc_html__( 'Minimalist (Pro)', 'ai-addons' ),
					'modern'		=> esc_html__( 'Modern (Pro)', 'ai-addons' )				
				],
			]
		);
		$this->add_control(
			'aiea_ani_type_pro_alert',
			[
				'type' => Controls_Manager::RAW_HTML,
				'raw' => esc_html__( 'Only available in pro version!', 'ai-addons'),
				'content_classes' => 'ai-elementor-warning',
				'condition' => [
					'contact_types!' => $this->get_free_options('contact_types'),
				]
			]
		);
		$this->add_control(
			'title_head',
			[
				'label'			=> esc_html__( 'Title Tag', 'ai-addons' ),
				'type'			=> Controls_Manager::SELECT,
				'default'		=> 'h3',
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
					'{{WRAPPER}} .contact-info-wrapper .contact-info-title' => 'text-transform: {{VALUE}};'
				],
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
			'text_align',
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
					'{{WRAPPER}} .contact-info-wrapper' => 'text-align: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'section_info_enabled',
			[
				'label' => esc_html__( 'Icon Enabled?', 'ai-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'yes',
				'classes' => 'ai-hidden-trigger-control'
			]
		);
		$this->add_control(
			'section_email_enabled',
			[
				'label' => esc_html__( 'Mail Enabled?', 'ai-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'yes',
				'classes' => 'ai-hidden-trigger-control'
			]
		);
		$this->add_control(
			'section_phone_enabled',
			[
				'label' => esc_html__( 'Phone Enabled?', 'ai-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'yes',
				'classes' => 'ai-hidden-trigger-control'
			]
		);
		$this->add_control(
			'section_address_enabled',
			[
				'label' => esc_html__( 'Address Enabled?', 'ai-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'no',
				'classes' => 'ai-hidden-trigger-control'
			]
		);
		$this->add_control(
			'section_timing_enabled',
			[
				'label' => esc_html__( 'Timing Enabled?', 'ai-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'no',
				'classes' => 'ai-hidden-trigger-control'
			]
		);
		
		$this->add_control(
			'contact_items',
			[
				'label'				=> 'Contact Info Items',
				'type'				=> 'drag-n-drop',
				'drag_items' 			=> [ 
					esc_html__( 'visible', 'ai-addons' ) => [ 
						'info'		=> esc_html__( 'Info', 'ai-addons' ),
						'mail'		=> esc_html__( 'Mail ID', 'ai-addons' ),
						'phone'		=> esc_html__( 'Phone', 'ai-addons' ),
											],
					esc_html__( 'disabled', 'ai-addons' ) => [
						'address'	=> esc_html__( 'Address', 'ai-addons' ),
						'timing'	=> esc_html__( 'Timing', 'ai-addons' )
					]
				],
				'triggers' => array(
					'info' => 'section_info_enabled',
					'mail' => 'section_email_enabled',
					'phone' => 'section_phone_enabled',
					'address' => 'section_address_enabled',
					'timing' => 'section_timing_enabled'
				),
			]
		);
		$this->add_control(
			'contact_info',
			[
				'type'			=> Controls_Manager::TEXTAREA,
				'label'			=> esc_html__( 'Information', 'ai-addons' ),
				'default' 		=> esc_html__( 'About your company.', 'ai-addons' ),
				'condition' 	=> [
					'section_info_enabled' => 'yes'
				],
			]
		);
		$this->add_control(
			'contact_address',
			[
				'type'			=> Controls_Manager::TEXTAREA,
				'label'			=> esc_html__( 'Address', 'ai-addons' ),
				'default' 		=> esc_html__( '#123 Your address', 'ai-addons' ),
				'condition' 	=> [
					'section_address_enabled' => 'yes'
				],
			]
		);
		$this->add_control(
			'contact_email',
			[
				'type'			=> Controls_Manager::TEXT,
				'label'			=> esc_html__( 'Email Id', 'ai-addons' ),
				'default' 		=> esc_html__( 'username@email.com', 'ai-addons' ),
				'condition' 	=> [
					'section_email_enabled' => 'yes'
				],
			]
		);
		$this->add_control(
			'contact_number',
			[
				'type'			=> Controls_Manager::TEXT,
				'label'			=> esc_html__( 'Contact Number', 'ai-addons' ),
				'default' 		=> '+12 1234567890',
				'condition' 	=> [
					'section_phone_enabled' => 'yes'
				],
			]
		);
		$this->add_control(
			'contact_timing',
			[
				'type'			=> Controls_Manager::TEXTAREA,
				'label'			=> esc_html__( 'Contact Timing', 'ai-addons' ),
				'default' 		=> '',
				'condition' 	=> [
					'section_timing_enabled' => 'yes'
				],
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
		
		// Go premium section
		$this->start_controls_section(
			'aiea_section_pro_1',
			[
				'label' => esc_html__( 'Go Premium for More Features', 'ai-addons' )
			]
		);
		$this->add_control(
			'aiea_get_pro_1',
			[
				'type' => Controls_Manager::RAW_HTML,
				'raw' => '<span class="inc-pro-feature"> Get the  <a href="https://aiaddons.ai/pricing/" target="_blank">Pro version</a> for more ai elements and customization options.</span>',
				'content_classes' => 'ai-elementor-warning'
			]
		);
		$this->end_controls_section();
				
		// Style General Section
		$this->start_controls_section(
			'section_style_contact_info',
			[
				'label' => __( 'General', 'ai-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->start_controls_tabs( 'contact_info_content_styles' );
		$this->start_controls_tab(
			'contact_info_content_normal',
			[
				'label' => esc_html__( 'Normal', 'ai-addons' ),
			]
		);
		$this->add_control(
			'bg_color',
			[
				'label' => esc_html__( 'Background Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .contact-info-wrapper' => 'background-color: {{VALUE}};'
				]
			]
		);
		$this->add_control(
			'font_color',
			[
				'type'			=> Controls_Manager::COLOR,
				'label'			=> esc_html__( 'Color', 'ai-addons' ),
				'default' 		=> '',
				'selectors' => [
					'{{WRAPPER}} .contact-info-wrapper' => 'color: {{VALUE}};'
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
			'contact_info_box_shadow',
			[
				'label' 		=> esc_html__( 'Box Shadow', 'ai-addons' ),
				'type' 			=> Controls_Manager::BOX_SHADOW,
				'condition' => [
					'shadow_opt' => 'yes',
				],
				'selectors' => [
					'{{WRAPPER}} .contact-info-wrapper' => 'box-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{SPREAD}}px {{COLOR}} {{contact_info_box_shadow_pos.VALUE}};',
				]
			]
		);
		$this->add_control(
			'contact_info_box_shadow_pos',
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
			'contact_info_content_hover',
			[
				'label' => esc_html__( 'Hover', 'ai-addons' ),
			]
		);
		$this->add_control(
			'bg_hcolor',
			[
				'label' => esc_html__( 'Background Color', 'ai-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .contact-info-wrapper:hover' => 'background-color: {{VALUE}};'
				],
			]
		);
		$this->add_control(
			'font_hcolor',
			[
				'type'			=> Controls_Manager::COLOR,
				'label'			=> esc_html__( 'Color', 'ai-addons' ),
				'default' 		=> '',
				'selectors' => [
					'{{WRAPPER}} .contact-info-wrapper:hover' => 'color: {{VALUE}};'
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
			'contact_info_hbox_shadow',
			[
				'label' 		=> esc_html__( 'Hover Box Shadow', 'ai-addons' ),
				'type' 			=> Controls_Manager::BOX_SHADOW,
				'condition' => [
					'shadow_hopt' => 'yes',
				],
				'selectors' => [
					'{{WRAPPER}} .contact-info-wrapper:hover' => 'box-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{SPREAD}}px {{COLOR}} {{contact_info_hbox_shadow_pos.VALUE}};',
				]
			]
		);
		$this->add_control(
			'contact_info_hbox_shadow_pos',
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
		
		$this->add_responsive_control(
			'contact_widget_margin',
			[
				'label' => esc_html__( 'Margin', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .contact-info-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_responsive_control(
			'contact_widget_padding',
			[
				'label' => esc_html__( 'Padding', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .contact-info-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_responsive_control(
			'contact_widget_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .contact-info-wrapper' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'contact_info_content_typography',
				'selector' 		=> '{{WRAPPER}} .contact-info-wrapper'
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
				'label'			=> esc_html__( 'Color', 'ai-addons' ),
				'default' 		=> '',
				'selectors' => [
					'{{WRAPPER}} .contact-info-wrapper .contact-info-title' => 'color: {{VALUE}};'
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
				'label'			=> esc_html__( 'Color', 'ai-addons' ),
				'default' 		=> '',
				'selectors' => [
					'{{WRAPPER}} .contact-info-wrapper:hover .contact-info-title' => 'color: {{VALUE}};'
				],
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();	
		$this->add_responsive_control(
			'title_margin',
			[
				'label' => esc_html__( 'Margin', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .contact-info-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);		
		$this->add_responsive_control(
			'title_padding',
			[
				'label' => esc_html__( 'Padding', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .contact-info-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
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
					'{{WRAPPER}} .contact-info-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					'(mobile){{WRAPPER}} .contact-info-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'contact_info_title_typography',
				'selector' 		=> '{{WRAPPER}} .contact-info-wrapper .contact-info-title'
			]
		);	
		$this->end_controls_section();
		
		// Style Info Section
		$this->start_controls_section(
			'section_style_info',
			[
				'label' => __( 'Info', 'ai-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition' 	=> [
					'section_info_enabled' 		=> 'yes'
				],
			]
		);
		$this->add_control(
			'info_color',
			[
				'type'			=> Controls_Manager::COLOR,
				'label'			=> esc_html__( 'Color', 'ai-addons' ),
				'default' 		=> '',
				'selectors' => [
					'{{WRAPPER}} .contact-info-wrapper .contact-info' => 'color: {{VALUE}};'
				],
			]
		);	
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'contact_info_typography',
				'selector' 		=> '{{WRAPPER}} .contact-info-wrapper .contact-info'
			]
		);
		$this->add_responsive_control(
			'info_margin',
			[
				'label' => esc_html__( 'Margin', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .contact-info' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_responsive_control(
			'info_padding',
			[
				'label' => esc_html__( 'Padding', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .contact-info' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->end_controls_section();
		
		// Style Address Section
		$this->start_controls_section(
			'section_style_address',
			[
				'label' => __( 'Address', 'ai-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition' 	=> [
					'section_address_enabled' 		=> 'yes'
				],
			]
		);
		$this->add_control(
			'address_color',
			[
				'type'			=> Controls_Manager::COLOR,
				'label'			=> esc_html__( 'Color', 'ai-addons' ),
				'default' 		=> '',
				'selectors' => [
					'{{WRAPPER}} .contact-address' => 'color: {{VALUE}};'
				],
			]
		);	
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'contact_address_typography',
				'selector' 		=> '{{WRAPPER}} .contact-address'
			]
		);
		$this->add_responsive_control(
			'address_margin',
			[
				'label' => esc_html__( 'Margin', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .contact-address' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_responsive_control(
			'address_padding',
			[
				'label' => esc_html__( 'Padding', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .contact-address' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->end_controls_section();
		
		// Style Email Section		
		$this->start_controls_section(
			'section_style_email',
			[
				'label' => __( 'Email', 'ai-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition' 	=> [
					'section_email_enabled' 		=> 'yes'
				],
			]
		);
		$this->add_control(
			'email_color',
			[
				'type'			=> Controls_Manager::COLOR,
				'label'			=> esc_html__( 'Color', 'ai-addons' ),
				'default' 		=> '',
				'selectors' => [
					'{{WRAPPER}} .contact-mail' => 'color: {{VALUE}};'
				],
			]
		);	
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'contact_mail_typography',
				'selector' 		=> '{{WRAPPER}} .contact-mail'
			]
		);
		$this->add_responsive_control(
			'email_margin',
			[
				'label' => esc_html__( 'Margin', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .contact-mail' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_responsive_control(
			'email_padding',
			[
				'label' => esc_html__( 'Padding', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .contact-mail' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->end_controls_section();
		
		// Style Phone Section		
		$this->start_controls_section(
			'section_style_phone',
			[
				'label' => __( 'Phone', 'ai-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition' 	=> [
					'section_phone_enabled' 		=> 'yes'
				],
			]
		);
		$this->add_control(
			'phone_color',
			[
				'type'			=> Controls_Manager::COLOR,
				'label'			=> esc_html__( 'Color', 'ai-addons' ),
				'default' 		=> '',
				'selectors' => [
					'{{WRAPPER}} .contact-phone' => 'color: {{VALUE}};'
				],
			]
		);	
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'contact_phone_typography',
				'selector' 		=> '{{WRAPPER}} .contact-phone'
			]
		);
		$this->add_responsive_control(
			'phone_margin',
			[
				'label' => esc_html__( 'Phone Margin', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .contact-phone' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_responsive_control(
			'phone_padding',
			[
				'label' => esc_html__( 'Padding', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .contact-phone' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->end_controls_section();
		
		// Style Timing Section		
		$this->start_controls_section(
			'section_style_timing',
			[
				'label' => __( 'Timing', 'ai-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition' 	=> [
					'section_timing_enabled' 		=> 'yes'
				],
			]
		);
		$this->add_control(
			'timing_color',
			[
				'type'			=> Controls_Manager::COLOR,
				'label'			=> esc_html__( 'Color', 'ai-addons' ),
				'default' 		=> '',
				'selectors' => [
					'{{WRAPPER}} .contact-timing' => 'color: {{VALUE}};'
				],
			]
		);	
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'contact_timing_typography',
				'selector' 		=> '{{WRAPPER}} .contact-timing'
			]
		);
		$this->add_responsive_control(
			'timing_margin',
			[
				'label' => esc_html__( 'Margin', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .contact-timing' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_responsive_control(
			'timing_padding',
			[
				'label' => esc_html__( 'Padding', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .contact-timing' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->end_controls_section();

	}
	
	/**
	 * Render Contact Info widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();
		extract( $settings );
		
		$free_types = [ 'standard' ];		
		$parent_class = isset( $contact_types ) && in_array( $contact_types, $free_types ) ? 'ai-contactinfo-style-'. $contact_types : 'ai-contactinfo-style-standard';
		
		$this->add_render_attribute( 'ai-widget-wrapper', 'class', 'ai-contact-info-elementor-widget' );
		$this->add_render_attribute( 'ai-widget-wrapper', 'class', esc_attr( $parent_class ) );
		?>
		<div <?php echo ''. $this->get_render_attribute_string( 'ai-widget-wrapper' ); ?>>
		<?php

		$title = isset( $title ) && $title != '' ? $title : '';
		$title_head = isset( $title_head ) && $title_head != '' ? $title_head : 'h3';
		
		$default_items = array( 
			"info"		=> esc_html__( "Info", 'ai-addons' ),
			"mail"		=> esc_html__( "Mail ID", 'ai-addons' ),
			"phone"		=> esc_html__( "Phone", 'ai-addons' )			
		);
		$elemetns = isset( $contact_items ) && !empty( $contact_items ) ? json_decode( $contact_items, true ) : array( 'visible' => $default_items );
		
		echo '<div class="contact-info-wrapper">';
		
			if( $title ) echo '<'. esc_attr( $title_head ) .' class="contact-info-title">'. esc_html( $title ) .'</'. esc_attr( $title_head ) .'>';
			
			if( isset( $elemetns['visible'] ) ) :
				foreach( $elemetns['visible'] as $element => $value ){
					switch( $element ){
						case "info":
							if( isset( $contact_info ) && $contact_info != '' ){
								echo '<div class="contact-info">';
									echo do_shortcode( $contact_info );
								echo '</div><!-- .contact-info -->';
							}
						break;
						
						case "address":
							if( isset( $contact_address ) && $contact_address != '' ){
								echo '<div class="contact-address">';
									echo '<span class="icon-directions icons"></span><div class="contact-info-inner">'. do_shortcode( $contact_address ) .'</div>';
								echo '</div><!-- .contact-info -->';
							}
						break;
						
						case "mail":
							if( isset( $contact_email ) && $contact_email != '' ){
								echo '<div class="contact-mail">';
								$mail_out = '';
								foreach( explode( ",", $contact_email ) as $email ){
									$mail_out .= '<a href="mailto:'. esc_attr( trim( $email ) ) .'"><span class="icon-envelope icons"></span> '. esc_html( trim( $email ) ) .'</a>, ';
								}
								echo rtrim( $mail_out, ', ' );
								echo '</div><!-- .contact-mail -->';
							}
						break;
						
						case "phone":
							if( isset( $contact_number ) && $contact_number != '' ){
								echo '<div class="contact-phone">';
								foreach( explode( ",", $contact_number ) as $phone ){
									echo '<div class="phone-list"><span class="icon-screen-smartphone icons"></span> <span>'. esc_html( trim( $phone ) ) .'</span></div>';
								}
								echo '</div><!-- .contact-phone -->';
							}
						break;
						
						case "timing":
							if( isset( $contact_timing ) && $contact_timing != '' ){
								echo '<div class="contact-timing">';
									echo '<span class="icon-directions icons"></span><div class="contact-info-inner">'. do_shortcode( $contact_timing ) .'</div>';
								echo '</div><!-- .contact-timing -->';
							}
						break;						
						
					}
				}
			endif;
		echo '</div><!-- .contact-info-wrapper -->';
		
		echo '</div> <!-- .ai-widget-wrapper -->';

	}
	
	public function get_free_options( $key ) {
		$free_options = [
			'contact_types' => [ 'standard' ]
		];
		return $free_options[$key];
	}
	
	public function get_live_settings( $key ) {
		$settings = $this->get_settings_for_display();
		return $settings[$key];
	}
	
}