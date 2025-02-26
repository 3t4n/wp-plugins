<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * AI Addons Icon Box
 *
 * @since 1.0.0
 */
 
use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
 
class AIEA_Elementor_Testimonial_Widget extends Widget_Base {
	
	private $_settings;
	
	private $testimonial_array;
	
	/**
	 * Get widget name.
	 *	
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'ai-testimonial';
	}

	/**
	 * Get widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_title() {
		return __( 'Testimonial', 'ai-addons' );
	}

	/**
	 * Get widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'ai-default-icon '. aiea_addon_base()->widget_icon_classes('testimonial');
	}


	/**
	 * Get widget categories.
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
		return [ 'ai-front-end' ];
	}
	
	public function get_style_depends() {
		return [ 'themify-icons', 'bootstrap-icons' ];
	}
		
	public function get_help_url() {
        return 'https://aiaddons.ai/testimonial-demo/';
    }
	
	/**
	 * Register Icon Box widget controls.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		
		//Layouts Section
		$this->start_controls_section(
			'icon_layouts_section',
			[
				'label'			=> esc_html__( 'Layouts', 'ai-addons' ),
				'tab'			=> Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'testimonial_layout',
			[
				'label'			=> esc_html__( 'Choose Layout', 'ai-addons' ),
				'type'			=> 'aiea-image-select',
				'default'		=> 'layout-1',
				'choices'		=> [
					'layout-1'		=> [ 'thumbnail' => AIEA_URL .'assets/images/layouts/testimonial/layout-1.jpg', 'image' => 'https://aiaddons.ai/ai-import/widget-layouts/testimonial/layout-1.jpg', 'label' => esc_html__( 'Layout 1', 'ai-addons' ) ],
					'layout-2'		=> [ 'thumbnail' => AIEA_URL .'assets/images/layouts/testimonial/layout-2.jpg', 'image' => 'https://aiaddons.ai/ai-import/widget-layouts/testimonial/layout-2.jpg', 'label' => esc_html__( 'Layout 2', 'ai-addons' ) ],
					'layout-3'		=> [ 'thumbnail' => AIEA_URL .'assets/images/layouts/testimonial/layout-3.jpg', 'image' => 'https://aiaddons.ai/ai-import/widget-layouts/testimonial/layout-3.jpg', 'label' => esc_html__( 'Layout 3(Pro)', 'ai-addons' ) ],
					'layout-4'		=> [ 'thumbnail' => AIEA_URL .'assets/images/layouts/testimonial/layout-4.jpg', 'image' => 'https://aiaddons.ai/ai-import/widget-layouts/testimonial/layout-4.jpg', 'label' => esc_html__( 'Layout 4(Pro)', 'ai-addons' ) ],
					'custom'		=> [ 'thumbnail' => AIEA_URL .'assets/images/layouts/custom-xs.jpg', 'image' => AIEA_URL .'assets/images/layouts/custom.jpg', 'label' => esc_html__( 'Custom(Pro)', 'ai-addons' ) ],
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
					'testimonial_layout!' => $this->get_free_options('testimonial_layout'),
				]
			]
		);		
		$this->end_controls_section();
		
		//Name Section
		$this->start_controls_section(
			'name_section',
			[
				'label'			=> esc_html__( 'Name', 'ai-addons' ),
				'tab'			=> Controls_Manager::TAB_CONTENT
			]
		);
		$this->add_control(
			'name',
			[
				'type'			=> Controls_Manager::TEXT,
				'label' 		=> esc_html__( 'Name', 'ai-addons' ),
				'default' 		=>  esc_html__( 'Author', 'ai-addons' )
			]
		);		
		$this->add_control(
			'name_head',
			[
				'label'			=> esc_html__( 'Heading Tag', 'ai-addons' ),
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
			'name_text_trans',
			[
				'label'			=> esc_html__( 'Transform', 'ai-addons' ),
				'type'			=> Controls_Manager::SELECT,
				'default'		=> 'none',
				'options'		=> [
					'none'			=> esc_html__( 'Default', 'ai-addons' ),
					'capitalize'	=> esc_html__( 'Capitalized', 'ai-addons' ),
					'uppercase'		=> esc_html__( 'Upper Case', 'ai-addons' ),
					'lowercase'		=> esc_html__( 'Lower Case', 'ai-addons' )
				],
				'selectors' => [
					'{{WRAPPER}} .testimonial-wrapper .testimonial-name' => 'text-transform: {{VALUE}};'
				],
			]
		);
		$this->end_controls_section();		
		
		//Designation Section
		$this->start_controls_section(
			'des_section',
			[
				'label'			=> esc_html__( 'Designation', 'ai-addons' ),
				'tab'			=> Controls_Manager::TAB_CONTENT
			]
		);
		$this->add_control(
			'member_designation',
			[
				'type'			=> Controls_Manager::TEXT,
				'label' 		=> esc_html__( 'Designation', 'ai-addons' ),
				'default' 		=>  esc_html__( 'Founder', 'ai-addons' )
			]
		);		
		$this->add_control(
			'des_head',
			[
				'label'			=> esc_html__( 'Heading Tag', 'ai-addons' ),
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
		$this->end_controls_section();
		
		//Image Section
		$this->start_controls_section(
			'section_image',
			[
				'label' => esc_html__( 'Image', 'ai-addons' ),
				'tab'			=> Controls_Manager::TAB_CONTENT
			]
		);		
		$this->add_control(
			'image',
			[
				'type' => Controls_Manager::MEDIA,
				'label' => esc_html__( 'Image', 'ai-addons' ),
				'dynamic' => [
					'active' => true,
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
		
		//Ratting
		$this->start_controls_section(
			'section_rating',
			[
				'label' => esc_html__( 'Rating', 'elementor' ),
				'tab' => Controls_Manager::TAB_CONTENT				
			]
		);

		$this->add_control(
			'rating_scale',
			[
				'label' => esc_html__( 'Rating Scale', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'5' => '0-5',
					'10' => '0-10',
				],
				'default' => '5',
			]
		);

		$this->add_control(
			'rating',
			[
				'label' => esc_html__( 'Rating', 'elementor' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 10,
				'step' => 0.1,
				'default' => 5,
				'dynamic' => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			'star_style',
			[
				'label' => esc_html__( 'Icon', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'star_fontawesome' => 'Font Awesome',
					'star_unicode' => 'Unicode',
				],
				'default' => 'star_fontawesome',
				'render_type' => 'template',
				'prefix_class' => 'elementor--star-style-',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'unmarked_star_style',
			[
				'label' => esc_html__( 'Unmarked Style', 'elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'solid' => [
						'title' => esc_html__( 'Solid', 'elementor' ),
						'icon' => 'eicon-star',
					],
					'outline' => [
						'title' => esc_html__( 'Outline', 'elementor' ),
						'icon' => 'eicon-star-o',
					],
				],
				'default' => 'solid',
			]
		);
		$this->end_controls_section();
				
		// Content
		$this->start_controls_section(
			'content_section',
			[
				'label'			=> esc_html__( 'Content', 'ai-addons' ),
				'tab'			=> Controls_Manager::TAB_CONTENT
			]
		);
		
		// Openai part
		$openaiea_api_key = aiea_addon_base()->aiea_options('openai-api');	
		$this->add_control(
			'aiea_content_opt',
			[
				'label' 		=> esc_html__( 'OpenAI Content?', 'ai-addons' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'no'
			]
		);
		if( !$openaiea_api_key ) {
			$this->add_control(
				'aiea_msg',
				[
					'type' => Controls_Manager::RAW_HTML,
					'raw' => sprintf( 'You should put OpenAI api key on plugin settings. <strong>%s</strong>', __( 'AI addons -> settings -> OpenAI API Key', 'ai-addons' ) ),
					'content_classes' => 'ai-elementor-warning',
					'condition' => [
						'aiea_content_opt' => 'yes'
					],
				]
			);
		} else {
			$this->add_control(
				'aiea_content_box',
				[
					'type'			=> 'aiea_prompt',
					'label' 		=> esc_html__( 'Enter anything', 'rc-custom' ),
					'btn_txt'		=> esc_html__( 'Search', 'ai-addons' ),
					'loading_text'	=> esc_html__( 'Loading..', 'ai-addons' ),
					'default'		=> '',
					'description'	=> __( 'Example 1: 50 words about space <br>Example 2: 50 words about space in french', 'ai-addons' ),
					'condition' => [
						'aiea_content_opt' => 'yes'
					],
				]
			);
		}	
		
		$this->add_control(
			'content',
			[
				'type'			=> Controls_Manager::WYSIWYG,
				'label'			=> esc_html__( 'Content', 'ai-addons' ),
				'default' 		=> aiea_addon_base()->make_default_content('testimonial'),
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
		
		// Style Section
		$this->start_controls_section(
			'section_style_testimonial',
			[
				'label' => __( 'Testimonial', 'ai-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,				
			]
		);
		
		$this->start_controls_tabs( 'testimonial_content_styles' );
		$this->start_controls_tab(
			'testimonial_content_normal',
			[
				'label' => esc_html__( 'Normal', 'ai-addons' ),
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'bg_color',
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .testimonial-inner > *',
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'testimonial_border',
				'selector' => '{{WRAPPER}} .testimonial-inner',
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'testimonial_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .testimonial-inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_responsive_control(
			'testimonial_padding',
			[
				'label' => esc_html__( 'Padding', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .testimonial-inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_responsive_control(
			'testimonial_margin',
			[
				'label' => esc_html__( 'Margin', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .testimonial-inner' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
			'box_shadow',
			[
				'label' 		=> esc_html__( 'Box Shadow', 'ai-addons' ),
				'type' 			=> Controls_Manager::BOX_SHADOW,
				'condition' => [
					'shadow_opt' => 'yes',
				],
				'selectors' => [
					'{{WRAPPER}} .testimonial-inner' => 'box-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{SPREAD}}px {{COLOR}} {{testimonial_shadow_pos.VALUE}};',
				]
			]
		);
		$this->add_control(
			'box_shadow_pos',
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
		$this->add_responsive_control(
			'text_align',
			[
				'label' => __( 'Alignment', 'ai-addons' ),
				'type' => Controls_Manager::CHOOSE,
				'default' => '',
				'options' => [
					'left' => [
						'name' => __( 'Left', 'ai-addons' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'name' => __( 'Center', 'ai-addons' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'name' => __( 'Right', 'ai-addons' ),
						'icon' => 'eicon-text-align-right',
					],
					'justify' => [
						'name' => __( 'Justified', 'ai-addons' ),
						'icon' => 'eicon-text-align-justify',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .testimonial-wrapper .testimonial-inner  *' => 'text-align: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'testimonial_content_hover',
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
					'{{WRAPPER}}:hover .testimonial-inner' => 'background-color: {{VALUE}};'
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'testimonial_hover_border',
				'selector' => '{{WRAPPER}}:hover .testimonial-inner',
				'separator' => 'before',
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
			'testimonial_hbox_shadow',
			[
				'label' 		=> esc_html__( 'Box Shadow', 'ai-addons' ),
				'type' 			=> Controls_Manager::BOX_SHADOW,
				'condition' => [
					'shadow_hopt' => 'yes',
				],
				'selectors' => [
					'{{WRAPPER}}:hover .testimonial-inner' => 'box-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{SPREAD}}px {{COLOR}} {{testimonial_hbox_shadow_pos.VALUE}};',
				]
			]
		);
		$this->add_control(
			'testimonial_hbox_shadow_pos',
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
		
		// Style Name Section
		$this->start_controls_section(
			'section_style_name',
			[
				'label' => __( 'Name', 'ai-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);
		$this->start_controls_tabs( 'name_colors' );
		$this->start_controls_tab(
			'name_colors_normal',
			[
				'label' => esc_html__( 'Normal', 'ai-addons' ),
			]
		);
		$this->add_control(
			'name_color',
			[
				'type'			=> Controls_Manager::COLOR,
				'label'			=> esc_html__( 'Color', 'ai-addons' ),
				'default' 		=> '',
				'selectors' => [
					'{{WRAPPER}} .testimonial-wrapper .testimonial-name, {{WRAPPER}} .testimonial-wrapper .testimonial-name > a' => 'color: {{VALUE}};'
				],
			]
		);	
		$this->end_controls_tab();

		$this->start_controls_tab(
			'name_colors_hover',
			[
				'label' => esc_html__( 'Hover', 'ai-addons' ),
			]
		);
		$this->add_control(
			'name_hcolor',
			[
				'type'			=> Controls_Manager::COLOR,
				'label'			=> esc_html__( 'Color', 'ai-addons' ),
				'default' 		=> '',
				'selectors' => [
					'{{WRAPPER}} .testimonial-wrapper:hover .testimonial-name, {{WRAPPER}} .testimonial-wrapper:hover .testimonial-name > a' => 'color: {{VALUE}};'
				],
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();	
		$this->add_responsive_control(
			'name_margin',
			[
				'label' => esc_html__( 'Margin', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .testimonial-name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'testimonial_name_typography',
				'selector' 		=> '{{WRAPPER}} .testimonial-wrapper .testimonial-name'
			]
		);	
		$this->end_controls_section();
		
		// Style Designation Section
		$this->start_controls_section(
			'section_style_des',
			[
				'label' => __( 'Designation', 'ai-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);
		$this->start_controls_tabs( 'des_colors' );
		$this->start_controls_tab(
			'des_colors_normal',
			[
				'label' => esc_html__( 'Normal', 'ai-addons' ),
			]
		);
		$this->add_control(
			'des_color',
			[
				'type'			=> Controls_Manager::COLOR,
				'label'			=> esc_html__( 'Color', 'ai-addons' ),
				'default' 		=> '',
				'selectors' => [
					'{{WRAPPER}} .testimonial-member-des' => 'color: {{VALUE}};'
				],
			]
		);	
		$this->end_controls_tab();

		$this->start_controls_tab(
			'des_colors_hover',
			[
				'label' => esc_html__( 'Hover', 'ai-addons' ),
			]
		);
		$this->add_control(
			'des_hcolor',
			[
				'type'			=> Controls_Manager::COLOR,
				'label'			=> esc_html__( 'Color', 'ai-addons' ),
				'default' 		=> '',
				'selectors' => [
					'{{WRAPPER}}:hover .testimonial-member-des' => 'color: {{VALUE}};'
				],
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();	
		$this->add_responsive_control(
			'des_margin',
			[
				'label' => esc_html__( 'Margin', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .testimonial-member-des' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'testimonial_des_typography',
				'selector' 		=> '{{WRAPPER}} .testimonial-member-des'
			]
		);	
		$this->end_controls_section();
		
		// Style Image Section	
		$this->start_controls_section(
			'section_style_image',
			[
				'label' => __( 'Image', 'ai-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);
		$this->end_controls_tabs();	
		$this->add_control(
			'resize_opt',
			[
				'label' 		=> esc_html__( 'Resize Option', 'ai-addons' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'no'
			]
		);
		$this->add_responsive_control(
			'image_width',
			[
				'label' => esc_html__( 'Image Width', 'ai-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => '',
				],
				'condition' => [
					'resize_opt' => 'yes',	
				],
				'selectors' => [
					'{{WRAPPER}} .ai-testimonial-img > img' => 'height: {{SIZE}}px;',
				],
			]
		);			
		$this->add_responsive_control(
			'image_height',
			[
				'label' => esc_html__( 'Image Height', 'ai-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => '',
				],
				'condition' => [
					'resize_opt' => 'yes',	
				],
				'selectors' => [
					'{{WRAPPER}} .ai-testimonial-img > img' => 'width: {{SIZE}}px;',
				],
			]
		);	
		$this->add_responsive_control(
			'image_pos',
			[
				'label' => esc_html__( 'Bottom', 'ai-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => '',
				],
				'condition' => [
					'resize_opt' => 'yes',	
				],
				'selectors' => [
					'{{WRAPPER}} .aiea-testimonial-layout-3 .aiea-tm-header' => 'bottom: {{SIZE}}px;',
				],
				'condition' 	=> [
					'testimonial_layout' => 'layout-3'
				],
			]
		);	
		$this->add_responsive_control(
			'image_margin',
			[
				'label' => esc_html__( 'Margin', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .ai-testimonial-img > img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);		
		$this->add_responsive_control(
			'img_padding',
			[
				'label' => esc_html__( 'Padding', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .ai-testimonial-img > img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
				[
					'name' => 'team_img_border',
					'label' => esc_html__( 'Border', 'ai-addons' ),
					'selector' => '{{WRAPPER}} .ai-testimonial-img > img'
				]
		);
		$this->add_responsive_control(
			'image_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ai-testimonial-img > img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_title_style',
			[
				'label' => esc_html__( 'Title', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'title!' => '',
				],
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-star-rating__title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .elementor-star-rating__title',
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_shadow',
				'selector' => '{{WRAPPER}} .elementor-star-rating__title',
			]
		);

		$this->add_responsive_control(
			'title_gap',
			[
				'label' => esc_html__( 'Gap', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
					],
				],
				'selectors' => [
					'body:not(.rtl) {{WRAPPER}}:not(.elementor-star-rating--align-justify) .elementor-star-rating__title' => 'margin-right: {{SIZE}}{{UNIT}}',
					'body.rtl {{WRAPPER}}:not(.elementor-star-rating--align-justify) .elementor-star-rating__title' => 'margin-left: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->end_controls_section();
		
		// Style Rating Section
		$this->start_controls_section(
			'section_stars_style',
			[
				'label' => esc_html__( 'Stars', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_responsive_control(
			'icon_size',
			[
				'label' => esc_html__( 'Size', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-star-rating' => 'font-size: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_responsive_control(
			'icon_space',
			[
				'label' => esc_html__( 'Spacing', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
					],
				],
				'selectors' => [
					'body:not(.rtl) {{WRAPPER}} .elementor-star-rating i:not(:last-of-type)' => 'margin-right: {{SIZE}}{{UNIT}}',
					'body.rtl {{WRAPPER}} .elementor-star-rating i:not(:last-of-type)' => 'margin-left: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_control(
			'stars_color',
			[
				'label' => esc_html__( 'Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-star-rating i:before' => 'color: {{VALUE}}',
				],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'stars_unmarked_color',
			[
				'label' => esc_html__( 'Unmarked Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-star-rating i' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_responsive_control(
			'rating_margin',
			[
				'label' => esc_html__( 'Margin', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .testimonial-rating' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->end_controls_section();
				
		// Style Content Section
		$this->start_controls_section(
			'section_style_content',
			[
				'label' => __( 'Content', 'ai-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);
		$this->add_control(
			'font_color',
			[
				'type'			=> Controls_Manager::COLOR,
				'label'			=> esc_html__( 'Font Color', 'ai-addons' ),
				'default' 		=> '',
				'selectors' => [
					'{{WRAPPER}} .testimonial-content, {{WRAPPER}} .testimonial-content a' => 'color: {{VALUE}};'
				]
			]
		);
		$this->add_responsive_control(
			'desc_margin',
			[
				'label' => esc_html__( 'Margin', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .testimonial-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_responsive_control(
			'desc_padding',
			[
				'label' => esc_html__( 'Padding', 'ai-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .testimonial-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'testimonial_content_typography',
				'selector' 		=> '{{WRAPPER}} .testimonial-content'
			]
		);	
		$this->end_controls_section();	
		
	}
	
	/**
	 * @since 2.3.0
	 * @access protected
	 */
	protected function get_rating() {
		$settings = $this->get_settings_for_display();
		$rating_scale = (int) $settings['rating_scale'];
		$rating = (float) $settings['rating'] > $rating_scale ? $rating_scale : $settings['rating'];

		return [ $rating, $rating_scale ];
	}

