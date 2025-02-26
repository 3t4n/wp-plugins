<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;

/**
 * AI Addons Contact Form 
 *
 * @since 1.0.0
 */
 
class AIEA_Elementor_Contact_Form_7_Widget extends Widget_Base {
	
	private $excerpt_len;
	
	/**
	 * Get widget name.
	 *
	 * Retrieve Blog widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'contact-form-7';
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
		return __( 'Contact Form 7', 'ai-addons' );
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
		return 'ai-default-icon '. aiea_addon_base()->widget_icon_classes('contact-form-7');
	}


	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Contact Form widget belongs to.
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
	 * Register Contact Form widget controls. 
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {
	
		$contact_forms = aiea_post_elements()->get_contact_forms_7();
		
		if( !empty( $contact_forms ) ){
			//General Section
			$this->start_controls_section(
				'general_section',
				[
					'label'	=> esc_html__( 'General', 'ai-addons' ),
					'tab'	=> Controls_Manager::TAB_CONTENT,
					'description'	=> esc_html__( 'Default contact form options.', 'ai-addons' ),
				]
			);
			$this->add_control(
				'contact_form',
				[
					'type'			=> Controls_Manager::SELECT,
					'label'			=> esc_html__( 'Contact Form', 'ai-addons' ),
					'default'		=> '',
					'options'		=> $contact_forms
				]
			);
			$this->end_controls_section();
			
			//Layouts Section
			$this->start_controls_section(
				'layouts_section',
				[
					'label'			=> esc_html__( 'Layouts', 'ai-addons' ),
					'tab'			=> Controls_Manager::TAB_CONTENT,
					'description'	=> esc_html__( 'Circle progress layout options here available.', 'ai-addons' ),
				]
			);
			$this->add_control(
				'cf_layout',
				[
					'label'			=> esc_html__( 'Contact Form Layout', 'ai-addons' ),
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
						'cf_layout!' => $this->get_free_options('cf_layout'),
					]
				]
			);
			$this->add_responsive_control(
				'text_align',
				[
					'label' => __( 'Alignment', 'ai-addons' ),
					'type' => Controls_Manager::CHOOSE,
					'default' => 'left',
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
						'{{WRAPPER}} .contact-form-wrapper' => 'text-align: {{VALUE}};',
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
			
			// Style General Section
			$this->start_controls_section(
				'section_style_contact_form',
				[
					'label' => __( 'General', 'ai-addons' ),
					'tab'   => Controls_Manager::TAB_STYLE,
				]
			);
			
			$this->start_controls_tabs( 'contact_form_content_styles' );
			$this->start_controls_tab(
				'contact_form_content_normal',
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
						'{{WRAPPER}} .contact-form-wrapper' => 'background-color: {{VALUE}};'
					]
				]
			);
			$this->add_control(
				'font_color',
				[
					'type'			=> Controls_Manager::COLOR,
					'label'			=> esc_html__( 'Font Color', 'ai-addons' ),
					'default' 		=> '',
					'selectors' => [
						'{{WRAPPER}} .contact-form-wrapper' => 'color: {{VALUE}};'
					]
				]
			);
			$this->add_control(
				'shadow_opt',
				[
					'label' 		=> esc_html__( 'Box Shadow Enable', 'ai-addons' ),
					'type' 			=> Controls_Manager::SWITCHER,
					'default' 		=> 'no'
				]
			);
			$this->add_control(
				'contact_form_box_shadow',
				[
					'label' 		=> esc_html__( 'Box Shadow', 'ai-addons' ),
					'type' 			=> Controls_Manager::BOX_SHADOW,
					'condition' => [
						'shadow_opt' => 'yes',
					],
					'selectors' => [
						'{{WRAPPER}} .contact-form-wrapper' => 'box-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{SPREAD}}px {{COLOR}} {{contact_form_box_shadow_pos.VALUE}};',
					]
				]
			);
			$this->add_control(
				'contact_form_box_shadow_pos',
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
				'contact_form_content_hover',
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
						'{{WRAPPER}} .contact-form-wrapper:hover' => 'background-color: {{VALUE}};'
					],
				]
			);
			$this->add_control(
				'font_hcolor',
				[
					'type'			=> Controls_Manager::COLOR,
					'label'			=> esc_html__( 'Font Color', 'ai-addons' ),
					'default' 		=> '',
					'selectors' => [
						'{{WRAPPER}} .contact-form-wrapper:hover' => 'color: {{VALUE}};'
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
				'contact_form_hbox_shadow',
				[
					'label' 		=> esc_html__( 'Box Shadow', 'ai-addons' ),
					'type' 			=> Controls_Manager::BOX_SHADOW,
					'condition' => [
						'shadow_hopt' => 'yes',
					],
					'selectors' => [
						'{{WRAPPER}} .contact-form-wrapper:hover' => 'box-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{SPREAD}}px {{COLOR}} {{contact_form_hbox_shadow_pos.VALUE}};',
					]
				]
			);
			$this->add_control(
				'contact_form_hbox_shadow_pos',
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
						'{{WRAPPER}} .contact-form-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					]
				]
			);
			$this->add_responsive_control(
				'contact_widget_padding',
				[
					'label' => esc_html__( 'Padding', 'ai-addons' ),
					'type' => Controls_Manager::DIMENSIONS,
					'selectors' => [
						'{{WRAPPER}} .contact-form-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .contact-form-wrapper' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);			
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 			=> 'contact_form_content_typography',
					'selector' 		=> '{{WRAPPER}} .contact-form-wrapper'
				]
			);	
			
			$this->end_controls_section();
			
			// Style Fields Section
			$this->start_controls_section(
				'section_style_fields',
				[
					'label' => __( 'Fields', 'ai-addons' ),
					'tab'   => Controls_Manager::TAB_STYLE,
				]
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 			=> 'contact_form_fields_typography',
					'selector' 		=> '{{WRAPPER}} .contact-form-wrapper .wpcf7-form-control'
				]
			);
			$this->start_controls_tabs( 'contact_info_content_styles' );
				$this->start_controls_tab(
					'fields_normal',
					[
						'label' => esc_html__( 'Normal', 'ai-addons' ),
					]
				);
				$this->add_control(
					'fields_color',
					[
						'type'			=> Controls_Manager::COLOR,
						'label'			=> esc_html__( 'Color', 'ai-addons' ),
						'default' 		=> '',
						'selectors' => [
							'{{WRAPPER}} .contact-form-wrapper .wpcf7-form-control' => 'color: {{VALUE}};'
						]
					]
				);
				$this->add_control(
					'fields_bg',
					[
						'type'			=> Controls_Manager::COLOR,
						'label'			=> esc_html__( 'Background', 'ai-addons' ),
						'default' 		=> '',
						'selectors' => [
							'{{WRAPPER}} .contact-form-wrapper .wpcf7-form-control' => 'background-color: {{VALUE}};'
						]
					]
				);
				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name' => 'fields_border',
						'selector' => '{{WRAPPER}} .contact-form-wrapper .wpcf7-form-control',
					]
				);
				$this->end_controls_tab();

				$this->start_controls_tab(
					'fields_hover',
					[
						'label' => esc_html__( 'Hover', 'ai-addons' ),
					]
				);
				$this->add_control(
					'fields_hcolor',
					[
						'type'			=> Controls_Manager::COLOR,
						'label'			=> esc_html__( 'Color', 'ai-addons' ),
						'default' 		=> '',
						'selectors' => [
							'{{WRAPPER}} .contact-form-wrapper .wpcf7-form-control:hover, {{WRAPPER}} .contact-form-wrapper .wpcf7-form-control:focus, {{WRAPPER}} .contact-form-wrapper .wpcf7-form-control:active' => 'color: {{VALUE}};'
						]
					]
				);
				$this->add_control(
					'fields_hbg',
					[
						'type'			=> Controls_Manager::COLOR,
						'label'			=> esc_html__( 'Background', 'ai-addons' ),
						'default' 		=> '',
						'selectors' => [
							'{{WRAPPER}} .contact-form-wrapper .wpcf7-form-control:hover, {{WRAPPER}} .contact-form-wrapper .wpcf7-form-control:focus, {{WRAPPER}} .contact-form-wrapper .wpcf7-form-control:active' => 'background-color: {{VALUE}};'
						]
					]
				);
				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name' => 'fields_hborder',
						'selector' => '{{WRAPPER}} .contact-form-wrapper .wpcf7-form-control:hover, {{WRAPPER}} .contact-form-wrapper .wpcf7-form-control:focus, {{WRAPPER}} .contact-form-wrapper .wpcf7-form-control:active',
					]
				);
				$this->end_controls_tab();
			$this->end_controls_tabs();	
			
			
			
			$this->add_responsive_control(
				'fields_margin',
				[
					'label' => esc_html__( 'Margin', 'ai-addons' ),
					'type' => Controls_Manager::DIMENSIONS,
					'separator' => 'before',
					'selectors' => [
						'{{WRAPPER}} .contact-form-wrapper .wpcf7-form-control' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					]
				]
			);
			$this->add_responsive_control(
				'fields_padding',
				[
					'label' => esc_html__( 'Padding', 'ai-addons' ),
					'type' => Controls_Manager::DIMENSIONS,
					'selectors' => [
						'{{WRAPPER}} .contact-form-wrapper .wpcf7-form-control' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					]
				]
			);
			$this->add_responsive_control(
				'fields_border_radius',
				[
					'label' => esc_html__( 'Border Radius', 'ai-addons' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%' ],
					'selectors' => [
						'{{WRAPPER}} .contact-form-wrapper .wpcf7-form-control' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			$this->add_control(
				'fields_shadow_opt',
				[
					'label' 		=> esc_html__( 'Fields Box Shadow', 'ai-addons' ),
					'type' 			=> Controls_Manager::SWITCHER,
					'default' 		=> 'no'
				]
			);
			$this->add_control(
				'fields_shadow',
				[
					'label' 		=> esc_html__( 'Box Shadow', 'ai-addons' ),
					'type' 			=> Controls_Manager::BOX_SHADOW,
					'condition' => [
						'fields_shadow_opt' => 'yes',
					],
					'selectors' => [
						'{{WRAPPER}} .contact-form-wrapper .wpcf7-form-control' => 'box-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{SPREAD}}px {{COLOR}};',
					]
				]
			);
			$this->end_controls_section();
			
			// Style Button Section
			$this->start_controls_section(
				'section_style_button',
				[
					'label' => __( 'Button', 'ai-addons' ),
					'tab'   => Controls_Manager::TAB_STYLE,
				]
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 			=> 'contact_form_button_typography',
					'selector' 		=> '{{WRAPPER}} .contact-form-wrapper .wpcf7-form-control[type="submit"]'
				]
			);
			$this->start_controls_tabs( 'tabs_button_style' );

			$this->start_controls_tab(
				'tab_button_normal',
				[
					'label' => esc_html__( 'Normal', 'ai-addons' ),
				]
			);
			$this->add_control(
				'button_text_color',
				[
					'label' => esc_html__( 'Text Color', 'ai-addons' ),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .contact-form-wrapper .wpcf7-form-control[type="submit"]' => 'fill: {{VALUE}}; color: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name' => 'button_background_color',
					'types' => [ 'classic', 'gradient' ],
					'selector' => '{{WRAPPER}} .contact-form-wrapper .wpcf7-form-control[type="submit"]',
				]
			);				
			$this->add_responsive_control(
				'button_width',
				[
					'label' => esc_html__( 'Button Width', 'ai-addons' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'default' => [
						'size' => '',
					],
					'range' => [
						'px' => [
							'min' => 50,
							'max' => 2000,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .contact-form-wrapper .wpcf7-form-control[type="submit"]' => 'width: {{SIZE}}{{UNIT}};',
						'(mobile){{WRAPPER}} ..contact-form-wrapper .wpcf7-form-control[type="submit"]' => 'width: {{SIZE}}{{UNIT}};',
					]
				]
			);
			$this->end_controls_tab();

			$this->start_controls_tab(
				'tab_button_hover',
				[
					'label' => esc_html__( 'Hover', 'ai-addons' ),
				]
			);
			$this->add_control(
				'button_hover_color',
				[
					'label' => esc_html__( 'Text Color', 'ai-addons' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .contact-form-wrapper .wpcf7-form-control[type="submit"]:hover, {{WRAPPER}} .contact-form-wrapper .wpcf7-form-control[type="submit"]:focus' => 'color: {{VALUE}};',
						'{{WRAPPER}} .contact-form-wrapper .wpcf7-form-control[type="submit"]:hover svg, {{WRAPPER}} .contact-form-wrapper .wpcf7-form-control[type="submit"]:focus svg' => 'fill: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name' => 'button_background_hover_color',
					'types' => [ 'classic', 'gradient' ],
					'selector' => '{{WRAPPER}} .contact-form-wrapper .wpcf7-form-control[type="submit"]:hover, {{WRAPPER}} .contact-form-wrapper .wpcf7-form-control[type="submit"]:focus',
				]
			);			
			$this->add_control(
				'button_hover_border_color',
				[
					'label' => esc_html__( 'Border Color', 'ai-addons' ),
					'type' => Controls_Manager::COLOR,
					'condition' => [
						'border_border!' => '',
					],
					'selectors' => [
						'{{WRAPPER}} .contact-form-wrapper .wpcf7-form-control[type="submit"]:hover, {{WRAPPER}} .contact-form-wrapper .wpcf7-form-control[type="submit"]:focus' => 'border-color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();

			$this->end_controls_tabs();

			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'border',
					'selector' => '{{WRAPPER}} .contact-form-wrapper .wpcf7-form-control[type="submit"]',
					'separator' => 'before',
				]
			);
			$this->add_responsive_control(
				'button_border_radius',
				[
					'label' => esc_html__( 'Border Radius', 'ai-addons' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%' ],
					'selectors' => [
						'{{WRAPPER}} .contact-form-wrapper .wpcf7-form-control[type="submit"]' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'button_box_shadow',
					'selector' => '{{WRAPPER}} .contact-form-wrapper .wpcf7-form-control[type="submit"]',
				]
			);
			$this->add_responsive_control(
				'button_text_padding',
				[
					'label' => esc_html__( 'Padding', 'ai-addons' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .contact-form-wrapper .wpcf7-form-control[type="submit"]' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'separator' => 'before',
				]
			);			
			$this->add_responsive_control(
				'button_align',
				[
					'label' => __( 'Alignment', 'ai-addons' ),
					'type' => Controls_Manager::CHOOSE,
					'default' => 'left',
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
						'{{WRAPPER}} p:nth-last-of-type(1)' => 'text-align: {{VALUE}};',
					],
				]
			);
			$this->end_controls_section();
			
		}else{
			//Contact Section
			$this->start_controls_section(
				'general_section',
				[
					'label'	=> esc_html__( 'Contact Form', 'ai-addons' ),
					'tab'	=> Controls_Manager::TAB_CONTENT
				]
			);
			$this->add_control(
				'cf7_install_msg',
				[
					'type' => Controls_Manager::RAW_HTML,
					'raw' => sprintf( '<strong>%1$s</strong> is not installed/activated on your site. Please install and activate <strong>%2$s</strong> first.', __( 'Contact Form 7', 'ai-addons' ), __( 'Contact Form 7', 'ai-addons' ) ),
					'content_classes' => 'ai-elementor-warning',
				]
			);			
			$this->end_controls_section();
		}

	}

	/**
	 * Render Contact Form widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();
		extract( $settings );
		
		//Define Variables
		$free_layouts = [ 'standard' ];		
		$class = isset( $cf_layout ) && in_array( $cf_layout, $free_layouts ) ? ' cf-style-' . $cf_layout : ' cf-style-standard';
		
		if( class_exists( "WPCF7" ) ){
			echo '<div class="contact-form-wrapper'. esc_attr( $class ) .'">';
				if( isset( $contact_form ) && $contact_form != '' ){
					echo '<div class="contact-form">';
						echo do_shortcode( '[contact-form-7 id="'. esc_attr( $contact_form ) .'"]' );
					echo '</div><!-- .contact-form -->';
				}
			echo '</div><!-- .contact-form-wrapper -->';
		}

	}
	
	public function get_free_options( $key ) {
		$free_options = [
			'cf_layout' => [ 'standard' ]
		];
		return $free_options[$key];
	}
	
}