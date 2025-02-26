<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;

/**
 * AI Addons WP Form 
 *
 * @since 1.0.0
 */
 
class AIEA_Elementor_WP_Form_Widget extends Widget_Base {
	
	private $excerpt_len;
	
	/**
	 * Get widget name.
	 *
	 * Retrieve WP Form Widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'wp-form';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve WP Form Widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'WP Form', 'ai-addons' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve WP Form Widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'ai-default-icon '. aiea_addon_base()->widget_icon_classes('wp-form');
	}


	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the WP Form widget belongs to.
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
	 * Retrieve the list of scripts the WP Form widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @since 1.3.0
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends() {
		return [ 'nf-front-end', 'ai-front-end' ];
	}
	
	/**
	 * Get widget keywords.
	 * @return array widget keywords.
	 */
	public function get_keywords() {
		return [ 'wp form', 'contact form', 'form', 'form 7', 'mail' ];
	}
		
	public function get_help_url() {
        return 'https://aiaddons.ai/wp-form-demo/';
    }

	/**
	 * Register WP Form widget controls. 
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {
	
		$contact_forms = aiea_post_elements()->get_wp_forms();
		
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
				'nf_id',
				[
					'type'			=> Controls_Manager::SELECT,
					'label'			=> esc_html__( 'WP Form', 'ai-addons' ),
					'default'		=> '0',
					'options'		=> $contact_forms
				]
			);
			$this->add_control(
				'title_opt',
				[
					'label' 		=> esc_html__( 'Hide Title', 'ai-addons' ),
					'type' 			=> Controls_Manager::SWITCHER,
					'default' 		=> 'yes'
				]
			);
			$this->add_control(
				'desc_opt',
				[
					'label' 		=> esc_html__( 'Hide Description', 'ai-addons' ),
					'type' 			=> Controls_Manager::SWITCHER,
					'default' 		=> 'yes'
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
				'nf_layout',
				[
					'label'			=> esc_html__( 'WP Form Layout', 'ai-addons' ),
					'type'			=> Controls_Manager::SELECT,
					'default'		=> 'standard',
					'options'		=> [
						'standard'		=> esc_html__( 'Standard', 'ai-addons' ),
						'classic'		=> esc_html__( 'Classic', 'ai-addons' ),
						'classic-pro'	=> esc_html__( 'Classic Pro', 'ai-addons' ),
						'modern'		=> esc_html__( 'Modern', 'ai-addons' ),
						
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
						'{{WRAPPER}} .wp-form-wrapper' => 'text-align: {{VALUE}};',
					],
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
						'{{WRAPPER}} .wp-form-wrapper' => 'background-color: {{VALUE}};'
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
						'{{WRAPPER}} .wp-form-wrapper' => 'color: {{VALUE}};'
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
						'{{WRAPPER}} .wp-form-wrapper' => 'box-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{SPREAD}}px {{COLOR}} {{contact_form_box_shadow_pos.VALUE}};',
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
						'{{WRAPPER}} .wp-form-wrapper:hover' => 'background-color: {{VALUE}};'
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
						'{{WRAPPER}} .wp-form-wrapper:hover' => 'color: {{VALUE}};'
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
						'{{WRAPPER}} .wp-form-wrapper:hover' => 'box-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{SPREAD}}px {{COLOR}} {{contact_form_hbox_shadow_pos.VALUE}};',
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
						'{{WRAPPER}} .wp-form-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					]
				]
			);
			$this->add_responsive_control(
				'contact_widget_padding',
				[
					'label' => esc_html__( 'Padding', 'ai-addons' ),
					'type' => Controls_Manager::DIMENSIONS,
					'selectors' => [
						'{{WRAPPER}} .wp-form-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .wp-form-wrapper' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);			
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 			=> 'contact_form_content_typography',
					'selector' 		=> '{{WRAPPER}} .wp-form-wrapper'
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
					'selector' 		=> '{{WRAPPER}} .wp-form-wrapper .wpforms-field *[name]'
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
							'{{WRAPPER}} .wp-form-wrapper .wpforms-field *[name]' => 'color: {{VALUE}};'
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
							'{{WRAPPER}} .wp-form-wrapper .wpforms-field *[name]' => 'background-color: {{VALUE}};'
						]
					]
				);
				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name' => 'fields_border',
						'selector' => '{{WRAPPER}} .wp-form-wrapper .wpforms-field *[name]',
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
							'{{WRAPPER}} .wp-form-wrapper .wpforms-field *[name]:hover, {{WRAPPER}} .wp-form-wrapper .wpforms-field *[name]:focus, {{WRAPPER}} .wp-form-wrapper .wpforms-field *[name]:active' => 'color: {{VALUE}};'
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
							'{{WRAPPER}} .wp-form-wrapper .wpforms-field *[name]:hover, {{WRAPPER}} .wp-form-wrapper .wpforms-field *[name]:focus, {{WRAPPER}} .wp-form-wrapper .wpforms-field *[name]:active' => 'background-color: {{VALUE}};'
						]
					]
				);
				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name' => 'fields_hborder',
						'selector' => '{{WRAPPER}} .wp-form-wrapper .wpforms-field *[name]:hover, {{WRAPPER}} .wp-form-wrapper .wpforms-field *[name]:focus, {{WRAPPER}} .wp-form-wrapper .wpforms-field *[name]:active',
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
						'{{WRAPPER}} .wp-form-wrapper .wpforms-field *[name]' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					]
				]
			);
			$this->add_responsive_control(
				'fields_padding',
				[
					'label' => esc_html__( 'Padding', 'ai-addons' ),
					'type' => Controls_Manager::DIMENSIONS,
					'selectors' => [
						'{{WRAPPER}} .wp-form-wrapper .wpforms-field *[name]' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .wp-form-wrapper .wpforms-field *[name]' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .wp-form-wrapper .wpforms-field *[name]' => 'box-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{SPREAD}}px {{COLOR}};',
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
					'selector' 		=> '{{WRAPPER}} .wp-form-wrapper button[type="submit"]'
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
						'{{WRAPPER}} .wp-form-wrapper button[type="submit"]' => 'fill: {{VALUE}}; color: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name' => 'button_background_color',
					'types' => [ 'classic', 'gradient' ],
					'selector' => '{{WRAPPER}} .wp-form-wrapper button[type="submit"]',
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
						'{{WRAPPER}} .wp-form-wrapper button[type="submit"]' => 'width: {{SIZE}}{{UNIT}};',
						'(mobile){{WRAPPER}} .wp-form-wrapper button[type="submit"]' => 'width: {{SIZE}}{{UNIT}};',
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
						'{{WRAPPER}} .wp-form-wrapper button[type="submit"]:hover, {{WRAPPER}} .wp-form-wrapper button[type="submit"]:focus' => 'color: {{VALUE}};',
						'{{WRAPPER}} .wp-form-wrapper button[type="submit"]:hover svg, {{WRAPPER}} .wp-form-wrapper button[type="submit"]:focus svg' => 'fill: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name' => 'button_background_hover_color',
					'types' => [ 'classic', 'gradient' ],
					'selector' => '{{WRAPPER}} .wp-form-wrapper button[type="submit"]:hover, {{WRAPPER}} .wp-form-wrapper button[type="submit"]:focus',
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
						'{{WRAPPER}} .wp-form-wrapper button[type="submit"]:hover, {{WRAPPER}} .wp-form-wrapper button[type="submit"]:focus' => 'border-color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();

			$this->end_controls_tabs();

			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'border',
					'selector' => '{{WRAPPER}} .wp-form-wrapper button[type="submit"]',
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
						'{{WRAPPER}} .wp-form-wrapper button[type="submit"]' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'button_box_shadow',
					'selector' => '{{WRAPPER}} .wp-form-wrapper button[type="submit"]',
				]
			);
			$this->add_responsive_control(
				'button_text_padding',
				[
					'label' => esc_html__( 'Padding', 'ai-addons' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .wp-form-wrapper button[type="submit"]' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'label'	=> esc_html__( 'WP Form', 'ai-addons' ),
					'tab'	=> Controls_Manager::TAB_CONTENT
				]
			);
			$this->add_control(
				'nf_install_msg',
				[
					'type' => Controls_Manager::RAW_HTML,
					'raw' => sprintf( '<strong>%1$s</strong> is not installed/activated on your site. Please install and activate <strong>%2$s</strong> first.', __( 'WP Form', 'ai-addons' ), __( 'WP Form', 'ai-addons' ) ),
					'content_classes' => 'ai-elementor-warning',
				]
			);			
			$this->end_controls_section();
		}

	}

	/**
	 * Render WP Form widget output on the frontend.
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
		$class = isset( $nf_layout ) ? ' nf-style-' . $nf_layout : ' nf-style-standard';
		$title_opt = $title_opt == 'yes' ? 'true' : 'false';
		$desc_opt = $desc_opt == 'yes' ? 'true' : 'false';
		
		if( class_exists( "wpforms" ) ){
			echo '<div class="wp-form-wrapper'. esc_attr( $class ) .'">';
				if( isset( $nf_id ) && $nf_id != '0' ){
					echo '<div class="wp-form">';
						echo do_shortcode( '[wpforms id="'. esc_attr( $nf_id ) .'" title="'. esc_attr( $title_opt ) .'" description="'. esc_attr( $desc_opt ) .'"]' );
					echo '</div><!-- .wp-form -->';
				}
			echo '</div><!-- .wp-form-wrapper -->';
		}

	}
	
}