	/**
	 * Print the actual stars and calculate their filling.
	 *
	 * Rating type is float to allow stars-count to be a fraction.
	 * Floored-rating type is int, to represent the rounded-down stars count.
	 * In the `for` loop, the index type is float to allow comparing with the rating value.
	 *
	 * @since 2.3.0
	 * @access protected
	 */
	protected function render_stars( $icon ) {
		$rating_data = $this->get_rating();
		$rating = (float) $rating_data[0];
		$floored_rating = floor( $rating );
		$stars_html = '';

		for ( $stars = 1.0; $stars <= $rating_data[1]; $stars++ ) {
			if ( $stars <= $floored_rating ) {
				$stars_html .= '<i class="elementor-star-full">' . $icon . '</i>';
			} elseif ( $floored_rating + 1 === $stars && $rating !== $floored_rating ) {
				$stars_html .= '<i class="elementor-star-' . ( $rating - $floored_rating ) * 10 . '">' . $icon . '</i>';
			} else {
				$stars_html .= '<i class="elementor-star-empty">' . $icon . '</i>';
			}
		}

		return $stars_html;
	}
	 
	protected function render() {

		$settings = $this->get_settings_for_display();
		$this->_settings = $settings;
		extract( $settings );		

		$parent_class = isset( $settings['testimonial_layout'] ) ? 'testimonial-'. $settings['testimonial_layout'] : 'testimonial-default';
		$this->add_render_attribute( 'ai-widget-wrapper', 'class', 'ai-testimonial-elementor-widget testimonial-wrapper' );
		$this->add_render_attribute( 'ai-widget-wrapper', 'class', esc_attr( $parent_class ) );
		?>
		<div <?php echo ''. $this->get_render_attribute_string( 'ai-widget-wrapper' ); ?>>
		<?php

		//Title section
		$name = isset( $name ) && $name != '' ? $name : '';
		$name_head = isset( $name_head ) && $name_head != '' ? $name_head : 'h3';
		
		//Designation Section
		$des = isset( $des ) && $des != '' ? $des : '';
		$des_head = isset( $des_head ) && $des_head != '' ? $des_head : 'span';
		
		$this->name_array = array(
			'name' => $name,
			'name_url_opt' => false,
			'name_url' => '',
			'name_head' => $name_head,
			'name_redirect' => ''
		);
				
		//Image Section
		$img_class = $image_html = '';
		if ( ! empty( $settings['image']['url'] ) ) {
			$this->image_class = 'image_class';
			$this->add_render_attribute( 'image', 'src', $settings['image']['url'] );
			$this->add_render_attribute( 'image', 'alt', Control_Media::get_image_alt( $settings['image'] ) );
			$this->add_render_attribute( 'image', 'title', Control_Media::get_image_title( $settings['image'] ) );
			$this->add_render_attribute( 'image_class', 'class', 'img-fluid' );

			$image = aiea_addon_base()->get_attachment_image_html( $settings, 'thumbnail', 'image', $this );
			$image_html = '<figure class="ai-testimonial-img">' . $image . '</figure>';
			
		}
		$this->testimonial_array = array(
			'img_html' => $image_html
		);
		
		//Content Section
		$this->testimonial_content = isset( $content ) && $content != '' ? $content : ''; 
		
		//Layout		
		$testimonial_layout = isset( $testimonial_layout ) && $testimonial_layout != '' ? $testimonial_layout : 'layout-1'; 

		echo '<div class="testimonial-inner">';
			$layouts = $this->get_free_options('testimonial_layout');
			if( !in_array( $testimonial_layout, $layouts ) ) {
				$testimonial_layout = 'layout-1';
			}
			$layout_fun_name = 'aiea_testimonial_'. str_replace( "-", "_", $testimonial_layout ); 
			$this->$layout_fun_name($testimonial_layout);
		echo '</div>';
		
		echo '</div> <!-- .ai-widget-wrapper -->';

	}
	
