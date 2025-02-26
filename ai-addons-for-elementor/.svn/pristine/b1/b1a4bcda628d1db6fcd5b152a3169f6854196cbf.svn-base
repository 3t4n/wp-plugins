<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * AI Addons AI Title 
 *
 * @since 1.0.0
 */
 
class AIEA_Elementor_AI_Title_Widget extends Widget_Base {
	
	/**
	 * Get widget name.
	 *
	 * Retrieve AI Title name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'ai-title';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve AI Title title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'AI Title', 'ai-addons' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve AI Title icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'ai-default-icon '. aiea_addon_base()->widget_icon_classes('ai-title');
	}


	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the AI Title widget belongs to.
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
        return 'https://aiaddons.ai/ai-title/';
    }

	/**
	 * Register AI Title widget controls. 
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {

		//AI Section
		$this->start_controls_section(
			'aiea_section',
			[
				'label'	=> esc_html__( 'AI', 'ai-addons' ),
				'tab'	=> Controls_Manager::TAB_CONTENT,
			]
		);
		// Openai part
		$openaiea_api_key = aiea_addon_base()->aiea_options('openai-api');
		if( !$openaiea_api_key ) {
			$this->add_control(
				'aiea_msg',
				[
					'type' => Controls_Manager::RAW_HTML,
					'raw' => sprintf( 'You should put OpenAI api key on plugin settings. <strong>%s</strong>', __( 'AI addons -> settings -> OpenAI API Key', 'ai-addons' ) ),
					'content_classes' => 'ai-elementor-warning',
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
					'forwhich'		=> 'title',
					'default'		=> '',
					'description'	=> __( 'Example 1: suggest title for web design <br>Example 2: suggest title for mars in french', 'ai-addons' ),
				]
			);
		}
		$this->add_control(
			'aiea_content',
			[
				'label'			=> esc_html__( 'AI Title', 'ai-addons' ),
				'type'			=> Controls_Manager::WYSIWYG,
				'default'		=> aiea_addon_base()->make_default_content('ai-title'),
				'description' 	=> __( 'Create api key in OpenAI account <a href="https://platform.openai.com/account/api-keys" target="_blank">Create OpenAI API</a>', 'ai-addons'),
			]
		);
		$this->add_control(
			'title_tag',
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
			'title_text_trans',
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
					'{{WRAPPER}} .ai-title' => 'text-transform: {{VALUE}};'
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
		
		// Style Title Section
		$this->start_controls_section(
			'section_style_title',
			[
				'label' => __( 'Title', 'ai-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
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
					'{{WRAPPER}} .ai-title' => 'color: {{VALUE}};'
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
					'{{WRAPPER}} .ai-title' => 'color: {{VALUE}};'
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
					'{{WRAPPER}} .ai-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'fbox_title_typography',
				'selector' 		=> '{{WRAPPER}} .ai-title'
			]
		);	
		$this->end_controls_section();
		
	}

	/**
	 * Render AI Title widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();
		extract( $settings );
			
		$aiea_content = isset( $aiea_content ) ? $aiea_content : '';
		$title_tag = isset( $title_tag ) ? $title_tag : 'h2';
		
		echo '<div class="ai-title-wrapper">';
			echo '<div class="ai-title-inner">';
				
				if( $aiea_content ){
					echo '<'. esc_attr( $title_tag ) .' class="ai-title">'. wp_kses_post( $aiea_content ) .'</'. esc_attr( $title_tag ) .'><!-- .ai-title -->';
				}
				
			echo '</div><!-- .ai-toggle-content-inner -->';
		echo '</div><!-- .ai-toggle-content-wrapper -->';

	}
		
}