	function aiea_testimonial_layout_1( $testimonial_layout ) {
		echo '<div class="aiea-testimonial-'. esc_attr( $testimonial_layout ) .'">';
			echo '<div class="aiea-testimonial-content">';
				$this->aiea_testimonial_shortcode_elements("rating");
				$this->aiea_testimonial_shortcode_elements("content");
			echo '</div>';
			echo '<div class="aiea-tm-header">';
				echo '<div class="aiea-tm-header-left">';
					$this->aiea_testimonial_shortcode_elements("image");
				echo '</div>';
				echo '<div class="aiea-tm-header-body">';
					// name
					$this->aiea_testimonial_shortcode_elements("name");
					// designation
					$this->aiea_testimonial_shortcode_elements("des");
				echo '</div>';
			echo '</div>';
		echo '</div> <!-- aiea-testimonial-layout-1 -->';
	}
	
	function aiea_testimonial_layout_2( $testi_layout ) {
		echo '<div class="aiea-testimonial-'. esc_attr( $testi_layout ) .'">';
			echo '<div class="aiea-tm-header-left">';	
				echo '<div class="aiea-testimonial-content">';
					$this->aiea_testimonial_shortcode_elements("rating");
					$this->aiea_testimonial_shortcode_elements("content");
				echo '</div>';			
				echo '<div class="aiea-tm-header-body">';
					// name
					$this->aiea_testimonial_shortcode_elements("name");
					// designation
					$this->aiea_testimonial_shortcode_elements("des");
				echo '</div>';
			echo '</div>';
			echo '<div class="aiea-tm-header-right">';
				$this->aiea_testimonial_shortcode_elements("image");
			echo '</div>';
		echo '</div> <!-- aiea-testimonial-layout-2 -->';
	}	
	
	function aiea_testimonial_shortcode_elements( $element ){
		
		$settings = $this->_settings;
		
		switch( $element ){
		
			case "name":
				$name_array = $this->name_array;
				if( $name_array['name'] ){
					if( $name_array['name_url_opt'] && $name_array['name_url'] != '' )
						echo '<'. esc_attr( $name_array['name_head'] ) .' class="testimonial-name"><a href="'. esc_url( $name_array['name_url'] ) .'" name="'. esc_attr( $name_array['name'] ) .'" target="'. esc_attr( $name_array['name_redirect'] ) .'">'. esc_html( $name_array['name'] ) .'</a></'. esc_attr( $name_array['name_head'] ) .'>';
					else
						echo '<'. esc_attr( $name_array['name_head'] ) .' class="testimonial-name">'. esc_html( $name_array['name'] ) .'</'. esc_attr( $name_array['name_head'] ) .'>';
				}
			break;
			
			case "image":
				echo '<div class="testimonial-image">'. $this->testimonial_array['img_html'] .'</div>';
			break;
			
			case "des":
				
				$designation = isset( $settings['member_designation'] ) ? $settings['member_designation'] : '';
				$des_head = isset( $settings['des_head'] ) ? $settings['des_head'] : 'span';
				
				if( $designation ) {
					echo '<'. esc_attr( $des_head ) .' class="testimonial-member-des">'. esc_html( $designation ) .'</'. esc_attr( $des_head ) .'>';
				}
				
			break;
						
			case "content":
				if( $this->testimonial_content ) echo '<div class="testimonial-content">'. $this->testimonial_content .'</div>';
			break;
			
			case "rating":
				$rating_data = $this->get_rating();
				
				if( isset( $rating_data[0] ) && $rating_data[0] != '' ) {
				
					$icon = '&#xE934;';

					if ( 'star_fontawesome' === $settings['star_style'] ) {
						if ( 'outline' === $settings['unmarked_star_style'] ) {
							$icon = '&#xE933;';
						}
					} elseif ( 'star_unicode' === $settings['star_style'] ) {
						$icon = '&#9733;';

						if ( 'outline' === $settings['unmarked_star_style'] ) {
							$icon = '&#9734;';
						}
					}
					
					echo '<div class="testimonial-rating elementor-star-rating">'. $this->render_stars( $icon ) .'</div>';
					
				}
				
			break;
		
		}
	}
		
	public function get_free_options( $key ) {
		$free_options = [
			'testimonial_layout' => [ 'layout-1', 'layout-2' ]
		];
		return $free_options[$key];
	}
	
}